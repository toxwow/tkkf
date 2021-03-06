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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/teams.js":
/*!*************************************!*\
  !*** ./resources/js/admin/teams.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(".deleteTeam").click(function () {
  var id = $(this).data("id");
  console.log(id);
  var token = $("input[name='_token']").attr("value");
  Swal.fire({
    title: 'Czy jesteś pewny aby usunąć drużynę?',
    text: "Zmiany nie będą mogły zostać cofnięte! Wszystkie mecze danej drużyny zostaną usunięte!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Tak, usuń drużynę',
    cancelButtonText: 'Nie usuwaj'
  }).then(function (result) {
    if (result.isConfirmed) {
      $.ajax({
        url: "druzyna/" + id,
        type: 'POST',
        data: {
          "id": id,
          '_method': 'DELETE',
          "_token": token
        },
        success: function success() {
          Swal.fire({
            title: 'Drużyna została usunięta',
            icon: 'success',
            onClose: function onClose() {
              location.reload();
            }
          });
        }
      });
    }
  });
});
$("#veryfyPlayer").click(function () {
  var id = $(this).data("id");
  console.log(id);
  var token = $("input[name='_token']").attr("value");
  $.ajax({
    url: "zawodnik/" + id,
    type: 'POST',
    data: {
      "id": id,
      '_method': 'PATCH',
      "_token": token,
      "status": "zweryfikowany"
    },
    success: function success() {
      Swal.fire({
        title: 'Zawodnik został zweryfikowany',
        icon: 'success',
        onClose: function onClose() {
          location.reload();
        }
      });
    }
  });
});
$(".deletePlayer").click(function () {
  var id = $(this).data("id");
  console.log(id);
  var token = $("input[name='_token']").attr("value");
  Swal.fire({
    title: 'Czy jesteś pewny aby usunąć zawodnika?',
    text: "Zmiany nie będą mogły zostać cofnięte!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Tak, usuń zawodnika',
    cancelButtonText: 'Nie usuwaj'
  }).then(function (result) {
    if (result.isConfirmed) {
      $.ajax({
        url: "zawodnik/" + id,
        type: 'POST',
        data: {
          "id": id,
          '_method': 'DELETE',
          "_token": token
        },
        success: function success() {
          Swal.fire({
            title: 'Zawodnik został usunięty',
            icon: 'success',
            onClose: function onClose() {
              location.reload();
            }
          });
        }
      });
    }
  });
});
$(".deleteLeague").click(function () {
  var id = $(this).data("id");
  console.log(id);
  var token = $("input[name='_token']").attr("value");
  Swal.fire({
    title: 'Czy jesteś pewny aby usunąć ligę?',
    text: "Zmiany nie będą mogły zostać cofnięte!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Tak, usuń ligę',
    cancelButtonText: 'Nie usuwaj'
  }).then(function (result) {
    if (result.isConfirmed) {
      $.ajax({
        url: "liga/" + id,
        type: 'POST',
        data: {
          "id": id,
          '_method': 'DELETE',
          "_token": token
        },
        success: function success() {
          Swal.fire({
            title: 'Liga została usunięta',
            icon: 'success',
            onClose: function onClose() {
              location.reload();
            }
          });
        }
      });
    }
  });
});
$(".deleteLeagueErorr").click(function () {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Cos poszło nie tak! Upewnij się, że w lidze nie znajdują się żadne drużyny!'
  });
});
$(".deleteTeamError").click(function () {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Cos poszło nie tak! Upewnij się, że w drużynie nie znajduje się żaden zawodnik!'
  });
});
$('#selectLeague').on('change', function () {
  if (this.value === 'all') {
    $('.leagueTable').removeClass('d-none');
  } else {
    $('.leagueTable').addClass('d-none');
    $('#league-' + this.value).removeClass('d-none');
  }
});
$("[id^='team-click-']").click(function () {
  var test = $(this).parent().parent();
  $(test.next()).slideToggle('slow');
});
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
$(".alert-show").click(function () {
  console.log('test');
  $(".alert").addClass("show fade");
});
$(".alert-hide").click(function () {
  console.log('test1');
  $(".alert").removeClass("show");
});

/***/ }),

/***/ 6:
/*!*******************************************!*\
  !*** multi ./resources/js/admin/teams.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/tkkf/resources/js/admin/teams.js */"./resources/js/admin/teams.js");


/***/ })

/******/ });