<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
<div class="content-wrapper">  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-dark" style="margin-top: 1rem">
            <div class="card-header">
              <h3 class="card-title">Skor Team</h3>
            </div>

            <div class="card-body">
              <table style="margin-bottom: 15px;">
                <tbody>
                  <tr>
                    <td style="width: 100px;">Pilih Event</td>
                    <td>
                      <input type="hidden" name="id_event" class="form-control" readonly>
                      <input type="text" name="nm_event" class="form-control" readonly>
                    </td>
                    <td>
                      <button type="button" id="BTN_EVENT" class="btn btn-default"><i class="fas fa-list"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table width="100%" class="table table-bordered table-hover" id="tb_data">
                <thead>
                  <tr>
                    <th width="80px;">No</th>
                    <th >Team</th>
                    <th >Main</th>
                    <th >Menang</th>
                    <th >Kalah</th>
                    <th >Seri</th>
                    <th >Poin</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div>

    <div class="modal fade" id="modal_event">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Double Click</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <table class="table table-bordered" id="tb_event" style="width:100%">
                <thead>
                  <th>ID</th>
                  <th>Nama Event</th>
                  <th>Tanggal Event</th>
                  <th>Status Event</th>
                </thead>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
      </div>
    </div>

    <!-- /.modal -->

  </section>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('/assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script>
  var save_method;
  var id_data;
    $(function(){
      $(".datepicker").datepicker({
        autoclose: true,
        format: 'dd-M-yyyy'
      });
    })
    $("#BTN_EVENT").click(function(){
      tb_event = $('#tb_event').DataTable( {
          "order": [[ 1, "asc" ]],
          "pageLength": 25,
          "bInfo" : false,
          "bDestroy": true,
          "select": true,
          "ajax": {
              "url": "<?php echo site_url('jadwal/getEventTanding') ?>",
              "type": "POST",
          },
          "columns": [
              { "data": "id_event" },{ "data": "nm_event" }
              ,{ "data": "tgl_event" },{ "data": "status" },
          ]
      });

      $("#modal_event").modal('show')
    })

    $('body').on( 'dblclick', '#tb_event tbody tr', function (e) {
        var Rowdata = tb_event.row( this ).data();

        $("[name='id_event']").val(Rowdata.id_event);
        $("[name='nm_event']").val(Rowdata.nm_event);

        REFRESH_DATA()
        $('#modal_event').modal('hide');
    });

    function REFRESH_DATA(){
      $('#tb_data').DataTable().destroy();
      var tb_data = $("#tb_data").DataTable({
        "order": [[ 0, "asc" ]],
        "pageLength": 50,
        "autoWidth": false,
        "responsive": true,
        "ajax": {
            "url": "<?php echo site_url('skor/getAllData') ?>",
            "type": "POST",
            "data": {
              id_event: $("[name='id_event']").val()
            }
        },
        "columns": [
            {
                "data": null,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "nm_team" }, 
            { "data": null, 
              "render" : function(data, type, full, meta){
                return parseInt(data.MENANG)+parseInt(data.KALAH)+parseInt(data.SERI)
              },
              className: "text-center"
            },
            { "data": "MENANG", className: "text-center" },{ "data": "KALAH", className: "text-center" },
            { "data": "SERI", className: "text-center" },{ "data": "SKOR", className: "text-center" }
        ]
      })
    }

    
</script>