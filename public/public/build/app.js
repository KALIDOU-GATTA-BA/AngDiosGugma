(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/Components/items.jsx":
/*!*************************************!*\
  !*** ./assets/Components/items.jsx ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);


var Items = function Items(_ref) {
  var id = _ref.id,
      title = _ref.title,
      body = _ref.body;
  return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    key: id,
    className: "card col-md-4",
    style: {
      width: 200
    }
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: "card-body"
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("p", null, id), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("h4", {
    className: "card-title"
  }, title), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("p", {
    className: "card-text"
  }, body), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("a", {
    href: "https://jsonplaceholder.typicode.com/posts/",
    className: "btn btn-primary"
  }, "More Details")));
};

/* harmony default export */ __webpack_exports__["default"] = (Items);

/***/ }),

/***/ "./assets/css/app.css":
/*!****************************!*\
  !*** ./assets/css/app.css ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_symbol__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.symbol */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_symbol_description__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.symbol.description */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_symbol_iterator__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_array_iterator__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.array.iterator */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_array_map__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.array.map */ "./node_modules/core-js/modules/es.array.map.js");
/* harmony import */ var core_js_modules_es_array_map__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_map__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_object_create__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.object.create */ "./node_modules/core-js/modules/es.object.create.js");
/* harmony import */ var core_js_modules_es_object_create__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_create__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_object_define_property__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.object.define-property */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_object_get_prototype_of__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.object.get-prototype-of */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_get_prototype_of__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_prototype_of__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.object.set-prototype-of */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_set_prototype_of__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.object.to-string */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_promise__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.promise */ "./node_modules/core-js/modules/es.promise.js");
/* harmony import */ var core_js_modules_es_promise__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_promise__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_string_iterator__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.string.iterator */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _css_app_css__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ../css/app.css */ "./assets/css/app.css");
/* harmony import */ var _css_app_css__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_css_app_css__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var popper_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js");
/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");
/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(bootstrap__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! react-dom */ "./node_modules/react-dom/index.js");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var _Components_items__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ../Components/items */ "./assets/Components/items.jsx");














function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }








/*
<link href="design.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
   
    skipSetup: true,
    players: ["swf"]
});

window.onload = function(){

    // au chargement de la page
    Shadowbox.open({
        content:    'animations/sirap.swf',
        player:     "swf",
        title:      "",
        height:     190,
        width:      600,
    });

};
</script>

*/

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you require will output into a single css file (app.css in this case)

__webpack_require__(/*! ../css/app.css */ "./assets/css/app.css"); // Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');


console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
jquery__WEBPACK_IMPORTED_MODULE_14___default()(document).ready(function () {
  jquery__WEBPACK_IMPORTED_MODULE_14___default()("iframe").attr("height", "90%");
  jquery__WEBPACK_IMPORTED_MODULE_14___default()("iframe").attr("width", "100%");
});

var App =
/*#__PURE__*/
function (_React$Component) {
  _inherits(App, _React$Component);

  function App() {
    var _this;

    _classCallCheck(this, App);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(App).call(this));
    _this.state = {
      entries: []
    };
    return _this;
  }

  _createClass(App, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this2 = this;

      fetch('https://jsonplaceholder.typicode.com/posts/').then(function (response) {
        return response.json();
      }).then(function (entries) {
        _this2.setState({
          entries: entries
        });
      });
    }
  }, {
    key: "render",
    value: function render() {
      return react__WEBPACK_IMPORTED_MODULE_17___default.a.createElement("div", {
        className: "row"
      }, this.state.entries.map(function (_ref) {
        var id = _ref.id,
            title = _ref.title,
            body = _ref.body;
        return react__WEBPACK_IMPORTED_MODULE_17___default.a.createElement(_Components_items__WEBPACK_IMPORTED_MODULE_19__["default"], {
          key: id,
          title: title,
          body: body
        });
      }));
    }
  }]);

  return App;
}(react__WEBPACK_IMPORTED_MODULE_17___default.a.Component);

react_dom__WEBPACK_IMPORTED_MODULE_18___default.a.render(react__WEBPACK_IMPORTED_MODULE_17___default.a.createElement(App, null), document.getElementById('root')); // document.getElementById('ip').style.backgroundColor="white";

