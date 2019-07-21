(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[16],{

<<<<<<< HEAD
/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
=======
/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/OTP.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/OTP.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************/
>>>>>>> origin/frontend
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _config_config__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/config/config */ "./resources/js/config/config.js");
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
<<<<<<< HEAD
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
  name: 'Team',
  data: function data() {
    return {
      team: {},
      users: []
    };
  },
  created: function created() {
    var _this = this;

    var uri = "/api/team/".concat(this.$route.params.id);
    axios.get(uri, _config_config__WEBPACK_IMPORTED_MODULE_0__["config"]).then(function (response) {
      _this.team = response.data.team, _this.users = response.data.users;
    })["catch"](function (error) {
      console.log(error.response);
=======
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'OTP',
  data: function data() {
    return {
      user: {},
      otp: null,
      otp_expired: '',
      code_resent: '',
      code_mismatch: ''
    };
  },
  methods: {
    resend: function resend() {
      var _this = this;

      axios.get('/api/resend/code/' + this.user.id).then(function (response) {
        _this.code_resent = response.data.message;
        console.log(response.data);
      })["catch"](function (error) {
        console.log(error.data);
      });
    },
    verify: function verify() {
      var _this2 = this;

      var uri = '/api/verify/otp';
      axios.post(uri, {
        id: this.user.id,
        otp: this.otp
      }).then(function (response) {
        if (response.data.code == 200) {
          console.log(response.data);
          localStorage.setItem('user_api_token', response.data.success.token);

          _this2.$store.dispatch('setApiToken', response.data.success.token);

          _this2.$router.push("/");
        } else if (response.data.code == 400) {
          console.log(response.data.message);
          _this2.code_mismatch = response.data.message;
        } else {
          _this2.otp_expired = response.data.message;
          console.log(response.data.message);
        }
      })["catch"](function (error) {
        console.log(error.response);
      });
    }
  },
  created: function created() {
    var _this3 = this;

    var uri = "/api/user/".concat(this.$route.params.id);
    axios.get(uri).then(function (response) {
      _this3.user = response.data.user;
      console.log(response.data.otp);
      console.log(response.data.user);
    })["catch"](function (error) {
      console.log(error.data);
>>>>>>> origin/frontend
    });
  }
});

/***/ }),

<<<<<<< HEAD
/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a& ***!
  \**********************************************************************************************************************************************************************************************************/
=======
/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/OTP.vue?vue&type=template&id=6a36665c&":
/*!*************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/OTP.vue?vue&type=template&id=6a36665c& ***!
  \*************************************************************************************************************************************************************************************************/
>>>>>>> origin/frontend
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
<<<<<<< HEAD
    _vm._m(0),
    _vm._v(" "),
    _c("section", { staticClass: "join-team" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-6" }, [
            _c("div", { staticClass: "img-holder" }, [
              _c("img", { attrs: { src: _vm.team.image, alt: "img" } })
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-6 col-lg-5 offset-lg-1" }, [
            _c("div", { staticClass: "team-info" }, [
              _c("div", { staticClass: "text" }, [
                _c("h3", [_vm._v(_vm._s(_vm.team.title))]),
                _vm._v(" "),
                _c("span", [
                  _c("i", { staticClass: "fal fa-user-circle" }),
                  _vm._v(" " + _vm._s(_vm.users.length))
                ]),
                _vm._v(" "),
                _c("p", [_vm._v(_vm._s(_vm.team.description))])
              ]),
              _vm._v(" "),
              _c("button", { staticClass: "bt btn-default btn-block" }, [
                _vm._v("Join")
              ])
            ])
          ])
        ])
      ])
    ]),
    _vm._v(" "),
    _vm._m(1),
    _vm._v(" "),
    _c("section", { staticClass: "team-details" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-xl-3 col-md-4" }, [
            _c("h1", { staticClass: "common-h" }, [_vm._v("About")]),
            _vm._v(" "),
            _c("div", { staticClass: "about-team" }, [
              _c("ul", [
                _c("li", [
                  _c("span", [_vm._v("About Us")]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(_vm.team.about_us))])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("span", [_vm._v("Email")]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(_vm.team.email))])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("span", [_vm._v("contact Number")]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(_vm.team.contact_no))])
                ]),
                _vm._v(" "),
                _c("li", [
                  _c("span", [_vm._v("Meet Place")]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(_vm.team.meetup_place))])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-8 offset-xl-1" }, [
            _c("div", { staticClass: "members" }, [
              _c("h1", { staticClass: "common-h" }, [_vm._v("Members")]),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "row" },
                _vm._l(_vm.users, function(user, index) {
                  return _c("div", { staticClass: "col-xl-3 col-md-4 col-6" }, [
                    _c("div", { staticClass: "single-member" }, [
                      _c("a", { attrs: { href: "#" } }, [
                        _vm._m(2, true),
                        _vm._v(" "),
                        _c("div", { staticClass: "name-place" }, [
                          _c("h4", [_vm._v(_vm._s(user.name))]),
                          _vm._v(" "),
                          _c("p", [
                            _c("i", { staticClass: "fal fa-map-marker-alt" }),
                            _vm._v(" " + _vm._s(user.hood_name))
                          ])
                        ])
                      ])
                    ])
                  ])
                }),
                0
              )
            ])
          ])
