System.register(['angular2/core', 'angular2/router', 'app/pocetna/pocetna.component', 'app/rezervacija/rezervacija.component', 'app/forma/forma.component', 'app/forma2/forma2.component', 'app/onama/onama.component'], function(exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1, router_1, pocetna_component_1, rezervacija_component_1, forma_component_1, forma2_component_1, onama_component_1;
    var AppComponent;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (router_1_1) {
                router_1 = router_1_1;
            },
            function (pocetna_component_1_1) {
                pocetna_component_1 = pocetna_component_1_1;
            },
            function (rezervacija_component_1_1) {
                rezervacija_component_1 = rezervacija_component_1_1;
            },
            function (forma_component_1_1) {
                forma_component_1 = forma_component_1_1;
            },
            function (forma2_component_1_1) {
                forma2_component_1 = forma2_component_1_1;
            },
            function (onama_component_1_1) {
                onama_component_1 = onama_component_1_1;
            }],
        execute: function() {
            AppComponent = (function () {
                function AppComponent() {
                }
                AppComponent = __decorate([
                    core_1.Component({
                        selector: 'moja-aplikacija',
                        templateUrl: 'app/router.html',
                        directives: [router_1.ROUTER_DIRECTIVES]
                    }),
                    router_1.RouteConfig([
                        { path: '/', name: 'Pocetna', component: pocetna_component_1.PocetnaComponent, useAsDefault: true },
                        { path: '/rezervacija', name: 'Rezervacija', component: rezervacija_component_1.RezervacijaComponent },
                        { path: '/forma', name: 'Forma', component: forma_component_1.FormaComponent },
                        { path: '/forma2', name: 'Forma2', component: forma2_component_1.Forma2Component },
                        { path: '/onama', name: 'Onama', component: onama_component_1.OnamaComponent }
                    ]), 
                    __metadata('design:paramtypes', [])
                ], AppComponent);
                return AppComponent;
            }());
            exports_1("AppComponent", AppComponent);
        }
    }
});
//# sourceMappingURL=app.component.js.map