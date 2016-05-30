import {Component, Directive} from 'angular2/core';
import {Http, HTTP_PROVIDERS} from 'angular2/http';
import {SearchPipe} from 'app/pipe/search';
import 'rxjs/Rx';

@Component({
	pipes: [SearchPipe],
    selector: 'Pocetna',
    templateUrl: 'app/pocetna/pocetna.html'
})

export class PocetnaComponent {
	broj_kreveta: String = "";
	sobe: Object[];
	constructor(http: Http) {
		http.get('http://localhost/dz11/json_service.php')
		.map(res => res.json())
		.subscribe(sobe => this.sobe = sobe);
	}
}
