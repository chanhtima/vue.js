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

/***/ "./Resources/assets/js/tag.js":
/*!************************************!*\
  !*** ./Resources/assets/js/tag.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  // init for tag
  initDatatable();
});

// =========================  tag =========================== //

initDatatable = function initDatatable() {
  if ($("#tag-datatable").length > 0) {
    oTable = $("#tag-datatable").DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
        url: "/admin/tag/datatable_ajax"
      },
      columns: [{
        data: "id",
        orderable: true,
        searchable: false
      }, {
        data: "type"
      },
      // { data: "head" },
      {
        data: "action",
        orderable: false,
        searchable: false
      }],
      language: $_LANG.datatable
    });
  }
};
ReloadDataTable = function ReloadDataTable() {
  $("#tag-datatable").DataTable().ajax.reload(null, false);
};
setSave = function setSave() {
  event.preventDefault();
  tinyMCE.triggerSave();
  var frm_data = new FormData($("#tag_frm")[0]);
  $.ajax({
    url: "/admin/tag/save",
    type: "POST",
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    success: function success(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        window.location.href = "/admin/tag";
      } else {
        mwz_noti("error", resp.msg);
      }
    }
  });
};
setDelete = function setDelete(id) {
  bootbox.confirm({
    message: "ยืนยันลบ ?",
    buttons: {
      confirm: {
        label: "ตกลง",
        className: "btn-success"
      },
      cancel: {
        label: "ยกเลิก",
        className: "btn-danger"
      }
    },
    callback: function callback(result) {
      if (result) {
        event.preventDefault();
        var _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
          url: "/admin/websetting/tag/set_delete",
          type: "POST",
          data: {
            id: id,
            _token: _token
          },
          success: function success(resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              ReloadDataTable();
            } else {
              mwz_noti("error", resp.msg);
            }
          }
        });
      }
    }
  });
};
setStatus = function setStatus(id, status) {
  event.preventDefault();
  var _token = $('meta[name="csrf-token"]').attr("content");
  $.ajax({
    url: "/admin/websetting/tag/set_status",
    type: "POST",
    data: {
      id: id,
      status: status,
      _token: _token
    },
    success: function success(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        ReloadDataTable();
      } else {
        mwz_noti("error", resp.msg);
      }
    }
  });
};
setUpdateStatus = function setUpdateStatus(id, status) {
  event.preventDefault();
  var _token = $('meta[name="csrf-token"]').attr("content");
  $.ajax({
    url: "/admin/tag/set_status",
    type: "POST",
    data: {
      id: id,
      status: status,
      _token: _token
    },
    success: function success(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        ReloadDataTable();
      } else {
        mwz_noti("error", resp.msg);
      }
    }
  });
};
setTagSave = function setTagSave() {
  event.preventDefault();
  tinyMCE.triggerSave();
  var frm_data = new FormData($("#tag_frm")[0]);
  $.ajax({
    url: "/admin/tag/save",
    type: "POST",
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    success: function success(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        window.location.href = "/admin/tag";
      } else {
        mwz_noti("error", resp.msg);
      }
    }
  });
};

/***/ }),

/***/ 6:
/*!******************************************!*\
  !*** multi ./Resources/assets/js/tag.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Mwz\Resources\assets\js\tag.js */"./Resources/assets/js/tag.js");


/***/ })

/******/ });