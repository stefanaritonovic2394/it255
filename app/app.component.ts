import {Component} from 'angular2/core';
import {RouteConfig, ROUTER_DIRECTIVES} from 'angular2/router';
import {PocetnaComponent} from 'app/pocetna/pocetna.component';
import {RezervacijaComponent} from 'app/rezervacija/rezervacija.component';
import {FormaComponent} from 'app/forma/forma.component';
import {Forma2Component} from 'app/forma2/forma2.component';
import {OnamaComponent} from 'app/onama/onama.component';
import {Pipe} from 'angular2/core';

@Component({
    selector: 'moja-aplikacija',
    templateUrl: 'app/router.html',
    directives: [ROUTER_DIRECTIVES]
})

@RouteConfig([
	{path:'/', name: 'Pocetna', component: PocetnaComponent, useAsDefault: true},
  	{path:'/rezervacija', name:'Rezervacija', component: RezervacijaComponent},
  	{path:'/forma', name:'Forma', component: FormaComponent},
  	{path:'/forma2', name:'Forma2', component: Forma2Component},
  	{path:'/onama', name:'Onama', component: OnamaComponent}
])

export class AppComponent {}
