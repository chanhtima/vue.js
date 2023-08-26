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

/***/ "./Resources/assets/js/app.js":
/*!************************************!*\
  !*** ./Resources/assets/js/app.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  // init for table all
  initContentDatatable();
});

// =========================  content =========================== //
initContentDatatable = function initContentDatatable() {
  if ($("#content-datatable").length > 0) {
    var type = $("#content-datatable").data("type");
    var column = [];
    column.push({
      data: "sequence",
      searchable: false
    });
    if ($_config.image) {
      column.push({
        data: "image",
        orderable: false,
        searchable: false
      });
    }
    column.push({
      data: "name_th"
    });
    //   column.push({ data: "sort" });
    column.push({
      data: "updated_at"
    });
    column.push({
      data: "action",
      orderable: false,
      searchable: false
    });
    console.log(column);
    oTable = $("#content-datatable").DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      rowReorder: {
        dataSrc: "sequence"
      },
      columnDefs: [{
        orderable: true,
        className: "reorder",
        targets: 0
      }, {
        orderable: false,
        targets: "_all"
      }],
      ajax: {
        url: "/admin/content/" + type + "/datatable_ajax"
      },
      columns: column,
      language: $_LANG.datatable
    });
    oTable.on("row-reorder", function (e, diff, edit) {
      var moving = {};
      $.each(diff, function (key, row) {
        console.log(key + ": " + row + "position" + row.newPosition);
        var rowData = oTable.row(row.node).data();
        moving[rowData.id] = row.newData;
      });
      var sort_json = JSON.stringify(moving);
      var _token = $('meta[name="csrf-token"]').attr("content");
      $.ajax({
        url: "/admin/content/set_re_order",
        type: "POST",
        data: {
          sort_json: sort_json,
          _token: _token
        },
        success: function success(resp) {
          if (resp.success) {
            setReloadDataTable();
          } else {
            mwz_noti("error", resp.msg);
          }
        }
      });
    });
  }
};
ReloadContentTable = function ReloadContentTable() {
  $("#content-datatable").DataTable().ajax.reload(null, false);
};
setUpdateStatus = function setUpdateStatus(id, status) {
  event.preventDefault();
  var _token = $('meta[name="csrf-token"]').attr("content");
  var type = $("#content-datatable").data("type");
  $.ajax({
    url: "/admin/content/set_status",
    type: "POST",
    data: {
      id: id,
      status: status,
      _token: _token
    },
    success: function success(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        ReloadContentTable();
      } else {
        mwz_noti("error", resp.msg);
        ReloadContentTable();
      }
    }
  });
};
setDelete = function setDelete(id) {
  bootbox.confirm({
    message: $_LANG.confirm.delete_resource,
    buttons: {
      confirm: {
        label: $_LANG.confirm.ok,
        className: "btn-success"
      },
      cancel: {
        label: $_LANG.confirm.cancel,
        className: "btn-danger"
      }
    },
    callback: function callback(result) {
      if (result) {
        event.preventDefault();
        var _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
          url: "/admin/content/set_delete",
          type: "POST",
          data: {
            id: id,
            _token: _token
          },
          success: function success(resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              ReloadContentTable();
            } else {
              mwz_noti("error", resp.msg);
              ReloadContentTable();
            }
          }
        });
      }
    }
  });
};
setSave = function setSave() {
  event.preventDefault();
  tinyMCE.triggerSave();
  mwzGenerateMatadata(0);
  var frm_data = new FormData($("#content_frm")[0]);
  var type = $("#content-datatable").data("type");
  $.ajax({
    url: "/admin/content/save",
    type: "POST",
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    beforeSend: function beforeSend(xhr) {
      var rules = {
        name_en: {
          required: true,
          maxlength: 500
        },
        name_th: {
          required: true,
          maxlength: 500
        }
      };
      if ($_config.detail) {
        rules.detail_th = {
          required: true
        };
        rules.detail_en = {
          required: true
        };
      }
      if ($_config.desc) {
        rules.desc_th = {
          required: true,
          maxlength: 500
        };
        rules.desc_en = {
          required: true,
          maxlength: 500
        };
      }
      var messages = $_LANG.validate.message;
      mwz_frm_validate($("#content_frm"), rules, messages);
      var check_valid = $("#content_frm").valid();
      if (check_valid) {
        return check_valid;
      } else {
        mwz_noti("error", $_LANG.validate.error);
        return check_valid;
      }
    },
    success: function success(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        window.location.href = "/admin/content/" + resp.data_type;
      } else {
        mwz_noti("error", resp.msg);
      }
    }
  });
};
DeleteImage = function DeleteImage(type) {
  var id = $("#id").val();
  bootbox.confirm({
    message: $_LANG.confirm.delete_image,
    buttons: {
      confirm: {
        label: $_LANG.confirm.ok,
        className: "btn-success"
      },
      cancel: {
        label: $_LANG.confirm.cancel,
        className: "btn-danger"
      }
    },
    callback: function callback(result) {
      if (result) {
        var _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
          url: "/admin/content/delete_image",
          type: "POST",
          data: {
            id: id,
            type: type,
            _token: _token
          },
          success: function success(resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              window.location.href = "/admin/content/" + resp.data_type + "/edit/" + id;
            } else {
              mwz_noti("error", resp.msg);
            }
          }
        });
      }
    }
  });
};
DeleteFile = function DeleteFile(type, id) {
  bootbox.confirm({
    message: $_LANG.confirm["delete"],
    buttons: {
      confirm: {
        label: $_LANG.confirm.ok,
        className: "btn-success"
      },
      cancel: {
        label: $_LANG.confirm.cancel,
        className: "btn-danger"
      }
    },
    callback: function callback(result) {
      if (result) {
        var _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
          url: "/admin/content/delete_file",
          type: "POST",
          data: {
            id: id,
            type: type,
            _token: _token
          },
          success: function success(resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              window.location.href = "/admin/content/edit/" + id;
            } else {
              mwz_noti("error", resp.msg);
            }
          }
        });
      }
    }
  });
};
setUpdateSort = function setUpdateSort(id, move) {
  event.preventDefault();
  var _token = $('meta[name="csrf-token"]').attr("content");
  $.ajax({
    url: "/admin/content/sort",
    type: "POST",
    data: {
      id: id,
      move: move,
      _token: _token
    },
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    success: function success(resp) {
      ReloadContentTable();
    }
  });
};

/***/ }),

/***/ "./Resources/assets/sass/app.scss":
/*!****************************************!*\
  !*** ./Resources/assets/sass/app.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************!*\
  !*** multi ./Resources/assets/js/app.js ./Resources/assets/sass/app.scss ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Content\Resources\assets\js\app.js */"./Resources/assets/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Content\Resources\assets\sass\app.scss */"./Resources/assets/sass/app.scss");


/***/ })

/******/ });