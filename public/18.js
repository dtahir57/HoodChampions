(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[18],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/LostAndFound.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/LostAndFound.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'LostAndFound',
  data: function data() {
    return {
      lost_and_founds: []
    };
  },
  created: function created() {
    var _this = this;

    var uri = '/api/lost_and_founds';
    axios.get(uri, {
      headers: {
        "Accept": "application/json",
        "Authorization": "Bearer ".concat(localStorage.getItem('user_api_token'))
      }
    }).then(function (response) {
      _this.lost_and_founds = response.data.lost_and_founds;
    })["catch"](function (error) {
      console.log(error.response);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/LostAndFound.vue?vue&type=template&id=0bd31ef8&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/LostAndFound.vue?vue&type=template&id=0bd31ef8& ***!
  \*************************************************************************************************************************************************************************************************************/
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
    _c("section", { staticClass: "lost-found" }, [
      _c("div", { staticClass: "lf-banner" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row align-items-center" }, [
            _vm._m(0),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "col-md-6 col-lg-5 col-xl-4" },
              [
                _vm._m(1),
                _vm._v(" "),
                _c(
                  "router-link",
                  {
                    staticClass: "btn btn-default block-btn",
                    attrs: { to: "/lost-and-found/create" }
                  },
                  [_vm._v("Create Lost And Found")]
                )
              ],
              1
            ),
            _vm._v(" "),
            _vm._m(2)
          ])
        ])
      ])
    ]),
    _vm._v(" "),
    _vm._m(3),
    _vm._v(" "),
    _c("section", { staticClass: "featured" }, [
      _c("div", { staticClass: "container" }, [
        _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.lost_and_founds, function(data, index) {
            return _c(
              "div",
              { key: index, staticClass: "col-lg-4 col-6 col-xs-12" },
              [
                _c(
                  "div",
                  { staticClass: "group" },
                  [
                    _c("div", { staticClass: "img-holder" }, [
                      _c("img", {
                        staticClass: "img-fluid",
                        attrs: { src: data.image, alt: "img" }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "router-link",
                      {
                        attrs: {
                          to: {
                            name: "LostAndFoundView",
                            params: { id: data.id }
                          }
                        }
                      },
                      [_vm._v(_vm._s(data.title))]
                    ),
                    _vm._v(" "),
                    _c("p", [_vm._v(_vm._s(data.description))])
                  ],
                  1
                )
              ]
            )
          }),
          0
        )
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-12" }, [
      _c("h1", { staticClass: "common-h" }, [_vm._v("Lost and Founds")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text" }, [
      _c("p", [
        _vm._v(
          "Dummy Text here, resources, contacts and ideas. Start a community action team to make things better in the neighbourhood!"
        )
      ]),
      _vm._v(" "),
      _c("img", {
        staticClass: "inner-img",
        attrs: {
          src: __webpack_require__(/*! @/images/svg/Lost and Found.svg */ "./resources/js/images/svg/Lost and Found.svg"),
          width: "100%",
          alt: "img"
        }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "col-md-5 offset-md-1 col-lg-5 offset-lg-2 col-xl-4 offset-xl-3"
      },
      [
        _c("img", {
          staticClass: "outer-img",
          attrs: {
            src: __webpack_require__(/*! @/images/svg/Lost and Found.svg */ "./resources/js/images/svg/Lost and Found.svg"),
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
    return _c("div", { staticClass: "ad-holder" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "ad" }, [_c("h1", [_vm._v("716 X 90")])])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/images/svg/Lost and Found.svg":
/*!****************************************************!*\
  !*** ./resources/js/images/svg/Lost and Found.svg ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Lost and Found.svg?cc4436dc581d6b801b42e3cfdb473a6b";

/***/ }),

/***/ "./resources/js/views/AL/LostAndFound.vue":
/*!************************************************!*\
  !*** ./resources/js/views/AL/LostAndFound.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _LostAndFound_vue_vue_type_template_id_0bd31ef8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./LostAndFound.vue?vue&type=template&id=0bd31ef8& */ "./resources/js/views/AL/LostAndFound.vue?vue&type=template&id=0bd31ef8&");
/* harmony import */ var _LostAndFound_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./LostAndFound.vue?vue&type=script&lang=js& */ "./resources/js/views/AL/LostAndFound.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _LostAndFound_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _LostAndFound_vue_vue_type_template_id_0bd31ef8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _LostAndFound_vue_vue_type_template_id_0bd31ef8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/AL/LostAndFound.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/AL/LostAndFound.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/views/AL/LostAndFound.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_LostAndFound_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./LostAndFound.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/LostAndFound.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_LostAndFound_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/AL/LostAndFound.vue?vue&type=template&id=0bd31ef8&":
/*!*******************************************************************************!*\
  !*** ./resources/js/views/AL/LostAndFound.vue?vue&type=template&id=0bd31ef8& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LostAndFound_vue_vue_type_template_id_0bd31ef8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./LostAndFound.vue?vue&type=template&id=0bd31ef8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/LostAndFound.vue?vue&type=template&id=0bd31ef8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LostAndFound_vue_vue_type_template_id_0bd31ef8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LostAndFound_vue_vue_type_template_id_0bd31ef8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);