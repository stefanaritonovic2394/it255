import {Component, Directive} from 'angular2/core';
import {Component, FormBuilder, Validators, ControlGroup, Control, FORM_DIRECTIVES, FORM_BINDINGS} from 'angular2/common';
import {Http, HTTP_PROVIDERS, Headers} from 'angular2/http';
import 'rxjs/Rx';
import {Router, ROUTER_PROVIDERS} from 'angular2/router';

@Component({
    selector: 'DodajSobu',
    templateUrl: 'app/dodajsobu/soba.html',
    directives: [FORM_DIRECTIVES],
    viewBindings: [FORM_BINDINGS]
})

export class DodajSobuComponent {

	dodajSobu: ControlGroup;
	http: Http;
	router: Router;
	postResponse: String;

	constructor(builder: FormBuilder, http: Http, router: Router) {
		this.http = http;
		this.router = router;
		this.dodajSobu = builder.group({
			imeSobe: ["", Validators.none],
			imaTV: [this.select, Validators.none],
			kreveti: ["", Validators.none],
		});
	}

	onDodajSobu(): void {
		var data = "imeSobe="+this.dodajSobu.value.imeSobe+"&imaTV="+this.select+"&kreveti="+this.dodajSobu.value.kreveti;
		var headers = new Headers();
		headers.append('Content-Type', 'application/x-www-form-urlencoded');
		headers.append('token', localStorage.getItem('token'));
		this.http.post('http://localhost/dz14/addroomservice.php',data, {headers:headers})
		.map(res => res)
		.subscribe( data => this.postResponse = data,
			err => alert(JSON.stringify(err)),
			() => {
				if(this.postResponse._body.indexOf("error") === -1) {
					alert("Uspesno dodavanje sobe");
					this.router.parent.navigate(['./SveSobe']);
				} else {
					alert("Neuspesno dodavanje sobe");
				}
			}
		);
	}
}