(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[27],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AL/Group.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/AL/Group.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_carousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-carousel */ "./node_modules/vue-carousel/dist/vue-carousel.min.js");
/* harmony import */ var vue_carousel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue_carousel__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  components: {
    Carousel: vue_carousel__WEBPACK_IMPORTED_MODULE_0__["Carousel"],
    Slide: vue_carousel__WEBPACK_IMPORTED_MODULE_0__["Slide"]
  },
  props: {
    categories: {
      type: Array,
      required: true
    },
    groups: {
      type: Array,
      required: true
    },
    hoodgroups: {
      type: Array,
      required: true
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Group.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/Group.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_AL_Group_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/components/AL/Group.vue */ "./resources/js/components/AL/Group.vue");
/* harmony import */ var _config___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/config/ */ "./resources/js/config/index.js");
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'Group',
  components: {
    'group-view': _components_AL_Group_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      groups: [],
      categories: [],
      hoodgroups: []
    };
  },
  created: function created() {
    var _this = this;

    var uri = '/api/interest_groups';
    axios.get(uri, _config___WEBPACK_IMPORTED_MODULE_1__["config"]).then(function (response) {
      _this.groups = response.data.interest_groups;
      _this.hoodgroups = response.data.hood_groups;
      _this.categories = response.data.categories;
    })["catch"](function (error) {
      console.log(error.response);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AL/Group.vue?vue&type=template&id=30ed5346&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/AL/Group.vue?vue&type=template&id=30ed5346& ***!
  \***********************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c("section", { staticClass: "interest" }, [
      _c("div", { staticClass: "interest-banner" }, [
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
                    attrs: { to: "/interest-groups/create" }
                  },
                  [_vm._v("Create Interest Group")]
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
    _c(
      "div",
      { staticClass: "categories container" },
      [
        _c(
          "carousel",
          { attrs: { autoplay: true, centerMode: true, easing: "ease" } },
          _vm._l(_vm.categories, function(category, index) {
            return _c(
              "slide",
              { key: index },
              [
                _c(
                  "router-link",
                  {
                    attrs: {
                      to: {
                        name: "GroupsByCategory",
                        params: { id: category.id }
                      }
                    }
                  },
                  [
                    _c("img", {
                      staticStyle: { height: "100px", width: "100px" },
                      attrs: { src: category.image, alt: "Category Image" }
                    }),
                    _vm._v(" "),
                    _c("h5", { staticClass: "mt-3" }, [
                      _vm._v(_vm._s(category.title))
                    ])
                  ]
                )
              ],
              1
            )
          }),
          1
        )
      ],
      1
    ),
    _vm._v(" "),
    _c("section", { staticClass: "featured mi-groups" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "common-h" }, [_vm._v("My interest groups")]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.groups, function(group, index) {
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
                        attrs: { src: group.photo, alt: "img" }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "router-link",
                      {
                        attrs: {
                          to: { name: "SingleGroup", params: { id: group.id } }
                        }
                      },
                      [_vm._v(_vm._s(group.title))]
                    ),
                    _vm._v(" "),
                    _c("p", [
                      _c("i", { staticClass: "fal fa-user-circle" }),
                      _vm._v(" " + _vm._s(group.users))
                    ]),
                    _vm._v(" "),
                    _c("p", [_vm._v(_vm._s(group.description))])
                  ],
                  1
                )
              ]
            )
          }),
          0
        )
      ])
    ]),
    _vm._v(" "),
    _c("section", { staticClass: "featured" }, [
      _c("div", { staticClass: "container" }, [
        _vm._m(3),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.hoodgroups, function(group, index) {
            return _c(
              "div",
              { key: index, staticClass: "col-xl-3 col-lg-4 col-6 col-xs-12" },
              [
                _c(
                  "div",
                  { staticClass: "group" },
                  [
                    _c("div", { staticClass: "img-holder" }, [
                      _c("img", {
                        staticClass: "img-fluid",
                        attrs: { src: group.photo, alt: "img" }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "router-link",
                      {
                        attrs: {
                          to: { name: "SingleGroup", params: { id: group.id } }
                        }
                      },
                      [_vm._v(_vm._s(group.title))]
                    ),
                    _vm._v(" "),
                    _c("p", [
                      _c("i", { staticClass: "fal fa-user-circle" }),
                      _vm._v(" " + _vm._s(group.user))
                    ]),
                    _vm._v(" "),
                    _c("p", [_vm._v(_vm._s(group.description))])
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
      _c("h1", { staticClass: "common-h" }, [_vm._v("Interest Groups")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text" }, [
      _c("p", [
        _vm._v(
          "Create or join a team in your neighbourhood to share interests, resources, contacts and ideas. Start a community action team to make things better in the neighbourhood!"
        )
      ]),
      _vm._v(" "),
      _c("img", {
        staticClass: "inner-img",
        attrs: {
          src: __webpack_require__(/*! @/images/svg/Interest Group.svg */ "./resources/js/images/svg/Interest Group.svg"),
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
            src: __webpack_require__(/*! @/images/svg/Interest Group.svg */ "./resources/js/images/svg/Interest Group.svg"),
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
    return _c("div", { staticClass: "head-title-icon" }, [
      _c("div", { staticClass: "common-h" }, [_vm._v("All Interest Groups")]),
      _vm._v(" "),
      _c("div", { staticClass: "icon" }, [
        _c("img", {
          attrs: { src: __webpack_require__(/*! @/images/svg/decor.svg */ "./resources/js/images/svg/decor.svg"), alt: "img" }
        })
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Group.vue?vue&type=template&id=61d641fa&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/Group.vue?vue&type=template&id=61d641fa& ***!
  \******************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { staticClass: "main-wrapper" },
    [
      _c("group-view", {
        attrs: {
          groups: _vm.groups,
          categories: _vm.categories,
          hoodgroups: _vm.hoodgroups
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/AL/Group.vue":
/*!**********************************************!*\
  !*** ./resources/js/components/AL/Group.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Group_vue_vue_type_template_id_30ed5346___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Group.vue?vue&type=template&id=30ed5346& */ "./resources/js/components/AL/Group.vue?vue&type=template&id=30ed5346&");
/* harmony import */ var _Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Group.vue?vue&type=script&lang=js& */ "./resources/js/components/AL/Group.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Group_vue_vue_type_template_id_30ed5346___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Group_vue_vue_type_template_id_30ed5346___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/AL/Group.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/AL/Group.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/components/AL/Group.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Group.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AL/Group.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/AL/Group.vue?vue&type=template&id=30ed5346&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/AL/Group.vue?vue&type=template&id=30ed5346& ***!
  \*****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_template_id_30ed5346___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Group.vue?vue&type=template&id=30ed5346& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/AL/Group.vue?vue&type=template&id=30ed5346&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_template_id_30ed5346___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_template_id_30ed5346___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/images/svg/Interest Group.svg":
/*!****************************************************!*\
  !*** ./resources/js/images/svg/Interest Group.svg ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Interest Group.svg?cb9d7d6cb2186057e470e5269875fdfe";

/***/ }),

/***/ "./resources/js/images/svg/decor.svg":
/*!*******************************************!*\
  !*** ./resources/js/images/svg/decor.svg ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/decor.svg?0c7f5b36f9cd0d23b8ae30a298acfbef";

/***/ }),

/***/ "./resources/js/views/AL/Group.vue":
/*!*****************************************!*\
  !*** ./resources/js/views/AL/Group.vue ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Group_vue_vue_type_template_id_61d641fa___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Group.vue?vue&type=template&id=61d641fa& */ "./resources/js/views/AL/Group.vue?vue&type=template&id=61d641fa&");
/* harmony import */ var _Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Group.vue?vue&type=script&lang=js& */ "./resources/js/views/AL/Group.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Group_vue_vue_type_template_id_61d641fa___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Group_vue_vue_type_template_id_61d641fa___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/AL/Group.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/AL/Group.vue?vue&type=script&lang=js&":
/*!******************************************************************!*\
  !*** ./resources/js/views/AL/Group.vue?vue&type=script&lang=js& ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Group.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Group.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/AL/Group.vue?vue&type=template&id=61d641fa&":
/*!************************************************************************!*\
  !*** ./resources/js/views/AL/Group.vue?vue&type=template&id=61d641fa& ***!
  \************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_template_id_61d641fa___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Group.vue?vue&type=template&id=61d641fa& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Group.vue?vue&type=template&id=61d641fa&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_template_id_61d641fa___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_template_id_61d641fa___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);