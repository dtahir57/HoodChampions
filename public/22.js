(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[22],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      users: [],
      user: {},
      is_joined: null,
      comment: '',
      comments: []
    };
  },
  methods: {
    join: function join() {
      var _this = this;

      var uri = '/api/team/join';
      axios.post(uri, {
        id: this.team.id
      }, {
        headers: {
          "Accept": "application/json",
          "Authorization": "Bearer ".concat(localStorage.getItem('user_api_token'))
        }
      }).then(function (response) {
        _this.team = response.data.team;
        _this.users = response.data.users;
        _this.user = response.data.user;
        _this.is_joined = response.data.is_join;
        console.log(response.data);
      })["catch"](function (error) {
        console.log(error.response);
      });
    },
    saveComment: function saveComment() {
      var _this2 = this;

      if (this.$validator.validate()) {
        var uri = '/api/team/post';
        console.log(uri);
        axios.post(uri, {
          comment: this.comment,
          team_id: this.team.id
        }, _config___WEBPACK_IMPORTED_MODULE_0__["config"]).then(function (response) {
          _this2.comments = response.data.posts;
          console.log(response.data);
        })["catch"](function (error) {
          console.log(error.response);
        });
      }

      this.comment = '';
    }
  },
  created: function created() {
    var _this3 = this;

    var uri = "/api/team/".concat(this.$route.params.id);
    axios.get(uri, {
      headers: {
        "Accept": "application/json",
        "Authorization": "Bearer ".concat(localStorage.getItem('user_api_token'))
      }
    }).then(function (response) {
      _this3.team = response.data.team, _this3.users = response.data.users;
      _this3.is_joined = response.data.is_join;
      _this3.comments = response.data.team_posts;
      console.log(response.data);
    })["catch"](function (error) {
      console.log(error.response);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a& ***!
  \**********************************************************************************************************************************************************************************************************/
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
              _vm.is_joined
                ? _c(
                    "button",
                    {
                      staticClass: "bt btn-outline btn-block",
                      attrs: { disabled: "" }
                    },
                    [_vm._v("Joined")]
                  )
                : _vm._e(),
              _vm._v(" "),
              !_vm.is_joined
                ? _c(
                    "button",
                    {
                      staticClass: "bt btn-default btn-block",
                      on: { click: _vm.join }
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
    _c("section", { staticClass: "team-posts" }, [
      _c("div", { staticClass: "container" }, [
        _vm.is_joined
          ? _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-xl-3 col-md-4" }, [
                _c("div", { staticClass: "publisher" }, [
                  _c("h1", { staticClass: "common-h" }, [_vm._v("Wall")]),
                  _vm._v(" "),
                  _vm._m(1),
                  _vm._v(" "),
                  _c("div", [
                    _c("textarea", {
                      directives: [
                        {
                          name: "validate",
                          rawName: "v-validate",
                          value: "required",
                          expression: "'required'"
                        },
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.comment,
                          expression: "comment"
                        }
                      ],
                      staticClass: "info-msg form-control",
                      staticStyle: { "background-color": "#fff3e6" },
                      attrs: {
                        rows: "3",
                        placeholder:
                          "Click this space to start posting in this group. Please do not comment anything.",
                        name: "Comment"
                      },
                      domProps: { value: _vm.comment },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.comment = $event.target.value
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("span", { staticClass: "text-danger" }, [
                      _vm._v(_vm._s(_vm.errors.first("Comment")))
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-default btn-block",
                      on: { click: _vm.saveComment }
                    },
                    [_vm._v("Publish")]
                  )
                ])
              ]),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-lg-7 col-md-8 offset-xl-2 offset-lg-1" },
                [
                  _c(
                    "div",
                    { staticClass: "posts" },
                    [
                      !_vm.comments.length > 0
                        ? _c("div", { staticClass: "info-msg" }, [
                            _c("p", [
                              _vm._v(
                                "There are no posts. Why not post somthing?"
                              )
                            ])
                          ])
                        : _vm._l(_vm.comments, function(comment, index) {
                            return _c(
                              "div",
                              { key: index, staticClass: "info-msg" },
                              [_c("p", [_vm._v(_vm._s(comment.post))])]
                            )
                          })
                    ],
                    2
                  )
                ]
              )
            ])
          : _c("div", { staticClass: "info-msg" }, [
              _vm._v("Join a Team to post on a wall")
            ])
      ])
    ]),
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
                    _c(
                      "div",
                      { staticClass: "single-member" },
                      [
                        _c(
                          "router-link",
                          {
                            attrs: {
                              to: {
                                name: "KakiProfile",
                                params: { id: user.id }
                              }
                            }
                          },
                          [
                            _c("div", { staticClass: "img-holder" }, [
                              _c("img", {
                                attrs: { src: "images/person.jpg", alt: "img" }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "name-place" }, [
                              _c("h4", [_vm._v(_vm._s(user.name))]),
                              _vm._v(" "),
                              _c("p", [
                                _c("i", {
                                  staticClass: "fal fa-map-marker-alt"
                                }),
                                _vm._v(" " + _vm._s(user.hood_name))
                              ])
                            ])
                          ]
                        )
                      ],
                      1
                    )
                  ])
                }),
                0
              )
            ])
          ])
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
    return _c("div", { staticClass: "img-holder" }, [
      _c("img", { attrs: { src: __webpack_require__(/*! @/images/person.jpg */ "./resources/js/images/person.jpg"), alt: "img" } })
    ])
  }
]
render._withStripped = true



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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Team.vue?vue&type=template&id=0bef310a& */ "./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a&");
/* harmony import */ var _Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Team.vue?vue&type=script&lang=js& */ "./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/AL/team/Team.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Team.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/team/Team.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a&":
/*!****************************************************************************!*\
  !*** ./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a& ***!
  \****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Team.vue?vue&type=template&id=0bef310a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/AL/team/Team.vue?vue&type=template&id=0bef310a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Team_vue_vue_type_template_id_0bef310a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);