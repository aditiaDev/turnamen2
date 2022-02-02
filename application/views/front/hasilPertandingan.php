<?php include 'atas.php'; ?>
<?php include 'menu.php'; ?>

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
                      <h1>Hasil Pertandingan</h1>
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
            <table style="margin-bottom: 15px;font-size: 14px;">
              <tbody>
                <tr>
                  <td style="width: 100px;">Pilih Event</td>
                  <td>
                    <input type="hidden" name="id_event" class="form-control" readonly>
                    <input type="text" name="nm_event" class="form-control" readonly>
                  </td>
                  <td>
                    <button type="button" id="BTN_EVENT" class="btn btn-primary"><i class="fas fa-list"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
            <table width="100%" style="font-size: 14px;" class="table table-bordered table-hover" id="tb_data">
              <thead>
                <tr>
                  <th width="80px;">No</th>
                  <th >Grup</th>
                  <th >Versus</th>
                  <th >Tanggal</th>
                  <th >Waktu</th>
                  <th >Pemenang</th>
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

  <div class="modal fade" id="modal_event" style="z-index: 99999;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" style="color:black;">Double Click</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <table class="table table-bordered" id="tb_event" style="width:100%;font-size: 14px;">
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
</section>

<script src="<?php echo base_url('/assets/begam/js/jquery-3.5.1.min.js'); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('/assets/adminlte/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>

<script>
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
    $(".modal-backdrop").css('position','unset')
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
        "pageLength": 10,
        "autoWidth": false,
        "responsive": true,
        "ajax": {
            "url": "<?php echo site_url('jadwal/getHasilPertandingan') ?>",
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
            { "data": "nm_grup" }, { "data": "nm_team" },{ "data": "tgl_pertandingan" },
            { "data": "waktu_pertandingan" },{ "data": "HASIL" },
        ]
      })
    }
</script>
<?php include 'footer.php'; ?>