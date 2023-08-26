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

/***/ "./Resources/assets/js/app.item.js":
/*!*****************************************!*\
  !*** ./Resources/assets/js/app.item.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  if ($(".dropify").length > 0) {
    var drEvent = $(".dropify").dropify();
    drEvent.on("dropify.afterClear", function (event, element) {
      var form = $(element.element.form);
      var input = '<input type="hidden" name="delete_' + element.element.name + '" value="1"/>';
      form.append(input);
    });
  }
  $("body").on("click", "#add-new-image", addNewImage);
  $("body").on("click", ".btn-remove-image", removeImage);
  $("#new_tag_th").on("keyup", function (e) {
    if (e.key === "Enter" || e.keyCode === 13) {
      addNewTag(this.value, "th");
    }
  });
  $("#new_tag_en").on("keyup", function (e) {
    if (e.key === "Enter" || e.keyCode === 13) {
      addNewTag(this.value, "en");
    }
  });

  // add color
  $(".frm-color .circle-btn-addmore span.badge").click(function () {
    $(".color-choosen").removeClass("edit");
    $(".size-choosen").removeClass("edit");
    $("#color_name").val("");
    $(".frm-size .circle-btn-addmore").not(this).removeClass("added");
    $(".frm-color .circle-btn-addmore").toggleClass("added");
  });

  // add size
  $(".frm-size .circle-btn-addmore span.badge").click(function () {
    $(".color-choosen").removeClass("edit");
    $(".size-choosen").removeClass("edit");
    $("#size_name").val("");
    $(".frm-color .circle-btn-addmore").not(this).removeClass("added");
    $(".frm-size .circle-btn-addmore").toggleClass("added");
  });
  $(document).click(function (event) {
    if (!($(event.target).parents().hasClass("edit") || $(event.target).parents().hasClass("added"))) {
      // close form by click outter form
      if (!$(event.target).closest(".contain-data-box").length) {
        $(".color-choosen").removeClass("edit");
        $(".size-choosen").removeClass("edit");
        $(".circle-btn-addmore").removeClass("added");
      }
    } else {
      // open form
      if ($(event.target).hasClass("edit-color")) {
        if ($(event.target).parents().hasClass("edit")) {
          $(".color-choosen").not($(event.target).parents()).removeClass("edit");
          $(".size-choosen").removeClass("edit");
          $(".circle-btn-addmore").removeClass("added");
        } else {
          $(".color-choosen").not($(event.target).parents()).removeClass("edit");
          $(".size-choosen").removeClass("edit");
          $(".circle-btn-addmore").removeClass("added");
        }
      } else if ($(event.target).hasClass("edit-size")) {
        if ($(event.target).parents().hasClass("edit")) {
          $(".color-choosen").removeClass("edit");
          $(".size-choosen").not($(event.target).parents()).removeClass("edit");
          $(".circle-btn-addmore").removeClass("added");
        } else {
          $(".color-choosen").removeClass("edit");
          $(".size-choosen").not($(event.target).parents()).removeClass("edit");
          $(".circle-btn-addmore").removeClass("added");
        }
      }
    }
  });
});
addColor = function addColor() {
  var name = $("#color_name").val();
  var code = $("#color_code").val();
  if (name == "") {
    mwz_noti("error", "กรุณากรอกชื่อสี");
    $("#color_name").focus();
    return false;
  }
  var count = $(".color-input-group").data("color-count") + 1;
  var icon = '<div id="show-color-' + count + '" class="circle-badge color-choosen choosen" style="background-color:' + code + ';"><span class="badge"><ez>' + name + '</ez> <i onclick="colorInit(' + count + ',this);" class="fa fa-pencil edit-color pl-2" ></i> <i onclick="deleteColor(' + count + ',this);" class="fa fa-times-circle delete-color" ></i></span><div class="contain-data-box"></div></div>';
  var input = '<input type="hidden" class="color_input" name="color[' + count + ']" id="input_color_' + count + '" data-color-id="' + count + '" value="' + name + "," + code + "," + count + '" />';
  $(".color-icon-group").append(icon);
  $(".color-input-group").append(input);
  $(".frm-color .circle-btn-addmore").removeClass("added");
  $(".color-input-group").data("color-count", count);
  setPrice();
  setStock();
};
colorInit = function colorInit(id, ui) {
  var name = $("#input_color_" + id).val().split(",")[0];
  var code = $("#input_color_" + id).val().split(",")[1];
  var html = "<div>";
  html += ' <div class="form-group input-group mb-2 color-name">';
  html += '   <div class="input-group-prepend">';
  html += '     <span class="input-group-text" id="basic-addon1">name</span>';
  html += "   </div>";
  html += '    <input type="text" name="edit_color_name_' + id + '" placeholder="' + name + '" value="' + name + '">';
  html += " </div>";
  html += ' <div class="form-group input-group mb-2 color-code">';
  html += '   <div class="input-group-prepend">';
  html += '     <span class="input-group-text" id="basic-addon1">color</span>';
  html += "   </div>";
  html += '    <input type="color" class="form-control" name="edit_color_code_' + id + '" placeholder="#000000" value="' + code + '">';
  html += " </div>";
  html += "</div>";
  html += " <div>";
  html += '   <div class="form-group mb-2 color-edit">';
  html += '           <button type="button" onclick="editColor(' + id + ');" class="badge btn btn-primary"><i class="fa fa-plus"></i> Edit</button>';
  html += "       </div>";
  html += "   </div>";
  $("#show-color-" + id + " .contain-data-box").html(html);
  $("#show-color-" + id + " .contain-data-box").addClass("mt-2 mb-2 border rounded p-2");
  $("#show-color-" + id).toggleClass("edit");
};
editColor = function editColor(id) {
  var name = $('input[name="edit_color_name_' + id + '"]').val();
  var code = $('input[name="edit_color_code_' + id + '"]').val();
  $("#input_color_" + id).val(name + "," + code + "," + id);
  $("#show-color-" + id + " ez").html(name);
  $("#show-color-" + id).css("background-color", code);
  setPrice();
  setStock();
  $("#show-color-" + id).toggleClass("edit");
  $("#show-color-" + id + " .contain-data-box").html("");
  $("#show-color-" + id + " .contain-data-box").removeClass("mt-2 mb-2 border rounded p-2");
};
deleteColor = function deleteColor(id, element) {
  var name = $("#input_color_" + id).val().split(",")[0];
  bootbox.confirm({
    size: "small",
    message: "คุณต้องการลบสี " + name + " หรือไม่ ?",
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
        $("#input_color_" + id).remove();
        element.closest("div").remove();
        setPrice();
        setStock();
      }
    }
  });
};
addSize = function addSize() {
  var name = $("#size_name").val();
  if (name == "") {
    mwz_noti("error", "กรุณากรอกชื่อไซส์");
    $("#size_name").focus();
    return false;
  }
  var count = $(".size-input-group").data("size-count") + 1;
  var icon = '<div id="show-size-' + count + '" class="circle-badge size-choosen choosen"><span class="badge"><ez>' + name + '</ez> <i onclick="sizeInit(' + count + ',this);" class="fa fa-pencil edit-size pl-2" ></i> <i onclick="deleteSize(' + count + ',this);" class="fa fa-times-circle delete-color" ></i></span><div class="contain-data-box"></div></div>';
  var input = '<input type="hidden" class="size_input" name="size[' + count + ']" id="input_size_' + count + '" data-size-id="' + count + '" value="' + name + "," + count + '" />';
  $(".size-icon-group").append(icon);
  $(".size-input-group").append(input);
  $(".frm-size .circle-btn-addmore").removeClass("added");
  $(".size-input-group").data("size-count", count);
  setPrice();
  setStock();
};
sizeInit = function sizeInit(id, ui) {
  var name = $("#input_size_" + id).val().split(",")[0];
  var html = '<div class="form-group input-group mb-2 size-name">';
  html += '   <div class="input-group-prepend">';
  html += '     <span class="input-group-text" id="basic-addon1">size</span>';
  html += "   </div>";
  html += '       <input type="text" class="form-control m-0" name="edit_size_name_' + id + '" placeholder="' + name + '" value="' + name + '">';
  html += "   </div>";
  html += '   <div class="form-group mb-2 size-edit">';
  html += '       <button type="button" onclick="editSize(' + id + ');" class="badge btn btn-primary"><i class="fa fa-plus"></i> Edit</button>';
  html += "   </div>";
  $("#show-size-" + id + " .contain-data-box").html(html);
  $("#show-size-" + id + " .contain-data-box").addClass("mt-2 mb-2 border rounded p-2");
  $("#show-size-" + id).toggleClass("edit");
};
editSize = function editSize(id) {
  var name = $('input[name="edit_size_name_' + id + '"]').val();
  $("#input_size_" + id).val(name + "," + id);
  $("#show-size-" + id + " ez").html(name);
  setPrice();
  setStock();
  $("#show-size-" + id).toggleClass("edit");
  $("#show-size-" + id + " .contain-data-box").html("");
  $("#show-size-" + id + " .contain-data-box").removeClass("mt-2 mb-2 border rounded p-2");
};
deleteSize = function deleteSize(id, element) {
  var name = $("#input_size_" + id).val().split(",")[0];
  bootbox.confirm({
    size: "small",
    message: "คุณต้องการลบขนาด " + name + " หรือไม่ ?",
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
        $("#input_size_" + id).remove();
        element.closest("div").remove();
        setPrice();
        setStock();
      }
    }
  });
};
addNewImage = function addNewImage() {
  var count = $("#add-new-image").data("count") + 1;
  var html = '<div class="col-md-4 pt-4 box-image">';
  html += '<input type="file" name="uploadfiles[' + count + ']" class="dropify" data-default-file="" />';
  html += '<label class="form-label pt-2">ชื่อภาพ (TH)</label>';
  html += '<input type="text" class="form-control" name="uploadfilesName_th[' + count + ']" placeholder="ชื่อภาพ" value="">';
  html += '<label class="form-label pt-2">ชื่อภาพ (EN)</label>';
  html += '<input type="text" class="form-control" name="uploadfilesName_en[' + count + ']" placeholder="ชื่อภาพ" value="">';
  html += '<button type="botton" class="btn btn-danger btn-remove-image"><i class="fa fa-trash"></i></button>';
  html += "</div>";
  $(".group-image").append(html);
  var drEvent2 = $(".dropify").dropify();
  drEvent2.on("dropify.afterClear", function (event, element) {
    var form = $(element.element.form);
    var input = '<input type="hidden" name="delete_' + element.element.name + '" value="1"/>';
    form.append(input);
  });
  $("#add-new-image").data("count", count);
};
removeImage = function removeImage(input) {
  var this_box = $(this);
  bootbox.confirm({
    size: "small",
    message: "คุณต้องการลบรูปภาพนี้หรือไม่ ?",
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
        var form = $("form");
        var input = '<input type="hidden" name="delete_' + this_box.data("input") + '" value="1"/>';
        form.append(input);
        this_box.closest(".box-image").remove();
      }
    }
  });
};
setPrice = function setPrice() {
  var temp_price = $("#body_manage_price");
  var colors = $(".color_input");
  var sizes = $(".size_input");
  var table_price = "";
  var color_name = "-";
  var color_code = "";
  var color_id = "c0";
  var size_name = "-";
  var size_id = "s0";
  var currency = $("#priceCur").val();
  var discount_type = $("#discountType").val();
  var member_discount_type = $("#memberDiscountType").val();
  if (colors.length > 0) {
    $.each(colors, function (color) {
      var data = $(this).val().split(",");
      color_name = data[0];
      color_code = data[1];
      color_id = "c" + data[2];
      if (sizes.length > 0) {
        $.each(sizes, function (size) {
          var data = $(this).val().split(",");
          size_name = data[0];
          size_id = "s" + data[1];
          table_price += createManagePrice(color_id, color_name, color_code, size_id, size_name, currency, temp_price, discount_type, member_discount_type);
        });
      } else {
        table_price += createManagePrice(color_id, color_name, color_code, size_id, size_name, currency, temp_price, discount_type, member_discount_type);
      }
    });
  } else {
    if (sizes.length > 0) {
      $.each(sizes, function (size) {
        var data = $(this).val().split(",");
        size_name = data[0];
        size_id = "s" + data[1];
        table_price += createManagePrice(color_id, color_name, color_code, size_id, size_name, currency, temp_price, discount_type, member_discount_type);
      });
    }
  }
  $("#body_manage_price").html(table_price);
};
createManagePrice = function createManagePrice(color_id, color_name, color_code, size_id, size_name, currency, temp_price, discount_type, member_discount_type) {
  var np = "",
    dc = "",
    mnp = "",
    mdc = "",
    dc_txt = {
      0: "จำนวนเงิน",
      1: "เปอร์เซ็น"
    };
  if (temp_price.find("#normal_price_" + color_id + "_" + size_id).length > 0) {
    np = $("#normal_price_" + color_id + "_" + size_id).val();
  }
  if (temp_price.find("#discount_price_" + color_id + "_" + size_id).length > 0) {
    dc = $("#discount_price_" + color_id + "_" + size_id).val();
  }
  if (temp_price.find("#member_normal_price_" + color_id + "_" + size_id).length > 0) {
    mnp = $("#member_normal_price_" + color_id + "_" + size_id).val();
  }
  if (temp_price.find("#member_discount_price_" + color_id + "_" + size_id).length > 0) {
    mdc = $("#member_discount_price_" + color_id + "_" + size_id).val();
  }
  table_price = '<tr class="row_manage_price" id="row_manage_price_' + color_id + "_" + size_id + '">';
  table_price += "<td>" + color_name + ' <i class="fa fa-square" style="color: ' + color_code + ';"></i></td>';
  table_price += "<td>" + size_name + "</td>";
  table_price += "<td>";
  table_price += '<div class="form-group frm-nPrice">';
  table_price += '<input type="number" min="0" class="form-control normal_price" placeholder="ราคาปกติ" name="normal_price_' + color_id + "_" + size_id + '" id="normal_price_' + color_id + "_" + size_id + '" value="' + np + '">';
  table_price += "</div>";
  table_price += "</td>";
  table_price += "<td>";
  table_price += '<div class="form-group frm-dPrice">';
  table_price += '<input type="number" min="0" class="form-control discount_price" placeholder="ส่วนลดปกติ" name="discount_price_' + color_id + "_" + size_id + '" id="discount_price_' + color_id + "_" + size_id + '" value="' + dc + '">';
  table_price += "</div>";
  table_price += "</td>";
  table_price += '<td class="manage_discount_type">' + dc_txt[discount_type] + "</td>";
  table_price += "<td>";
  table_price += '<div class="form-group frm-mnPrice">';
  table_price += '<input type="number" min="0" class="form-control member_normal" placeholder="ราคาสมาชิก" name="member_normal_price_' + color_id + "_" + size_id + '" id="member_normal_price_' + color_id + "_" + size_id + '" value="' + mnp + '">';
  table_price += "</div>";
  table_price += "</td>";
  table_price += "<td>";
  table_price += '<div class="form-group frm-mdPrice">';
  table_price += '<input type="number" min="0" class="form-control member_discount" placeholder="ส่วนลดสมาชิก" name="member_discount_price_' + color_id + "_" + size_id + '" id="member_discount_price_' + color_id + "_" + size_id + '" value="' + mdc + '">';
  table_price += "</div>";
  table_price += "</td>";
  table_price += '<td class="manage_member_discount_type">' + dc_txt[member_discount_type] + "</td>";
  table_price += '<td class="manage_price_currency">' + currency + "</td>";
  table_price += "</tr>";
  return table_price;
};
setCurrency = function setCurrency(val) {
  $(".manage_price_currency").html(val);
};
setDiscountType = function setDiscountType(val) {
  var dc_txt = {
    0: "จำนวนเงิน",
    1: "เปอร์เซ็น"
  };
  $(".manage_discount_type").html(dc_txt[val]);
};
setMemberDiscountType = function setMemberDiscountType(val) {
  var dc_txt = {
    0: "จำนวนเงิน",
    1: "เปอร์เซ็น"
  };
  $(".manage_member_discount_type").html(dc_txt[val]);
};
setStock = function setStock() {
  var temp_stock = $("#body_manage_stock");
  var colors = $(".color_input");
  var sizes = $(".size_input");
  var table_stock = "";
  var color_name = "-";
  var color_code = "";
  var color_id = "c0";
  var size_name = "-";
  var size_id = "s0";
  if (colors.length > 0) {
    $.each(colors, function (color) {
      var data = $(this).val().split(",");
      color_name = data[0];
      color_code = data[1];
      color_id = "c" + data[2];
      if (sizes.length > 0) {
        $.each(sizes, function (size) {
          var data = $(this).val().split(",");
          size_name = data[0];
          size_id = "s" + data[1];
          table_stock += createManageStock(color_id, color_name, color_code, size_id, size_name, temp_stock);
        });
      } else {
        table_stock += createManageStock(color_id, color_name, color_code, size_id, size_name, temp_stock);
      }
    });
  } else {
    if (sizes.length > 0) {
      $.each(sizes, function (size) {
        var data = $(this).val().split(",");
        size_name = data[0];
        size_id = "s" + data[1];
        table_stock += createManageStock(color_id, color_name, color_code, size_id, size_name, temp_stock);
      });
    }
  }
  $("#body_manage_stock").html(table_stock);
};
createManageStock = function createManageStock(color_id, color_name, color_code, size_id, size_name, temp_stock) {
  var sku = "",
    bc = "",
    qu = "";
  if (temp_stock.find("#sku_" + color_id + "_" + size_id).length > 0) {
    sku = $("#sku_" + color_id + "_" + size_id).val();
  }
  if (temp_stock.find("#barcode_" + color_id + "_" + size_id).length > 0) {
    bc = $("#barcode_" + color_id + "_" + size_id).val();
  }
  if (temp_stock.find("#quantity_" + color_id + "_" + size_id).length > 0) {
    qu = $("#quantity_" + color_id + "_" + size_id).val();
  }
  table_stock = '<tr class="row_manage_stock" id="row_manage_stock_' + color_id + "_" + size_id + '">';
  table_stock += "<td>" + color_name + ' <i class="fa fa-square" style="color: ' + color_code + ';"></i></td>';
  table_stock += "<td>" + size_name + "</td>";
  table_stock += "<td>";
  table_stock += '<div class="form-group frm-sku">';
  table_stock += '<input type="text" class="form-control" placeholder="SKU" name="sku_' + color_id + "_" + size_id + '" id="sku_' + color_id + "_" + size_id + '" value="' + sku + '">';
  table_stock += "</div>";
  table_stock += "</td>";
  table_stock += "<td>";
  table_stock += '<div class="form-group frm-barcode">';
  table_stock += '<input type="text" class="form-control" placeholder="Barcode" name="barcode_' + color_id + "_" + size_id + '" id="barcode_' + color_id + "_" + size_id + '" value="' + bc + '">';
  table_stock += "</div>";
  table_stock += "</td>";
  table_stock += "<td>";
  table_stock += '<div class="form-group frm-quantity">';
  table_stock += '<input type="number" min="0" class="form-control" placeholder="จำนวนสินค้า" name="quantity_' + color_id + "_" + size_id + '" id="quantity_' + color_id + "_" + size_id + '" value="' + qu + '">';
  table_stock += "</div>";
  table_stock += "</td>";
  table_stock += "<td>";
  return table_stock;
};
pickVendor = function pickVendor(value) {
  if (value == "0") {
    return false;
  }
  var new_vendor = value.split(",");
  var all_vendor;
  if ($("#vendors").val() == "") {
    all_vendor = new_vendor[0];
    var show_vendor = '<span class="tag" > ' + new_vendor[1] + " <i onclick=\"deleteVendor('" + new_vendor[1] + "'," + new_vendor[0] + ',this);" class="fa fa-times-circle delete-vendor" ></i></span>';
    $(".vendor-group").append(show_vendor);
    $("#vendors").val(all_vendor);
    // $('#vendor').val('0').trigger('change');
  } else {
    all_vendor = $("#vendors").val().split(","); // explode
    var check = true;
    $.each(all_vendor, function (key, val) {
      if (val == new_vendor[0]) {
        check = false;
      }
    });
    if (check == true) {
      all_vendor.push(new_vendor[0]);
      all_vendor.join(); // implode
      var _show_vendor = '<span class="tag" > ' + new_vendor[1] + " <i onclick=\"deleteVendor('" + new_vendor[1] + "'," + new_vendor[0] + ',this);" class="fa fa-times-circle delete-vendor" ></i></span>';
      $(".vendor-group").append(_show_vendor);
      $("#vendors").val(all_vendor);
      // $('#vendor').val('0').trigger('change');
    } else {
      console.log("this vandor has already");
    }
  }
  $("#vendor").val("0").trigger("change");
};
deleteVendor = function deleteVendor(value, id, element) {
  bootbox.confirm({
    size: "small",
    message: "คุณต้องการลบผู้จัดจำหน่าย " + value + " หรือไม่ ?",
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
        var all_vendor = $("#vendors").val().split(",");
        var new_vendor = [];
        $.each(all_vendor, function (key, val) {
          if (val != id) {
            new_vendor.push(val);
          }
        });
        new_vendor.join();
        $("#vendors").val(new_vendor);
        element.closest("span").remove();
        // $('#vendor').val('0').trigger('change');
      }
    }
  });
};

pickLabel = function pickLabel(value) {
  if (value == "0") {
    return false;
  }
  var new_label = value.split(",");
  var all_label;
  if ($("#labels").val() == "") {
    all_label = new_label[0];
    var show_label = '<span class="tag" > ' + new_label[1] + " <i onclick=\"deleteLabel('" + new_label[1] + "'," + new_label[0] + ',this);" class="fa fa-times-circle delete-label" ></i></span>';
    $(".label-group").append(show_label);
    $("#labels").val(all_label);
    // $('#label').val('0').trigger('change');
  } else {
    all_label = $("#labels").val().split(","); // explode
    var check = true;
    $.each(all_label, function (key, val) {
      if (val == new_label[0]) {
        check = false;
      }
    });
    if (check == true) {
      all_label.push(new_label[0]);
      all_label.join(); // implode
      var _show_label = '<span class="tag" > ' + new_label[1] + " <i onclick=\"deleteLabel('" + new_label[1] + "'," + new_label[0] + ',this);" class="fa fa-times-circle delete-label" ></i></span>';
      $(".label-group").append(_show_label);
      $("#labels").val(all_label);
      // $('#label').val('0').trigger('change');
    } else {
      console.log("this vandor has already");
    }
  }
  $("#label").val("0").trigger("change");
};
deleteLabel = function deleteLabel(value, id, element) {
  bootbox.confirm({
    size: "small",
    message: "คุณต้องการลบป้ายสินค้า " + value + " หรือไม่ ?",
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
        var all_label = $("#labels").val().split(",");
        var new_label = [];
        $.each(all_label, function (key, val) {
          if (val != id) {
            new_label.push(val);
          }
        });
        new_label.join();
        $("#labels").val(new_label);
        element.closest("span").remove();
        // $('#vendor').val('0').trigger('change');
      }
    }
  });
};

addNewTag = function addNewTag(tag, lang) {
  if (tag == "") {
    return false;
  }
  var all_tag;
  if ($("#tags_" + lang).val() == "") {
    all_tag = tag;
    var show_tag = '<span class="tag" > ' + tag + " <i onclick=\"deleteTag('" + lang + "','" + tag + '\',this);" class="fa fa-times-circle delete-tag" ></i></span>';
    $(".show-name-tags-" + lang).append(show_tag);
    $("#tags_" + lang).val(all_tag);
    $("#new_tag_" + lang).val("");
  } else {
    all_tag = $("#tags_" + lang).val().split(","); // explode
    var check = true;
    $.each(all_tag, function (key, val) {
      if (val == tag) {
        check = false;
      }
    });
    if (check == true) {
      all_tag.push(tag);
      all_tag.join(); // implode
      var _show_tag = '<span class="tag" > ' + tag + " <i onclick=\"deleteTag('" + lang + "','" + tag + '\',this);" class="fa fa-times-circle delete-tag" ></i></span>';
      $(".show-name-tags-" + lang).append(_show_tag);
      $("#tags_" + lang).val(all_tag);
      $("#new_tag_" + lang).val("");
    } else {
      console.log("this tag has already");
    }
  }
};
deleteTag = function deleteTag(lang, tag, element) {
  bootbox.confirm({
    size: "small",
    message: "คุณต้องการลบแท็ก " + tag + " หรือไม่ ?",
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
        var all_tag = $("#tags_" + lang).val().split(",");
        var new_tag = [];
        $.each(all_tag, function (key, val) {
          if (val != tag) {
            new_tag.push(tag);
          }
        });
        new_tag.join();
        $("#tags_" + lang).val(new_tag);
        element.closest("span").remove();
      }
    }
  });
};
if ($("#selected_products").length > 0) {
  var element = document.getElementById("selected_products");
  var selected_products = new Sortable(element, {
    animation: 150
  });
}
showUnselectProducts = function showUnselectProducts() {
  if ($.fn.dataTable.isDataTable("#unselect-product-datatable")) {
    oTable.destroy();
  }
  initUngroupProductsDatatable();
  $("#ModalUnselectProducts").modal("toggle");
};
setSelectProducts = function setSelectProducts(id) {
  // $('#btn_add_'+id).prop("onclick", null).off("click");
  $("#btn_add_" + id).hide();
  $("#btn_added_" + id).fadeIn();
  var html = '<li id="added_product_' + id + '" class="list-group-item selected-product" data-id="' + id + '"><div class="label-image">' + $(".product-image-" + id).html() + '</div><div class="label-name">' + $(".product-name-" + id).html() + "</div>" + '<a id="btn_added_' + id + '" onclick="removeSelectProducts(' + id + ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></li>';
  $("#selected_products").append(html);
  mwz_noti("success", "add product to group success");
};

/***/ }),

/***/ 2:
/*!***********************************************!*\
  !*** multi ./Resources/assets/js/app.item.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\template2.mwz\Modules\Products\Resources\assets\js\app.item.js */"./Resources/assets/js/app.item.js");


/***/ })

/******/ });