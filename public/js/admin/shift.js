/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/shift.js":
/*!*************************************!*\
  !*** ./resources/js/admin/shift.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var collapse;
$('.table-tabs').click(function () {
  $('.table-name').children().removeClass('title');
  $(this).addClass('title');
  collapse = this.id + 'Match';
  $('.table-wrapper').children().hide();
  var count = $("#selected ul").children().length;
  $('#' + collapse).show();
});
var numberReffil, numberPast, numberFuture;
numberReffil = $('.reffilRow').length;
numberPast = $('.pastRow').length;
numberFuture = $('.futureRow').length;
console.log(numberFuture);
$("#badgePast").append(numberPast);
$("#badgeFuture").append(numberFuture);
$("#badgeReffil").append(numberReffil); // $(".shiftButton").click(function(){
//     var match = $(this).data("match");
//     var team = $(this).data("team");
//     var token = $("input[name='_token']").attr("value");
//
//     Swal.fire({
//         title: 'Czy jesteś pewny aby przełożyć mecz?',
//         text: "Zmiany nie będą mogły zostać cofnięte! Wszystkie mecze danej drużyny zostaną usunięte!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Tak, przełóż mecz',
//         cancelButtonText: 'Nie przegładaj',
//     }).then((result) => {
//         if (result.isConfirmed) {
//
//             $.ajax({
//                 url: "mecze/"+match,
//                 type: 'POST',
//                 data: {
//                     "match": match,
//                     '_method': 'PATCH',
//                     "_token": token,
//                     "status": "przelozony",
//                 },
//                 success: function (){
//                     $.ajax({
//                         url: "druzyna/" + team,
//                         type: 'POST',
//                         data: {
//                             "match": team,
//                             '_method': 'PATCH',
//                             "_token": token,
//                         },success: function (){
//
//                         Swal.fire(
//                             {
//                                 title: 'Mecz został przełożony',
//                                 icon: 'success',
//                                 onClose: () => {
//                                     location.reload();
//                                 }
//                             }
//                         )}
//                     })
//                 }
//             });
//         }
//     })
// });

/***/ }),

/***/ 8:
/*!*******************************************!*\
  !*** multi ./resources/js/admin/shift.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/tkkf/resources/js/admin/shift.js */"./resources/js/admin/shift.js");


/***/ })

/******/ });