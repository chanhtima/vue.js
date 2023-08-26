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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./Resources/assets/js/app.js":
/*!************************************!*\
  !*** ./Resources/assets/js/app.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(arr, i) { var _i = null == arr ? null : "undefined" != typeof Symbol && arr[Symbol.iterator] || arr["@@iterator"]; if (null != _i) { var _s, _e, _x, _r, _arr = [], _n = !0, _d = !1; try { if (_x = (_i = _i.call(arr)).next, 0 === i) { if (Object(_i) !== _i) return; _n = !1; } else for (; !(_n = (_s = _x.call(_i)).done) && (_arr.push(_s.value), _arr.length !== i); _n = !0); } catch (err) { _d = !0, _e = err; } finally { try { if (!_n && null != _i["return"] && (_r = _i["return"](), Object(_r) !== _r)) return; } finally { if (_d) throw _e; } } return _arr; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
// init script
MULTI_UPLOAD = {};
$(document).ready(function () {
  // init multi file upload
  init_maps_picker();
  int_mwz_zipcode();
  int_mwz_province();
  int_mwz_datetimepicker();
  init_mwz_select2();
  select2AjaxWithImage();
  select2AjaxWithImageMultiple();
  select2AjaxTags();
  init_mwz_upload();
  init_mwz_multi_upload();
  init_mwz_filebrowse();
  // console.log(MULTI_UPLOAD);
  set_content_tab_init();
  set_nav_tab_init();
});

// redirect to page
mwz_redirect = function mwz_redirect(url) {
  window.location.href = url;
};
// form validation
mwz_frm_validate = function mwz_frm_validate(selector, rules, messages) {
  var valid_result = $(selector).validate({
    ignore: "",
    rules: rules,
    messages: messages,
    errorPlacement: function errorPlacement(error, element) {
      error.addClass("invalid-feedback");
      if (element.prop("type") === "checkbox") {
        error.insertAfter(element.next("label"));
      } else {
        error.insertAfter(element);
      }
    },
    invalidHandler: function invalidHandler(form, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        var first_invalid = validator.errorList[0].element;
        var tab_content = $(first_invalid).closest("div.tab_content");
        var check_active = $(tab_content).hasClass("active");
        var tab_wraper = $(first_invalid).closest("div.content_wrapper");
        var tab_index = $(tab_content).index();
        console.log("tab_index " + tab_index);
        var tab_active_index = Math.floor(parseInt(tab_index) / 2);
        console.log("tab_active_index " + tab_active_index);
        var tab_wrapper = $(tab_wraper).closest("div.tab_wrapper");
        console.log("ele_id " + $(tab_wrapper).attr("id"));
        localStorage.setItem($(tab_wrapper).attr("id") + "_activeTab", tab_active_index);
        $(first_invalid).focus();
        $(tab_wrapper).find("ul.tab_list li").eq(tab_active_index).trigger("click");

        // $(tab_wraper).closest("div.tab_wrapper").champ({active_tab:tab_active_index}); ;

        // console.log( tab );
        // console.log( $(tab).attr(id) );
        // $(tab).champ({active_tab:active});
      }
    },

    errorElement: "div",
    errorClass: "invalid-feedback",
    highlight: function highlight(element, errorClass, validClass) {
      $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function unhighlight(element, errorClass, validClass) {
      $(element).addClass("is-valid").removeClass("is-invalid");
    }
  });
};

// mwz_global_load
mwz_global_loading = function mwz_global_loading() {
  var show = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
  if (show) {
    $("#global-loader").fadeIn(100);
  } else {
    $("#global-loader").fadeOut(100);
  }
};

// notification
mwz_noti = function mwz_noti(type, msg) {
  console.log("mwz_noti" + type + " " + msg);
  switch (type) {
    case "success":
      return $.growl.notice({
        title: "success",
        message: msg
      });
      break;
    case "warning":
      return $.growl.warning({
        title: "warning",
        message: msg
      });
      break;
    case "error":
      return $.growl.error({
        title: "error",
        message: msg
      });
      break;
    default:
      return $.growl({
        title: "notice",
        message: msg
      });
      break;
  }
};
function elFinderBrowser(field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: "/admin/elfinder/tinymce4",
    // use an absolute path!
    title: "File Management",
    width: 900,
    height: 450,
    resizable: "yes"
  }, {
    setUrl: function setUrl(url) {
      win.document.getElementById(field_name).value = url;
      console.log(url);
    }
  });
  return false;
}
(function ($) {
  // init texteditor
  if ($(".texteditor").length > 0) {
    var _tinymce$init;
    tinymce.init((_tinymce$init = {
      selector: "textarea.texteditor",
      skin: "lightgray",
      themes: "modern",
      inline: false,
      height: 250,
      mode: "textareas",
      relative_urls: true,
      extended_valid_elements: "i[class|style|title],iframe[src|frameborder|style|scrolling|class|width|height|name|align]",
      fontsize_formats: "8pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 21pt 22pt 23pt 24pt 25pt 26pt 28pt 30pt 32pt 34pt 36pt",
      file_browser_callback: elFinderBrowser,
      plugins: ["advlist autoresize autolink lists link image charmap print preview anchor emoticons", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste textcolor hr template"],
      autoresize_overflow_padding: 5,
      autoresize_min_height: 250,
      autoresize_max_height: 500
    }, _defineProperty(_tinymce$init, "extended_valid_elements", "i[class|style|title],span[class|style|title],a[accesskey|charset|class|contenteditable|contextmenu|coords|dir|download|draggable|dropzone|hidden|href|hreflang|id|lang|media|name|rel|rev|shape|spellcheck|style|tabindex|target|title|translate|type|onclick|onfocus|onblur],marquee"), _defineProperty(_tinymce$init, "toolbar1", " insertfile bootstrap "), _defineProperty(_tinymce$init, "toolbar2", " undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media "), _defineProperty(_tinymce$init, "toolbar3", " forecolor backcolor | formatselect styleselect fontsizeselect | emoticons fontawesome | template"), _defineProperty(_tinymce$init, "content_style", ".container .row .col-xs-12{position:relative}.container .row .col-xs-12::before{content:'';display:block;position:absolute;height:100%;width:calc(100% - 30px);border:1px dotted gray}.container .row .col-xs-12 img{max-width:100%;height:auto}"), _defineProperty(_tinymce$init, "templates", [{
      title: "1 columns",
      description: "Insert on the page, 1 columns with the same width",
      content: '<div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12"><p>Column 1</p></div></div></div><p></p>'
    }, {
      title: "2 columns",
      description: "Insert on the page, 2 columns with the same width",
      content: '<div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-6"><p>Column 1</p></div><div class="col-xs-12 col-sm-12 col-md-6"><p>Column 2</p></div></div></div><p></p>'
    }, {
      title: "3 columns",
      description: "Insert on the page, 3 columns with the same width",
      content: '<div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-4">Column 1</div><div class="col-xs-12 col-sm-12 col-md-4">Column 2</div><div class="col-xs-12 col-sm-12 col-md-4"><p>Column 3</p></div></div></div><p></p>'
    }, {
      title: "4 columns",
      description: "Insert on the page, 4 columns with the same width",
      content: '<div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-3">Column 1</div><div class="col-xs-12 col-sm-12 col-md-3">Column 2</div><div class="col-xs-12 col-sm-12 col-md-3"><p>Column 3</p></div><div class="col-xs-12 col-sm-12 col-md-3"><p>Column 4</p></div></div></div><p></p>'
    }, {
      title: "6 columns",
      description: "Insert on the page, 6 columns with the same width",
      content: '<div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-2">Column 1</div><div class="col-xs-12 col-sm-12 col-md-2">Column 2</div><div class="col-xs-12 col-sm-12 col-md-2"><p>Column 3</p></div><div class="col-xs-12 col-sm-12 col-md-2"><p>Column 4</p></div><div class="col-xs-12 col-sm-12 col-md-2">Column 5</div><div class="col-xs-12 col-sm-12 col-md-2"><p>Column 6</p></div></div></div><p></p>'
    }]), _tinymce$init));
  }
  // init texteditor
  if ($(".texteditor").length > 0) {
    // Select2 by showing the search
    $(".select2-show-search").select2({
      minimumResultsForSearch: ""
    });
  }

  // init maps picker
  // alert($(".maps_picker").length) ;
  // if($(".maps_picker").length > 0){
  //     $(".mwz_maps_picker").each(function(){
  //         // alert(this);
  //         $(this).PlacePicker({
  //            btnClass:"btn btn-xs btn-default",
  //             key:"AIzaSyAEFLuCxU99kLoW2NB7_iQesxPuYaNSwiM",
  //             center: {lat: 17.6868, lng: 83.2185},
  //             success:function(data,address){
  //                 $(this).val(data.formatted_address);
  //             }
  //         });
  //     });
  // }
})(jQuery);
init_maps_picker = function init_maps_picker() {
  $(".maps_picker").each(function () {
    var ele = $(this);
    console.log($(ele).attr("class"));
    $(this).PlacePicker({
      btnClass: "btn btn-xs btn-default",
      key: "AIzaSyASUQHNsNID4l1HkBuawQGqaJ9rtUU-HqI",
      center: {
        lat: 13.758036276095279,
        lng: 100.56483464997967
      },
      success: function success(data, address) {
        // console.log($(this).html());
        console.log(data.currentLocation);
        console.log(data.formatted_address);
        $(ele).val(data.formatted_address);
      }
    });
  });
};
init_mwz_select2 = function init_mwz_select2() {
  if ($(".select2-show-search").length > 0) {
    console.log('.select2-show-search');
    $(".select2-show-search").select2({
      minimumResultsForSearch: ""
    });
  }
  if ($(".select2").length > 0) {
    $(".select2").select2({
      minimumResultsForSearch: Infinity
    });
  }
  if ($(".select2multiple").length > 0) {
    $(".select2multiple").select2({
      multiple: true
    });
  }
};
select2AjaxWithImage = function select2AjaxWithImage() {
  var selecter = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.select2-ajax-with-image';
  var reset = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  console.log('select2AgaxwithImage');
  $(document).find(selecter).each(function (index) {
    var _token = $('meta[name="csrf-token"]').attr("content");
    var ele = this;
    if (reset) {
      if ($(this).hasClass("select2-hidden-accessible")) {
        $(this).select2('destroy');
      }
    }
    if (!$(this).hasClass("select2-hidden-accessible")) {
      var ajax_url = $(this).data('ajax-url');
      var lang_placeholder = $(this).data('lang-placeholder');
      var lang_searching = $(this).data('lang-searching');
      var parent_val = "";
      var parent_id = $(this).data('parent-id');
      if (parent_id != "") {
        parent_val = $('#' + parent_id).val();
      }
      var $select_ele = $(this).select2({
        placeholder: lang_placeholder,
        allowClear: true,
        templateResult: formatSelect2Result,
        templateSelection: formatSelect2Selected,
        minimumInputLength: 0,
        language: {
          searching: function searching() {
            return lang_searching;
          }
        },
        ajax: {
          url: ajax_url,
          type: "POST",
          data: function data(params) {
            console.log(parent_val);
            var query = {
              search: params.term,
              parent: parent_val,
              _token: _token
            };
            return query;
          }
        }
      });
      var selected_option_id = $(this).data('selected-id');
      var selected_option_text = $(this).data('selected-text');
      var selected_option_img = $(this).data('selected-image');
      if (selected_option_id != "") {
        var data = {
          id: selected_option_id,
          text: selected_option_text,
          image: selected_option_img
        };
        var newOption = new Option(data.text, data.id, true, true);
        $(newOption).attr('data-image', data.image);
        $($select_ele).append(newOption).trigger('change');
      }
    }
  });
};
select2AjaxWithImageMultiple = function select2AjaxWithImageMultiple() {
  var selecter = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.select2-ajax-with-image-multiple';
  var reset = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  console.log('select2AjaxWithImageMultiple');
  $(document).find(selecter).each(function (index) {
    var _token = $('meta[name="csrf-token"]').attr("content");
    var ele = this;
    if (reset) {
      if ($(this).hasClass("select2-hidden-accessible")) {
        $(this).select2('destroy');
      }
    }
    if (!$(this).hasClass("select2-hidden-accessible")) {
      var ajax_url = $(this).data('ajax-url');
      var lang_placeholder = $(this).data('lang-placeholder');
      var lang_searching = $(this).data('lang-searching');
      var parent_val = "";
      var parent_id = $(this).data('parent-id');
      if (parent_id != "") {
        parent_val = $('#' + parent_id).val();
      }
      var $select_ele = $(this).select2({
        placeholder: lang_placeholder,
        allowClear: true,
        templateResult: formatSelect2Result,
        templateSelection: formatSelect2Selected,
        minimumInputLength: 0,
        multiple: true,
        language: {
          searching: function searching() {
            return lang_searching;
          }
        },
        ajax: {
          url: ajax_url,
          type: "POST",
          data: function data(params) {
            var query = {
              search: params.term,
              parent: parent_val,
              _token: _token
            };
            return query;
          }
        }
      });
      var selected_option_id = $(this).data('selected-id');
      var selected_option_text = $(this).data('selected-text');
      var selected_option_img = $(this).data('selected-image');
      if (selected_option_id != "") {
        var arr_option_id = selected_option_id.split(",");
        var arr_option_text = selected_option_text.split(",");
        var arr_option_img = selected_option_img.split(",");
        $.each(array, function (i) {
          var data = {
            id: arr_option_id[i],
            text: arr_option_text[i],
            image: arr_option_img[i]
          };
          var newOption = new Option(data.text, data.id, true, true);
          $(newOption).attr('data-image', data.image);
          $($select_ele).append(newOption).trigger('change');
        });
      }
    }
  });
};
select2AjaxTags = function select2AjaxTags() {
  var selecter = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.select2-ajax-tags';
  var reset = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  console.log('select2AjaxTags');
  $(document).find(selecter).each(function (index) {
    var _token = $('meta[name="csrf-token"]').attr("content");
    var ele = this;
    if (reset) {
      if ($(this).hasClass("select2-hidden-accessible")) {
        $(this).select2('destroy');
      }
    }
    if (!$(this).hasClass("select2-hidden-accessible")) {
      var ajax_url = $(this).data('ajax-url');
      var lang_placeholder = $(this).data('lang-placeholder');
      var lang_searching = $(this).data('lang-searching');
      var parent_val = "";
      var parent_id = $(this).data('parent-id');
      if (parent_id != "") {
        parent_val = $('#' + parent_id).val();
      }
      var $select_ele = $(this).select2({
        placeholder: lang_placeholder,
        allowClear: true,
        // templateResult: formatSelect2TagResult,
        // templateSelection: formatSelect2TagSelected,
        minimumInputLength: 0,
        multiple: true,
        tags: true,
        tokenSeparators: [','],
        language: {
          searching: function searching() {
            return lang_searching;
          }
        },
        ajax: {
          url: ajax_url,
          type: "POST",
          data: function data(params) {
            var query = {
              search: params.term,
              parent: parent_val,
              _token: _token
            };
            return query;
          }
        },
        createTag: function createTag(params) {
          console.log('createTag');
          console.log(params);
          var term = $.trim(params.term);
          if (term === '') {
            return null;
          }
          return {
            id: term,
            text: term,
            newTag: true // add additional parameters
          };
        },

        insertTag: function insertTag(data, tag) {
          console.log('insertTag');
          console.log(data);
          console.log(tag);

          // Insert the tag at the end of the results
          data.push(tag);
        }
      });
      var selected_option_id = $(this).data('selected-id');
      var selected_option_text = $(this).data('selected-text');
      if (selected_option_id != "") {
        var arr_option_id = selected_option_id.split(",");
        $.each(arr_option_id, function (i, tag) {
          var data = {
            id: tag,
            text: tag
          };
          var newOption = new Option(data.text, data.id, true, true);
          $($select_ele).append(newOption).trigger('change');
        });
      }
    }
  });
};
function formatSelect2Result(opt, container) {
  var image_url = $(opt.element).attr('data-image');
  if (typeof opt.image == 'undefined' || opt.image == "") {
    var $opt = $('<span>' + opt.text + '</span>');
  } else {
    var $opt = $('<span><img src="' + opt.image + '" class="img-flag" width="30px"/> ' + opt.text + '</span>');
  }
  return $opt;
}
;
function formatSelect2Selected(opt, container) {
  var image_url = $(opt.element).attr('data-image');
  if (typeof opt.image != 'undefined' && opt.image != '') {
    var $opt = $('<span><img src="' + opt.image + '" class="img-flag otp-img" width="30px"/> ' + opt.text + '</span>');
    return $opt;
  } else if (typeof image_url != 'undefined' && image_url != '') {
    var $opt = $('<span><img src="' + image_url + '" class="img-flag img-url" width="30px"/> ' + opt.text + '</span>');
    return $opt;
  } else {
    var $opt = $('<span>' + opt.text + '</span>');
    return $opt;
  }
}
;
function formatSelect2TagResult(opt, container) {
  opt.newTag = true;
  var image_url = $(opt.element).attr('data-image');
  if (typeof opt.image == 'undefined' || opt.image == "") {
    var $opt = $('<span>' + opt.text + '</span>');
  } else {
    var $opt = $('<span><img src="' + opt.image + '" class="img-flag" width="30px"/> ' + opt.text + '</span>');
  }
  return $opt;
}
;
function formatSelect2TagSelected(opt, container) {
  opt.newTag = true;
  var image_url = $(opt.element).attr('data-image');
  if (typeof opt.image != 'undefined') {
    var $opt = $('<span><img src="' + opt.image + '" class="img-flag" width="30px"/> ' + opt.text + '</span>');
    return $opt;
  } else if (typeof image_url != 'undefined') {
    var $opt = $('<span><img src="' + image_url + '" class="img-flag" width="30px"/> ' + opt.text + '</span>');
    return $opt;
  } else {
    var $opt = $('<span>' + opt.text + '</span>');
    return $opt;
  }
}
;
int_mwz_zipcode = function int_mwz_zipcode() {
  if ($(".mwz-zipcode").length > 0) {
    // alert('zipcode');
    $(document).find(".mwz-zipcode").each(function () {
      var frm = $(this).closest("form");
      var city = $(frm).find(".mwz-city");
      var district = $(frm).find(".mwz-district");
      var province = $(frm).find(".mwz-province");
      var zipcode = $(this);
      var address;
      var init_province;
      var init_city;
      var init_district;
      // if($(zipcode).val().length<5){
      $(zipcode).keyup(function () {
        if ($(zipcode).val().length == 5 && $.isNumeric($(zipcode).val())) {
          $.ajax({
            url: "/admin/mwz/get_address_by_zipcode/select2/" + $(zipcode).val(),
            type: "GET",
            dataType: "json",
            success: function success(data) {
              console.log(data);
              if (data.success == 1) {
                address = data.address;
                init_province = address.province[0];
                init_city = address.city[init_province.id][0];
                init_district = address.district[init_city.id][0];
                $(province).empty();
                $(province).select2({
                  data: address.province,
                  minimumResultsForSearch: "",
                  placeholder: $(province).data("placeholder")
                });
                $(province).val(init_province.id).trigger("change");
                $(city).empty();
                $(city).select2({
                  data: address.city[init_province.id],
                  minimumResultsForSearch: "",
                  placeholder: $(city).data("placeholder")
                });
                $(city).val(init_city.id).trigger("change");
                $(district).empty();
                $(district).select2({
                  data: address.district[init_city.id],
                  minimumResultsForSearch: "",
                  placeholder: $(district).data("placeholder")
                });
                $(district).val(init_district.id).trigger("change");
              } else {
                mwz_noti("error", data.msg);
                $(zipcode).val("");
                $(province).empty();
                $(city).empty();
                $(district).empty();
                return false;
              }
            }
          }).then(function () {
            $(province).on("change", function () {
              var province_id = this.value;
              init_city = address.city[province_id][0];
              init_district = address.district[init_city.id][0];
              $(city).empty();
              $(city).select2({
                data: address.city[province_id],
                minimumResultsForSearch: "",
                placeholder: $(city).data("placeholder")
              });
              $(city).val(init_city.id).trigger("change");
              $(district).empty();
              $(district).select2({
                data: address.district[init_district.id],
                minimumResultsForSearch: "",
                placeholder: $(district).data("placeholder")
              });
              $(district).val(init_district.id).trigger("change");
            });
            $(city).on("change", function () {
              var city_id = this.value;
              init_district = address.district[city_id][0];
              $(district).empty();
              $(district).select2({
                data: address.district[city_id],
                minimumResultsForSearch: "",
                placeholder: $(district).data("placeholder")
              });
              $(district).val(init_district.id).trigger("change");
            });
          });
        }
      });
      // }else{
      if ($(zipcode).val().length == 5 && $.isNumeric($(zipcode).val())) {
        $.ajax({
          url: "/admin/mwz/get_address_by_zipcode/select2/" + $(zipcode).val(),
          type: "GET",
          dataType: "json",
          success: function success(data) {
            console.log(data);
            if (data.success == 1) {
              address = data.address;
              init_province = $(province).data("selected");
              init_city = $(city).data("selected");
              init_district = $(district).data("selected");
              $(province).empty();
              $(province).select2({
                data: address.province,
                minimumResultsForSearch: "",
                placeholder: $(province).data("placeholder")
              });
              // .select2().val("0").trigger("change");
              $(province).val(init_province).trigger("change");

              // $(city).empty();
              $(city).select2({
                data: address.city[init_province],
                minimumResultsForSearch: "",
                placeholder: $(city).data("placeholder")
              });
              $(city).val(init_city).trigger("change");

              // $(district).empty();
              $(district).select2({
                data: address.district[init_city],
                minimumResultsForSearch: "",
                placeholder: $(district).data("placeholder")
              });
              $(district).val(init_district).trigger("change");
            } else {
              mwz_noti("error", data.msg);
              $(zipcode).val("");
              $(province).empty();
              $(city).empty();
              $(district).empty();
              return false;
            }
          }
        }).then(function () {
          $(province).on("change", function () {
            var province_id = this.value;
            init_city = address.city[province_id][0];
            init_district = address.district[init_city.id][0];
            $(city).empty();
            $(city).select2({
              data: address.city[province_id],
              minimumResultsForSearch: "",
              placeholder: $(city).data("placeholder")
            });
            $(city).val(init_city.id).trigger("change");
            $(district).empty();
            $(district).select2({
              data: address.district[init_district.id],
              minimumResultsForSearch: "",
              placeholder: $(district).data("placeholder")
            });
            $(district).val(init_district.id).trigger("change");
          });
          $(city).on("change", function () {
            var city_id = this.value;
            init_district = address.district[city_id][0];
            $(district).empty();
            $(district).select2({
              data: address.district[city_id],
              minimumResultsForSearch: "",
              placeholder: $(district).data("placeholder")
            });
            $(district).val(init_district.id).trigger("change");
          });
        });
      }
      // }
    });
  }
};

int_mwz_province = function int_mwz_province() {
  if ($(".mwz-province").length > 0) {
    $(document).find(".mwz-province").each(function () {
      var frm = $(this).closest("from");
      var city = $(frm).find(".mwz-city");
      var district = $(frm).find(".mwz-district");
      var province = $(this);
      $.ajax({
        url: "/mwz/get_province/select2",
        type: "GET",
        dataType: "json",
        success: function success(data) {
          $(province).select2({
            data: data,
            minimumResultsForSearch: "",
            placeholder: $(province).data("placeholder")
          });
        }
      }).then(function () {
        $(province).val($(province).data("selected")).trigger("change");
      });
    });
  }
};
int_mwz_datetimepicker = function int_mwz_datetimepicker() {
  if ($(".datetimepicker").length > 0) {
    $(".datetimepicker").datetimepicker();
  }
};
function initFileUpload() {
  if ($("input.fileUpload").length > 0) {
    $(document).find("input.fileUpload").each(function () {
      if ($(this).attr("data-active") != "true") {
        var str_to_boolean = new Array();
        str_to_boolean["false"] = false;
        str_to_boolean["true"] = true;
        var m_f_s = $(this).attr("data-maxfilesize");
        var a_f_u = $(this).attr("data-allowfile");
        var storage = $(this).attr("data-storage");
        var input = $(this);
        var input_id = $(this).attr("id");
        var input_name = $(this).attr("name");
        var data_multiple = str_to_boolean[$(this).attr("data-multiple")];
        var data_autostart = str_to_boolean[$(this).attr("data-autostart")];
        var data_target = $(this).attr("data-target");
        var data_domainid = $(this).attr("data-dmid");
        var data_browse = $(this).attr("data-browse");
        var data_array_name = $(this).attr("data-array");
        var images_key = "_images";
        var delete_key = "_delete";
        var name_prefix = "";
        var is_array = false;
        if (str_to_boolean[data_array_name] == true) {
          images_key = "[images]";
          //delete_key = "[delete]";
          name_prefix = "array_";
          is_array = true;
        }
        var uploaded_queue = 0;
        var file_uploaded = [];
        var container = '<div id="' + input_id + '_container" class="fileUploadContainer"><input name="' + input_id + delete_key + '" id="' + input_id + delete_key + '" type="hidden" value="" /><button type="button" class="btn btn-info" id="' + input_id + '_btn_upload">' + data_browse + '</button></div><div id="' + input_id + '_filelist"></div>';
        $(this).after(container);
        var uploader = new plupload.Uploader({
          runtimes: "html5,silverlight,html4",
          browse_button: input_id + "_btn_upload",
          // you can pass in id...
          multi_selection: data_multiple,
          unique_names: true,
          container: document.getElementById("container"),
          // ... or DOM Element itself
          url: "/master/multifiles/upload",
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          },
          flash_swf_url: "/plupload/js/Moxie.swf",
          silverlight_xap_url: "/plupload/js/Moxie.xap",
          filters: {
            max_file_size: m_f_s,
            mime_types: [{
              title: "Image files",
              extensions: a_f_u
            }]
          },
          init: {
            PostInit: function PostInit() {
              if (input.val() != "") {
                var img_arr = input.val().split(",");
                plupload.each(img_arr, function (path) {
                  file = path.replace(storage + "/", "");
                  var file_dot = file.split(".");
                  var chk_dot = file_dot.length - 1;
                  var filename = file_dot[0];
                  file_dot = file_dot[1];
                  var src = "";
                  var url = "{{ route('admin.master.multifiles.src') }}";
                  var _token = $('meta[name="csrf-token"]').attr("content");
                  $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                      name: path,
                      _token: _token
                    },
                    dataType: "json",
                    success: function success(data) {
                      document.getElementById(input_id + "_filelist").innerHTML += '<div id="' + filename + '" data-dot="' + file_dot + '" class="showUploadImageList" data-system="false"><img src="' + data.data.src + '" class="showUploadImg" id="img_' + filename + '" /><b class="showPercentage"></b><button class="btn btn-xs btn-danger btn-notification delete-image" id="btn_delete_' + filename + '" data-layout="top" data-type="confirm"  data-modal="true" type="button" onclick="setDeleteUploadFile(\'' + filename + "','" + file_dot + "','" + storage + "','" + input_name + "',this," + is_array + ');"><i class="icon-trash"></i></button><div style="clear:both;"></div><i class="filename"><div class="filename_block">' + (filename + "." + file_dot) + "</div></i></div>";
                    }
                  });
                });
              }
              if (data_autostart == "false") {
                document.getElementById(input_id + "_btn_upload").onclick = function () {
                  uploader.start();
                  return false;
                };
              }
            },
            FilesAdded: function FilesAdded(up, files) {
              if (data_multiple == false) {
                $(input).val("");
                $("#" + input_name + "_filelist").find("div.showUploadImageList").each(function (index, element) {
                  var file_id = $(this).attr("id");
                  var file_dot = $(this).attr("data-dot");
                  setDeleteUploadFile(file_id, file_dot, storage, input_name, $(this), is_array);
                });
              }
              plupload.each(files, function (file) {
                var file_dot = file.name.split(".");
                var chk_dot = file_dot.length - 1;
                file_dot = file_dot[chk_dot];
                document.getElementById(input_id + "_filelist").innerHTML += '<div id="' + file.id + '" data-dot="' + file_dot + '" class="showUploadImageList" data-system="false"><img src="/assets/images/admin/ajax-loader.gif" class="showUploadImg" id="img_' + file.id + '" /><b class="showPercentage"></b><button class="btn btn-xs btn-danger btn-notification delete-image" id="btn_delete_' + file.id + '" data-layout="top" data-type="confirm"  data-modal="true" type="button" onclick="setDeleteUploadFile(\'' + file.id + "','" + file_dot + "','" + storage + "','" + input_name + "',this," + is_array + ');"><i class="icon-trash"></i></button><div style="clear:both;"></div><i class="filename"><div class="filename_block">' + file.name + " (" + plupload.formatSize(file.size) + ")</div></i></div>";
              });
              if (data_autostart == "true" || data_autostart === true) {
                uploader.start();
              }
            },
            UploadProgress: function UploadProgress(up, file) {
              document.getElementById(file.id).getElementsByTagName("b")[0].innerHTML = "<span>" + file.percent + "%</span>";
            },
            UploadComplete: function UploadComplete(up, file) {
              $("#" + input_id + "_filelist").sortable({
                placeholder: "sort-image-placeholder",
                delay: 200
              });
              // auto sort file when uplaod complete
              var sort_list = [];
              $("#" + input_id + "_filelist").find("div.showUploadImageList").each(function (index, element) {
                sort_list.push(storage + "/" + $(this).attr("id") + "." + $(this).attr("data-dot"));
              });
              $(input).val(sort_list.join(","));
              // sort file by drag&drop
              $("#" + input_id + "_filelist").bind("sortstop", function (event, ui) {
                var sort_list = [];
                $(this).find("div.showUploadImageList").each(function (index, element) {
                  sort_list.push(storage + "/" + $(this).attr("id") + "." + $(this).attr("data-dot"));
                });
                $(input).val(sort_list.join(","));
              });
            },
            FileUploaded: function FileUploaded(up, file, info) {
              var file_dot = file.name.split(".");
              var chk_dot = file_dot.length - 1;
              var file_name = file.id + file_dot;
              var obj = JSON.parse(info.response);
              // var src = storagePath + file_name;
              var src = "";
              var url = "{{ route('admin.master.multifiles.src') }}";
              var _token = $('meta[name="csrf-token"]').attr("content");
              $.ajax({
                type: "POST",
                url: url,
                data: {
                  name: obj.src,
                  _token: _token
                },
                dataType: "json",
                success: function success(data) {
                  $("#" + file.id).find("img.showUploadImg").attr("src", data.data.src);
                  $("#" + file.id).find("img.showUploadImg").addClass("completed");
                  $("#" + file.id).find("b.showPercentage").hide();
                  // var input_arr = '<input type="hidden" name="'+name_prefix+input_name+images_key+'['+file.id+']" id="uploaded_image_'+file.id+'" value="'+encodeURI(obj.result)+'"  class="'+name_prefix+input_id+'_images" />';
                  // $(input).after(input_arr);
                }
              });
            },

            Error: function Error(up, err) {
              console.log("Error #" + err.code + ": " + err.message);
            }
          }
        });
        // clr
        uploader.init();
        input.attr("data-active", "true");
      }
    });
  }
}
function setDeleteUploadFile(file, dot, storage, input, ui, is_array) {
  var del_input = '<input type="hidden" name="del_image_' + input + '[]" value="' + storage + "/" + file + "." + dot + '"/>';
  $("form").append(del_input);
  $("#" + file).remove();
}
function setSaveMultifile(frm) {
  event.preventDefault();
  var frm_data = new FormData($("#master_multifile_frm")[0]);
  $.ajax({
    url: "/master/multifiles/save",
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
        window.location.href = "/admin/master/multifiles/";
      } else {
        mwz_noti("error", resp.msg);
      }
    }
  });
}
function slug(str) {
  str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, " ").toLowerCase();
  str = str.replace(/^\s+|\s+$/gm, "");
  str = str.replace(/\s+/g, "-");
  return str;
}
JsReload = function JsReload(time) {
  setInterval(function () {
    window.location.reload();
  }, time);
};
JsRedirect = function JsRedirect(url, time) {
  setInterval(function () {
    window.location.replace(url);
  }, time);
};
JsReloadTable = function JsReloadTable(table) {
  $("#" + table).DataTable().ajax.reload(null, false);
};
DeleteImage = function DeleteImage(db, column, id, type) {
  bootbox.confirm({
    message: "ยืนยันการลบ? <br> เมื่อดำเนินการแล้วจะไม่สามารถย้อนกลับได้!",
    buttons: {
      confirm: {
        label: "ยืนยัน",
        className: "btn-dark"
      },
      cancel: {
        label: "ยกเลิก",
        className: "btn-default"
      }
    },
    callback: function callback(result) {
      if (result) {
        var _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
          url: "/admin/mwz/delete-image",
          type: "POST",
          data: {
            db: db,
            column: column,
            id: id,
            type: type,
            _token: _token
          },
          success: function success(resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              JsReload(1500);
            } else {
              mwz_noti("error", resp.msg);
              JsReload(1500);
            }
          }
        });
      }
    }
  });
};

/* ----------------------- Customs ------------------------*/
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

