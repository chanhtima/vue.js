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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./Resources/assets/js/admin_menu.js":
/*!*******************************************!*\
  !*** ./Resources/assets/js/admin_menu.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  // init for table all
  initDatatable();
  setLinkType();
  if ($('.icon-selector').length > 0) {
    $('.icon-selector').fontIconPicker();
  }
});

// =========================  content =========================== //
initDatatable = function initDatatable() {
  if ($('#menu-datatable').length > 0) {
    var re_order_at_row;
    var re_order_next_by_row;
    var column = [];
    column.push({
      "data": "sequence",
      searchable: false
    });
    if ($_config.image) {
      column.push({
        "data": "image",
        orderable: false,
        searchable: false
      });
    }
    if ($_config.icon) {
      column.push({
        "data": "icon"
      });
    }
    column.push({
      "data": "name_th",
      orderable: true,
      searchable: true
    });
    column.push({
      "data": "link",
      orderable: true,
      searchable: true
    });
    column.push({
      "data": "sort"
    });
    column.push({
      "data": "updated_at",
      orderable: true,
      searchable: false
    });
    column.push({
      "data": "action"
    });
    oTable = $('#menu-datatable').DataTable({
      "processing": true,
      "serverSide": true,
      "stateSave": true,
      "rowReorder": {
        "dataSrc": "sequence"
      },
      "columnDefs": [{
        "orderable": true,
        "className": "reorder",
        "targets": 0
      }, {
        "orderable": false,
        "targets": "_all"
      }],
      "ajax": {
        "url": "/admin/admin_menu/datatable_ajax"
      },
      "columns": column,
      "language": $_LANG.datatable
    });
    oTable.on('pre-row-reorder', function (e, node, index) {
      re_order_at_row = node.node.id;
    });
    oTable.on("row-reorder", function (e, diff, edit) {
      var moving = {};
      $.each(diff, function (key, row) {
        if (re_order_at_row == row.node.id) {
          console.log('move row:' + row.node.id + ' to next:' + $(row.node).prev().attr('id'));
          re_order_next_by_row = $(row.node).prev().attr('id');
        }
      });
      var _token = $('meta[name="csrf-token"]').attr("content");
      $.ajax({
        url: "/admin/admin_menu/set_move_node",
        type: "POST",
        data: {
          node_id: re_order_at_row,
          next_by: re_order_next_by_row,
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
  $('#menu-datatable').DataTable().ajax.reload(null, false);
};
setUpdateStatus = function setUpdateStatus(id, status) {
  // event.preventDefault();
  var _token = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    url: "/admin/admin_menu/set_status",
    type: "POST",
    data: {
      id: id,
      status: status,
      _token: _token
    },
    success: function success(resp) {
      if (resp.success) {
        mwz_noti('success', resp.msg);
        setReloadDataTable();
      } else {
        mwz_noti('error', resp.msg);
        setReloadDataTable();
      }
    }
  });
};
setDelete = function setDelete(id) {
  bootbox.confirm({
    message: $_LANG.confirm["delete"],
    buttons: {
      confirm: {
        label: $_LANG.confirm.ok,
        className: 'btn-success'
      },
      cancel: {
        label: $_LANG.confirm.cancel,
        className: 'btn-danger'
      }
    },
    callback: function callback(result) {
      if (result) {
        event.preventDefault();
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url: "/admin/admin_menu/set_delete",
          type: "POST",
          data: {
            id: id,
            status: status,
            _token: _token
          },
          success: function success(resp) {
            if (resp.success) {
              mwz_noti('success', resp.msg);
              setReloadDataTable();
            } else {
              mwz_noti('error', resp.msg);
              setReloadDataTable();
            }
          }
        });
      }
    }
  });
};
setSave = function setSave() {
  tinyMCE.triggerSave();
  // fill metadata
  mwzGenerateMatadata(0);
  var frm_data = new FormData($('#menu_frm')[0]);
  var type = $('#type').val();
  $.ajax({
    url: "/admin/admin_menu/save",
    type: "POST",
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend: function beforeSend(xhr) {
      // fill metadata

      // validate
      var rules = {
        name_th: {
          required: true,
          maxlength: 500
        },
        name_en: {
          required: true,
          maxlength: 500
        }
      };
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
      if ($_config.detail) {
        rules.detail_th = {
          required: true
        };
        rules.detail_en = {
          required: true
        };
      }
      var messages = $_LANG.validate.message;
      mwz_frm_validate($("#menu_frm"), rules, messages);
      var chk_valid = $("#menu_frm").valid();
      if (chk_valid) {
        return chk_valid;
      } else {
        mwz_noti('error', $_LANG.validate.error);
        return chk_valid;
      }
    },
    success: function success(resp) {
      if (resp.success) {
        mwz_noti('success', resp.msg);
        window.location.href = '/admin/admin_menu/';
      } else {
        mwz_noti('error', resp.msg);
      }
    }
  });
};
setUpdateSort = function setUpdateSort(id, move) {
  event.preventDefault();
  var _token = $('meta[name="csrf-token"]').attr('content');
  var type = $('#menu-datatable').data('type');
  $.ajax({
    url: "/admin/admin_menu/sort",
    type: "POST",
    data: {
      id: id,
      move: move,
      type: type,
      _token: _token
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function success(resp) {
      setReloadDataTable();
    }
  });
};
setLinkType = function setLinkType() {
  var type = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  $('.menu-link-type').fadeOut();
  if (type == '') {
    type = $('#link_type').val();
  }
  console.log(type);
  if (type == 1) {
    $('#show-slug-select').fadeIn();
  }
  if (type == 2) {
    $('#show-url-input').fadeIn();
  }
};

/***/ }),

/***/ 3:
/*!*************************************************!*\
  !*** multi ./Resources/assets/js/admin_menu.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Mwz\Resources\assets\js\admin_menu.js */"./Resources/assets/js/admin_menu.js");


/***/ })

/******/ });