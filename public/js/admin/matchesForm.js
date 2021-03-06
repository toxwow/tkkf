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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/matchesForm.js":
/*!*******************************************!*\
  !*** ./resources/js/admin/matchesForm.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var leagueSelect = $("select[name='league']");
  var homeSelect = $("select[name='teamHome']");
  var awaySelect = $("select[name='teamAway']");
  $(leagueSelect).change(function () {
    homeSelect.children().hide();
    homeSelect.children('#league-' + leagueSelect.val()).show();
    awaySelect.children().hide();
    awaySelect.children('#league-' + leagueSelect.val()).show();
  });
  $(homeSelect).change(function () {
    awaySelect.children().children().attr("disabled", false);
    awaySelect.children().children("option[value='" + $(this).val() + "']").attr("disabled", true);
  });
  $(awaySelect).change(function () {
    homeSelect.children().children().attr("disabled", false);
    homeSelect.children().children("option[value='" + $(this).val() + "']").attr("disabled", true);
  });
  var x = $("input[name='teamAwayScore']").val();
  var y = $("input[name='teamHomeScore']").val();

  if (parseInt(x) + parseInt(y) <= 2) {
    $("input[name='enemyPointSet3']").val('').attr("disabled", true);
    $("input[name='homePointSet3']").val('').attr("disabled", true);
  } else if ($("input[name='homePointSet3']").val() && $("input[name='enemyPointSet3']").val() != '') {
    $("input[name='enemyPointSet3']").attr("disabled", false);
    $("input[name='homePointSet3']").attr("disabled", false);
  } else {
    $("input[name='enemyPointSet3']").val('').attr("disabled", false);
    $("input[name='homePointSet3']").val('').attr("disabled", false);
  }

  $("input[name='teamAwayScore']").change(function () {
    var x = $("input[name='teamAwayScore']").val();
    var y = $("input[name='teamHomeScore']").val();

    if (parseInt(x) + parseInt(y) <= 2) {
      $("input[name='enemyPointSet3']").val('').attr("disabled", true);
      $("input[name='homePointSet3']").val('').attr("disabled", true);
    } else {
      $("input[name='enemyPointSet3']").val('').attr("disabled", false);
      $("input[name='homePointSet3']").val('').attr("disabled", false);
    }
  });
  $("input[name='teamHomeScore']").change(function () {
    var x = $("input[name='teamAwayScore']").val();
    var y = $("input[name='teamHomeScore']").val();

    if (parseInt(x) + parseInt(y) <= 2) {
      $("input[name='enemyPointSet3']").val('').attr("disabled", true);
      $("input[name='homePointSet3']").val('').attr("disabled", true);
    } else {
      $("input[name='enemyPointSet3']").val('').attr("disabled", false);
      $("input[name='homePointSet3']").val('').attr("disabled", false);
    }
  });
});

/***/ }),

/***/ 4:
/*!*************************************************!*\
  !*** multi ./resources/js/admin/matchesForm.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/tkkf/resources/js/admin/matchesForm.js */"./resources/js/admin/matchesForm.js");


/***/ })

/******/ });