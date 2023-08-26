$(document).ready(function () {
  initDatatable()

  initPdpaDetailDatatable()

  if ($('.datetimepicker').length > 0) {
    $('.datetimepicker').datetimepicker()
  }

  if ($('.dropify').length > 0) {
    var drEvent = $('.dropify').dropify()
    drEvent.on('dropify.afterClear', function (event, element) {
      var form = $(element.element.form)
      var input =
        '<input type="hidden" name="delete_' +
        element.element.name +
        '" value="1"/>'
      form.append(input)
    })
  }
})

initDatatable = function () {
  if ($('#pdpa-datatable').length > 0) {
    oTable = $('#pdpa-datatable').DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
        url: '/admin/pdpa/datatable_ajax',
      },
      columns: [
        { data: 'id', orderable: true, searchable: false },
        { data: 'pdpa_title_th' },
        { data: 'updated_at' },
        { data: 'action', orderable: false, searchable: false },
      ],
    })
  }
}

setReloadDataTable = function () {
  $('#pdpa-datatable').DataTable().ajax.reload(null, false)
}

setUpdateStatus = function (id, status) {
  event.preventDefault()
  let _token = $('meta[name="csrf-token"]').attr('content')

  $.ajax({
    url: '/admin/pdpa/set_status',
    type: 'POST',
    data: {
      id: id,
      status: status,
      _token: _token,
    },
    success: function (resp) {
      if (resp.success) {
        mwz_noti('success', resp.msg)
        setReloadDataTable()
      } else {
        mwz_noti('error', resp.msg)
        setReloadDataTable()
      }
    },
  })
}

setDelete = function (id) {
  bootbox.confirm({
    message: 'ยืนยันลบ ข้อมูล ?',
    buttons: {
      confirm: {
        label: 'ตกลง',
        className: 'btn-success',
      },
      cancel: {
        label: 'ยกเลิก',
        className: 'btn-danger',
      },
    },
    callback: function (result) {
      if (result) {
        event.preventDefault()
        let _token = $('meta[name="csrf-token"]').attr('content')

        $.ajax({
          url: '/admin/pdpa/set_delete',
          type: 'POST',
          data: {
            id: id,
            status: status,
            _token: _token,
          },
          success: function (resp) {
            if (resp.success) {
              mwz_noti('success', resp.msg)
              setReloadDataTable()
            } else {
              mwz_noti('error', resp.msg)
              setReloadDataTable()
            }
          },
        })
      }
    },
  })
}

setSave = function () {
  event.preventDefault()
  tinyMCE.triggerSave()
  var frm_data = new FormData($('#pdpa_frm')[0])
  $.ajax({
    url: '/admin/pdpa/save_pdpa',
    type: 'POST',
    contentType: false,
    data: frm_data,
    processData: false,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    success: function (resp) {
      if (resp.success) {
        mwz_noti('success', resp.msg)
        location.reload()
      } else {
        mwz_noti('error', resp.msg)
      }
    },
  })
}

initPdpaDetailDatatable = function () {
  if ($('#pdpa-detail-datatable').length > 0) {
    oTable = $('#pdpa-detail-datatable').DataTable({
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
        url: '/admin/pdpa/datatable_ajax_pdpa_detail',
      },
      columns: [
        { data: 'id', orderable: true, searchable: false },
        { data: 'pdpa_ip' },
        { data: 'pdpa_user_agent' },
        { data: 'pdpa_user_status' },
        { data: 'created_at' },
      ],
    })
  }
}
