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
        <div class="col-4">
          <div class="card card-dark" style="margin-top: 1rem">
            <div class="card-header">
              <h3 class="card-title">Atur Pembagian Grup</h3>
            </div>

              <form id="FRM_DATA" role="form" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Event</label>
                    <div class="row">
                      <input type="hidden" class="form-control" name="id_event" readonly >
                      <input type="text" class="form-control" name="nm_event" readonly style="width: 275px;margin-right: 10px;" placeholder="Nama Event" >
                      <button type="button" id="BTN_EVENT" class="btn btn-sm btn-default"><i class="fas fa-list"></i></button>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Team</label>
                    <input type="text" class="form-control" name="jml_team" readonly>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Team per Grup</label>
                    <input type="text" class="form-control" name="jml_team_grup" onchange="aturJadwal()">
                  </div>
                  <div class="form-group">
                    <label>Jumlah Team BYE</label>
                    <input type="text" class="form-control" name="jml_bye" readonly>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Grup</label>
                    <input type="text" class="form-control" name="jml_grup2" readonly>
                    <input type="hidden" class="form-control" name="jml_grup" readonly>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-dark" id="BTN_PROSES" >Proses</button>
                </div>
              </form>

          </div>
        </div>

        <div class="col-8">
          <div class="card card-dark" style="margin-top: 1rem">
            <div class="card-header">
              <h3 class="card-title">Pembagian Grup</h3>
            </div>

            <div class="card-body">
              <table width="100%" class="table table-bordered table-hover" id="tb_data">
                <thead>
                  <tr>
                    <th width="10%">No</th>
                    <th >Grup</th>
                    <th >Team</th>
                    <th style="text-align:center">Action</th>
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
                  <th>Jumlah Team</th>
                  <th>Status Event</th>
                </thead>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  </section>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('/assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script>
  $("#BTN_EVENT").click(function(){
    tb_event = $('#tb_event').DataTable( {
        "order": [[ 1, "asc" ]],
        "pageLength": 25,
        "bInfo" : false,
        "bDestroy": true,
        "select": true,
        "ajax": {
            "url": "<?php echo site_url('jadwal/getDataEvent') ?>",
            "type": "POST",
        },
        "columns": [
            { "data": "id_event" },{ "data": "nm_event" }
            ,{ "data": "tgl_event" },{ "data": "jml_team" },{ "data": "status" },
        ]
    });

    $("#modal_event").modal('show')
  })

  $('body').on( 'dblclick', '#tb_event tbody tr', function (e) {
      var Rowdata = tb_event.row( this ).data();

      $("[name='id_event']").val(Rowdata.id_event);
      $("[name='nm_event']").val(Rowdata.nm_event);
      $("[name='jml_team']").val(Rowdata.jml_team);

      REFRESH_DATA()

      $('#modal_event').modal('hide');
  });

  function aturJadwal(){
    var jmlTeam = $("[name='jml_team']").val()
    var jmlTeamGrup = $("[name='jml_team_grup']").val()
    var result = parseFloat(jmlTeam/jmlTeamGrup)
    // if(result%2 != 0){
    //   alert('Jumlah Grup Harus genap');
    //   $("#BTN_PROSES").attr('disabled',true)
    //   return
    // }
    if(Number.isInteger(result) == false){
      var floor = Math.floor(result)
      console.log(floor)
      var sisa = parseInt(jmlTeam) - parseInt(floor*jmlTeamGrup)
      var jmlBye = jmlTeamGrup-sisa
    }else{
      var jmlBye = 0;
    }
    $("[name='jml_bye']").val(jmlBye)
    
    $("[name='jml_grup']").val(result)
    $("[name='jml_grup2']").val(Math.ceil(result))
    $("#BTN_PROSES").attr('disabled',false)
  }

  $("#BTN_PROSES").click(function(){
    $.ajax({
      url: "<?php echo site_url('jadwal/PembagianGrup') ?>",
      type: "POST",
      dataType: "JSON",
      data: {
        id_event: $("[name='id_event']").val(),
        jmlTeamGrup: $("[name='jml_team_grup']").val(),
        jmlGrup: $("[name='jml_grup']").val(),
        jmlBye: $("[name='jml_bye']").val(),
      },
      success: function(data){
        if (data.status == "success") {
          toastr.info(data.message)
          REFRESH_DATA()

        }else{
          toastr.error(data.message)
        }
      }
    })
  })

  function REFRESH_DATA(){
    $('#tb_data').DataTable().destroy();
    var tb_data = $("#tb_data").DataTable({
      "order": [[ 0, "asc" ]],
      "pageLength": 10,
      "autoWidth": false,
      "responsive": true,
      "ajax": {
          "url": "<?php echo site_url('jadwal/getPembagianGrup') ?>",
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
          { "data": "nm_grup" },{ "data": "nm_team" },
          { "data": null, 
            "render" : function(data, type, full, meta){
              // console.log(meta.row)
              return "<button class='btn btn-sm btn-danger' onclick='deleteData(\""+data.id_jadwal+"\");'><i class='fas fa-trash'></i> Delete</button>"
            },
            className: "text-center"
          },
      ]
    })
  }
</script>