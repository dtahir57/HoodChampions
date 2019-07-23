(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[16],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Battle.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/Battle.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _config___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/config/ */ "./resources/js/config/index.js");
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var vue_carousel__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-carousel */ "./node_modules/vue-carousel/dist/vue-carousel.min.js");
/* harmony import */ var vue_carousel__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_carousel__WEBPACK_IMPORTED_MODULE_2__);
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { if (i % 2) { var source = arguments[i] != null ? arguments[i] : {}; var ownKeys = Object.keys(source); if (typeof Object.getOwnPropertySymbols === 'function') { ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) { return Object.getOwnPropertyDescriptor(source, sym).enumerable; })); } ownKeys.forEach(function (key) { _defineProperty(target, key, source[key]); }); } else { Object.defineProperties(target, Object.getOwnPropertyDescriptors(arguments[i])); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'Battle',
  components: {
    Carousel: vue_carousel__WEBPACK_IMPORTED_MODULE_2__["Carousel"],
    Slide: vue_carousel__WEBPACK_IMPORTED_MODULE_2__["Slide"]
  },
  data: function data() {
    return {
      battles: [],
      categories: []
    };
  },
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapGetters"])(['getAuthenticatedUser'])),
  created: function created() {
    var _this = this;

    var uri = '/api/battles';
    axios.get(uri, {
      headers: {
        "Accept": "application/json",
        "Authorization": "Bearer ".concat(localStorage.getItem('user_api_token'))
      }
    }).then(function (response) {
      _this.battles = response.data.battles;
      _this.categories = response.data.categories;
    })["catch"](function (error) {
      console.log(error.response);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Battle.vue?vue&type=template&id=098a034d&":
/*!*******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/Battle.vue?vue&type=template&id=098a034d& ***!
  \*******************************************************************************************************************************************************************************************************/
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
    _c("section", { staticClass: "interest" }, [
      _c("div", { staticClass: "interest-banner" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row align-items-center" }, [
            _c("div", { staticClass: "col-md-6 col-lg-5 col-xl-4" }, [
              _c(
                "div",
                { staticClass: "text" },
                [
                  _c("h1", { staticClass: "common-h" }, [_vm._v("Battles")]),
                  _vm._v(" "),
                  _c("p", [
                    _vm._v("Create a Battle for InnerHood Competitions")
                  ]),
                  _vm._v(" "),
                  _c(
                    "router-link",
                    {
                      staticClass: "btn btn-default block-btn",
                      attrs: { to: "/battle/create" }
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
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "categories" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "common-h" }, [_vm._v("Categories")]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "categories-slider owl-carousel" },
          [
            _c(
              "carousel",
              { attrs: { autoplay: true, centerMode: true, easing: "ease" } },
              _vm._l(_vm.categories, function(category, index) {
                return _c("slide", { key: index }, [
                  _c("a", { attrs: { href: "#" } }, [
                    _c("img", {
                      staticStyle: { height: "100px", width: "100px" },
                      attrs: { src: category.image, alt: "Category Image" }
                    }),
                    _vm._v(" "),
                    _c("h5", { staticClass: "mt-3" }, [
                      _vm._v(_vm._s(category.title))
                    ])
                  ])
                ])
              }),
              1
            )
          ],
          1
        )
      ])
    ]),
    _vm._v(" "),
    _c("section", { staticClass: "featured mi-groups" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "common-h" }, [
          _vm._v("Battles in " + _vm._s(_vm.getAuthenticatedUser.hood_name))
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.battles, function(battle, index) {
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
                        attrs: { src: battle.image, alt: "img" }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "router-link",
                      {
                        attrs: {
                          to: { name: "BattleView", params: { id: battle.id } }
                        }
                      },
                      [_vm._v(_vm._s(battle.title))]
                    ),
                    _vm._v(" "),
                    _c("p", [
                      _c("i", { staticClass: "fal fa-user-circle" }),
                      _vm._v(" " + _vm._s(battle.users))
                    ]),
                    _vm._v(" "),
                    _c("p", [_vm._v(_vm._s(battle.description))])
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
    return _c(
      "div",
      {
        staticClass:
          "col-md-5 offset-md-1 col-lg-5 offset-lg-2 col-xl-4 offset-xl-3"
      },
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

/***/ "./resources/js/views/AL/Battle.vue":
/*!******************************************!*\
  !*** ./resources/js/views/AL/Battle.vue ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Battle_vue_vue_type_template_id_098a034d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Battle.vue?vue&type=template&id=098a034d& */ "./resources/js/views/AL/Battle.vue?vue&type=template&id=098a034d&");
/* harmony import */ var _Battle_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Battle.vue?vue&type=script&lang=js& */ "./resources/js/views/AL/Battle.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Battle_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Battle_vue_vue_type_template_id_098a034d___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Battle_vue_vue_type_template_id_098a034d___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/AL/Battle.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/AL/Battle.vue?vue&type=script&lang=js&":
/*!*******************************************************************!*\
  !*** ./resources/js/views/AL/Battle.vue?vue&type=script&lang=js& ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Battle.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Battle.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/AL/Battle.vue?vue&type=template&id=098a034d&":
/*!*************************************************************************!*\
  !*** ./resources/js/views/AL/Battle.vue?vue&type=template&id=098a034d& ***!
  \*************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_template_id_098a034d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Battle.vue?vue&type=template&id=098a034d& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Battle.vue?vue&type=template&id=098a034d&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_template_id_098a034d___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Battle_vue_vue_type_template_id_098a034d___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);