/***/ })

},[["./assets/js/app.js","runtime","vendors~app"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvQ29tcG9uZW50cy9pdGVtcy5qc3giLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Nzcy9hcHAuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hcHAuanMiXSwibmFtZXMiOlsiSXRlbXMiLCJpZCIsInRpdGxlIiwiYm9keSIsIndpZHRoIiwicmVxdWlyZSIsImNvbnNvbGUiLCJsb2ciLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsImF0dHIiLCJBcHAiLCJzdGF0ZSIsImVudHJpZXMiLCJmZXRjaCIsInRoZW4iLCJyZXNwb25zZSIsImpzb24iLCJzZXRTdGF0ZSIsIm1hcCIsIlJlYWN0IiwiQ29tcG9uZW50IiwiUmVhY3RET00iLCJyZW5kZXIiLCJnZXRFbGVtZW50QnlJZCJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFDO0FBQUE7QUFBQTtBQUFBOztBQUVBLElBQU1BLEtBQUssR0FBRyxTQUFSQSxLQUFRO0FBQUEsTUFBR0MsRUFBSCxRQUFHQSxFQUFIO0FBQUEsTUFBT0MsS0FBUCxRQUFPQSxLQUFQO0FBQUEsTUFBY0MsSUFBZCxRQUFjQSxJQUFkO0FBQUEsU0FDVjtBQUFLLE9BQUcsRUFBRUYsRUFBVjtBQUFjLGFBQVMsRUFBQyxlQUF4QjtBQUF3QyxTQUFLLEVBQUU7QUFBQ0csV0FBSyxFQUFDO0FBQVA7QUFBL0MsS0FDSTtBQUFLLGFBQVMsRUFBQztBQUFmLEtBQ0ksc0VBQUlILEVBQUosQ0FESixFQUVJO0FBQUksYUFBUyxFQUFDO0FBQWQsS0FBNEJDLEtBQTVCLENBRkosRUFHSTtBQUFHLGFBQVMsRUFBQztBQUFiLEtBQTBCQyxJQUExQixDQUhKLEVBSUk7QUFBRyxRQUFJLEVBQUMsNkNBQVI7QUFBc0QsYUFBUyxFQUFDO0FBQWhFLG9CQUpKLENBREosQ0FEVTtBQUFBLENBQWQ7O0FBV2VILG9FQUFmLEU7Ozs7Ozs7Ozs7O0FDYkQsdUM7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUF5QkE7Ozs7OztBQU9BOztBQUNBSyxtQkFBTyxDQUFDLDRDQUFELENBQVAsQyxDQUVBO0FBQ0E7OztBQUVBQyxPQUFPLENBQUNDLEdBQVIsQ0FBWSxtREFBWjtBQUNBQyw4Q0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFVO0FBQ3hCRixnREFBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZRyxJQUFaLENBQWlCLFFBQWpCLEVBQTJCLEtBQTNCO0FBQ0FILGdEQUFDLENBQUMsUUFBRCxDQUFELENBQVlHLElBQVosQ0FBaUIsT0FBakIsRUFBMEIsTUFBMUI7QUFDSCxDQUhEOztJQUtPQyxHOzs7OztBQUNGLGlCQUFjO0FBQUE7O0FBQUE7O0FBQ1Y7QUFFQSxVQUFLQyxLQUFMLEdBQWE7QUFDVEMsYUFBTyxFQUFFO0FBREEsS0FBYjtBQUhVO0FBTWI7Ozs7d0NBRW1CO0FBQUE7O0FBQ2hCQyxXQUFLLENBQUMsNkNBQUQsQ0FBTCxDQUNLQyxJQURMLENBQ1UsVUFBQUMsUUFBUTtBQUFBLGVBQUlBLFFBQVEsQ0FBQ0MsSUFBVCxFQUFKO0FBQUEsT0FEbEIsRUFFS0YsSUFGTCxDQUVVLFVBQUFGLE9BQU8sRUFBSTtBQUNiLGNBQUksQ0FBQ0ssUUFBTCxDQUFjO0FBQ1ZMLGlCQUFPLEVBQVBBO0FBRFUsU0FBZDtBQUdILE9BTkw7QUFPSDs7OzZCQUVRO0FBQ0wsYUFDSTtBQUFLLGlCQUFTLEVBQUM7QUFBZixTQUNLLEtBQUtELEtBQUwsQ0FBV0MsT0FBWCxDQUFtQk0sR0FBbkIsQ0FDRztBQUFBLFlBQUduQixFQUFILFFBQUdBLEVBQUg7QUFBQSxZQUFPQyxLQUFQLFFBQU9BLEtBQVA7QUFBQSxZQUFjQyxJQUFkLFFBQWNBLElBQWQ7QUFBQSxlQUNJLDREQUFDLDBEQUFEO0FBQ0ksYUFBRyxFQUFFRixFQURUO0FBRUksZUFBSyxFQUFFQyxLQUZYO0FBR0ksY0FBSSxFQUFFQztBQUhWLFVBREo7QUFBQSxPQURILENBREwsQ0FESjtBQWNIOzs7O0VBbENha0IsNkNBQUssQ0FBQ0MsUzs7QUFxQ3hCQyxpREFBUSxDQUFDQyxNQUFULENBQWdCLDREQUFDLEdBQUQsT0FBaEIsRUFBeUJmLFFBQVEsQ0FBQ2dCLGNBQVQsQ0FBd0IsTUFBeEIsQ0FBekIsRSxDQUVBLCtEIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIiBpbXBvcnQgUmVhY3QgZnJvbSAncmVhY3QnO1xuIFxuIGNvbnN0IEl0ZW1zID0gKHsgaWQsIHRpdGxlLCBib2R5IH0pID0+IChcbiAgICAgPGRpdiBrZXk9e2lkfSBjbGFzc05hbWU9XCJjYXJkIGNvbC1tZC00XCIgc3R5bGU9e3t3aWR0aDoyMDB9fT5cbiAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY2FyZC1ib2R5XCI+XG4gICAgICAgICAgICAgPHA+e2lkfTwvcD5cbiAgICAgICAgICAgICA8aDQgY2xhc3NOYW1lPVwiY2FyZC10aXRsZVwiPnt0aXRsZX08L2g0PlxuICAgICAgICAgICAgIDxwIGNsYXNzTmFtZT1cImNhcmQtdGV4dFwiPntib2R5fTwvcD5cbiAgICAgICAgICAgICA8YSBocmVmPVwiaHR0cHM6Ly9qc29ucGxhY2Vob2xkZXIudHlwaWNvZGUuY29tL3Bvc3RzL1wiIGNsYXNzTmFtZT1cImJ0biBidG4tcHJpbWFyeVwiPk1vcmUgRGV0YWlsczwvYT5cbiAgICAgICAgIDwvZGl2PlxuICAgICA8L2Rpdj5cbiApO1xuIFxuIGV4cG9ydCBkZWZhdWx0IEl0ZW1zOyIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsImltcG9ydCAnLi4vY3NzL2FwcC5jc3MnO1xuaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcbmltcG9ydCBcInBvcHBlci5qc1wiO1xuaW1wb3J0ICdib290c3RyYXAnO1xuaW1wb3J0IFJlYWN0IGZyb20gJ3JlYWN0JztcbmltcG9ydCBSZWFjdERPTSBmcm9tICdyZWFjdC1kb20nOyBcbmltcG9ydCBJdGVtcyBmcm9tICcuLi9Db21wb25lbnRzL2l0ZW1zJztcbi8qXG48bGluayBocmVmPVwiZGVzaWduLmNzc1wiIHJlbD1cInN0eWxlc2hlZXRcIiB0eXBlPVwidGV4dC9jc3NcIj5cbjxzY3JpcHQgdHlwZT1cInRleHQvamF2YXNjcmlwdFwiIHNyYz1cInNoYWRvd2JveC9zaGFkb3dib3guanNcIj48L3NjcmlwdD5cbjxzY3JpcHQgdHlwZT1cInRleHQvamF2YXNjcmlwdFwiPlxuU2hhZG93Ym94LmluaXQoe1xuICAgXG4gICAgc2tpcFNldHVwOiB0cnVlLFxuICAgIHBsYXllcnM6IFtcInN3ZlwiXVxufSk7XG5cbndpbmRvdy5vbmxvYWQgPSBmdW5jdGlvbigpe1xuXG4gICAgLy8gYXUgY2hhcmdlbWVudCBkZSBsYSBwYWdlXG4gICAgU2hhZG93Ym94Lm9wZW4oe1xuICAgICAgICBjb250ZW50OiAgICAnYW5pbWF0aW9ucy9zaXJhcC5zd2YnLFxuICAgICAgICBwbGF5ZXI6ICAgICBcInN3ZlwiLFxuICAgICAgICB0aXRsZTogICAgICBcIlwiLFxuICAgICAgICBoZWlnaHQ6ICAgICAxOTAsXG4gICAgICAgIHdpZHRoOiAgICAgIDYwMCxcbiAgICB9KTtcblxufTtcbjwvc2NyaXB0PlxuXG4qL1xuLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxuICovXG5cbi8vIGFueSBDU1MgeW91IHJlcXVpcmUgd2lsbCBvdXRwdXQgaW50byBhIHNpbmdsZSBjc3MgZmlsZSAoYXBwLmNzcyBpbiB0aGlzIGNhc2UpXG5yZXF1aXJlKCcuLi9jc3MvYXBwLmNzcycpO1xuXG4vLyBOZWVkIGpRdWVyeT8gSW5zdGFsbCBpdCB3aXRoIFwieWFybiBhZGQganF1ZXJ5XCIsIHRoZW4gdW5jb21tZW50IHRvIHJlcXVpcmUgaXQuXG4vLyBjb25zdCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XG5cbmNvbnNvbGUubG9nKCdIZWxsbyBXZWJwYWNrIEVuY29yZSEgRWRpdCBtZSBpbiBhc3NldHMvanMvYXBwLmpzJyk7XG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpe1xuICAgICQoXCJpZnJhbWVcIikuYXR0cihcImhlaWdodFwiLCBcIjkwJVwiKTtcbiAgICAkKFwiaWZyYW1lXCIpLmF0dHIoXCJ3aWR0aFwiLCBcIjEwMCVcIik7XG59KTtcblxuIGNsYXNzIEFwcCBleHRlbmRzIFJlYWN0LkNvbXBvbmVudCB7XG4gICAgIGNvbnN0cnVjdG9yKCkge1xuICAgICAgICAgc3VwZXIoKTtcbiBcbiAgICAgICAgIHRoaXMuc3RhdGUgPSB7XG4gICAgICAgICAgICAgZW50cmllczogW11cbiAgICAgICAgIH07XG4gICAgIH1cbiBcbiAgICAgY29tcG9uZW50RGlkTW91bnQoKSB7XG4gICAgICAgICBmZXRjaCgnaHR0cHM6Ly9qc29ucGxhY2Vob2xkZXIudHlwaWNvZGUuY29tL3Bvc3RzLycpXG4gICAgICAgICAgICAgLnRoZW4ocmVzcG9uc2UgPT4gcmVzcG9uc2UuanNvbigpKVxuICAgICAgICAgICAgIC50aGVuKGVudHJpZXMgPT4ge1xuICAgICAgICAgICAgICAgICB0aGlzLnNldFN0YXRlKHtcbiAgICAgICAgICAgICAgICAgICAgIGVudHJpZXNcbiAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgfSk7XG4gICAgIH1cbiBcbiAgICAgcmVuZGVyKCkge1xuICAgICAgICAgcmV0dXJuIChcbiAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cInJvd1wiPlxuICAgICAgICAgICAgICAgICB7dGhpcy5zdGF0ZS5lbnRyaWVzLm1hcChcbiAgICAgICAgICAgICAgICAgICAgICh7IGlkLCB0aXRsZSwgYm9keSB9KSA9PiAoXG4gICAgICAgICAgICAgICAgICAgICAgICAgPEl0ZW1zXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgIGtleT17aWR9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlPXt0aXRsZX1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYm9keT17Ym9keX1cbiAgICAgICAgICAgICAgICAgICAgICAgICA+XG4gICAgICAgICAgICAgICAgICAgICAgICAgPC9JdGVtcz5cbiAgICAgICAgICAgICAgICAgICAgIClcbiAgICAgICAgICAgICAgICAgKX1cbiAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICk7XG4gICAgIH1cbiB9XG4gXG4gUmVhY3RET00ucmVuZGVyKDxBcHAgLz4sIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdyb290JykpO1xuXG4gLy8gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2lwJykuc3R5bGUuYmFja2dyb3VuZENvbG9yPVwid2hpdGVcIjtcblxuXG4iXSwic291cmNlUm9vdCI6IiJ9