=======
    _c("section", { staticClass: "login" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row justify-content-center" }, [
          _c(
            "div",
            { staticClass: "col-lg-5 col-md-8 col-sm-9 col-12 text-center" },
            [
              _c("h1", { staticClass: "common-h" }, [
                _vm._v("Verify your phone")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "mb-4 mt-5" }, [
                _c("p", [
                  _vm._v("Enter the code to verify "),
                  _c("strong", [_vm._v(_vm._s(_vm.user.phone_number))])
                ]),
                _vm._v(" "),
                _c("p", [
                  _vm._v("The OTP will expire 13:15, 2019 April 28 "),
                  _c(
                    "a",
                    {
                      attrs: { href: "#" },
                      on: {
                        click: function($event) {
                          return _vm.resend()
                        }
                      }
                    },
                    [_vm._v("Resend Code")]
                  )
                ]),
                _vm._v(" "),
                _vm.code_resent
                  ? _c("li", { staticClass: "alert alert-success" }, [
                      _vm._v(_vm._s(_vm.code_resent))
                    ])
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "form-group" }, [
                _c("input", {
                  directives: [
                    {
                      name: "validate",
                      rawName: "v-validate",
                      value: "required|numeric",
                      expression: "'required|numeric'"
                    },
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.otp,
                      expression: "otp"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: {
                    type: "text",
                    name: "OTP",
                    id: "otp",
                    placeholder: "Verification Code"
                  },
                  domProps: { value: _vm.otp },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.otp = $event.target.value
                    }
                  }
                }),
                _vm._v(" "),
                _vm.otp_expired
                  ? _c("span", { staticClass: "text-danger" }, [
                      _vm._v(_vm._s(_vm.otp_expired))
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _vm.code_mismatch
                  ? _c("span", { staticClass: "text-danger" }, [
                      _vm._v(_vm._s(_vm.code_mismatch))
                    ])
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-default block-btn",
                  on: {
                    click: function($event) {
                      return _vm.verify()
                    }
                  }
                },
                [_vm._v("Submit")]
              )
            ]
          )
>>>>>>> origin/frontend
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
    return _c("section", { staticClass: "teams" }, [
      _c("div", { staticClass: "create-team-banner" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row align-items-center" }, [
            _c("div", { staticClass: "col-md-5 col-lg-4" }, [
              _c("div", { staticClass: "text" }, [
                _c("h1", { staticClass: "common-h" }, [_vm._v("Teams")]),
                _vm._v(" "),
                _c("p", [
                  _vm._v(
                    "Create or join a team in your neighbourhood to share interests, resources, contacts and ideas. Start a community action team to make things better in the neighbourhood!"
                  )
                ]),
                _vm._v(" "),
                _c("button", { staticClass: "btn btn-default block-btn" }, [
                  _vm._v("Create Team")
                ])
              ])
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "col-md-5 offset-md-2 col-lg-4 offset-lg-3" },
              [
                _c("img", {
                  attrs: {
                    src: __webpack_require__(/*! @/images/svg/Teams.svg */ "./resources/js/images/svg/Teams.svg"),
                    width: "100%",
                    alt: "img"
                  }
                })
              ]
            )
          ])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("section", { staticClass: "team-posts" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-xl-3 col-md-4" }, [
            _c("div", { staticClass: "publisher" }, [
              _c("h1", { staticClass: "common-h" }, [_vm._v("Wall")]),
              _vm._v(" "),
              _c("div", { staticClass: "img-holder" }, [
                _c("img", {
                  attrs: { src: __webpack_require__(/*! @/images/person.jpg */ "./resources/js/images/person.jpg"), alt: "img" }
                })
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
              _c("div", { staticClass: "posts" }, [
                _c("div", { staticClass: "info-msg" }, [
                  _c("p", [
                    _vm._v("There are no posts. Why not post somthing?")
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
    return _c("div", { staticClass: "img-holder" }, [
      _c("img", { attrs: { src: "images/person.jpg", alt: "img" } })
    ])
  }
]
render._withStripped = true



/***/ }),

<<<<<<< HEAD
/***/ "./resources/js/config/config.js":
/*!***************************************!*\
  !*** ./resources/js/config/config.js ***!
  \***************************************/
/*! exports provided: config */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "config", function() { return config; });
var config = {
  headers: {
    "Accept": "application/json",
    "Authorization": "Bearer ".concat(localStorage.getItem('user_api_token')) // "Content-Type": "multipart/form-data"

  }
};

/***/ }),

/***/ "./resources/js/images/svg/Teams.svg":
/*!*******************************************!*\
  !*** ./resources/js/images/svg/Teams.svg ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Teams.svg?ec16c7dbf13cbbc46a27e684fbc66137";

/***/ }),

/***/ "./resources/js/views/AL/team/Team.vue":
/*!*********************************************!*\
  !*** ./resources/js/views/AL/team/Team.vue ***!
  \*********************************************/
=======
/***/ "./resources/js/views/OTP.vue":
/*!************************************!*\
  !*** ./resources/js/views/OTP.vue ***!
  \************************************/
>>>>>>> origin/frontend
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
<<<<<<< HEAD
/* harmony import */ var _Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Team.vue?vue&type=template&id=0bef310a& */ "./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a&");
/* harmony import */ var _Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Team.vue?vue&type=script&lang=js& */ "./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
=======
/* harmony import */ var _OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OTP.vue?vue&type=template&id=6a36665c& */ "./resources/js/views/OTP.vue?vue&type=template&id=6a36665c&");
/* harmony import */ var _OTP_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OTP.vue?vue&type=script&lang=js& */ "./resources/js/views/OTP.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
>>>>>>> origin/frontend





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
<<<<<<< HEAD
  _Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
=======
  _OTP_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
>>>>>>> origin/frontend
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
<<<<<<< HEAD
component.options.__file = "resources/js/views/AL/team/Team.vue"
=======
component.options.__file = "resources/js/views/OTP.vue"
>>>>>>> origin/frontend
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

<<<<<<< HEAD
/***/ "./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
=======
/***/ "./resources/js/views/OTP.vue?vue&type=script&lang=js&":
/*!*************************************************************!*\
  !*** ./resources/js/views/OTP.vue?vue&type=script&lang=js& ***!
  \*************************************************************/
>>>>>>> origin/frontend
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
<<<<<<< HEAD
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Team.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a&":
/*!****************************************************************************!*\
  !*** ./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a& ***!
  \****************************************************************************/
=======
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./OTP.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/OTP.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/OTP.vue?vue&type=template&id=6a36665c&":
/*!*******************************************************************!*\
  !*** ./resources/js/views/OTP.vue?vue&type=template&id=6a36665c& ***!
  \*******************************************************************/
>>>>>>> origin/frontend
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
<<<<<<< HEAD
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Team.vue?vue&type=template&id=0bef310a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });
=======
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./OTP.vue?vue&type=template&id=6a36665c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/OTP.vue?vue&type=template&id=6a36665c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });
>>>>>>> origin/frontend



/***/ })

}]);