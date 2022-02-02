<?php include 'atas.php'; ?>
<?php include 'menu.php'; ?>
<style>
  p{
    color: rgba(255, 255, 255, 0.7)!important;
  }
</style>

<!-- banner-section start -->
<section id="banner-section" class="inner-banner tournaments" style="padding: 300px 0 70px;">
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
                      <h1>Turnamen</h1>
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
  <div class="container">
    <div class="headign-info">
        
      <div class="bottom-area">
        <div class="bottom">
          <table style="color: white;font-size: 14px;" class="table table-bordered">
            <thead>
              <th>No</th>
              <th>ID Pesanan</th>
              <th>Bill Key</th>
              <th>Biller Code</th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- banner-section end -->



<script src="<?php echo base_url('/assets/begam/js/jquery-3.5.1.min.js'); ?>"></script>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-C_hVzhEuRXcHPsa6"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
  
</script>
<?php include 'footer.php'; ?>