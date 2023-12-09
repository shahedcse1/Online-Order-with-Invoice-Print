
var $table = $('#bootstrap-table');
function operateFormatter(value, row, index) {
  return [
    '<a rel="tooltip" title="View" class="btn btn-simple btn-info btn-icon table-action view" href="javascript:void(0)">',
    '<i class="fa fa-image"></i>',
    '</a>',
    '<a rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit" href="javascript:void(0)">',
    '<i class="fa fa-edit"></i>',
    '</a>',
    '<a rel="tooltip" title="Remove" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:void(0)">',
    '<i class="fa fa-remove"></i>',
    '</a>'
  ].join('');
}

$().ready(function () {
  window.operateEvents = {
    'click .view': function (e, value, row, index) {
      info = JSON.stringify(row);
      swal('You click view icon, row: ', info);
      console.log(info);
    },
    'click .edit': function (e, value, row, index) {
      info = JSON.stringify(row);
      swal('You click edit icon, row: ', info);
      console.log(info);
    },
    'click .remove': function (e, value, row, index) {
      console.log(row);
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      });
    }
  };

  $table.bootstrapTable({
    toolbar: ".toolbar",
    clickToSelect: true,
    showRefresh: false,
    search: true,
    showToggle: true,
    showColumns: true,
    pagination: true,
    searchAlign: 'right',
    pageSize: 100,
    clickToSelect: false,
    pageList: [8, 10, 25, 50, 100],

    formatShowingRows: function (pageFrom, pageTo, totalRows) {
      //do nothing here, we don't want to show the text "showing x of y from..."
    },
    formatRecordsPerPage: function (pageNumber) {
      return pageNumber + " rows visible";
    },
    icons: {
      refresh: 'fa fa-refresh',
      toggle: 'fa fa-th-list',
      columns: 'fa fa-columns',
      detailOpen: 'fa fa-plus-circle',
      detailClose: 'fa fa-minus-circle'
    }
  });

  //activate the tooltips after the data table is initialized
  $('[rel="tooltip"]').tooltip();

  $(window).resize(function () {
    $table.bootstrapTable('resetView');
  });
});
