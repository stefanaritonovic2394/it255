System.register(['angular2/core', 'angular2/common', 'angular2/http', 'rxjs/Rx', 'angular2/router'], function(exports_1, context_1) {
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
    var core_1, common_1, http_1, router_1;
    var DodajSobuComponent;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (common_1_1) {
                common_1 = common_1_1;
            },
            function (http_1_1) {
                http_1 = http_1_1;
            },
            function (_1) {},
            function (router_1_1) {
                router_1 = router_1_1;
            }],
        execute: function() {
            DodajSobuComponent = (function () {
                function DodajSobuComponent(builder, http, router) {
                    this.http = http;
                    this.router = router;
                    this.dodajSobu = builder.group({
                        imeSobe: ["", common_1.Validators.none],
                        imaTV: [this.select, common_1.Validators.none],
                        kreveti: ["", common_1.Validators.none],
                    });
                }
                DodajSobuComponent.prototype.onDodajSobu = function () {
                    var _this = this;
                    var data = "imeSobe=" + this.dodajSobu.value.imeSobe + "&imaTV=" + this.select + "&kreveti=" + this.dodajSobu.value.kreveti;
                    var headers = new http_1.Headers();
                    headers.append('Content-Type', 'application/x-www-form-urlencoded');
                    headers.append('token', localStorage.getItem('token'));
                    this.http.post('http://localhost/dz14/addroomservice.php', data, { headers: headers })
                        .map(function (res) { return res; })
                        .subscribe(function (data) { return _this.postResponse = data; }, function (err) { return alert(JSON.stringify(err)); }, function () {
                        if (_this.postResponse._body.indexOf("error") === -1) {
                            alert("Uspesno dodavanje sobe");
                            _this.router.parent.navigate(['./SveSobe']);
                        }
                        else {
                            alert("Neuspesno dodavanje sobe");
                        }
                    });
                };
                DodajSobuComponent = __decorate([
                    core_1.Component({
                        selector: 'DodajSobu',
                        templateUrl: 'app/dodajsobu/soba.html',
                        directives: [common_1.FORM_DIRECTIVES],
                        viewBindings: [common_1.FORM_BINDINGS]
                    }), 
                    __metadata('design:paramtypes', [common_1.FormBuilder, http_1.Http, router_1.Router])
                ], DodajSobuComponent);
                return DodajSobuComponent;
            }());
            exports_1("DodajSobuComponent", DodajSobuComponent);
        }
    }
});
//# sourceMappingURL=dodajsobu.component.js.map