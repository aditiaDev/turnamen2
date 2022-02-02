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
              <h3 class="card-title">Atur Jadwal Final</h3>
            </div>

              
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Event</label>
                    <div class="row">
                      <input type="hidden" class="form-control" name="id_event" readonly >
                      <input type="text" class="form-control" name="nm_event" readonly style="width: 275px;margin-right: 10px;" placeholder="Nama Event" >
                      <button type="button" id="BTN_EVENT" class="btn btn-sm btn-default"><i class="fas fa-list"></i></button>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-dark" id="BTN_PROSES" >Proses</button>
                </div>
              

          </div>
        </div>

        <!-- <div class="col-8">
          <div class="card card-dark" style="margin-top: 1rem">
            <div class="card-header">
              <h3 class="card-title">Jadwal PlayOff</h3>
            </div>

            <div class="card-body">
              <table width="100%" class="table table-bordered table-hover" id="tb_data">
                <thead>
                  <tr>
                    <th width="10%">No</th>
                    <th >Team</th>
                    <th>Jadwal</th>
                    <th style="text-align:center">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div> -->
        
      </div>
    </div>

    <div class="row" id="dtJadwal">
      
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

    <div class="modal fade" id="modal_edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="FRM_DATA">
            <div class="modal-header">
              <h4 class="modal-title">Edit Jadwal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Versus</label>
                <input type="text" class="form-control" name="versus" readonly>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>Tanggal Pertandingan</label>
                    <input type="text" class="form-control datepicker" name="tgl_pertandingan" >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Waktu Pertandingan</label>
                    <input type="time" class="form-control" name="waktu_pertandingan" >
                  </div>
                </div>
              </div>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="BTN_SAVE">Simpan</button>
            </div>
          </form>
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

      REFRESH_DATA()
      $('#modal_event').modal('hide');
  });

  $("#BTN_PROSES").click(function(){

        $.ajax({
          url: "<?php echo site_url('jadwal/inputFinal') ?>",
          type: "POST",
          dataType: "JSON",
          data: {
            id_event: $("[name='id_event']").val()
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

  function editData(data, index){
    console.log(data)
    id_data = data.id_pertandingan;
    $("[name='versus']").val(data.nm_team)
    $("#modal_edit").modal('show')
  }

  function REFRESH_DATA(){
    $("#BTN_PROSES").attr('disabled',false)
    $.ajax({
      url: "<?php echo site_url('jadwal/getJadwalFinal') ?>",
      type: "POST",
      dataType: "JSON",
      data: {
        id_event: $("[name='id_event']").val()
      },
      success: function(data){
          
          var rowData=''
          $.each(data, function(index, value){
            console.log(value)
            no = index+1;
            rowData += '<div class="col-6 jdl">'+
                          '<div class="card card-dark" >'+
                            '<div class="card-header">'+
                              '<h3 class="card-title">'+value['data'][0]['jenis_pertandingan']+'</h3>'+
                            '</div>'+
                              '<div class="card-body">'+
                                '<table class="table table-bordered">'+
                                  '<thead>'+
                                    '<th>Team</th>'+
                                    '<th>Jadwal</th>'+
                                    '<th>Action</th>'+
                                  '</thead>'+
                                  '<tbody>';
            $.each(value['data'], function(ind, val){
              rowData += '<tr>'+
                            '<td><input type="hidden" name="id_pertandingan[]" value="'+val['id_pertandingan']+'" >'+val['nm_team']+'</td>'+
                            '<td>'+val['tgl_pertandingan']+" "+val['waktu_pertandingan']+'</td>'+
                            "<td><button class='btn btn-sm btn-warning' onclick='editData("+JSON.stringify(val)+");'><i class='fas fa-edit'></i></button> "+
                 "<button class='btn btn-sm btn-danger' onclick='deleteData(\""+val['id_pertandingan']+"\");'><i class='fas fa-trash'></i></button></td></td>"+
                          '</tr>'
            })


                        rowData +='</tbody>'+
                                '</table>'+
                              '</div>'+
                          '</div>'+
                        '</div>';
                
          });
          $("#dtJadwal").html(rowData);
      }
    })
  }

  $("#BTN_SAVE").click(function(){
    event.preventDefault();
    var formData = $("#FRM_DATA").serialize();

    urlPost = "<?php echo site_url('jadwal/updateJadwalPertandingan') ?>";
    formData+="&id_pertandingan="+id_data

    ACTION(urlPost, formData)
    $("#modal_edit").modal('hide')
  })

  function ACTION(urlPost, formData){
    $.ajax({
        url: urlPost,
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data){
          console.log(data)
          if (data.status == "success") {
            toastr.info(data.message)
            REFRESH_DATA()

          }else{
            toastr.error(data.message)
          }
        }
    })
  }
</script>