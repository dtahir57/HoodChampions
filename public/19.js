(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[19],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/group/Group.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/group/Group.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _config___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/config/ */ "./resources/js/config/index.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'GroupsByCategory',
  data: function data() {
    return {
      groups: [],
      category: {}
    };
  },
  created: function created() {
    var _this = this;

    var uri = "/api/interest_group/category/".concat(this.$route.params.id);
    axios.get(uri, _config___WEBPACK_IMPORTED_MODULE_0__["config"]).then(function (response) {
      _this.groups = response.data.groups;
      _this.category = response.data.category;
    })["catch"](function (error) {
      console.log(error.response);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/group/Group.vue?vue&type=template&id=34bf07ac&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/group/Group.vue?vue&type=template&id=34bf07ac& ***!
  \************************************************************************************************************************************************************************************************************/
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
    _c("section", { staticClass: "featured mi-groups" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "common-h" }, [_vm._v("All Interest Groups")]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.groups, function(group, index) {
            return _c(
              "div",
              { key: index, staticClass: "col-lg-4 col-6 col-xs-12" },
              [
                _c("div", { staticClass: "group" }, [
                  _c("div", { staticClass: "img-holder" }, [
                    _c("img", {
                      staticClass: "img-fluid",
                      attrs: { src: group.photo, alt: "img" }
                    })
                  ]),
                  _vm._v(" "),
                  _c("a", { attrs: { href: "#" } }, [
                    _vm._v(_vm._s(group.title))
                  ]),
                  _vm._v(" "),
                  _c("p", [
                    _c("i", { staticClass: "fal fa-user-circle" }),
                    _vm._v(" " + _vm._s(group.users))
                  ]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(group.description))])
                ])
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
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/images/svg/Interest Group.svg":
/*!****************************************************!*\
  !*** ./resources/js/images/svg/Interest Group.svg ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Interest Group.svg?cb9d7d6cb2186057e470e5269875fdfe";

/***/ }),

/***/ "./resources/js/views/AL/group/Group.vue":
/*!***********************************************!*\
  !*** ./resources/js/views/AL/group/Group.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Group_vue_vue_type_template_id_34bf07ac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Group.vue?vue&type=template&id=34bf07ac& */ "./resources/js/views/AL/group/Group.vue?vue&type=template&id=34bf07ac&");
/* harmony import */ var _Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Group.vue?vue&type=script&lang=js& */ "./resources/js/views/AL/group/Group.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Group_vue_vue_type_template_id_34bf07ac___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Group_vue_vue_type_template_id_34bf07ac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/AL/group/Group.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/AL/group/Group.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/views/AL/group/Group.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Group.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/group/Group.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/AL/group/Group.vue?vue&type=template&id=34bf07ac&":
/*!******************************************************************************!*\
  !*** ./resources/js/views/AL/group/Group.vue?vue&type=template&id=34bf07ac& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_template_id_34bf07ac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Group.vue?vue&type=template&id=34bf07ac& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/group/Group.vue?vue&type=template&id=34bf07ac&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_template_id_34bf07ac___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Group_vue_vue_type_template_id_34bf07ac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);