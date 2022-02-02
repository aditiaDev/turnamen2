<?php include 'atas.php'; ?>
<?php include 'menu.php'; ?>

<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/toastr/toastr.min.css'); ?>">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">

<style>
  p{
    color: rgba(255, 255, 255, 0.7)!important;
  }
</style>

<!-- banner-section start -->
<section id="banner-section" class="inner-banner tournaments" style="margin-bottom: -100px;">
  <div class="ani-img">
    <img class="img-1" src="<?php echo base_url('/assets/begam/images/banner-circle-1.png'); ?>" alt="icon">
    <img class="img-2" src="<?php echo base_url('/assets/begam/images/banner-circle-2.png'); ?>" alt="icon">
    <img class="img-3" src="<?php echo base_url('/assets/begam/images/banner-circle-2.png'); ?>" alt="icon">
  </div>
  <div class="banner-content d-flex align-items-center">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-6">
                  <div class="main-content">
                      <h1>Anggota Team</h1>
                      <div class="breadcrumb-area">
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb d-flex justify-content-center">
                                  <li class="breadcrumb-item"><a href="<?php echo base_url("front/")?>">Home</a></li>
                              </ol>
                          </nav>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
</section>
<!-- banner-section end -->

<section id="all-trophies" class="pb-120">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card-dark" style="margin-top: 1rem">
          <div class="card-body">
          <button class="btn btn-sm btn-info" style="margin-bottom: 10px;" id="add_data"><i class="fas fa-plus-circle"></i> Tambah Data</button>
            <table width="100%" style="font-size: 14px;" class="table table-bordered table-hover" id="tb_data">
              <thead>
                <tr>
                  <th width="80px;">No</th>
                  <th >Nama Anggota</th>
                  <th >Alamat</th>
                  <th >Action</th>
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

  <div class="modal fade" id="modal_add" style="z-index: 99999;">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="FRM_DATA">
          <div class="modal-header">
            <h5 class="modal-title" style="color:black;">Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Anggota</label>
              <input type="text" class="form-control" name="nm_peserta" placeholder="Nama Anggota">
            </div>
            <div class="form-group">
              <label>Alamat Anggota</label>
              <textarea name="alamat" class="form-control" placeholder="Alamat Anggota"></textarea>
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

  
</section>

<script src="<?php echo base_url('/assets/begam/js/jquery-3.5.1.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/toastr/toastr.min.js'); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('/assets/adminlte/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>

<script>
  var save_method;
  var id_data;

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
        urlPost = "<?php echo site_url('front/savePeserta') ?>";
    }else{
        urlPost = "<?php echo site_url('front/updatePeserta') ?>";
        formData+="&id_peserta="+id_data
    }
    // console.log(formData)
    ACTION(urlPost, formData)
    $("#modal_add").modal('hide')
    $(".modal-backdrop").css('position','unset')
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

  function REFRESH_DATA(){
    $('#tb_data').DataTable().destroy();
    var tb_data = $("#tb_data").DataTable({
      "order": [[ 0, "asc" ]],
      "pageLength": 10,
      "autoWidth": false,
      "responsive": true,
      "ajax": {
          "url": "<?php echo site_url('front/getPesertaById') ?>",
          "type": "GET"
      },
      "columns": [
          {
              "data": null,
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
          },
          { "data": "nm_peserta" },{ "data": "alamat" },
          { "data": null, 
            "render" : function(data, type, full, meta){
              // console.log(meta.row)
              return "<button class='btn btn-sm btn-danger' onclick='deleteData(\""+data.id_peserta+"\");'><i class='fas fa-trash'></i> Delete</button>"
            },
            className: "text-center"
          },
      ]
    })
  }

  function deleteData(id){
    if(!confirm('Delete this data?')) return

    urlPost = "<?php echo site_url('front/deletePeserta') ?>";
    formData = "id_peserta="+id
    ACTION(urlPost, formData)
  }
</script>
<?php include 'footer.php'; ?>