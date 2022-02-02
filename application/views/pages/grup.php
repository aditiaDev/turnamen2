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
              <h3 class="card-title">Input Grup</h3>
            </div>

              <form id="FRM_DATA" role="form" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Grup</label>
                    <input type="text" class="form-control" name="nm_grup" placeholder="Nama Grup" >
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-dark" id="BTN_SAVE" name="simpan_grup">Simpan</button>
                </div>
              </form>

          </div>
        </div>

        <div class="col-8">
          <div class="card card-dark" style="margin-top: 1rem">
            <div class="card-header">
              <h3 class="card-title">Data Grup</h3>
            </div>

            <div class="card-body">
              <table width="100%" class="table table-bordered table-hover" id="tb_data">
                <thead>
                  <tr>
                    <th width="10%">ID.</th>
                    <th >Nama Grup</th>
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
  var save_method= 'save';
  var id_data;

  $(function(){
    REFRESH_DATA()

  })
  
  $(".select2").select2({
    theme: 'bootstrap4'
  })

  $("#BTN_SAVE").click(function(){
    event.preventDefault();
    var formData = $("#FRM_DATA").serialize();
    
    
    if(save_method == 'save') {
        urlPost = "<?php echo site_url('grup/saveData') ?>";
    }else{
        urlPost = "<?php echo site_url('grup/updateData') ?>";
        formData+="&id_data="+id_data
    }

    ACTION(urlPost, formData)
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
            $("#FRM_DATA")[0].reset()
          }else{
            toastr.error(data.message)
          }
        }
    })
  }

  function REFRESH_DATA(){
    $('#tb_data').DataTable().destroy();
    var tb_data = $("#tb_data").DataTable({
      "order": [[ 0, "asc" ]],
      "pageLength": 25,
      "autoWidth": false,
      "responsive": true,
      "ajax": {
          "url": "<?php echo site_url('grup/getAllData') ?>",
          "type": "POST"
      },
      "columns": [
          { "data": "id_grup" },{ "data": "nm_grup" },
          { "data": null, 
            "render" : function(data, type, full, meta){
              // console.log(meta.row)
              return "<button class='btn btn-sm btn-warning' onclick='editData("+JSON.stringify(data)+",\""+meta.row+"\");'><i class='fas fa-edit'></i> Edit</button> "+
                "<button class='btn btn-sm btn-danger' onclick='deleteData(\""+data.id_grup+"\");'><i class='fas fa-trash'></i> Delete</button>"
            },
            className: "text-center"
          },
      ]
    })
  }

  function editData(data, index){
    save_method = "edit"
    id_data = data.id_grup;
    $("[name='nm_grup']").val(data.nm_grup)
  }

  function deleteData(id){
    if(!confirm('Delete this data?')) return

    urlPost = "<?php echo site_url('grup/deleteData') ?>";
    formData = "id_data="+id
    ACTION(urlPost, formData)
  }

</script>