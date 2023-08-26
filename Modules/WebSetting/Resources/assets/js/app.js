
$(document).ready(function() {
  // init for news
  initDatatable();
  initTagDatatable();
});

// =========================  news =========================== //

initDatatable = function() {
  if ($("#slug-datatable").length > 0) {
    oTable = $("#slug-datatable").DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
        url: "/admin/websetting/slug/datatable_ajax",
      },
      columns: [
        { data: "id", orderable: true, searchable: false },
        { data: "level" },
        { data: "slug" },
        { data: "module" },
        { data: "method" },
        { data: "data_id" },
        { data: "action", orderable: false, searchable: false },
      ],
    });
  }
};

initTagDatatable = function() {
  if ($("#tag-datatable").length > 0) {
    oTable = $("#tag-datatable").DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
        url: "/admin/websetting/tag/datatable_ajax",
      },
      columns: [
        { data: "id", orderable: true, searchable: false },
        { data: "type" },
        // { data: "head" },
        { data: "action", orderable: false, searchable: false },
      ],
    });
  }
};

ReloadDataTable = function() {
  $("#slug-datatable")
    .DataTable()
    .ajax.reload(null, false);
  $("#tag-datatable")
    .DataTable()
    .ajax.reload(null, false);
};
setSave = function() {
  event.preventDefault();
  tinyMCE.triggerSave();

  var frm_data = new FormData($("#setting_frm")[0]);

  $.ajax({
    url: "/admin/websetting/save",
    type: "POST",
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    success: function(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        window.location.href = "/admin/websetting/edit";
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};

setSavePrivacy = function() {
  event.preventDefault();
  tinyMCE.triggerSave();

  var frm_data = new FormData($("#privacy_frm")[0]);

  $.ajax({
    url: "/admin/websetting/save_privacy",
    type: "POST",
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    beforeSend: function(xhr) {
      if ($("#privacy_frm").valid()) {
        return $("#privacy_frm").valid();
      } else {
        mwz_noti("error", resp.msg);
        return $("#privacy_frm").valid();
      }
    },
    success: function(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        window.location.href = "/admin/websetting/form_privacy/1";
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};

JsReload = function(time) {
  setInterval(function() {
    window.location.reload();
  }, time);
};

JsRedirect = function(url, time) {
  setInterval(function() {
    window.location.replace(url);
  }, time);
};

setSlugSave = function() {
  event.preventDefault();
  tinyMCE.triggerSave();

  var frm_data = new FormData($("#slug_frm")[0]);

  $.ajax({
    url: "/admin/websetting/slug/save",
    type: "POST",
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    success: function(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        window.location.href = "/admin/websetting/slug/index";
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};

setSlugDelete = function(id) {
  bootbox.confirm({
    message: "ยืนยันลบ ?",
    buttons: {
      confirm: {
        label: "ตกลง",
        className: "btn-success",
      },
      cancel: {
        label: "ยกเลิก",
        className: "btn-danger",
      },
    },
    callback: function(result) {
      if (result) {
        event.preventDefault();
        let _token = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
          url: "/admin/websetting/slug/set_delete",
          type: "POST",
          data: {
            id: id,
            _token: _token,
          },
          success: function(resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              ReloadDataTable();
            } else {
              mwz_noti("error", resp.msg);
            }
          },
        });
      }
    },
  });
};

setTagSave = function() {
  event.preventDefault();
  tinyMCE.triggerSave();

  var frm_data = new FormData($("#tag_frm")[0]);

  $.ajax({
    url: "/admin/websetting/tag/save",
    type: "POST",
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    success: function(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        window.location.href = "/admin/websetting/tag/index";
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};

setTagDelete = function(id) {
  bootbox.confirm({
    message: "ยืนยันลบ ?",
    buttons: {
      confirm: {
        label: "ตกลง",
        className: "btn-success",
      },
      cancel: {
        label: "ยกเลิก",
        className: "btn-danger",
      },
    },
    callback: function(result) {
      if (result) {
        event.preventDefault();
        let _token = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
          url: "/admin/websetting/tag/set_delete",
          type: "POST",
          data: {
            id: id,
            _token: _token,
          },
          success: function(resp) {
            if (resp.success) {
              mwz_noti("success", resp.msg);
              ReloadDataTable();
            } else {
              mwz_noti("error", resp.msg);
            }
          },
        });
      }
    },
  });
};
setTagStatus = function(id, status) {
  event.preventDefault();
  let _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/admin/websetting/tag/set_status",
    type: "POST",
    data: {
      id: id,
      status: status,
      _token: _token,
    },
    success: function(resp) {
      if (resp.success) {
        mwz_noti("success", resp.msg);
        ReloadDataTable();
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};
