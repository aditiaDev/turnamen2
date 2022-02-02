<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/summernote/summernote-bs4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('/assets/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>">
<div class="content-wrapper">  
  <section class="content">
    <div class="container-fluid">
      <form id="FRM_DATA">
        <div class="row">
          <div class="col-4">
            <div class="card" style="margin-top: 1rem">
              <div class="card-body">
                <div class="form-group">
                  <label>ID Event</label>
                  <input type="text" class="form-control" name="id_event" readonly value="<New>" >
                </div>
                <div class="form-group">
                  <label>Nama Event</label>
                  <input type="text" class="form-control" name="nm_event" >
                </div>
                <div class="form-group">
                  <label>Tanggal Event</label>
                  <input type="text" class="form-control datepicker" name="tgl_event" >
                </div>
                <div class="form-group">
                  <label>Tanggal Pendaftaran</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right" name="tgl_pendaftaran">
                  </div>
                </div>
                <div class="form-group">
                  <label>Biaya Pendaftaran</label>
                  <input type="text" class="form-control" name="biaya_pendaftaran" style="text-align:right" onkeyup="return fcRupiah(this)">
                </div>
                <div class="form-group">
                  <label>Min. Team</label>
                  <input type="text" class="form-control" name="min_team" style="text-align:right" >
                </div>
                <div class="form-group">
                  <label>Max. Team</label>
                  <input type="text" class="form-control" name="max_team" style="text-align:right" >
                </div>
                <div class="form-group">
                  <label>Jml Playoff Grup</label>
                  <input type="text" class="form-control" name="jml_team_playoff" style="text-align:right" >
                </div>
                <div class="form-group">
                  <label>Status Event</label>
                  <select name="status" class="form-control">
                    <option value="BUKA">BUKA</option>
                    <option value="TUTUP">TUTUP</option>
                  </select>
                </div>
              </div>
              <div class="card-footer justify-content-between">
                <button type="button" class="btn btn-sm btn-warning" id="BTN_RESET">Reset</button>
                <button type="button" id="BTN_SAVE" class="btn btn-sm btn-primary" style="float: right;">Simpan</button>
              </div>
            </div>
          </div>
          <div class="col-8">
            <div class="card" style="margin-top: 1rem">
              <div class="card-body">
                <div class="form-group">
                  <label>Deskripsi Event</label>
                  <textarea class="summernote" name="deskripsi"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>

<script src="<?php echo base_url('/assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/adminlte/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<script>
  var save_method='save'
  $(function () {
    // Summernote
    $('.summernote').summernote({
      height: 450,
    })

    $(".datepicker").datepicker({
      autoclose: true,
      format: 'dd-M-yyyy'
    });
  })


  $("[name='tgl_pendaftaran']").daterangepicker({
    timePicker: true,
    timePicker24Hour: true,
    locale: {
      format: 'YYYY-MM-DD HH:mm'
    }
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
            $("[name='id_event']").val(data.DOC_NO)
          }else{
            toastr.error(data.message)
          }
        }
    })
  }

  $("#BTN_SAVE").click(function(){
    event.preventDefault();
    var formData = $("#FRM_DATA").serialize();

    if(save_method == 'save') {
        urlPost = "<?php echo site_url('Event/saveData') ?>";
    }else{
        urlPost = "<?php echo site_url('Event/updateData') ?>";
    }

    ACTION(urlPost, formData)
  })

  $("#BTN_RESET").click(function(){
    $("#FRM_DATA")[0].reset()
    $(".summernote").summernote("code", "")
  })

</script>