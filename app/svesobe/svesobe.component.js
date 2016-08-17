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
    var SveSobeComponent;
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
            SveSobeComponent = (function () {
                function SveSobeComponent(builder, http, router) {
                    var _this = this;
                    this.http = http;
                    this.router = router;
                    var headers = new http_1.Headers();
                    headers.append('Content-Type', 'application/x-www-form-urlencoded');
                    headers.append('token', localStorage.getItem('token'));
                    http.get('http://localhost/dz14/getrooms.php', { headers: headers })
                        .map(function (res) { return res.json(); }).share()
                        .subscribe(function (rooms) {
                        _this.rooms = rooms.rooms;
                        setInterval(function () {
                            $('table').DataTable();
                        }, 200);
                    }, function (err) {
                        _this.router.parent.navigate(['./Pocetna']);
                    });
                }
                SveSobeComponent.prototype.ukloniSobu = function (item) {
                    var _this = this;
                    console.log("Ukloni: ", item);
                    var headers = new http_1.Headers();
                    headers.append('Content-Type', 'application/x-www-form-urlencoded');
                    headers.append('token', localStorage.getItem('token'));
                    this.http.get('http://localhost/dz14/deleteroom.php?id=' + item, { headers: headers })
                        .subscribe(function (data) { return _this.postResponse = data; });
                    location.reload();
                };
                SveSobeComponent = __decorate([
                    core_1.Component({
                        selector: 'SveSobe',
                        templateUrl: 'app/svesobe/svesobe.html',
                        directives: [common_1.FORM_DIRECTIVES],
                        viewBindings: [common_1.FORM_BINDINGS]
                    }), 
                    __metadata('design:paramtypes', [common_1.FormBuilder, http_1.Http, router_1.Router])
                ], SveSobeComponent);
                return SveSobeComponent;
            }());
            exports_1("SveSobeComponent", SveSobeComponent);
        }
    }
});
//# sourceMappingURL=svesobe.component.js.map