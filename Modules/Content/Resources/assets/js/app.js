$(document).ready(function () {
    // init for table all
    initContentDatatable();
  });
  
  // =========================  content =========================== //
  initContentDatatable = function () {
    if ($("#content-datatable").length > 0) {
      var type = $("#content-datatable").data("type");
  
      var column = [];
      column.push({ data: "sequence", searchable: false });
  
      if ($_config.image) {
        column.push({ data: "image", orderable: false, searchable: false });
      }
      column.push({ data: "name_th" });
    //   column.push({ data: "sort" });
      column.push({ data: "updated_at" });
      column.push({ data: "action", orderable: false, searchable: false });
      console.log(column);
  
      oTable = $("#content-datatable").DataTable({
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
          url: "/admin/content/" + type + "/datatable_ajax",
        },
        columns: column,
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
          url: "/admin/content/set_re_order",
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
  
  ReloadContentTable = function () {
    $("#content-datatable").DataTable().ajax.reload(null, false);
  };
  
  setUpdateStatus = function (id, status) {
    event.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr("content");
    var type = $("#content-datatable").data("type");
    $.ajax({
      url: "/admin/content/set_status",
      type: "POST",
      data: {
        id: id,
        status: status,
        _token: _token,
      },
      success: function (resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          ReloadContentTable();
        } else {
          mwz_noti("error", resp.msg);
          ReloadContentTable();
        }
      },
    });
  };
  
  setDelete = function (id) {
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
          event.preventDefault();
          let _token = $('meta[name="csrf-token"]').attr("content");
          $.ajax({
            url: "/admin/content/set_delete",
            type: "POST",
            data: {
              id: id,
              _token: _token,
            },
            success: function (resp) {
              if (resp.success) {
                mwz_noti("success", resp.msg);
                ReloadContentTable();
              } else {
                mwz_noti("error", resp.msg);
                ReloadContentTable();
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
        if ($_config.detail) {
          rules.detail_th = { required: true };
          rules.detail_en = { required: true };
        }
        if ($_config.desc) {
          rules.desc_th = { required: true, maxlength: 500 };
          rules.desc_en = { required: true, maxlength: 500 };
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
      success: function (resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          window.location.href = "/admin/content/" + resp.data_type;
        } else {
          mwz_noti("error", resp.msg);
        }
      },
    });
  };
  
  DeleteImage = function (type) {
    var id = $("#id").val();
    bootbox.confirm({
      message: $_LANG.confirm.delete_image,
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
            url: "/admin/content/delete_image",
            type: "POST",
            data: {
              id: id,
              type: type,
              _token: _token,
            },
            success: function (resp) {
              if (resp.success) {
                mwz_noti("success", resp.msg);
                window.location.href = "/admin/content/"+resp.data_type+"/edit/" + id;
              } else {
                mwz_noti("error", resp.msg);
              }
            },
          });
        }
      },
    });
  };
  
  DeleteFile = function (type, id) {
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
          let _token = $('meta[name="csrf-token"]').attr("content");
          $.ajax({
            url: "/admin/content/delete_file",
            type: "POST",
            data: {
              id: id,
              type: type,
              _token: _token,
            },
            success: function (resp) {
              if (resp.success) {
                mwz_noti("success", resp.msg);
                window.location.href = "/admin/content/edit/" + id;
              } else {
                mwz_noti("error", resp.msg);
              }
            },
          });
        }
      },
    });
  };
  
  setUpdateSort = function (id, move) {
    event.preventDefault();
  
    var _token = $('meta[name="csrf-token"]').attr("content");
  
    $.ajax({
      url: "/admin/content/sort",
      type: "POST",
      data: {
        id: id,
        move: move,
        _token: _token,
      },
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (resp) {
        ReloadContentTable();
      },
    });
  };
  