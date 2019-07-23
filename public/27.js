(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[27],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Login.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Login.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var facebook_login_vuejs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! facebook-login-vuejs */ "./node_modules/facebook-login-vuejs/dist/facebook-login.min.js");
/* harmony import */ var facebook_login_vuejs__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(facebook_login_vuejs__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'Login',
  components: {
    facebookLogin: facebook_login_vuejs__WEBPACK_IMPORTED_MODULE_0___default.a
  },
  data: function data() {
    return {
      phoneNumber: '',
      showModal: false,
      invalid_phone: '',
      server_error: ''
    };
  },
  methods: {
    validate: function validate() {
      this.$validator.validateAll();
    },
    login: function login() {
      var _this = this;

      var uri = '/api/login';
      axios.post(uri, {
        phone_number: this.phoneNumber
      }).then(function (response) {
        console.log(response.data);

        if (response.data.code == 200) {
          _this.$router.push({
            name: 'OTP',
            params: {
              id: response.data.user.id
            }
          });
        } else if (response.data.code == 400) {
          _this.invalid_phone = response.data.message;
        } else {
          _this.server_error = response.data.error;
        }
      })["catch"](function (error) {
        console.log(error.response.data);
      });
    }
  },
  updated: function updated() {
    if (this.errors.items.length > 0) {
      this.showModal = false;
    } else {
      this.showModal = true;
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Login.vue?vue&type=template&id=12f5395a&":
/*!***************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Login.vue?vue&type=template&id=12f5395a& ***!
  \***************************************************************************************************************************************************************************************************/
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
    _c("section", { staticClass: "login" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row justify-content-center" }, [
          _c(
            "div",
            { staticClass: "col-lg-5 col-md-8 col-sm-9 col-12 text-center" },
            [
              _c("h1", { staticClass: "common-h" }, [_vm._v("login")]),
              _vm._v(" "),
              _vm.server_error
                ? _c("li", { staticClass: "alert alert-danger" }, [
                    _vm._v(_vm._s(_vm.server_error))
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm._m(0),
              _vm._v(" "),
              _vm._m(1),
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
                      value: _vm.phoneNumber,
                      expression: "phoneNumber"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: {
                    type: "text",
                    name: "Phone Number",
                    placeholder: "Phone Number"
                  },
                  domProps: { value: _vm.phoneNumber },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.phoneNumber = $event.target.value
                    }
                  }
                }),
                _vm._v(" "),
                _c("span", { staticClass: "text-danger" }, [
                  _vm._v(_vm._s(_vm.errors.first("Phone Number")))
                ]),
                _vm._v(" "),
                _vm.invalid_phone
                  ? _c("span", { staticClass: "text-danger" }, [
                      _vm._v(_vm._s(_vm.invalid_phone))
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _vm._m(2),
                _vm._v(" "),
                _vm._m(3)
              ]),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-default block-btn",
                  attrs: {
                    disabled: !_vm.phoneNumber,
                    "data-toggle": "modal",
                    "data-target": "#code-sent"
                  },
                  on: { click: _vm.validate }
                },
                [_vm._v("Login")]
              ),
              _vm._v(" "),
              _c(
                "p",
                [
                  _vm._v("Do not have an account? "),
                  _c("router-link", { attrs: { to: "/Register" } }, [
                    _vm._v("Sign Up")
                  ])
                ],
                1
              )
            ]
          )
        ])
      ])
    ]),
    _vm._v(" "),
    _vm.showModal
      ? _c(
          "div",
          {
            staticClass: "modal fade login-modal",
            attrs: {
              id: "code-sent",
              tabindex: "-1",
              role: "dialog",
              "aria-labelledby": "modelTitleId",
              "aria-hidden": "true"
            }
          },
          [
            _c(
              "div",
              { staticClass: "modal-dialog", attrs: { role: "document" } },
              [
                _c("div", { staticClass: "modal-content" }, [
                  _vm._m(4),
                  _vm._v(" "),
                  _c("div", { staticClass: "modal-body" }, [
                    _c("h1", { staticClass: "common-h" }, [
                      _vm._v("Verify Your phone")
                    ]),
                    _vm._v(" "),
                    _c("p", [
                      _vm._v("We'll text your verification code to "),
                      _c("strong", [_vm._v(_vm._s(_vm.phoneNumber))]),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" Standard fees may apply.")
                    ]),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-default block-btn my-4",
                        on: { click: _vm.login }
                      },
                      [_vm._v("Confirm")]
                    )
                  ])
                ])
              ]
            )
          ]
        )
      : _vm._e()
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("button", { staticClass: "btn btn-fb block-btn" }, [
      _c("i", { staticClass: "fab fa-facebook" }),
      _vm._v(" Countinue with Facebook")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "or" }, [_c("p", [_vm._v("or")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mark" }, [
      _c("i", { staticClass: "far fa-times" }),
      _vm._v(" "),
      _c("i", { staticClass: "far fa-check" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "v-text" }, [
      _c("p", { staticClass: "requirement" }, [
        _vm._v(
          "\n                      Please use a Mobile Device capable of receiving SMSes (Short Messeging Services) for registeration.\n                    "
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header" }, [
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            type: "button",
            "data-dismiss": "modal",
            "aria-label": "Close"
          }
        },
        [_c("i", { staticClass: "far fa-times" })]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/Login.vue":
/*!**************************************!*\
  !*** ./resources/js/views/Login.vue ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Login_vue_vue_type_template_id_12f5395a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Login.vue?vue&type=template&id=12f5395a& */ "./resources/js/views/Login.vue?vue&type=template&id=12f5395a&");
/* harmony import */ var _Login_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Login.vue?vue&type=script&lang=js& */ "./resources/js/views/Login.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Login_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Login_vue_vue_type_template_id_12f5395a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Login_vue_vue_type_template_id_12f5395a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Login.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Login.vue?vue&type=script&lang=js&":
/*!***************************************************************!*\
  !*** ./resources/js/views/Login.vue?vue&type=script&lang=js& ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Login_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Login.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Login.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Login_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Login.vue?vue&type=template&id=12f5395a&":
/*!*********************************************************************!*\
  !*** ./resources/js/views/Login.vue?vue&type=template&id=12f5395a& ***!
  \*********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Login_vue_vue_type_template_id_12f5395a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Login.vue?vue&type=template&id=12f5395a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Login.vue?vue&type=template&id=12f5395a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Login_vue_vue_type_template_id_12f5395a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Login_vue_vue_type_template_id_12f5395a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);