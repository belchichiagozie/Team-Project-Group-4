"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Components_Orders_jsx"],{

/***/ "./resources/js/Components/Orders.jsx":
/*!********************************************!*\
  !*** ./resources/js/Components/Orders.jsx ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Orders)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
// import React, { useState, useEffect, useMemo } from "react";
// import axios from "axios";

// function formatDate(dateString) {
//     const options = {
//         year: "numeric",
//         month: "long",
//         day: "numeric",
//         hour: "2-digit",
//         minute: "2-digit",
//     };
//     return new Date(dateString).toLocaleDateString(undefined, options);
// }

// function smallFormatDate(dateString) {
//     const options = {
//         month: "short",
//         day: "numeric",
//     };
//     return new Date(dateString).toLocaleDateString(undefined, options);
// }

// export default function Orders() {
//     const [orders, setOrders] = useState([]);
//     const token = localStorage.getItem("token");

//     useEffect(() => {
//         axios
//             .get("/api/admin/orders", {
//                 headers: { Authorization: `Bearer ${token}` },
//             })
//             .then((response) => {
//                 setOrders(response.data.orders);
//             })
//             .catch((error) => {
//                 console.error(
//                     "There was an error fetching the orders: ",
//                     error,
//                 );
//             });
//     }, []);

//     const [sortConfig, setSortConfig] = useState({
//         key: null,
//         direction: "ascending",
//     });

//     const requestSort = (key) => {
//         let direction = "ascending";
//         if (sortConfig.key === key && sortConfig.direction === "ascending") {
//             direction = "descending";
//         }
//         setSortConfig({ key, direction });
//     };

//     const sortedOrders = useMemo(() => {
//         let sortableOrders = [...orders];
//         if (sortConfig.key) {
//             sortableOrders.sort((a, b) => {
//                 let aValue = a[sortConfig.key];
//                 let bValue = b[sortConfig.key];

//                 if (!isNaN(Number(aValue)) && !isNaN(Number(bValue))) {
//                     aValue = Number(aValue);
//                     bValue = Number(bValue);
//                 }

//                 if (Date.parse(aValue) && Date.parse(bValue)) {
//                     aValue = new Date(aValue);
//                     bValue = new Date(bValue);
//                 }

//                 if (aValue < bValue) {
//                     return sortConfig.direction === "ascending" ? -1 : 1;
//                 }
//                 if (aValue > bValue) {
//                     return sortConfig.direction === "ascending" ? 1 : -1;
//                 }
//                 return 0;
//             });
//         }
//         return sortableOrders;
//     }, [orders, sortConfig]);

//     return (
//         <div className="border border-solid rounded-lg">
//             <table className="w-max text-2xs sm:text-sm  text-left text-black dark:text-white">
//                 <thead className="text-white bg-cyan-950 text-blue-900 font-bold w-full">
// <tr>
//     <th
//         scope="col"
//         onClick={() => requestSort("Order_ID")}
//         className="hidden sm:table-cell cursor-pointer"
//     >
//         Order ID
//         {sortConfig.key === "Order_ID"
//             ? sortConfig.direction === "ascending"
//                 ? "🔼"
//                 : "🔽"
//             : ""}
//     </th>
//     <th
//         scope="col"
//         className="table-cell sm:hidden cursor-pointer"
//     >
//         ID
//         {sortConfig.key === "Order_ID"
//             ? sortConfig.direction === "ascending"
//                 ? "🔼"
//                 : "🔽"
//             : ""}
//     </th>
//     <th scope="col">Customer</th>
//     <th
//         scope="col"
//         className="table-cell md:hidden lg:table-cell"
//     >
//         Book
//     </th>
//     <th scope="col" className="md:table-cell hidden">
//         Title
//     </th>
//     <th
//         scope="col"
//         className="cursor-pointer"
//         onClick={() => requestSort("Quantity")}
//     >
//         Quantity
//         {sortConfig.key === "Quantity"
//             ? sortConfig.direction === "ascending"
//                 ? "🔼"
//                 : "🔽"
//             : ""}
//     </th>
//     <th scope="col">Spent (£)</th>
//     <th
//         scope="col"
//         onClick={() => requestSort("created_at")}
//         className="hidden sm:table-cell cursor-pointer"
//     >
//         Order Date
//     </th>
// </tr>
//                 </thead>
//                 <tbody>
// {sortedOrders.map((order) =>
//     order.items.map((item, itemIndex) => (
//         <tr key={itemIndex}>
//             <td className="">{order.Order_ID}</td>
//             <td>{order.userName}</td>
//             <td className="table-cell md:hidden lg:table-cell">
//                 <img
//                     src={`/images/${item.book.file}`}
//                     alt={item.book.Title}
//                     className="w-16 h-16 object-cover rounded-lg"
//                 />
//             </td>
//             <td className="md:table-cell hidden">
//                 {item.book.Title}
//             </td>
//             <td>{item.Quantity}</td>
//             <td>£{item.totalAmountSpent.toFixed(2)}</td>
//             <td className="sm:table-cell md:hidden lg:table-cell hidden">
//                 {formatDate(item.created_at)}
//             </td>
//             <td className="md:table-cell lg:hidden sm:hidden hidden">
//                 {smallFormatDate(item.created_at)}
//             </td>
//         </tr>
//     )),
// )}
//                 </tbody>
//             </table>
//         </div>
//     );
// }





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
function Orders() {
  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)([]),
    _useState2 = _slicedToArray(_useState, 2),
    orders = _useState2[0],
    setOrders = _useState2[1];
  var _useState3 = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)([]),
    _useState4 = _slicedToArray(_useState3, 2),
    users = _useState4[0],
    setUsers = _useState4[1];
  var _useState5 = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(""),
    _useState6 = _slicedToArray(_useState5, 2),
    selectedUserId = _useState6[0],
    setSelectedUserId = _useState6[1];
  var token = localStorage.getItem("token");
  var updateOrderStatus = function updateOrderStatus(orderId, newStatus) {
    axios__WEBPACK_IMPORTED_MODULE_2__["default"].post("/api/orders/update-status/".concat(orderId), {
      status: newStatus
    }, {
      headers: {
        Authorization: "Bearer ".concat(token)
      }
    }).then(function (response) {
      var updatedOrders = orders.map(function (order) {
        if (order.Order_ID === orderId) {
          return _objectSpread(_objectSpread({}, order), {}, {
            status: newStatus
          });
        }
        return order;
      });
      setOrders(updatedOrders);
    })["catch"](function (error) {
      return console.error("Error updating order status:", error);
    });
  };
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    axios__WEBPACK_IMPORTED_MODULE_2__["default"].get("/api/admin/get-orders", {
      headers: {
        Authorization: "Bearer ".concat(token)
      }
    }).then(function (response) {
      setOrders(response.data.orders || []);
    })["catch"](function (error) {
      console.error("There was an error fetching the orders: ", error);
    });
  }, [token]);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    axios__WEBPACK_IMPORTED_MODULE_2__["default"].get("/api/admin/get-users", {
      headers: {
        Authorization: "Bearer ".concat(token)
      }
    }).then(function (response) {
      setUsers(response.data.users || []);
    })["catch"](function (error) {
      console.error("There was an error fetching the users: ", error);
    });
  }, [token]);
  var userSpecificOrders = (0,react__WEBPACK_IMPORTED_MODULE_0__.useMemo)(function () {
    if (selectedUserId === "") {
      return orders;
    }
    return orders.filter(function (order) {
      return order.User_ID.toString() === selectedUserId;
    });
  }, [orders, selectedUserId]);
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
    className: "border border-solid rounded-lg",
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("select", {
      value: selectedUserId,
      onChange: function onChange(e) {
        return setSelectedUserId(e.target.value);
      },
      className: "m-4 text-black",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("option", {
        value: "",
        children: "Select a User"
      }), users.map(function (user) {
        return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("option", {
          value: user.id,
          children: user.name
        }, user.id);
      })]
    }), userSpecificOrders.map(function (order, index) {
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        className: "mb-4",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("h2", {
          className: "text-lg",
          children: ["Order ID: ", order.Order_ID, " - Date:", " ", formatDate(order.Created_At)]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("table", {
          className: "w-full text-xs sm:text-sm text-left text-black dark:text-white",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("thead", {
            className: "text-white bg-cyan-950 text-blue-900 font-bold",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("tr", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("th", {
                children: "Book"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("th", {
                children: "Quantity"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("th", {
                children: "Price"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("th", {
                children: "Total Spent"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("th", {
                children: "Date"
              })]
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("tbody", {
            children: order.items.map(function (item, itemIndex) {
              return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("tr", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("td", {
                  children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("img", {
                    src: "/images/".concat(item.book.file),
                    alt: item.book.Title,
                    className: "w-16 h-16 object-cover rounded-lg"
                  })
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("td", {
                  children: item.Quantity
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("td", {
                  children: ["\xA3", item.book.Price.toFixed(2)]
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("td", {
                  children: ["\xA3", (item.Quantity * item.book.Price).toFixed(2)]
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("td", {
                  children: smallFormatDate(item.created_at)
                })]
              }, itemIndex);
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            className: "mb-4",
            children: [order.status === "processing" && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
              onClick: function onClick() {
                return updateOrderStatus(order.Order_ID, "accepted");
              },
              className: "px-4 py-2 bg-green-500 text-white rounded hover:bg-blue-600 transition duration-300",
              children: "Accept Order"
            }), order.status === "accepted" && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
              onClick: function onClick() {
                return updateOrderStatus(order.Order_ID, "processing");
              },
              className: "px-4 py-2 bg-red-500 text-white rounded hover:bg-blue-600 transition duration-300",
              children: "Cancel Order"
            })]
          }, index)]
        })]
      }, index);
    })]
  });
}

/***/ })

}]);