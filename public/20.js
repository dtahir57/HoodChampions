(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[20],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/battle/Battle.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/battle/Battle.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'BattleView',
  data: function data() {
    return {
      battle: {},
      user: {},
      teams: [],
      exists: null
    };
  },
  methods: {
    join: function join() {// let uri = '/api/battle/join';
    }
  },
  created: function created() {
    var _this = this;

    var uri = "/api/battle/".concat(this.$route.params.id);
    axios.get(uri, {
      headers: {
        "Accept": "application/json",
        "Authorization": "Bearer ".concat(localStorage.getItem('user_api_token'))
      }
    }).then(function (response) {
      _this.battle = response.data.battle;
      _this.user = response.data.user;
      _this.teams = response.data.teams;
      _this.exists = response.data.exists;
    })["catch"](function (error) {
      console.log(error.response);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/battle/Battle.vue?vue&type=template&id=2bc9beaa&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/battle/Battle.vue?vue&type=template&id=2bc9beaa& ***!
  \**************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "main-wrapper" }, [
    _c("section", { staticClass: "create-battle-banner" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row align-items-center" }, [
          _c("div", { staticClass: "col-md-5 col-lg-4" }, [
            _c(
              "div",
              { staticClass: "text" },
              [
                _c("h1", { staticClass: "common-h" }, [_vm._v("Battles")]),
                _vm._v(" "),
                _c("p", [_vm._v("Create a Battle for InnerHood Competitions")]),
                _vm._v(" "),
                _c(
                  "router-link",
                  {
                    staticClass: "btn btn-default block-btn",
                    attrs: { to: "/battles/create" }
                  },
                  [_vm._v("Create Battle")]
                )
              ],
              1
            )
          ]),
          _vm._v(" "),
          _vm._m(0)
        ])
      ])
    ]),
    _vm._v(" "),
    _c("section", { staticClass: "create-battle" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-6" }, [
            _c("div", { staticClass: "img-holder" }, [
              _c("img", { attrs: { src: _vm.battle.image, alt: "img" } })
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-6 col-lg-5 offset-lg-1" }, [
            _c("div", { staticClass: "team-info" }, [
              _c("div", { staticClass: "text" }, [
                _c("h3", [_vm._v(_vm._s(_vm.battle.title) + " "), _vm._m(1)]),
                _vm._v(" "),
                _c("span", [
                  _c("i", { staticClass: "fal fa-user-circle" }),
                  _vm._v(" " + _vm._s(_vm.battle.users))
                ]),
                _vm._v(" "),
                _c("p", [_vm._v(_vm._s(_vm.battle.description))])
              ]),
              _vm._v(" "),
              !_vm.exists
                ? _c(
                    "button",
                    {
                      staticClass: "bt btn-outline btn-default",
                      on: { click: _vm.join }
                    },
                    [_vm._v("Join")]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.exists
                ? _c(
                    "button",
                    {
                      staticClass: "bt btn-outline btn-block",
                      attrs: { disabled: "" }
                    },
                    [_vm._v("Joined")]
                  )
                : _vm._e()
            ])
          ])
        ])
      ])
    ]),
    _vm._v(" "),
    _vm._m(2),
    _vm._v(" "),
    _c("section", { staticClass: "battle-details" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "f-row" }, [
          _c("div", { staticClass: "column" }, [
            _c("h1", { staticClass: "common-h" }, [_vm._v("About")]),
            _vm._v(" "),
            _c("div", { staticClass: "about-team" }, [
              _c("ul", [
                _c("li", [
                  _c("span", [_vm._v("About Us")]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(_vm.battle.about_us))])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("span", [_vm._v("Email")]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(_vm.battle.email))])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("span", [_vm._v("Contact Number")]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(_vm.battle.contact_no))])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("span", [_vm._v("Meet Place")]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(_vm.battle.meetup_place))])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "column" }, [
            _c(
              "div",
              { staticClass: "members" },
              [
                _c("h1", { staticClass: "common-h" }, [_vm._v("Teams")]),
                _vm._v(" "),
                _vm._l(_vm.teams, function(team, index) {
                  return _c("div", { staticClass: "single-member" }, [
                    _c("a", { attrs: { href: "#" } }, [
                      _c("div", { staticClass: "img-holder" }, [
                        _c("img", { attrs: { src: team.image, alt: "img" } })
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "name-place" }, [
                        _c("h4", [_vm._v(_vm._s(team.title))]),
                        _vm._v(" "),
                        _c("p", [
                          _c("i", { staticClass: "fal fa-map-marker-alt" }),
                          _vm._v(" " + _vm._s(team.hood_name))
                        ])
                      ])
                    ])
                  ])
                })
              ],
              2
            )
          ]),
          _vm._v(" "),
          _vm._m(3)
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "col-md-5 offset-md-2 col-lg-4 offset-lg-3" },
      [
        _c("img", {
          attrs: {
            src: __webpack_require__(/*! @/images/svg/Battles.svg */ "./resources/js/images/svg/Battles.svg"),
            width: "100%",
            alt: "img"
          }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("a", { attrs: { href: "edit-battle.html" } }, [
      _c("i", { staticClass: "fas fa-edit    " })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("section", { staticClass: "team-battles" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-xl-3 col-md-4" }, [
            _c("div", { staticClass: "publisher" }, [
              _c("h1", { staticClass: "common-h" }, [_vm._v("Wall")]),
              _vm._v(" "),
              _c("div", { staticClass: "img-holder" }, [
                _c("img", { attrs: { src: "images/person.jpg", alt: "img" } })
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "info-msg" }, [
                _c("p", [
                  _vm._v(
                    "Click this space to start posting in this group. Please do not comment anything."
                  )
                ])
              ]),
              _vm._v(" "),
              _c("button", { staticClass: "btn btn-default btn-block" }, [
                _vm._v("Publish")
              ])
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "col-lg-7 col-md-8 offset-xl-2 offset-lg-1" },
            [
              _c("div", { staticClass: "battles" }, [
                _c("ul", [
                  _c("li", [
                    _c("div", { staticClass: "strip" }, [
                      _c("p", [
                        _vm._v("First Battle would be on 19 March 2019!")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "img-holder" }, [
                        _c("img", {
                          attrs: { src: "images/person.jpg", alt: "img" }
                        })
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "bdate" }, [
                      _c("a", { staticClass: "trash", attrs: { href: "#" } }, [
                        _c("i", { staticClass: "fas fa-trash" })
                      ]),
                      _vm._v(" "),
                      _c("ul", { staticClass: "remove-action" }, [
                        _c("li", [
                          _c("a", { attrs: { href: "#" } }, [_vm._v("Yes")])
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            { staticClass: "dismiss", attrs: { href: "#" } },
                            [_vm._v("Cancel")]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("span", [_vm._v("1 March 2019, 12:00 AM")])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("div", { staticClass: "strip" }, [
                      _c("p", [
                        _vm._v("First Battle would be on 19 March 2019!")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "img-holder" }, [
                        _c("img", {
                          attrs: { src: "images/person.jpg", alt: "img" }
                        })
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "bdate" }, [
                      _c("a", { staticClass: "trash", attrs: { href: "#" } }, [
                        _c("i", { staticClass: "fas fa-trash" })
                      ]),
                      _vm._v(" "),
                      _c("ul", { staticClass: "remove-action" }, [
                        _c("li", [
                          _c("a", { attrs: { href: "#" } }, [_vm._v("Yes")])
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            { staticClass: "dismiss", attrs: { href: "#" } },
                            [_vm._v("Cancel")]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("span", [_vm._v("1 March 2019, 12:00 AM")])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("div", { staticClass: "strip" }, [
                      _c("p", [
                        _vm._v("First Battle would be on 19 March 2019!")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "img-holder" }, [
                        _c("img", {
                          attrs: { src: "images/person.jpg", alt: "img" }
                        })
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "bdate" }, [
                      _c("a", { staticClass: "trash", attrs: { href: "#" } }, [
                        _c("i", { staticClass: "fas fa-trash" })
                      ]),
                      _vm._v(" "),
                      _c("ul", { staticClass: "remove-action" }, [
                        _c("li", [
                          _c("a", { attrs: { href: "#" } }, [_vm._v("Yes")])
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            { staticClass: "dismiss", attrs: { href: "#" } },
                            [_vm._v("Cancel")]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("span", [_vm._v("1 March 2019, 12:00 AM")])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("div", { staticClass: "strip" }, [
                      _c("p", [
                        _vm._v("First Battle would be on 19 March 2019!")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "img-holder" }, [
                        _c("img", {
                          attrs: { src: "images/person.jpg", alt: "img" }
                        })
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "bdate" }, [
                      _c("a", { staticClass: "trash", attrs: { href: "#" } }, [
                        _c("i", { staticClass: "fas fa-trash" })
                      ]),
                      _vm._v(" "),
                      _c("ul", { staticClass: "remove-action" }, [
                        _c("li", [
                          _c("a", { attrs: { href: "#" } }, [_vm._v("Yes")])
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            { staticClass: "dismiss", attrs: { href: "#" } },
                            [_vm._v("Cancel")]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("span", [_vm._v("1 March 2019, 12:00 AM")])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("div", { staticClass: "strip" }, [
                      _c("p", [
                        _vm._v("First Battle would be on 19 March 2019!")
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "img-holder" }, [
                        _c("img", {
                          attrs: { src: "images/person.jpg", alt: "img" }
                        })
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "bdate" }, [
                      _c("a", { staticClass: "trash", attrs: { href: "#" } }, [
                        _c("i", { staticClass: "fas fa-trash" })
                      ]),
                      _vm._v(" "),
                      _c("ul", { staticClass: "remove-action" }, [
                        _c("li", [
                          _c("a", { attrs: { href: "#" } }, [_vm._v("Yes")])
                        ]),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            { staticClass: "dismiss", attrs: { href: "#" } },
                            [_vm._v("Cancel")]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("span", [_vm._v("1 March 2019, 12:00 AM")])
                    ])
                  ])
                ])
              ])
            ]
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "column" }, [
      _c("div", { staticClass: "results" }, [
        _c("h1", { staticClass: "common-h" }, [_vm._v("Results")]),
        _vm._v(" "),
        _c("h5", [_vm._v("Hood ranikings")]),
        _vm._v(" "),
        _c("table", [
          _c("tr", { staticClass: "winner" }, [
            _c("td", [_c("i", { staticClass: "fas fa-trophy" })]),
            _vm._v(" "),
            _c("td", [_vm._v("Hougang")])
          ]),
          _vm._v(" "),
          _c("tr", [
            _c("td", [_vm._v("2")]),
            _vm._v(" "),
            _c("td", [_vm._v("Ang Mo Kio")])
          ]),
          _vm._v(" "),
          _c("tr", [
            _c("td", [_vm._v("3")]),
            _vm._v(" "),
            _c("td", [_vm._v("Potong Pasir")])
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/images/svg/Battles.svg":
/*!*********************************************!*\
  !*** ./resources/js/images/svg/Battles.svg ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Battles.svg?153335fd25a57ff96ef0042dbc050dd5";

/***/ }),

/***/ "./resources/js/views/AL/battle/Battle.vue":
/*!*************************************************!*\
  !*** ./resources/js/views/AL/battle/Battle.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Battle_vue_vue_type_template_id_2bc9beaa___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Battle.vue?vue&type=template&id=2bc9beaa& */ "./resources/js/views/AL/battle/Battle.vue?vue&type=template&id=2bc9beaa&");
/* harmony import */ var _Battle_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Battle.vue?vue&type=script&lang=js& */ "./resources/js/views/AL/battle/Battle.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Battle_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Battle_vue_vue_type_template_id_2bc9beaa___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Battle_vue_vue_type_template_id_2bc9beaa___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/AL/battle/Battle.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/AL/battle/Battle.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/views/AL/battle/Battle.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Battle.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/battle/Battle.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/AL/battle/Battle.vue?vue&type=template&id=2bc9beaa&":
/*!********************************************************************************!*\
  !*** ./resources/js/views/AL/battle/Battle.vue?vue&type=template&id=2bc9beaa& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_template_id_2bc9beaa___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Battle.vue?vue&type=template&id=2bc9beaa& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/battle/Battle.vue?vue&type=template&id=2bc9beaa&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_template_id_2bc9beaa___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_template_id_2bc9beaa___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);