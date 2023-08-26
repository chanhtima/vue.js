$(document).ready(function() {
  // init for table all
  initDatatable();
  initDatatableBranch();
  initDatatableSubject();
});

initDatatable = function() {
  if ($("#contactus-datatable").length > 0) {
    oTable = $("#contactus-datatable").DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
        url: "/admin/contactus/datatable_ajax",
      },
      columns: [
        { data: "DT_RowIndex", orderable: false, searchable: true },
        { data: "name" },
        { data: "email" },
        { data: "subject" },
        { data: "created_at" },
        { data: "action", orderable: false, searchable: false },
      ],
      language: $_LANG.datatable,
    });
  }
};

setReloadDataTable = function() {
  $("#contactus-datatable")
    .DataTable()
    .ajax.reload(null, false);
  $("#subject-datatable")
    .DataTable()
    .ajax.reload(null, false);
};

setUpdateStatus = function(id, status) {
  event.preventDefault();
  let _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/admin/contactus/set_status",
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
          url: "/admin/contactus/set_delete",
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
  var frm_data = new FormData($("#contactus_frm")[0]);
  $.ajax({
    url: "/admin/contactus/save",
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
        window.location.reload();
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};
////////// Page //////////
setSavePage = function() {
  event.preventDefault();
  tinyMCE.triggerSave();
  var frm_data = new FormData($("#page_frm")[0]);
  console.log(frm_data);
  $.ajax({
    url: "/admin/contactus/page/save",
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
        window.location.reload();
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};

//////// Subject ////////
initDatatableSubject = function() {
  if ($("#subject-datatable").length > 0) {
    oTable = $("#subject-datatable").DataTable({
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
        url: "/admin/contactus/subject/datatable_ajax",
      },
      columns: [
        { data: "id", orderable: false, searchable: true },
        { data: "name_th" },
        { data: "updated_at" },
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

setStatusSubject = function(id, status) {
  event.preventDefault();
  let _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/admin/contactus/subject/set_status",
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

setDeleteSubject = function(id) {
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
          url: "/admin/contactus/subject/set_delete",
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

setSaveSubject = function() {
  event.preventDefault();
  tinyMCE.triggerSave();
  var frm_data = new FormData($("#subject_frm")[0]);
  $.ajax({
    url: "/admin/contactus/subject/save",
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
      mwz_frm_validate($("#subject_frm"), rules, messages);
      var check_valid = $("#subject_frm").valid();

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
        window.location.href = "/admin/contactus/subject";
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};

//////// Subject ////////
initDatatableBranch = function() {
  if ($("#branch-datatable").length > 0) {
    oTable = $("#branch-datatable").DataTable({
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
        url: "/admin/contactus/branch/datatable_ajax",
      },
      columns: [
        { data: "id", orderable: false, searchable: true },
        { data: "name_th" },
        { data: "updated_at" },
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
        url: "/admin/contactus/branch/set_re_order",
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

setStatusBranch = function(id, status) {
  event.preventDefault();
  let _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/admin/contactus/branch/set_status",
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

setDeleteBranch = function(id) {
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
          url: "/admin/contactus/branch/set_delete",
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

setSaveBranch = function() {
  event.preventDefault();
  tinyMCE.triggerSave();
  var frm_data = new FormData($("#branch_frm")[0]);
  $.ajax({
    url: "/admin/contactus/branch/save",
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
        office_en: {
          required: true,
        },
        office_th: {
          required: true,
        },
        email: {
          required: true,
          maxlength: 100,
        },
        phone: {
          required: true,
          maxlength: 100,
        },
      };
      var messages = $_LANG.validate.message;
      mwz_frm_validate($("#branch_frm"), rules, messages);
      var check_valid = $("#branch_frm").valid();

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
        window.location.href = "/admin/contactus/branch";
      } else {
        mwz_noti("error", resp.msg);
      }
    },
  });
};
