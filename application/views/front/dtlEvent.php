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
          <div class="row d-flex justify-content-between">
            <div class="col-lg-8 col-md-8 justify-content-sm-center d-grid">
              <h3><?php echo $data[0]['nm_event']; ?></h3>
              <div class="title-bottom d-flex">
                <div class="time-area bg">
                  <img src="<?php echo base_url('/assets/begam/images/waitng-icon.png'); ?>" alt="image">
                  <span>Starts in</span>
                  <span class="time"><?php echo $data[0]['tgl_event'] ?></span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 text-center">
              <h2 style="font-size: 22px;" class="dollar">Rp. <?php echo number_format($data[0]['biaya_pendaftaran'],2,',','.') ?></h2>
              
              <?php 
                if($this->session->userdata('id_user')){
              ?>
              <button class="cmn-btn" id="BTN_JOIN">Join Now!</button>
              <?php } ?>
            </div>
          </div>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="participants-tab" data-toggle="tab" href="#participants" role="tab" aria-controls="participants" aria-selected="false">participants</a>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- banner-section end -->

<!-- Testimonials Content Start -->
<section id="tournaments-content">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
        <div class="container pb-120">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h4 class="head-area">Format</h4>
                    <div class="row wrapper">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-area">
                                <img src="<?php echo base_url('/assets/begam/images/format-icon-1.png'); ?>" alt="image">
                                <h6>Game</h6>
                                <p class="text-sm">Mobile Legend</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-area">
                                <img src="<?php echo base_url('/assets/begam/images/format-icon-2.png'); ?>" alt="image">
                                <h6>Check-in period</h6>
                                <p class="text-sm">45 minutes before start</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-area">
                                <img src="<?php echo base_url('/assets/begam/images/format-icon-3.png'); ?>" alt="image">
                                <h6>Team Size</h6>
                                <p class="text-sm">5 VS 5</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-area">
                                <img src="<?php echo base_url('/assets/begam/images/format-icon-4.png'); ?>" alt="image">
                                <h6>Entry Fee</h6>
                                <p class="text-sm">Rp. <?php echo number_format($data[0]['biaya_pendaftaran'],2,',','.') ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-area">
                                <img src="<?php echo base_url('/assets/begam/images/format-icon-6.png'); ?>" alt="image">
                                <h6>Tournament Format</h6>
                                <p class="text-sm">Single Round Robbin</p>
                            </div>
                        </div>
                    </div>
                    <div class="info-area">
                        <h4>Information</h4>
                        <?php echo $data[0]['deskripsi']; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar">
                        <div class="single-side">
                            <h5>Participants</h5>
                            <div class="participants">
                                <ul>
                                    <li><span>Registered</span><span>17</span></li>
                                    <li><span>Confirmed</span><span>15</span></li>
                                    <li><span>Available slots</span><span>16</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-side">
                            <div class="head-area d-flex justify-content-between align-items-center">
                                <h5>Results</h5>
                                <a href="#" class="viewall text-sm">View all</a>
                            </div>
                            <div class="result-single">
                                <img src="<?php echo base_url('/assets/begam/images/result-img-1.png'); ?>" alt="images">
                                <div class="text-area d-flex justify-content-between align-items-center">
                                    <span>1st</span>
                                    <h4>Rp. 2.000.000</h4>
                                </div>
                            </div>
                            <div class="result-single">
                                <img src="<?php echo base_url('/assets/begam/images/result-img-2.png'); ?>" alt="images">
                                <div class="text-area d-flex justify-content-between align-items-center">
                                    <span>2nd</span>
                                    <h4>Rp. 1.500.000</h4>
                                </div>
                            </div>
                            <div class="result-single">
                                <img src="<?php echo base_url('/assets/begam/images/result-img-3.png'); ?>" alt="images">
                                <div class="text-area d-flex justify-content-between align-items-center">
                                    <span>3rd</span>
                                    <h4>Rp. 1.000.000</h4>
                                </div>
                            </div>
                        </div>
                        <div class="single-side">
                            <h5>Game</h5>
                            <div class="game-area d-flex align-items-center">
                                <img src="<?php echo base_url('/assets/begam/images/game-left.png'); ?>" alt="images">
                                <div class="right-side">
                                    <h6>Game</h6>
                                    <p>Mobile Legend Bang-Bang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="tab-pane fade" id="participants" role="tabpanel" aria-labelledby="participants-tab">
          <div class="participants">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="participants-area pb-120">
                              <h4>Confirmed</h4>
                              <div class="participants-single">
                                  <div class="left-area d-flex align-items-center">
                                      <img src="<?php echo base_url('/assets/begam/images/participant-1.png'); ?>" alt="images">
                                      <div class="right-side">
                                          <h6>Miracle Rosser</h6>
                                      </div>
                                  </div>
                                  <div class="right-area">
                                      <div class="nice-select"><span class="current single-item share">
                                              <span class="dot"></span>
                                              <span class="dot"></span>
                                              <span class="dot"></span>
                                          </span>
                                          <ul class="list">
                                              <li><a href="#"><i class="fab fa-facebook-f"></i>Share</a></li>
                                              <li><a href="profile.html"><i class="fas fa-share-alt"></i>View Profile</a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <form id="payment-form" method="post" action="<?=site_url()?>snap/finish">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
    </form>

</section>
<!-- Testimonials Content End -->

<script src="<?php echo base_url('/assets/begam/js/jquery-3.5.1.min.js'); ?>"></script>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-C_hVzhEuRXcHPsa6"></script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script>
  $('#BTN_JOIN').click(function (event) {
    event.preventDefault();
    if(!confirm('Daftar Event ini?')) return
    $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: "<?php echo site_url('snap/token') ?>",
      cache: false,
      type: "POST",
      data: {
        id_event: "<?php echo $data[0]['id_event']; ?>"
      },
      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });
</script>
<?php include 'footer.php'; ?>