(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[28],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/OTP.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/OTP.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************/
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

          _this2.$store.dispatch('setCurrentUser', response.data.user);

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
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/OTP.vue?vue&type=template&id=6a36665c&":
/*!*************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/OTP.vue?vue&type=template&id=6a36665c& ***!
  \*************************************************************************************************************************************************************************************************/
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
        ])
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/OTP.vue":
/*!************************************!*\
  !*** ./resources/js/views/OTP.vue ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OTP.vue?vue&type=template&id=6a36665c& */ "./resources/js/views/OTP.vue?vue&type=template&id=6a36665c&");
/* harmony import */ var _OTP_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OTP.vue?vue&type=script&lang=js& */ "./resources/js/views/OTP.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _OTP_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/OTP.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/OTP.vue?vue&type=script&lang=js&":
/*!*************************************************************!*\
  !*** ./resources/js/views/OTP.vue?vue&type=script&lang=js& ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./OTP.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/OTP.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/OTP.vue?vue&type=template&id=6a36665c&":
/*!*******************************************************************!*\
  !*** ./resources/js/views/OTP.vue?vue&type=template&id=6a36665c& ***!
  \*******************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./OTP.vue?vue&type=template&id=6a36665c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/OTP.vue?vue&type=template&id=6a36665c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_OTP_vue_vue_type_template_id_6a36665c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);