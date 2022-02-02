<?php include 'atas.php'; ?>
<?php include 'menu.php'; ?>


<!-- banner-section start -->
<section id="banner-section" class="inner-banner profile features shop">
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
                        <h1>Profil Team</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->

<!-- Check Out Start -->
<section id="checkout" class="pt-120 pb-120">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="head-area top">
                        <h4>Profil Team</h4>
                        <p>Lengkapi data team kamu</p>
                    </div>
                    <form id="FRM_DATA" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nama Team</label>
                                <input type="text" class="form-control" name="nm_team">
                            </div>
                            <div class="form-group col-md-6">
                                <label >Logo Team</label>
                                <input type="file" class="form-control" name="logo" id="logo" accept="image/png, image/gif, image/jpeg">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Alamat Team</label>
                                <textarea name="alamat_team" style="border: 1px solid rgba(255, 255, 255, 0.1);border-radius: 10px;background: transparent;color: var(--body-color);height: auto;padding: 15px 12px;" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="cmn-btn">Simpan</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart End -->

<script src="<?php echo base_url('/assets/begam/js/jquery-3.5.1.min.js'); ?>"></script>
<script>
  $("#FRM_DATA").on('submit', function(event){
    event.preventDefault();
    let formData = new FormData(this);
    urlPost = "<?php echo site_url('front/saveTeam') ?>";
    ACTION(urlPost, formData)
  })

  function ACTION(urlPost, formData){
    $.ajax({
      url: urlPost,
      type: "POST",
      data: formData,
      processData : false,
      cache: false,
      contentType : false,
      success: function(data){
        data = JSON.parse(data)
        console.log(data)
        if (data.status == "success") {
          alert(data.message)
          window.location="<?php echo base_url('front/team');?>"
        }else{
          toastr.error(data.message)
        }
      }
    })
  }
</script>
<?php include 'footer.php'; ?>