///* ----------------------- tab init active  ------------------------*/
set_content_tab_init = function set_content_tab_init() {
  console.log('set_content_tab_init');
  if ($(".tab_wrapper").length > 0) {
    $(".tab_wrapper").each(function () {
      var ele_id = $(this).attr("id");
      var mode = $(this).data("mode");
      var $this = $(this);
      var activeTab = localStorage.getItem(ele_id + "_activeTab");
      console.log('set_content_tab_init:' + mode);
      if (mode == 'edit') {
        if (activeTab) {
          var active = parseInt(activeTab) + 1;
          $(this).champ({
            active_tab: active
          });
        } else {
          $(this).champ();
        }
      } else {
        $(this).champ();
      }

      // store last active tab
      $(this).find(".tab_list li").each(function () {
        $(this).bind("click", function () {
          localStorage.setItem(ele_id + "_activeTab", $(this).index());
        });
      });
    });
  }
};
set_nav_tab_init = function set_nav_tab_init() {
  if ($(".nav.panel-tabs").length > 0) {
    $(".nav.panel-tabs").each(function () {
      var ele_id = $(this).attr("id");
      var mode = $(this).data("mode");
      console.log('set_nav_tab_init:' + mode);
      // if(mode=='edit'){
      $('a[data-toggle="tab"]').on("show.bs.tab", function (e) {
        localStorage.setItem(ele_id + "_activeTab", $(e.target).attr("href"));
      });
      var activeTab = localStorage.getItem(ele_id + "_activeTab");
      if (activeTab) {
        $("#" + ele_id + ' a[href="' + activeTab + '"]').tab("show");
      }
      // }
    });
  }
};

