import {Component} from 'angular2/core';
import {RouteConfig, Router, ROUTER_DIRECTIVES} from 'angular2/router';
import {PocetnaComponent} from 'app/pocetna/pocetna.component';
import {RegistracijaComponent} from 'app/registracija/registracija.component';
import {FormaComponent} from 'app/forma/forma.component';
import {OnamaComponent} from 'app/onama/onama.component';
import {LoginComponent} from 'app/login/login.component';
import {SveSobeComponent} from 'app/svesobe/svesobe.component';
import {Pipe} from 'angular2/core';

@Component({
    selector: 'moja-aplikacija',
    templateUrl: 'app/router.html',
    directives: [ROUTER_DIRECTIVES]
})

@RouteConfig([
	{path:'/', name: 'Pocetna', component: PocetnaComponent, useAsDefault: true},
  	{path:'/registracija', name:'Registracija', component: RegistracijaComponent},
  	{path:'/login', name:'Login', component: LoginComponent},
  	{path:'/forma', name:'Forma', component: FormaComponent},
  	{path:'/onama', name:'Onama', component: OnamaComponent},
  	{path:'/svesobe', name:'SveSobe', component: SveSobeComponent}
])

export class AppComponent {
	router: Router;
	isAuth: String;
	
	constructor(router: Router) {
		this.router = router;
		router.subscribe((val) => {
		  
			if(localStorage.getItem('token') !== null) {
			  	this.isAuth = "yes";
			} else {
				this.isAuth = "no";
			}
		});
	}

 	onLogout(): void {
		localStorage.removeItem("token");
		this.router.navigate(['./Pocetna']);

		if(localStorage.getItem('token') !== null) {
			this.isAuth = "yes";
		} else {
			this.isAuth = "no";
		}
 	}
}