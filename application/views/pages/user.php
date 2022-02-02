<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<div class="content-wrapper">  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card" style="margin-top: 1rem">
            <div class="card-header">
              <h3 class="card-title">Data User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button class="btn btn-sm btn-info" style="margin-bottom: 10px;" id="add_data"><i class="fas fa-plus-circle"></i> Tambah Data</button>
              <table id="tb_data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama User</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th>Status Akun</th>
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
          <form id="FRM_DATA">
            <div class="modal-header">
              <h4 class="modal-title">Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" class="form-control" name="nm_user" placeholder="Nama Pengguna">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label>Level Akses</label>
                <select class="form-control" name="hak_akses">
                  <option value="ADMIN">ADMIN</option>
                  <option value="PESERTA">PESERTA</option>
                </select>
              </div>
              <div class="form-group">
                <label>Status Akun</label>
                <select class="form-control" name="status">
                  <option value="AKTIF">AKTIF</option>
                  <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="BTN_SAVE">Simpan</button>
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
<script>
  var save_method;
  var id_user;


  $(function () {
    
    REFRESH_DATA()
    

    $("#add_data").click(function(){
      $("#FRM_DATA")[0].reset()
      save_method = "save"
      $("#modal_add .modal-title").text('Tambah Data')
      $("#modal_add").modal('show')
    })

    $("#BTN_SAVE").click(function(){
      event.preventDefault();
      var formData = $("#FRM_DATA").serialize();
      
      
      if(save_method == 'save') {
          urlPost = "<?php echo site_url('user/saveData') ?>";
      }else{
          urlPost = "<?php echo site_url('user/updateData') ?>";
          formData+="&id_user="+id_user
      }
      // console.log(formData)
      ACTION(urlPost, formData)
      $("#modal_add").modal('hide')
    })

    /*$('#tb_data tbody').on('click', 'td>button.detail_data', function () {
      
        var tr = $(this).closest('tr');
        var row = tb_data.row( tr );
        console.log(row.data())
        save_method = "edit"
        $("#modal_add .modal-title").text('Edit Data')
        $("[name='username']").val(row.data().username)
        $("[name='password']").val(row.data().password)
        $("[name='level']").val(row.data().level)
        $("#modal_add").modal('show')
    })*/



  });

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

  function REFRESH_DATA(){
    $('#tb_data').DataTable().destroy();
    var tb_data = $("#tb_data").DataTable({
      "order": [[ 0, "asc" ]],
      "pageLength": 10,
      "autoWidth": false,
      "responsive": true,
      "ajax": {
          "url": "<?php echo site_url('user/getAllUser') ?>",
          "type": "GET"
      },
      "columns": [
          {
              "data": null,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
          },
          { "data": "nm_user" },{ "data": "username" },{ "data": "password" },{ "data": "hak_akses" },{ "data": "status" },
          { "data": null, 
            "render" : function(data, type, full, meta){
              // console.log(meta.row)
              return "<button class='btn btn-sm btn-warning' onclick='editUser("+JSON.stringify(data)+",\""+meta.row+"\");'><i class='fas fa-edit'></i> Edit</button> "+
                "<button class='btn btn-sm btn-danger' onclick='deleteUser(\""+data.id_user+"\");'><i class='fas fa-trash'></i> Delete</button>"
            },
            className: "text-center"
          },
      ]
    })
  }

  function editUser(data, index){
    console.log(data)
    save_method = "edit"
    id_user = data.id_user;
    $("#modal_add .modal-title").text('Edit Data')
    $("[name='username']").val(data.username)
    $("[name='password']").val(data.password)
    $("[name='level']").val(data.level)
    $("#modal_add").modal('show')
  }

  function deleteUser(id){
    if(!confirm('Delete this data?')) return

    urlPost = "<?php echo site_url('user/deleteData') ?>";
    formData = "id_user="+id
    ACTION(urlPost, formData)
  }
</script>