import {Component, Directive} from 'angular2/core';
import {Component, FormBuilder, Validators, ControlGroup, Control, FORM_DIRECTIVES, FORM_BINDINGS} from 'angular2/common'
import {Http, HTTP_PROVIDERS, Headers} from 'angular2/http';
import 'rxjs/Rx';
import {Router, ROUTER_PROVIDERS} from 'angular2/router'

@Component({
    selector: 'Forma',
    templateUrl: 'app/forma/forma.html',
    directives: [FORM_DIRECTIVES],
    viewBindings: [FORM_BINDINGS]
})

export class FormaComponent {

	registerForm: ControlGroup;
	http: Http;
	router: Router;
	postResponse: String;
	constructor(builder: FormBuilder, http: Http, router: Router) {
		this.http = http;
		this.router = router;
		this.registerForm = builder.group({
			imeSobe: ["", Validators.none],
			imaTV: ["", Validators.none],
			kreveti: ["", Validators.none],
		});
	}

	onAddRoom(): void {
		var data = "imeSobe="+this.registerForm.value.imeSobe+"&imaTV="+this.registerForm.value.imaTV+"&kreveti="+this.registerForm.value.kreveti;
		var headers = new Headers();
		headers.append('Content-Type', 'application/x-www-form-urlencoded');
		this.http.post('http://localhost/dz13/addroomservice.php',data, {headers:headers})
		.map(res => res)
		.subscribe( data => this.postResponse = data,
			err => alert(JSON.stringify(err)),
			() => {
				if(this.postResponse._body.indexOf("error") === -1) {
					alert("Uspesno dodavanje sobe");
					this.router.parent.navigate(['./Pocetna']);
				} else {
					alert("Neuspesno dodavanje sobe");
				}
			}
		);
	}
}