function delete_uploaded_image(ele, id) {
  var confirm_del_txt = $(ele).data("confirm-del-txt");
  var confirm_txt = $(ele).data("confirm-txt");
  var cancel_txt = $(ele).data("cancel-txt");
  var upload_click_to_upload_txt = $(ele).data("upload-click-to-upload-txt");
  // alert('delete_uploaded_image'+id);

  bootbox.confirm({
    message: confirm_del_txt,
    buttons: {
      confirm: {
        label: confirm_txt,
        className: "btn-success"
      },
      cancel: {
        label: cancel_txt,
        className: "btn-danger"
      }
    },
    callback: function callback(result) {
      if (result) {
        $(ele).parents("div.image-upload").find(".upload_show_img_container").html('<div class="d-upload-image"><i class="ion-upload"></i><p><b>' + upload_click_to_upload_txt + "</b></p></div>");
        $(ele).removeClass("display-block");
        $(ele).addClass("display-none");
        $("#upload_image" + id).val("");
        $("#upload_image" + id + "_del").val(1);
      }
    }
  });
}
function init_mwz_upload() {
  if ($(".mwz-image-upload").length > 0) {
    $(".mwz-image-upload").each(function () {
      var data_id = $(this).data("id");
      var upload_light_gallery = $(this).find(".upload_lightgallery");
      var file_input = $(this).find('input[type="file"]')[0];
      file_input.onchange = function (evt) {
        var _file_input$files = _slicedToArray(file_input.files, 1),
          file = _file_input$files[0];
        var url = URL.createObjectURL(file);
        if (file) {
          $(".upload_image" + data_id + " .dz-message").html("<img id=\"blah\" class=\"img-upload\" src=\"".concat(URL.createObjectURL(file), "\" alt=\"image not available\" />"));
          $("#btn_delete" + data_id).removeClass("display-none");
          $("#btn_delete" + data_id).addClass("display-block");
        }
      };

      // $("#btn_delete" + data_id).click(function() {
      //   delete_uploaded_image($(this), 1);
      // });
      $("#btn_delete" + data_id).bind("click", function () {
        // alert('BIND CLICK'+data_id);
        delete_uploaded_image($(this), data_id);
      });
      if (upload_light_gallery.length > 0) {
        lightGallery(upload_light_gallery);
      }
    });
  }
}
function init_mwz_multi_upload() {
  var all_dropzone = {};
  $('.dropzone').each(function () {
    var this_dropzone = this;
    var this_form = $(this).closest('form');
    var action = $(this).data('action');
    var acceptedFiles = $(this).data('accepted-files');
    var paramName = $(this).data('param-name');
    var maxFiles = $(this).data('max-file');
    var uploadMsg = $(this).data('upload-msg');
    var removeMsg = $(this).data('remove-msg');
    var maxFileMsg = $(this).data('max-file-msg');
    var thumbnailPath = $(this).data('thumbnail-path');
    var files_list = [];
    if ($(this_dropzone).find('input.file_list').val() != "") {
      var files_list = JSON.parse($(this_dropzone).find('input.file_list').val());
    }

    // console.log('init_mwz_multi_upload');
    // console.log(action);
    // console.log(paramName);

    var current_drop_zone = {};
    current_drop_zone['element'] = $(this_dropzone).dropzone({
      url: action,
      previewTemplate: document.getElementById('preview-template').innerHTML,
      autoProcessQueue: false,
      acceptedFiles: acceptedFiles,
      addRemoveLinks: true,
      uploadMultiple: true,
      parallelUploads: 5,
      maxFiles: maxFiles,
      paramName: paramName,
      dictDefaultMessage: '<i class="ion-upload"></i> ' + uploadMsg,
      dictRemoveFile: '<i class="fa fa-trash"></i> ' + removeMsg,
      dictMaxFilesExceeded: maxFileMsg,
      init: function init() {
        myDropZone = this;
        current_drop_zone['object'] = myDropZone;
        var container = myDropZone.element;
        $(container).attr('data-image-cnt', 0);
        var file_removed = [];

        // add element to form 
        this.on("addedfile", function (file, responseText) {
          var cnt = $(this_dropzone).find('div.dz-preview').length - 1;
          if (cnt <= maxFiles) {
            console.log(cnt + ' - ' + maxFiles);
            $(file.previewElement).attr("id", 'file_' + cnt);
            $(file.previewElement).find('input').each(function () {
              var name = paramName + '_' + $(this).data('name') + "[" + cnt + "]";
              var id = paramName + '_' + $(this).data('name') + "_" + cnt;
              $(this).attr("name", name);
              $(this).attr("id", id);
              if (typeof file[$(this).data('name')] != 'undefined') {
                $(this).val(file[$(this).data('name')]);
              }
            });
          } else {
            this.removeFile(file);
          }
        });
        this.on("maxfilesexceeded", function (file, responseText) {
          this.removeFile(file);
        });

        // add element to form 
        this.on('sendingmultiple', function (data, xhr, formData) {
          var $form = $(this_form).serializeArray();
          for (var i = 0; i < $form.length; i++) {
            formData.append($form[i].name, $form[i].value);
          }
        });
        this.on("removedfile", function (file) {
          // console.log('removedfile');
          // console.log(file);
          // console.log(responseText);
          if (file.complete) {
            file_removed.push(file.image);
          } else {
            file_removed.push(file.name);
          }
          $(this_dropzone).find('input.file_removed').val(JSON.stringify(file_removed));
        });
        this.on("completemultiple", function (file, responseText) {
          console.log('completemultiple');
          // console.log(file);
          // console.log(responseText);
        });

        this.on("queuecomplete", function (file, responseText) {
          console.log('queuecomplete');
          // console.log(file);
          // console.log(responseText);
        });

        // init file
        if (files_list.length > 0) {
          $.each(files_list, function (index, mockFile) {
            var cnt = $(this_dropzone).find('div.dz-preview').length;
            if (cnt <= maxFiles) {
              // console.log(cnt+' - '+maxFiles); 
              myDropZone.emit("addedfile", mockFile);
              myDropZone.emit("thumbnail", mockFile, thumbnailPath + mockFile.image);
              myDropZone.emit("complete", mockFile);
            }
          });
        }
      }
    });
    $(this_dropzone).sortable({
      items: '.dz-preview',
      cursor: 'move',
      opacity: 0.5,
      containment: 'parent',
      distance: 20,
      tolerance: 'pointer',
      stop: function stop() {
        var queue = myDropZone.files;
        newQueue = [];
        $('.dropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
          var name = el.innerHTML;
          queue.forEach(function (file) {
            if (file.name === name) {
              newQueue.push(file);
            }
          });
        });
        myDropZone.files = newQueue;

        // resort file in list
        var file_sort = [];
        $(this_dropzone).find('div.dz-preview').each(function (index) {
          var img = {};
          img["complete"] = $(this).hasClass('dz-complete');
          if (img["complete"]) {
            var name = $(this).find(".dz-image").find('img').attr('src');
          } else {
            var name = $(this).find("span[data-dz-name]").html();
          }
          img["image"] = name;
          img["index"] = index;
          $(this).find('input').each(function () {
            img[$(this).data('name')] = $(this).val();
          });
          file_sort.push(img);
        });
        $(this_dropzone).find('input.file_list').val(JSON.stringify(file_sort));
      }
    });
    MULTI_UPLOAD[paramName] = current_drop_zone;
  });
}
mwz_multi_upload_process = function mwz_multi_upload_process(upload_element, parent_resp) {
  // update file list before send
  console.log('multi_upload_process');
  console.log(upload_element);
  var myDropZone = upload_element['element'];
  var this_dropzone = upload_element['object'];
  var file_sort = [];
  $(myDropZone).find('div.dz-preview').each(function (index) {
    var img = {};
    img["complete"] = $(this).hasClass('dz-complete');
    if (img["complete"]) {
      var name = $(this).find(".dz-image").find('img').attr('src');
    } else {
      var name = $(this).find("span[data-dz-name]").html();
    }
    img["image"] = name;
    img["index"] = index;
    $(this).find('input').each(function () {
      img[$(this).data('name')] = $(this).val();
    });
    file_sort.push(img);
  });
  console.log(file_sort);
  $(myDropZone).find('input.file_list').val(JSON.stringify(file_sort));

  // upload file 
  if (this_dropzone.getQueuedFiles().length > 0) {
    this_dropzone.processQueue();
  } else {
    multiFileUploadCallBack({}, parent_resp);
  }

  // upload finish
  this_dropzone.on("successmultiple", function (file, resp) {
    console.log('successmultiple');
    console.log(file);
    console.log(resp);
    if ($.isFunction(multiFileUploadCallBack)) {
      console.log('call back multiFileUploadCallBack');
      multiFileUploadCallBack(file, resp);
    } else {
      console.log('not call back multiFileUploadCallBack');
    }
  });
};
mwzGenerateMatadata = function mwzGenerateMatadata() {
  var force = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
  var langs = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : ['th', 'en'];
  var slug_field = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'name';
  var title_field = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 'name';
  var keywords_field = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 'name';
  var desc_field = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 'desc';
  $.each(langs, function (index, lang) {
    if (force) {
      var data_slug = slug($('#' + slug_field + '_' + lang).val());
      $('#metadata_' + lang + '_slug').val(data_slug);
      $('#metadata_' + lang + '_title').val($('#' + title_field + '_' + lang).val());
      $('#metadata_' + lang + '_keywords').val($('#' + keywords_field + '_' + lang).val());
      // + $('#' + desc_field + '_' + lang).val()
      $('#metadata_' + lang + '_description').val($('#' + title_field + '_' + lang).val() + ' ');
    } else {
      if ($('#metadata_' + lang + '_slug').val() == '') {
        var data_slug = slug($('#' + slug_field + '_' + lang).val());
        $('#metadata_' + lang + '_slug').val(data_slug);
      }
      if ($('#metadata_' + lang + '_title').val() == '') {
        $('#metadata_' + lang + '_title').val($('#' + title_field + '_' + lang).val());
      }
      if ($('#metadata_' + lang + '_keywords').val() == '') {
        $('#metadata_' + lang + '_keywords').val($('#' + keywords_field + '_' + lang).val());
      }
      if ($('#metadata_' + lang + '_description').val() == '') {
        // + $('#' + desc_field + '_' + lang).val()
        $('#metadata_' + lang + '_description').val($('#' + title_field + '_' + lang).val() + ' ');
      }
    }
  });
};
init_mwz_filebrowse = function init_mwz_filebrowse() {
  if ($(".mwz-file-browse").length > 0) {
    $(".mwz-file-browse").each(function () {
      $(this).bind('click', function () {
        var url = $(this).data('url');
        var target_id = $(this).data('target-id');
        var preview_id = $(this).data('preview-id');
        $('<div id="' + target_id + '_finder" /></div>').insertAfter(this);
        dialog = $('<div id="' + target_id + '_finder"  />').dialogelfinder({
          customData: {
            _token: $('meta[name="csrf-token"]').attr("content")
          },
          url: url,
          width: "900",
          height: "450",
          commandsOptions: {
            getfile: {
              oncomplete: 'destroy'
            }
          },
          getFileCallback: function getFileCallback(file) {
            console.log(file);
            $('#' + target_id).val(file.url);
            if (typeof preview_id != 'undefined' && preview_id != '') {
              $('#' + preview_id).attr('src', file.url);
            }
          } // pass callback to file manager
        });
      });
    });
  }
};

/***/ }),

/***/ 2:
/*!******************************************!*\
  !*** multi ./Resources/assets/js/app.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Mwz\Resources\assets\js\app.js */"./Resources/assets/js/app.js");


/***/ })

/******/ });