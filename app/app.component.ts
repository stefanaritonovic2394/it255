import {Component} from 'angular2/core';
import {RouteConfig, ROUTER_DIRECTIVES} from 'angular2/router';
import {PocetnaComponent} from 'app/pocetna/pocetna.component';
import {RezervacijaComponent} from 'app/rezervacija/rezervacija.component';
import {OnamaComponent} from 'app/onama/onama.component';

@Component({
    selector: 'moja-aplikacija',
    templateUrl: 'app/router.html',
    directives: [ROUTER_DIRECTIVES]
})

@RouteConfig([
	{path:'/', name: 'Pocetna', component: PocetnaComponent, useAsDefault: true},
  	{path:'/rezervacija', name:'Rezervacija', component: RezervacijaComponent},
  	{path:'/onama', name:'Onama', component: OnamaComponent}
])

export class AppComponent {}
