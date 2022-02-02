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
          <div class="card" style="margin-top: 1rem">
            <div class="card-header">
              <h3 class="card-title">Data Team</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button class="btn btn-sm btn-info" style="margin-bottom: 10px;" id="add_data"><i class="fas fa-plus-circle"></i> Tambah Data</button>
              <table id="tb_data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>ID Team</th>
                  <th>Nama Team</th>
                  <th>Alamat</th>
                  <th>Logo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div>

    <div class="modal fade" id="modal_add">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="FRM_DATA" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title">Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>ID Team</label>
                <input type="text" class="form-control" name="id_team" value="<New>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Team</label>
                <input type="text" class="form-control" name="nm_team" >
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat_team" ></textarea>
              </div>
              <div class="form-group">
                <label>Logo Team</label>
                <input type="file" name="logo" id="logo" accept="image/png, image/gif, image/jpeg">
              </div>
              <div class="form-group">
                <label>User</label>
                <select class="form-control select2" name="id_user">
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="BTN_SAVE">Simpan</button>
            </div>
          </form>
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
  var save_method;
  var id_data;

  $(".select2").select2({
    theme: 'bootstrap4'
  })

  $(function () {
    
    REFRESH_DATA()
    

    $("#add_data").click(function(){
      $("#FRM_DATA")[0].reset()
      save_method = "save"
      $("#modal_add .modal-title").text('Tambah Data')
      $("#modal_add").modal('show')
    })

    $("#FRM_DATA").on('submit', function(event){
      event.preventDefault();
      let formData = new FormData(this);
      
      
      if(save_method == 'save') {
          urlPost = "<?php echo site_url('team/saveData') ?>";
      }else{
          urlPost = "<?php echo site_url('team/updateData') ?>";
          formData+="&id_team="+id_data
      }
      // console.log(formData)
      ACTION(urlPost, formData)
      $("#modal_add").modal('hide')
    })

  });

  function ACTION(urlPost, formData){
      $.ajax({
        url: urlPost,
        type: "POST",
        data: formData,
        beforeSend: function(){
          $("#LOADER").show();
        },
        complete: function(){
          $("#LOADER").hide();
        },
        processData : false,
        cache: false,
        contentType : false,
        success: function(data){
          data = JSON.parse(data)
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

  function REFRESH_DATA(){
    $('#tb_data').DataTable().destroy();
    var tb_data = $("#tb_data").DataTable({
      "order": [[ 0, "asc" ]],
      "pageLength": 25,
      "autoWidth": false,
      "responsive": true,
      "ajax": {
          "url": "<?php echo site_url('team/getAllData') ?>",
          "type": "GET"
      },
      "columns": [
          {
              "data": null,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
          },
          { "data": "id_team" },{ "data": "nm_team" },{ "data": "alamat_team" },
          { "data": "logo",
            render: function (data, type, row, meta) {
                if(data){
                  return "<a target='_blank' href='<?php echo base_url() ?>assets/images/team/"+data+"'><img  style='max-width: 120px;' class='img-fluid' src='<?php echo base_url() ?>assets/images/team/"+data+"' ></a>";
                }else{
                  return "No File"
                }
            }
          },
          { "data": null, 
            "render" : function(data, type, full, meta){
              // console.log(meta.row)
              return "<button class='btn btn-sm btn-warning' onclick='editData("+JSON.stringify(data)+",\""+meta.row+"\");'><i class='fas fa-edit'></i> Edit</button> "+
                "<button class='btn btn-sm btn-danger' onclick='deleteData(\""+data.id_team+"\");'><i class='fas fa-trash'></i> Delete</button>"
            },
            className: "text-center"
          },
      ]
    })

    ISI_SELECTBOX()
  }

  function editData(data, index){
    console.log(data)
    save_method = "edit"
    id_user = data.id_user;
    $("#modal_add .modal-title").text('Edit Data')
    $("[name='username']").val(data.username)
    $("[name='password']").val(data.password)
    $("[name='level']").val(data.level)
    $("#modal_add").modal('show')
  }

  function deleteData(id){
    if(!confirm('Delete this data?')) return

    urlPost = "<?php echo site_url('team/deleteData') ?>";
    formData = "id_team="+id
    ACTION(urlPost, formData)
  }

  function ISI_SELECTBOX(){
    $("[name='id_user']").html('')
    $.ajax({
      url: "<?php echo site_url('team/getDataPeserta') ?>",
      type: "POST",
      dataType: "JSON",
      success: function(data){
        
        $.each(data, function(index, value){
          $("[name='id_user']").append("<option value='"+value['id_user']+"'>"+value['id_user']+" - "+value['nm_user']+"</option>")
        })
      }
    })
  }
</script>