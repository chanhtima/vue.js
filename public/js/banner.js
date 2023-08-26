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
  // init for banner
  initDatatable();
  $("#category_id").on('change', function () {
    console.log($(this).val());
    var category_id = $(this).val();

    if (category_id == 4) {
      $(".inlineurlVideo").addClass('d-none'); //  $(".vdo_banner").addClass('d-none');
    } else {
      $(".inlineurlVideo").removeClass('d-none'); // $(".vdo_banner").removeClass('d-none');
    }
  });
}); // =========================  banner ======================================= //

initDatatable = function initDatatable() {
  if ($("#banner-datatable").length > 0) {
    oTable = $("#banner-datatable").DataTable({
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
        url: "/admin/banner/datatable_ajax"
      },
      columns: [{
        data: "sequence",
        orderable: true,
        searchable: false
      }, {
        data: "image",
        orderable: false,
        searchable: false
      }, {
        data: "name_th",
        orderable: true
      }, {
        data: "category_id",
        orderable: true,
        searchable: false
      }, {
        data: "sequence",
        orderable: true
      }, {
        data: "updated_at",
        orderable: true,
        searchable: false
      }, {
        data: "action",
        orderable: false,
        searchable: false
      }],
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
        url: "/admin/banner/set_re_order",
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

setReloadDataTable = function setReloadDataTable() {
  $("#banner-datatable").DataTable().ajax.reload(null, false);
};

setUpdateStatus = function setUpdateStatus(id, status) {
  event.preventDefault();

  var _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/admin/banner/set_status",
    type: "POST",
    data: {
      id: id,
      status: status,
      _token: _token
    },
    success: function success(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        setReloadDataTable();
      } else {
        mwz_noti("error", resp.msg);
        setReloadDataTable();
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
          url: "/admin/banner/set_delete",
          type: "POST",
          data: {
            id: id,
            status: status,
            _token: _token
          },
          success: function success(resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              setReloadDataTable();
            } else {
              mwz_noti("error", resp.msg);
              setReloadDataTable();
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
  var frm_data = new FormData($("#banner_frm")[0]);
  $.ajax({
    url: "/admin/banner/save",
    type: "POST",
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    beforeSend: function beforeSend(xhr) {
      var rules = {
        category_id: {
          required: true
        },
        name_en: {
          required: true,
          maxlength: 500
        },
        name_th: {
          required: true,
          maxlength: 500
        }
      };
      var messages = $_LANG.validate.message;
      mwz_frm_validate($("#banner_frm"), rules, messages);
      var check_valid = $("#banner_frm").valid();

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
        window.location.href = "/admin/banner/index";
      } else {
        mwz_noti("error", resp.msg);
      }
    }
  });
};
/* ---------------------------------------------------------------------------------------------------- Customs ----------------------------------------------------------*/
// input only number and . point


InputValidateString = function InputValidateString(evt) {
  var theEvent = evt || window.event;

  if (theEvent.type === "paste") {
    key = event.clipboardData.getData("text/plain");
  } else {
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
  }

  var regex = /[0-9]|\./;

  if (!regex.test(key)) {
    theEvent.returnValue = false;
    if (theEvent.preventDefault) theEvent.preventDefault();
  }
};
/* --------------------------------------------------------------------------------------------  Check Type Upload --------------------------------------------------------*/


ChkImageOrVdo = function ChkImageOrVdo(type) {
  // 1 => 'image'
  // 2 => 'vdo'
  if (type == 1) {
    $(".vdo_banner").addClass("d-none");
    $(".image_banner").removeClass("d-none");
  } else {
    $(".image_banner").addClass('d-none');
    $(".vdo_banner").removeClass("d-none");
  }

  $("#type").val(type);
};

DeleteImage = function DeleteImage() {
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
          url: "/admin/banner/delete_image",
          type: "POST",
          data: {
            id: id,
            _token: _token
          },
          success: function success(resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              window.location.href = "/admin/banner/edit/" + id;
            } else {
              mwz_noti("error", resp.msg);
            }
          }
        });
      }
    }
  });
};

/***/ }),

/***/ "./Resources/assets/sass/ads.scss":
/*!****************************************!*\
  !*** ./Resources/assets/sass/ads.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./Resources/assets/sass/app.scss":
/*!****************************************!*\
  !*** ./Resources/assets/sass/app.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./Resources/assets/sass/category.scss":
/*!*********************************************!*\
  !*** ./Resources/assets/sass/category.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**************************************************************************************************************************************************!*\
  !*** multi ./Resources/assets/js/app.js ./Resources/assets/sass/app.scss ./Resources/assets/sass/category.scss ./Resources/assets/sass/ads.scss ***!
  \**************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Banner\Resources\assets\js\app.js */"./Resources/assets/js/app.js");
__webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Banner\Resources\assets\sass\app.scss */"./Resources/assets/sass/app.scss");
__webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Banner\Resources\assets\sass\category.scss */"./Resources/assets/sass/category.scss");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Banner\Resources\assets\sass\ads.scss */"./Resources/assets/sass/ads.scss");


/***/ })

/******/ });