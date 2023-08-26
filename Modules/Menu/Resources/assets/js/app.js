$(document).ready(function () {
  // init for table all
  initDatamenu();
});

setReloadDataTable = function () {
  $("#menu-datatable").DataTable().ajax.reload(null, false);
};

// =========================  menu =========================== //
initDatamenu = function () {
  if ($("#menu-datatable").length > 0) {
    oTable = $("#menu-datatable").DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
        url: "/admin/menu/datatable_ajax",
      },
      columns: [
        // { "data": 'DT_RowIndex', orderable: false, searchable: false },
        { data: "sequence", orderable: true, searchable: false },
        { data: "name_th", orderable: true },
        { data: "name_en", orderable: true },
        { data: "updated_at", orderable: true },
        // { "data": "sort", orderable: false, searchable: false },
        { data: "actionEdit", orderable: false, searchable: false },
      ],
      language: $_LANG.datatable,
    });
  }
};

setUpdateStatusMenu = function (id, status) {
  event.preventDefault();
  let _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/admin/menu/set_status",
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

setDeleteMenu = function (id) {
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
          url: "/admin/menu/set_delete",
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

setSaveMenu = function () {
  event.preventDefault();
  tinyMCE.triggerSave();
  var frm_data = new FormData($("#menu_frm")[0]);
  $.ajax({
    url: "/admin/menu/save",
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
      mwz_frm_validate($("#menu_frm"), rules, messages);
      var check_valid = $("#menu_frm").valid();

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
        window.location.href = "/admin/menu/";
      } else {
        mwz_noti("error", resp.msg);
        // document.getElementById(resp.focus).focus();
      }
    },
  });
};

setUpdateUpMenu = function (id) {
  event.preventDefault();

  var _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/admin/menu/menu_up",
    type: "POST",
    data: {
      id: id,
      _token: _token,
    },
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    success: function () {
      setReloadDataTable();
    },
  });
};

setUpdateDownMenu = function (id) {
  event.preventDefault();

  var _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/admin/menu/menu_down",
    type: "POST",
    data: {
      id: id,
      _token: _token,
    },
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    success: function () {
      setReloadDataTable();
    },
  });
};
