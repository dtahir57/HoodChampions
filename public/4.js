(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[4],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Teams.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/Teams.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _config_config__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/config/config */ "./resources/js/config/config.js");
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
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
//


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'Teams',
  data: function data() {
    return {
      user_teams: [],
      hood_name: '',
      teams: []
    };
  },
  computed: _objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapGetters"])(['getUserTeams', 'getHoodTeams'])),
  created: function created() {
    var _this = this;

    var uri = '/api/teams';
    axios.get(uri, _config_config__WEBPACK_IMPORTED_MODULE_0__["config"]).then(function (response) {
      _this.user_teams = response.data.user_teams;

      _this.$store.dispatch('setUserTeams', _this.user_teams);

      _this.hood_name = response.data.hood_name;
      _this.teams = response.data.teams;

      _this.$store.dispatch('setHoodTeams', _this.teams);
    })["catch"](function (error) {
      console.log(error.data);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Teams.vue?vue&type=template&id=9e663c9e&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/Teams.vue?vue&type=template&id=9e663c9e& ***!
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
  return _c("div", { staticClass: "main-wrapper" }, [
    _c("section", { staticClass: "teams" }, [
      _c("div", { staticClass: "create-team-banner" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row align-items-center" }, [
            _c("div", { staticClass: "col-md-5 col-lg-4" }, [
              _c(
                "div",
                { staticClass: "text" },
                [
                  _c("h1", { staticClass: "common-h" }, [_vm._v("Teams")]),
                  _vm._v(" "),
                  _c("p", [
                    _vm._v(
                      "Create or join a team in your neighbourhood to share interests, resources, contacts and ideas. Start a community action team to make things better in the neighbourhood!"
                    )
                  ]),
                  _vm._v(" "),
                  _c(
                    "router-link",
                    {
                      staticClass: "btn btn-default block-btn",
                      attrs: { type: "button", to: "/team/create" }
                    },
                    [_vm._v("Create Team")]
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
    _c("section", { staticClass: "my-teams" }, [
      _c("div", { staticClass: "container" }, [
        _c("h1", { staticClass: "common-h" }, [_vm._v("My Teams")]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.getUserTeams, function(team, index) {
            return _c("div", { staticClass: "col-lg-4 col-6 col-xs-12" }, [
              _c(
                "div",
                { staticClass: "team-box" },
                [
                  _c("div", { staticClass: "img-holder" }, [
                    _c("img", {
                      staticClass: "img-fluid",
                      attrs: { src: team.image, alt: "img" }
                    })
                  ]),
                  _vm._v(" "),
                  _c(
                    "router-link",
                    {
                      attrs: { to: { name: "Team", params: { id: team.id } } }
                    },
                    [_vm._v(_vm._s(team.title))]
                  ),
                  _vm._v(" "),
                  _c("p", [
                    _c("i", { staticClass: "fal fa-user-circle" }),
                    _vm._v(" " + _vm._s(team.users))
                  ]),
                  _vm._v(" "),
                  _c("p", [_vm._v(_vm._s(team.about_us))])
                ],
                1
              )
            ])
          }),
          0
        )
      ])
    ]),
    _vm._v(" "),
    _c("section", { staticClass: "all-teams" }, [
      _c("div", { staticClass: "container" }, [
        _c("h1", { staticClass: "common-h" }, [
          _vm._v("All Teams in " + _vm._s(_vm.hood_name))
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "row" },
          _vm._l(_vm.getHoodTeams, function(team, index) {
            return _c(
              "div",
              { staticClass: "col-lg-3 col-md-4 col-6 col-xs-12" },
              [
                _c(
                  "div",
                  { staticClass: "team-box" },
                  [
                    _c("div", { staticClass: "img-holder" }, [
                      _c("img", {
                        staticClass: "img-fluid",
                        attrs: { src: team.image, alt: "img" }
                      })
                    ]),
                    _vm._v(" "),
                    _c(
                      "router-link",
                      {
                        attrs: { to: { name: "Team", params: { id: team.id } } }
                      },
                      [_vm._v(_vm._s(team.title))]
                    ),
                    _vm._v(" "),
                    _c("p", [_vm._v(_vm._s(team.about_us))])
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
  }
]
render._withStripped = true



/***/ }),

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
    "Authorization": "Bearer ".concat(localStorage.getItem('user_api_token'))
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

/***/ "./resources/js/views/AL/Teams.vue":
/*!*****************************************!*\
  !*** ./resources/js/views/AL/Teams.vue ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Teams_vue_vue_type_template_id_9e663c9e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Teams.vue?vue&type=template&id=9e663c9e& */ "./resources/js/views/AL/Teams.vue?vue&type=template&id=9e663c9e&");
/* harmony import */ var _Teams_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Teams.vue?vue&type=script&lang=js& */ "./resources/js/views/AL/Teams.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Teams_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Teams_vue_vue_type_template_id_9e663c9e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Teams_vue_vue_type_template_id_9e663c9e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/AL/Teams.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/AL/Teams.vue?vue&type=script&lang=js&":
/*!******************************************************************!*\
  !*** ./resources/js/views/AL/Teams.vue?vue&type=script&lang=js& ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Teams_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Teams.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Teams.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Teams_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/AL/Teams.vue?vue&type=template&id=9e663c9e&":
/*!************************************************************************!*\
  !*** ./resources/js/views/AL/Teams.vue?vue&type=template&id=9e663c9e& ***!
  \************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Teams_vue_vue_type_template_id_9e663c9e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Teams.vue?vue&type=template&id=9e663c9e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/Teams.vue?vue&type=template&id=9e663c9e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Teams_vue_vue_type_template_id_9e663c9e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Teams_vue_vue_type_template_id_9e663c9e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);