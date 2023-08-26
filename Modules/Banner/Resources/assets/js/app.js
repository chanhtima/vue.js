$(document).ready(function() {
  // init for banner
  initDatatable();
  $("#category_id").on('change',function(){
    console.log($(this).val());
    var category_id = $(this).val();
    if(category_id == 4){
         $(".inlineurlVideo").addClass('d-none');
        //  $(".vdo_banner").addClass('d-none');
    }else{
      $(".inlineurlVideo").removeClass('d-none');
      // $(".vdo_banner").removeClass('d-none');
    }
  })
});

// =========================  banner ======================================= //
initDatatable = function() {
  if ($("#banner-datatable").length > 0) {
    oTable = $("#banner-datatable").DataTable({
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
        url: "/admin/banner/datatable_ajax",
      },
      columns: [
        { data: "sequence", orderable: true, searchable: false },
        { data: "image", orderable: false, searchable: false },
        { data: "name_th", orderable: true },
        { data: "category_id", orderable: true ,searchable: false },
        { data: "sequence", orderable: true },
        { data: "updated_at", orderable: true,searchable: false  },
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
        url: "/admin/banner/set_re_order",
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

setReloadDataTable = function() {
  $("#banner-datatable")
    .DataTable()
    .ajax.reload(null, false);
};

setUpdateStatus = function(id, status) {
  event.preventDefault();
  let _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/admin/banner/set_status",
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

setDelete = function(id) {
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
    callback: function(result) {
      if (result) {
        event.preventDefault();
        let _token = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
          url: "/admin/banner/set_delete",
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
      }
    },
  });
};
setSave = function() {
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
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    beforeSend: function(xhr) {
      var rules = {
        category_id: {
          required: true,
        },
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
      mwz_frm_validate($("#banner_frm"), rules, messages);
      var check_valid = $("#banner_frm").valid();

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
        window.location.href = "/admin/banner/index";
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};

/* ---------------------------------------------------------------------------------------------------- Customs ----------------------------------------------------------*/
// input only number and . point
InputValidateString = function(evt) {
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
ChkImageOrVdo = function(type){
    // 1 => 'image'
    // 2 => 'vdo'
  if(type == 1){
    $(".vdo_banner").addClass("d-none");
    $(".image_banner").removeClass("d-none");
  }else{
    $(".image_banner").addClass('d-none')
    $(".vdo_banner").removeClass("d-none");
  }
  $("#type").val(type);
}

DeleteImage = function () {
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
          url: "/admin/banner/delete_image",
          type: "POST",
          data: {
            id: id,
            _token: _token,
          },
          success: function (resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              window.location.href = "/admin/banner/edit/" + id;
            } else {
              mwz_noti("error", resp.msg);
            }
          },
        });
      }
    },
  });
};
