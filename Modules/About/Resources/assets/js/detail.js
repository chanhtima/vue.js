
$(document).ready(function () {
    // init for banner
    // initDatatable(); // Init dropify remove image event
  
    // initDropifyRemoveEvent(); //tab inti
  
    if ($('.first_tab').length > 0) {
      $(".first_tab").champ();
    }
  });
  
  setSaveDetail = function setSaveDetail() {
    event.preventDefault();
    tinyMCE.triggerSave();
    var frm_data = new FormData($('#about_detail_frm')[0]);
    $.ajax({
      url: "/admin/about/detail/save",
      type: "POST",
      contentType: false,
      data: frm_data,
      processData: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function beforeSend(xhr) {
        if ($("#about_detail_frm").valid()) {
          return $("#about_detail_frm").valid();
        } else {
          mwz_noti('error', resp.msg);
          return $("#about_detail_frm").valid();
        }
      },
      success: function success(resp) {
        if (resp.success) {
          mwz_noti('success', resp.msg);
          window.location.href = '/admin/about/detail/';
        } else {
          mwz_noti('error', resp.msg);
          document.getElementById(resp.focus).focus();
        }
      }
    });
  };

  DeleteImage = function () {
    var id = $("#id").val();
    bootbox.confirm({
      message: "ยืนยันการลบ ?",
      buttons: {
        confirm: {
          label: 'ตกลง',
          className: "btn-success",
        },
        cancel: {
          label: 'ยกเลิก',
          className: "btn-danger",
        },
      },
      callback: function (result) {
        if (result) {
          let _token = $('meta[name="csrf-token"]').attr("content");
          $.ajax({
            url: "/admin/about/detail/delete_image",
            type: "POST",
            data: {
              id: id,
              _token: _token,
            },
            success: function (resp) {
              if (resp.success) {
                mwz_noti("success", resp.msg);
                window.location.href = "/admin/about/detail";
              } else {
                mwz_noti("error", resp.msg);
              }
            },
          });
        }
      },
    });
  };