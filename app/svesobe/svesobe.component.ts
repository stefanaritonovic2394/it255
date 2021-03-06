import {Component, Directive} from 'angular2/core';
import {Component, FormBuilder, Validators, ControlGroup, Control, FORM_DIRECTIVES, FORM_BINDINGS} from 'angular2/common';
import {Http, HTTP_PROVIDERS, Headers} from 'angular2/http';
import 'rxjs/Rx';
import {Router, ROUTER_PROVIDERS} from 'angular2/router';

@Component({
    selector: 'SveSobe',
    templateUrl: 'app/svesobe/svesobe.html',
    directives: [FORM_DIRECTIVES],
    viewBindings: [FORM_BINDINGS]
})

export class SveSobeComponent {
	
	loginForm: ControlGroup;
  	http: Http;
  	router: Router;
  	postResponse: String;

  	rooms: Object[];

	constructor(builder: FormBuilder, http: Http, router: Router) {
		this.http = http;
		this.router = router;
		var headers = new Headers();
		headers.append('Content-Type', 'application/x-www-form-urlencoded');
		headers.append('token', localStorage.getItem('token'));
		http.get('http://localhost/dz14/getrooms.php', {headers:headers})
			.map(res => res.json()).share()
			.subscribe(rooms => {
				this.rooms = rooms.rooms;
				setInterval(function() {
					$('table').DataTable();
				},200);
			},
			err => {
				this.router.parent.navigate(['./Pocetna']);
			}
			);
	}

	public ukloniSobu(item: Number) {
		console.log("Ukloni: ", item);
		var headers = new Headers();
		headers.append('Content-Type', 'application/x-www-form-urlencoded');
		headers.append('token', localStorage.getItem('token'));
		this.http.get('http://localhost/dz14/deleteroom.php?id='+item, {headers:headers})
		         .subscribe( data => this.postResponse = data);
		location.reload();
	}

}