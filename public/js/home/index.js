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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/home/index.js":
/*!************************************!*\
  !*** ./resources/js/home/index.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var isEnd = false;
$('div.up.nav').click(function () {
  if (isEnd) {
    return;
  }

  isEnd = true;
  var currentPosition = parseInt($(".match-ruller").css('top'));

  if (currentPosition != 0) {
    $(".match-ruller").css('top', currentPosition + 90 + 'px');
  }

  setTimeout(function () {
    isEnd = false;
  }, 500);
});
$('div.down.nav').click(function () {
  if (isEnd) {
    return;
  }

  isEnd = true;

  if (countChild > 4) {
    var currentPosition = parseInt($(".match-ruller").css('top'));

    if (currentPosition == maxPostion) {
      $(".match-ruller").css('top', '0px');
    } else {
      $(".match-ruller").css('top', currentPosition - 90 + 'px');
    }
  }

  setTimeout(function () {
    isEnd = false;
  }, 500);
});
var SelectLeague;
$('.league-items').children().each(function () {
  var test = $(this);

  if (test.hasClass('active')) {
    SelectLeague = this.id;
  } else {
    $('.league-items').children().first().addClass('active');
    SelectLeague = $('.league-items').children().first().attr("id");
  }
});
$('.timetable-wrapper').each(function () {
  $(this).hide();

  if (this.id === SelectLeague) {
    $(this).show();
  }
});
$('.table-teams-wrapper').each(function () {
  $(this).hide();

  if (this.id === SelectLeague) {
    $(this).show();
  }
});
$('.league-items').children().click(function () {
  SelectLeague = this.id;
  $('.league-items').children().removeClass('active');
  $(this).addClass('active');
  $('.timetable-wrapper').each(function () {
    $(this).hide();

    if (this.id === SelectLeague) {
      $(this).show();
    }
  });
  $('.table-teams-wrapper').each(function () {
    $(this).hide();

    if (this.id === SelectLeague) {
      $(this).show();
    }
  });
  countChild = $(".match-ruller:visible").children().length;
  maxPostion = 360 - 90 * countChild;
});
var countChild = $(".match-ruller:visible").children().length;
var maxPostion = 360 - 90 * countChild;

/***/ }),

/***/ 11:
/*!******************************************!*\
  !*** multi ./resources/js/home/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/tkkf/resources/js/home/index.js */"./resources/js/home/index.js");


/***/ })

/******/ });