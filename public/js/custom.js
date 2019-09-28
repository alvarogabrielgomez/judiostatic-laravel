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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var custom = {
  toast: function toast(title, msg, time) {
    var msgwindow = document.getElementById('toastdiv');
    msgwindow.style.transform = 'translateY(0px)';
    msgwindow.style.opacity = "100";
    msgwindow.querySelector('.toastprogressbar').style.transitionDelay = '0ms';
    msgwindow.querySelector('.title').style.display = 'block';
    msgwindow.querySelector('.title').innerText = title;
    msgwindow.querySelector('.content').innerHTML = msg;
    msgwindow.querySelector('.toastprogressbar').style.transitionDuration = time + 'ms';
    msgwindow.querySelector('.toastprogressbar').style.width = '100%';
    setTimeout(function () {
      msgwindow.style.transform = 'translateY(100px)';
      msgwindow.style.opacity = "0";
      msgwindow.querySelector('.toastprogressbar').style.transitionDelay = '100ms';
      msgwindow.querySelector('.toastprogressbar').style.transitionDuration = '0ms';
      msgwindow.querySelector('.toastprogressbar').style.width = '0%';
    }, time);
    return msg;
  },
  msg: function msg(_msg, time) {
    var msgwindow = document.getElementById('toastdiv');
    msgwindow.style.transform = 'translateY(0px)';
    msgwindow.style.opacity = "100";
    msgwindow.querySelector('.toastprogressbar').style.transitionDelay = '0ms';
    msgwindow.querySelector('.title').style.display = 'none';
    msgwindow.querySelector('.content').innerHTML = _msg;
    msgwindow.querySelector('.toastprogressbar').style.transitionDuration = time + 'ms';
    msgwindow.querySelector('.toastprogressbar').style.width = '100%';
    setTimeout(function () {
      msgwindow.style.transform = 'translateY(100px)';
      msgwindow.style.opacity = "0";
      msgwindow.querySelector('.toastprogressbar').style.transitionDelay = '100ms';
      msgwindow.querySelector('.toastprogressbar').style.transitionDuration = '0ms';
      msgwindow.querySelector('.toastprogressbar').style.width = '0%';
    }, time);
    return _msg;
  },
  boxtoast: function boxtoast(title, msg, time, div) {
    var msgwindow = div;
    msgwindow.style.transform = 'translateY(0px)';
    msgwindow.style.opacity = "100";
    msgwindow.querySelector('.toastprogressbar').style.transitionDelay = '0ms';
    msgwindow.querySelector('.title').style.display = 'block';
    msgwindow.querySelector('.title').innerText = title;
    msgwindow.querySelector('.content').innerHTML = msg;
    msgwindow.querySelector('.toastprogressbar').style.transitionDuration = time + 'ms';
    msgwindow.querySelector('.toastprogressbar').style.width = '100%';
    setTimeout(function () {
      msgwindow.style.transform = 'translateY(-100px)';
      msgwindow.style.opacity = "0";
      msgwindow.querySelector('.toastprogressbar').style.transitionDelay = '100ms';
      msgwindow.querySelector('.toastprogressbar').style.transitionDuration = '0ms';
      msgwindow.querySelector('.toastprogressbar').style.width = '0%';
    }, time);
    return msg;
  },
  boxmsg: function boxmsg(msg, time, div) {
    var msgwindow = div;
    msgwindow.style.transform = 'translateY(0px)';
    msgwindow.style.opacity = "100";
    msgwindow.querySelector('.toastprogressbar').style.transitionDelay = '0ms';
    msgwindow.querySelector('.title').style.display = 'none';
    msgwindow.querySelector('.content').innerHTML = msg;
    msgwindow.querySelector('.toastprogressbar').style.transitionDuration = time + 'ms';
    msgwindow.querySelector('.toastprogressbar').style.width = '100%';
    setTimeout(function () {
      msgwindow.style.transform = 'translateY(-100px)';
      msgwindow.style.opacity = "0";
      msgwindow.querySelector('.toastprogressbar').style.transitionDelay = '100ms';
      msgwindow.querySelector('.toastprogressbar').style.transitionDuration = '0ms';
      msgwindow.querySelector('.toastprogressbar').style.width = '0%';
    }, time);
    return msg;
  }
};
module.exports = custom;

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\user\judiostatic-laravel\resources\js\custom.js */"./resources/js/custom.js");


/***/ })

/******/ });