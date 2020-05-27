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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/jsForAdmin.js":
/*!************************************!*\
  !*** ./resources/js/jsForAdmin.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
/* js Category */

$(document).ready(function () {
  var id_category;
  $('.edit-category').on('click', function () {
    var data = {
      id: $(this).attr('data-category_id')
    };
    id_category = data['id'];
    $.ajax({
      type: 'POST',
      url: '/admin/ajax/get_category',
      data: data,
      success: function success(res) {
        $('#categoryNameEdit').val(res.name);
        $('#descriptionEdit').html(res.description);
        $('option[value="' + res.parent_id + '"]').attr("selected", "selected");
      }
    });
  });
  $('.submitEditCategory').on('click', function () {
    var data = {
      id: id_category,
      parent_id: $('#categoryParentEdit').val(),
      name: $('#categoryNameEdit').val(),
      description: $('#descriptionEdit').val()
    };
    $.ajax({
      type: 'POST',
      url: '/admin/ajax/edit_category',
      data: data,
      success: function success(res) {
        if (res['parent_id'] !== 0) {
          $('li[data-id="' + res['parent_id'] + '"]').find('.dd-list').append('<ol class="dd-item dd3-item dd3-item-children" data-id="' + id_category + '"><div class="dd-handle dd3-handle"></div><div class="dd3-content"><a class="edit-category" data-toggle="modal" href="#modalEditCategory" data-category_id="' + id_category + '">' + res['name'] + '</a> <a class="icon_category btn-del-category" data-id="' + id_category + '"><i class="fa fa-trash-o" aria-hidden="true"></i></a> <a class="icon_category edit-category" data-toggle="modal" href="#modalEditCategory" data-category_id="' + id_category + '"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> </div> </ol>');
        } else {// coming soon parent_id == 0
        }
      }
    });
    $('li[data-id="' + id_category + '"]').remove();
  });
  $('.btn-del-category').on('click', function (e) {
    var _this = this;

    e.preventDefault();
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
      if (result.value) {
        var id = $(_this).attr('data-id');
        $.ajax({
          type: 'POST',
          url: '/admin/ajax/delete_category',
          data: {
            'id': id
          },
          success: function success() {
            $('li[data-id="' + id + '"]').remove();
            Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
          }
        });
      }
    });
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!********************************************************************!*\
  !*** multi ./resources/js/jsForAdmin.js ./resources/sass/app.scss ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\Chitt\Desktop\System\resources\js\jsForAdmin.js */"./resources/js/jsForAdmin.js");
module.exports = __webpack_require__(/*! C:\Users\Chitt\Desktop\System\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });