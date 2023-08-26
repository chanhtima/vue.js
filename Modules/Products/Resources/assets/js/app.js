$(document).ready(function () {
    // init for product
    initDatatable();
  
    // init for product category
    initCategoryDatatable();
    initBrandDatatable();
  
    // $("#related_product").on('change',function(){
    //   let _token = $('meta[name="csrf-token"]').attr("content");
    //     $.ajax({
    //       url: "/admin/product/list/set_related_product",
    //       type: "POST",
    //       data: {
    //         related_product: $(this).val(),
    //         _token: _token,
    //       },
    //       success: function (resp) {
    //           $("#show_ralated_product").html(resp.res);
    //       },
    //     });
    // });
  
    if ($(".select2multiple").length > 0) {
      $(".select2multiple").select2({
        multiple: true,
        maximumSelectionLength: 4,
      });
    }
    // search_category_brand
    $("#tags").keyup(function(){
      let _token = $('meta[name="csrf-token"]').attr("content");
      $.ajax({
        url: "/admin/product/list/search_category_brand",
        type: "POST",
        data: {
          s: $(this).val(),
          _token: _token,
        },
        
        success: function (resp) {
          if (resp.success) {
            // $( "#tags" ).autocomplete({
            //   source: resp.res,
            //   minLength: 1,
            // })
          //   .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
          //     return $( "<li>" )
          //     .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
          //     .appendTo( ul );
          //  };
  
          $( "#tags" ).autocomplete({
            minLength: 0,
            source: resp.res,
            focus: function( event, ui ) {
               $( "#tags" ).val( ui.item.label );
                  return false;
            },
            select: function( event, ui ) {
               $( "#tags" ).val( ui.item.label );
               $( "#project-id" ).val( ui.item.value );
               $( "#project-description" ).html( ui.item.desc );
               return false;
            }
         })
     
         .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
            .appendTo( ul );
         };
  
          }
        },
        
      });
    })
   
  });
  
  
  
  // =========================  product =========================== //
  
  initDatatable = function () {
    if ($("#product-datatable").length > 0) {
      oTable = $("#product-datatable").DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        rowReorder: {
          dataSrc: "sort",
        },
        columnDefs: [
          { orderable: true, className: "reorder", targets: 0 },
          { orderable: false, targets: "_all" },
        ],
        ajax: {
          url: "/admin/product/list/datatable_ajax",
        },
        columns: [
          { data: "sort", orderable: true, searchable: false },
          { data: "images", orderable: false },
          { data: "name_th", orderable: true },
          { data: "updated_at", orderable: true },
          { data: "action", orderable: false, searchable: false },
        ],
        language: $_LANG.datatable,
      });
  
      oTable.on("row-reorder", function (e, diff, edit) {
        var moving = {};
        $.each(diff, function (key, row) {
          console.log(key + ": " + row + "position" + row.newPosition);
          var rowData = oTable.row(row.node).data();
          moving[rowData.id] = row.newData;
        });
        var sort_json = JSON.stringify(moving);
  
        let _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
          url: "/admin/product/list/set_re_order",
          type: "POST",
          data: {
            sort_json: sort_json,
            _token: _token,
          },
          success: function (resp) {
            if (resp.success) {
              setReloadDataTable();
            } else {
              mwz_noti("error", resp.msg);
            }
          },
        });
      });
    }
  };
  
  setReloadDataTable = function () {
    $("#product-datatable")
      .DataTable()
      .ajax.reload(null, false);
    $("#categroy-datatable")
      .DataTable()
      .ajax.reload(null, false);
    $("#brand-datatable")
      .DataTable()
      .ajax.reload(null, false);
  };
  
  setSort = function (id, old_val, new_val) {
    if (new_val == "") {
      $(".input-sort-" + id).val(old_val);
    }
    if (old_val == new_val || new_val == "") {
      return false;
    }
    event.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
      url: "/admin/product/list/set_sort",
      type: "POST",
      data: {
        id: id,
        old_val: old_val,
        new_val: new_val,
        _token: _token,
      },
      success: function (resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          window.location.reload();
        } else {
          mwz_noti("error", resp.msg);
          setReloadDataTable();
        }
      },
    });
  };
  
  setUpdateStatus = function (id, status) {
    event.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr("content");
  
    $.ajax({
      url: "/admin/product/list/set_status",
      type: "POST",
      data: {
        id: id,
        status: status,
        _token: _token,
      },
      success: function (resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          setReloadDataTable();
        } else {
          mwz_noti("error", resp.msg);
          setReloadDataTable();
        }
      },
    });
  };
  
  setUpdateMenuFooter = function (id,status){
    event.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr("content");
  
    $.ajax({
      url: "/admin/product/category/set_status_menu_footer",
      type: "POST",
      data: {
        id: id,
        status: status,
        _token: _token,
      },
      success: function (resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          setReloadDataTable();
        } else {
          mwz_noti("error", resp.msg);
          setReloadDataTable();
        }
      },
    });
  };
  
  
  
  setDelete = function (id) {
    bootbox.confirm({
      message: $_LANG.confirm.delete,
      buttons: {
        confirm: {
          label: $_LANG.confirm.ok,
          className: "btn-success",
        },
        cancel: {
          label: $_LANG.confirm.cancel,
          className: "btn-danger",
        },
      },
      callback: function (result) {
        if (result) {
          event.preventDefault();
          let _token = $('meta[name="csrf-token"]').attr("content");
  
          $.ajax({
            url: "/admin/product/list/set_delete",
            type: "POST",
            data: {
              id: id,
              status: status,
              _token: _token,
            },
            success: function (resp) {
              if (resp.success) {
                mwz_noti("success", resp.msg);
                setReloadDataTable();
              } else {
                mwz_noti("error", resp.msg);
                setReloadDataTable();
              }
            },
          });
        }
      },
    });
  };
  
  setSave = function () {
    event.preventDefault();
    tinyMCE.triggerSave();
    var frm_data = new FormData($("#product_frm")[0]);
    $.ajax({
      url: "/admin/product/list/save",
      type: "POST",
      contentType: false,
      data: frm_data,
      processData: false,
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      beforeSend: function (xhr) {
        var rules = {
          name_en: {
            required: true,
            maxlength: 500,
          },
          name_th: {
            required: true,
            maxlength: 500,
          },
        };
  
        var messages = $_LANG.validate.message;
  
        mwz_frm_validate($("#product_frm"), rules, messages);
        var check_valid = $("#product_frm").valid();
  
        if (check_valid) {
          return check_valid;
        } else {
          mwz_noti("error", $_LANG.validate.error);
          return check_valid;
        }
      },
      success: function (resp) {
        if (resp.success) {
          console.log(resp);
          mwz_noti("success", resp.msg);
          window.location.href = "/admin/product/list/";
          $("#product_id").val(resp.id);
          // mwz_multi_upload_process(MULTI_UPLOAD['image_multi'], resp);
        } else {
          mwz_noti("error", resp.msg);
        }
      },
    });
  };
  // =========================  category =========================== //
  
  initCategoryDatatable = function () {
    if ($("#categroy-datatable").length > 0) {
      oTable = $("#categroy-datatable").DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        rowReorder: {
          dataSrc: "sequence",
        },
        columnDefs: [
          { orderable: true, className: "reorder", targets: 0 },
          { orderable: false, targets: "_all" },
        ],
        ajax: {
          url: "/admin/product/category/datatable_ajax",
        },
        columns: [
          { data: "sequence", orderable: true, searchable: false },
          { data: "image", orderable: false },
          { data: "name_th", orderable: true },
          { data: "name_en", orderable: true },
          { data: "updated_at", orderable: true },
          { data: "action", orderable: false, searchable: false },
        ],
        language: $_LANG.datatable,
      });
  
      oTable.on("row-reorder", function (e, diff, edit) {
        var moving = {};
        $.each(diff, function (key, row) {
          console.log(key + ": " + row + "position" + row.newPosition);
          var rowData = oTable.row(row.node).data();
          moving[rowData.id] = row.newData;
        });
        var sort_json = JSON.stringify(moving);
  
        let _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
          url: "/admin/product/category/set_re_order",
          type: "POST",
          data: {
            sort_json: sort_json,
            _token: _token,
          },
          success: function (resp) {
            if (resp.success) {
              setReloadDataTable();
            } else {
              mwz_noti("error", resp.msg);
            }
          },
        });
      });
    }
  };
  
  
  
  
  setUpdateCategoryStatus = function (category_id, status) {
    event.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr("content");
  
    $.ajax({
      url: "/admin/product/category/set_status",
      type: "POST",
      data: {
        category_id: category_id,
        status: status,
        _token: _token,
      },
      success: function (resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          setReloadDataTable();
        } else {
          mwz_noti("error", resp.msg);
          setReloadDataTable();
        }
      },
    });
  };
  
  setDeleteCategory = function (category_id) {
    bootbox.confirm({
      message: $_LANG.confirm.delete,
      buttons: {
        confirm: {
          label: $_LANG.confirm.ok,
          className: "btn-success",
        },
        cancel: {
          label: $_LANG.confirm.cancel,
          className: "btn-danger",
        },
      },
      callback: function (result) {
        if (result) {
          event.preventDefault();
          let _token = $('meta[name="csrf-token"]').attr("content");
  
          $.ajax({
            url: "/admin/product/category/set_delete",
            type: "POST",
            data: {
              category_id: category_id,
              status: status,
              _token: _token,
            },
            success: function (resp) {
              if (resp.success) {
                mwz_noti("success", resp.msg);
                setReloadDataTable();
              } else {
                mwz_noti("error", resp.msg);
                setReloadDataTable();
              }
            },
          });
        }
      },
    });
  };
  
  setSaveCategory = function (frm) {
    event.preventDefault();
    tinyMCE.triggerSave();
  
    var frm_data = new FormData($("#category_frm")[0]);
  
    $.ajax({
      url: "/admin/product/category/save",
      type: "POST",
      contentType: false,
      data: frm_data,
      processData: false,
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      beforeSend: function (xhr) {
        var rules = {
          name_en: {
            required: true,
            maxlength: 500,
          },
          name_th: {
            required: true,
            maxlength: 500,
          },
        };
  
        var messages = $_LANG.validate.message;
  
        mwz_frm_validate($("#category_frm"), rules, messages);
        var check_valid = $("#category_frm").valid();
  
        if (check_valid) {
          return check_valid;
        } else {
          mwz_noti("error", $_LANG.validate.error);
          return check_valid;
        }
      },
      success: function (resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          window.location.href = "/admin/product/category";
        } else {
          mwz_noti("error", resp.msg);
        }
      },
    });
  };
  
  // =========================  Brand =========================== //
  
  initBrandDatatable = function () {
    if ($("#brand-datatable").length > 0) {
      oTable = $("#brand-datatable").DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        rowReorder: {
          dataSrc: "sequence",
        },
        columnDefs: [
          { orderable: true, className: "reorder", targets: 0 },
          { orderable: false, targets: "_all" },
        ],
        ajax: {
          url: "/admin/product/brand/datatable_ajax",
        },
        columns: [
          { data: "sequence", orderable: true, searchable: false },
          { data: "image", orderable: false },
          { data: "name_th", orderable: true },
          { data: "name_en", orderable: true },
          { data: "category_id", orderable: true },
          { data: "updated_at", orderable: true },
          { data: "action", orderable: false, searchable: false },
        ],
        language: $_LANG.datatable,
      });
  
      oTable.on("row-reorder", function (e, diff, edit) {
        var moving = {};
        $.each(diff, function (key, row) {
          console.log(key + ": " + row + "position" + row.newPosition);
          var rowData = oTable.row(row.node).data();
          moving[rowData.id] = row.newData;
        });
        var sort_json = JSON.stringify(moving);
  
        let _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
          url: "/admin/product/brand/set_re_order",
          type: "POST",
          data: {
            sort_json: sort_json,
            _token: _token,
          },
          success: function (resp) {
            if (resp.success) {
              setReloadDataTable();
            } else {
              mwz_noti("error", resp.msg);
            }
          },
        });
      });
    }
  }
  
  setSaveBrand = function (frm) {
    event.preventDefault();
    tinyMCE.triggerSave();
  
    var frm_data = new FormData($("#brand_frm")[0]);
  
    $.ajax({
      url: "/admin/product/brand/save",
      type: "POST",
      contentType: false,
      data: frm_data,
      processData: false,
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      beforeSend: function (xhr) {
        var rules = {
          name_en: {
            required: true,
            maxlength: 500,
          },
          name_th: {
            required: true,
            maxlength: 500,
          },
        };
  
        var messages = $_LANG.validate.message;
  
        mwz_frm_validate($("#brand_frm"), rules, messages);
        var check_valid = $("#brand_frm").valid();
  
        if (check_valid) {
          return check_valid;
        } else {
          mwz_noti("error", $_LANG.validate.error);
          return check_valid;
        }
      },
      success: function (resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          window.location.href = "/admin/product/brand";
        } else {
          mwz_noti("error", resp.msg);
        }
      },
    });
  };
  
  setUpdateBrandStatus = function (id,status){
    event.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr("content");
  
    $.ajax({
      url: "/admin/product/brand/set_status",
      type: "POST",
      data: {
        id: id,
        status: status,
        _token: _token,
      },
      success: function (resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          setReloadDataTable();
        } else {
          mwz_noti("error", resp.msg);
          setReloadDataTable();
        }
      },
    });
  };
  
  setฺฺBrandDelete = function (id){
      bootbox.confirm({
        message: $_LANG.confirm.delete,
        buttons: {
          confirm: {
            label: $_LANG.confirm.ok,
            className: "btn-success",
          },
          cancel: {
            label: $_LANG.confirm.cancel,
            className: "btn-danger",
          },
        },
        callback: function (result) {
          if (result) {
            event.preventDefault();
            let _token = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
              url: "/admin/product/brand/set_delete",
              type: "POST",
              data: {
                id: id,
                status: status,
                _token: _token,
              },
              success: function (resp) {
                if (resp.success) {
                  mwz_noti("success", resp.msg);
                  setReloadDataTable();
                } else {
                  mwz_noti("error", resp.msg);
                  setReloadDataTable();
                }
              },
            });
          }
        },
      });
  };
  
  
  multiFileUploadCallBack = function (file, resp) {
    console.log('image success');
    console.log(resp);
    if (resp.success) {
      mwz_noti("success", resp.msg);
      window.location.href = "/admin/product/list";
    } else {
      mwz_noti("error", resp.msg);
    }
  }
  
  DeleteImage = function (image_id) {
    var id = $("#product_id").val();
    console.log($(id));
    bootbox.confirm({
      message: $_LANG.confirm.delete_resource,
      buttons: {
        confirm: {
          label: $_LANG.confirm.ok,
          className: "btn-success",
        },
        cancel: {
          label: $_LANG.confirm.cancel,
          className: "btn-danger",
        },
      },
      callback: function (result) {
        if (result) {
          let _token = $('meta[name="csrf-token"]').attr("content");
          $.ajax({
            url: "/admin/product/list/delete_image",
            type: "POST",
            data: {
              id: id,
              image_id: image_id,
              _token: _token,
            },
            success: function (resp) {
              if (resp.success) {
                mwz_noti("success", resp.msg);
                window.location.href = "/admin/product/list/edit/" + id;
              } else {
                mwz_noti("error", resp.msg);
              }
            },
          });
        }
      },
    });
  };