<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<div class="content-wrapper">  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <div class="card card-dark" style="margin-top: 1rem">
            <div class="card-header">
              <h3 class="card-title">Atur Jadwal Pertandingan</h3>
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
                  <button type="button" class="btn btn-sm btn-dark" id="BTN_PROSES" >Buat Jadwal</button>
                  <button type="button" class="btn btn-sm btn-info" id="BTN_UPDATE" style="float: right;">Update Waktu Pertandingan</button>
                </div>
              

          </div>
        </div>

        <!-- /.col -->
      </div>

      <form id="FRM_DATA">
        <div class="row" id="dtJadwal">
          
        </div>
      </form>
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
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  </section>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('/assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<script>
  
    

    $("#BTN_EVENT").click(function(){
      tb_event = $('#tb_event').DataTable( {
          "order": [[ 1, "asc" ]],
          "pageLength": 25,
          "bInfo" : false,
          "bDestroy": true,
          "select": true,
          "ajax": {
              "url": "<?php echo site_url('jadwal/getEventPertandingan') ?>",
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


        $('#modal_event').modal('hide');
    });

    $("#BTN_PROSES").click(function(){
      if($("[name='id_event']").val() == ""){
        alert("Pilih Event Pertandingan")
        return
      }
      $.ajax({
        url: "<?php echo site_url('jadwal/showJadwal') ?>",
        type: "POST",
        dataType: "JSON",
        data: {
          id_event: $("[name='id_event']").val(),
        },
        success: function(data){
          
          var rowData=''
          $.each(data, function(index, value){
            console.log(value)
            
            rowData += '<div class="col-6">'+
                          '<div class="card card-dark" >'+
                            '<div class="card-header">'+
                              '<h3 class="card-title">'+value['nm_grup']+'</h3>'+
                            '</div>'+
                              '<div class="card-body">'+
                                '<table class="table table-bordered">'+
                                  '<thead>'+
                                    '<th>Team</th>'+
                                    '<th>Tanggal</th>'+
                                    '<th>Waktu</th>'+
                                  '</thead>'+
                                  '<tbody>';
            $.each(value['detail'], function(index, val){
              rowData += '<tr>'+
                            '<td><input type="hidden" name="id_pertandingan[]" value="'+val['id_pertandingan']+'" >'+val['nm_team1']+' VS '+val['nm_team2']+'</td>'+
                            '<td><input type="text" name="tgl_pertandingan[]" class="form-control datepicker"></td>'+
                            '<td><input type="time" name="waktu_pertandingan[]" class="form-control"></td>'+
                          '</tr>'
            })


                        rowData +='</tbody>'+
                                '</table>'+
                              '</div>'+
                          '</div>'+
                        '</div>';
                
          });
          $("#dtJadwal").html(rowData);
          $(".datepicker").datepicker({
            autoclose: true,
            format: 'dd-M-yyyy'
          });
        }
      })
    })

    $("#BTN_UPDATE").click(function(){
      var formData = $("#FRM_DATA").serialize();
      $.ajax({
        url: "<?php echo site_url('jadwal/updateJadwal') ?>",
        type: "POST",
        dataType: "JSON",
        data: formData,
        success: function(data){
          if (data.status == "success") {
            toastr.info(data.message)

          }else{
            toastr.error(data.message)
          }
        }
      })
    })
</script>