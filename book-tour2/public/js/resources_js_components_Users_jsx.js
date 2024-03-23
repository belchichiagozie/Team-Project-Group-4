"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Components_Users_jsx"],{

/***/ "./resources/js/Components/Users.jsx":
/*!*******************************************!*\
  !*** ./resources/js/Components/Users.jsx ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Products)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }




function Products() {
  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)([]),
    _useState2 = _slicedToArray(_useState, 2),
    user = _useState2[0],
    setUser = _useState2[1];
  function formatDate(dateString) {
    var options = {
      year: "numeric",
      month: "long",
      day: "numeric",
      hour: "2-digit",
      minute: "2-digit"
    };
    return new Date(dateString).toLocaleDateString(undefined, options);
  }
  function smallFormatDate(dateString) {
    var options = {
      month: "short",
      day: "numeric"
    };
    return new Date(dateString).toLocaleDateString(undefined, options);
  }
  var fetchData = function fetchData() {
    var token = localStorage.getItem("token");
    return axios__WEBPACK_IMPORTED_MODULE_2__["default"].get("/api/admin/get-users", {
      headers: {
        Authorization: "Bearer ".concat(token)
      }
    }).then(function (response) {
      return setUser(response.data["users"]);
    });
  };
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    fetchData();
  }, []);
  var _useState3 = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)({
      key: null,
      direction: "ascending"
    }),
    _useState4 = _slicedToArray(_useState3, 2),
    sortConfig = _useState4[0],
    setSortConfig = _useState4[1];
  var sortedUsers = (0,react__WEBPACK_IMPORTED_MODULE_0__.useMemo)(function () {
    var sortableUsers = _toConsumableArray(user);
    if (sortConfig !== null) {
      sortableUsers.sort(function (a, b) {
        if (a[sortConfig.key] < b[sortConfig.key]) {
          return sortConfig.direction === "ascending" ? -1 : 1;
        }
        if (a[sortConfig.key] > b[sortConfig.key]) {
          return sortConfig.direction === "ascending" ? 1 : -1;
        }
        return 0;
      });
    }
    return sortableUsers;
  }, [user, sortConfig]);
  var requestSort = function requestSort(key) {
    var direction = "ascending";
    if (sortConfig.key === key && sortConfig.direction === "ascending") {
      direction = "descending";
    }
    setSortConfig({
      key: key,
      direction: direction
    });
  };
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
    className: "border border-solid rounded-lg",
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("table", {
      className: "w-max",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("thead", {
        className: "text-white bg-cyan-950 text-blue-900 font-bold w-full",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("tr", {
          className: "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("th", {
            onClick: function onClick() {
              return requestSort("name");
            },
            children: ["Name", " ", sortConfig.key === "name" ? sortConfig.direction === "ascending" ? "🔼" : "🔽" : ""]
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("th", {
            onClick: function onClick() {
              return requestSort("email");
            },
            className: "",
            children: ["Email", " ", sortConfig.key === "email" ? sortConfig.direction === "ascending" ? "🔼" : "🔽" : ""]
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("th", {
            onClick: function onClick() {
              return requestSort("id");
            },
            className: "",
            children: ["ID", " ", sortConfig.key === "id" ? sortConfig.direction === "ascending" ? "🔼" : "🔽" : ""]
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("th", {
            className: "hidden sm:table-cell",
            onClick: function onClick() {
              return requestSort("created_at");
            },
            children: ["Registration Date", " ", sortConfig.key === "created_at" ? sortConfig.direction === "ascending" ? "🔼" : "🔽" : ""]
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("th", {
            className: "table-cell sm:hidden",
            onClick: function onClick() {
              return requestSort("created_at");
            },
            children: ["Reg.Date", " ", sortConfig.key === "created_at" ? sortConfig.direction === "ascending" ? "🔼" : "🔽" : ""]
          })]
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("tbody", {
        children: sortedUsers && sortedUsers.length > 0 && sortedUsers.map(function (userObj) {
          return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("tr", {
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("td", {
              className: "font-bold",
              children: userObj.name
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("td", {
              className: "",
              children: userObj.email
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("td", {
              className: "",
              children: userObj.id
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("td", {
              className: "sm:table-cell hidden",
              children: formatDate(userObj.created_at)
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("td", {
              className: "sm:hidden",
              children: smallFormatDate(userObj.created_at)
            })]
          }, userObj.id);
        })
      })]
    })
  });
}

/***/ })

}]);