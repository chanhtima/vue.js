$(document).ready(function() {
    // init for banner
    initDatatable();
  });

  initDatatable = function() {
    if ($("#banner_ads-datatable").length > 0) {
      oTable = $("#banner_ads-datatable").DataTable({
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
          url: "/admin/banner/ads/datatable_ajax",
        },
        columns: [
          { data: "sequence", orderable: true, searchable: false },
          { data: "image", orderable: false, searchable: false },
          { data: "name_th", orderable: true },
          { data: "category_id", orderable: true },
          { data: "updated_at", orderable: true },
          { data: "action", orderable: false, searchable: false },
        ],
        language: $_LANG.datatable,
      });
  
      oTable.on("row-reorder", function(e, diff, edit) {
        var moving = {};
        $.each(diff, function(key, row) {
          console.log(key + ": " + row + "position" + row.newPosition);
          var rowData = oTable.row(row.node).data();
          moving[rowData.id] = row.newData;
        });
        var sort_json = JSON.stringify(moving);
  
        let _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
          url: "/admin/banner/ads/set_re_order",
          type: "POST",
          data: {
            sort_json: sort_json,
            _token: _token,
          },
          success: function(resp) {
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

setSave = function() {
    event.preventDefault();
    tinyMCE.triggerSave();
  
    var frm_data = new FormData($("#banner_ads_frm")[0]);
  
    $.ajax({
      url: "/admin/banner/ads/save",
      type: "POST",
      contentType: false,
      data: frm_data,
      processData: false,
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      beforeSend: function(xhr) {
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
        mwz_frm_validate($("#banner_ads_frm"), rules, messages);
        var check_valid = $("#banner_ads_frm").valid();
  
        if (check_valid) {
          return check_valid;
        } else {
          mwz_noti("error", $_LANG.validate.error);
          return check_valid;
        }
      },
      success: function(resp) {
        if (resp.success) {
          mwz_noti("success", resp.msg);
          window.location.href = "/admin/banner/ads";
        } else {
          mwz_noti("error", resp.msg);
        }
      },
    });
  };

  setUpdateStatus = function(id, status) {
    event.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr("content");
  
    $.ajax({
      url: "/admin/banner/ads/set_status",
      type: "POST",
      data: {
        id: id,
        status: status,
        _token: _token,
      },
      success: function(resp) {
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

  setReloadDataTable = function() {
    $("#banner_ads-datatable")
      .DataTable()
      .ajax.reload(null, false);
  };