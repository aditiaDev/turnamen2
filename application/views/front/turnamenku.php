<?php include 'atas.php'; ?>
<?php include 'menu.php'; ?>

<!-- Browse Tournaments start -->
<section id="tournaments-section">
    <div class="overlay pt-120 pb-120">
        <div class="container wow fadeInUp">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-header">
                        <h2 class="title">Turnamenku</h2>
                    </div>
                </div>
            </div>
            <?php
              foreach($data as $row){
            ?>
            <div class="single-item">
              <div class="row">
                  <div class="col-lg-3 col-md-3 d-flex align-items-center">
                      <img class="top-img" src="<?php echo base_url('/assets/begam/images/game-img-1.png'); ?>" alt="image">
                  </div>
                  <div class="col-lg-6 col-md-9 d-flex align-items-center">
                      <div class="mid-area">
                          <h4><?php echo $row['nm_event']; ?></h4>
                          <div class="title-bottom d-flex">
                              <div class="time-area bg">
                                  <img src="<?php echo base_url('/assets/begam/images/waitng-icon.png'); ?>" alt="image">
                                  <span>Tanggal Event</span>
                              </div>
                              <div class="date-area bg">
                                  <span class="date"><?php echo $row['tgl_event']; ?></span>
                              </div>
                          </div>
                          <div class="single-box d-flex">
                              <div class="box-item">
                                  <span class="head">Pendaftaran</span></br>
                                  <span class="sub" style="padding: 0px 10px;"><?php echo $row['tgl_pendaftaran']; ?></span>
                              </div>
                              <div class="box-item">
                                  <span class="head">Pertempuran</span></br>
                                  <span class="sub" style="padding: 0px 10px;">Antar Team</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 d-flex align-items-center">
                      <div class="prize-area text-center">
                          <div class="contain-area">
                              <span class="prize"><img src="<?php echo base_url('/assets/begam/images/price-coin.png'); ?>" alt="image">Biaya</span>
                              <h4 class="dollar">Rp. <?php echo number_format($row['biaya_pendaftaran'],2,',','.'); ?></h4>
                              <a href="<?php echo base_url("front/dtlEvent/").$row['id_event']; ?>" class="cmn-btn">View Tournament</a>
                              <p>Top 3 Players Win</p>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Browse Tournaments end -->


<!-- Players of the Week In start -->
<section id="players-week-section">
    <div class="overlay pt-120 pb-120">
        <div class="container wow fadeInUp">
            <div class="row justify-content-center">
                <div class="col-lg-7 mb-30">
                    <div class="section-header text-center">
                        <h2 class="title">Players of the Week</h2>
                        <p>We take a look at the best player of the week awarded
                            on Monday for the previous Monday to Sunday</p>
                    </div>
                </div>
            </div>
            <div class="row mp-none">
                <div class="col-lg-4 col-md-6">
                    <div class="single-item text-center">
                        <div class="img-area">
                            <div class="img-wrapper">
                                <img src="<?php echo base_url('/assets/begam/images/player-1.png'); ?>" alt="image">
                            </div>
                        </div>
                        <a href="profile.html"><h5>Barton Griggs</h5></a>
                        <p class="date">
                            <span class="text-sm earn">1970 XP Earned</span>
                            <span class="text-sm">04/05 - 04/12</span>
                        </p>
                        <p class="text-sm credit">
                            <span class="text-sm"><img src="<?php echo base_url('/assets/begam/images/credit-icon.png'); ?>" alt="image"> +20 credits</span>
                        </p>
                        <a href="profile.html" class="cmn-btn">View Profile</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-item mid-area text-center">
                        <div class="top-level">
                            <img src="<?php echo base_url('/assets/begam/images/star.png'); ?>" alt="image">
                        </div>
                        <div class="img-area">
                            <div class="img-wrapper">
                                <img src="<?php echo base_url('/assets/begam/images/player-2.png'); ?>" alt="image">
                            </div>
                        </div>
                        <a href="profile.html"><h5>Mervin Trask</h5></a>
                        <p class="date">
                            <span class="text-sm earn">1970 XP Earned</span>
                            <span class="text-sm">04/05 - 04/12</span>
                        </p>
                        <p class="text-sm credit">
                            <span class="text-sm"><img src="<?php echo base_url('/assets/begam/images/credit-icon.png'); ?>" alt="image"> +20 credits</span>
                        </p>
                        <a href="profile.html" class="cmn-btn">View Profile</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-item text-center">
                        <div class="img-area">
                            <div class="img-wrapper">
                                <img src="<?php echo base_url('/assets/begam/images/player-3.png'); ?>" alt="image">
                            </div>
                        </div>
                        <a href="profile.html"><h5>Adria Poulin</h5></a>
                        <p class="date">
                            <span class="text-sm earn">1970 XP Earned</span>
                            <span class="text-sm">04/05 - 04/12</span>
                        </p>
                        <p class="text-sm credit">
                            <span class="text-sm"><img src="<?php echo base_url('/assets/begam/images/credit-icon.png'); ?>" alt="image"> +20 credits</span>
                        </p>
                        <a href="profile.html" class="cmn-btn">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Players of the Week In end -->

<!-- Features In start -->
<section id="features-section">
    <div class="overlay pt-120">
        <div class="container wow fadeInUp">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-header text-center">
                        <h2 class="title">MOBA GAMES</h2>
                        <p>Turnamen esports Mobile Legend Terbaik kapan saja, di mana saja</p>
                    </div>
                </div>
            </div>
            <div class="row pm-none">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-item text-center">
                        <div class="img-area">
                            <img src="<?php echo base_url('/assets/begam/images/features-icon-1.png'); ?>" alt="image">
                        </div>
                        <h5>Daftarkan Team Anda</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-item text-center">
                        <div class="img-area">
                            <img src="<?php echo base_url('/assets/begam/images/features-icon-6.png'); ?>" alt="image">
                        </div>
                        <h5>Ikuti Turnamennya</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-item text-center">
                        <div class="img-area">
                            <img src="<?php echo base_url('/assets/begam/images/features-icon-5.png'); ?>" alt="image">
                        </div>
                        <h5>Menangkan Hadiahnya</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features In end -->

<!-- Call to Action In start -->
<section id="call-to-action">
    <div class="overlay pt-120 pb-120">
        <div class="container">
            <div class="main-content">
                <div class="row d-sm-flex justify-content-sm-end">
                    <div class="col-lg-4 col-md-1">
                        <img class="left" src="<?php echo base_url('/assets/begam/images/call-to-action-left.png'); ?>" alt="image">
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-5 d-flex align-items-center">
                        <div class="section-item">
                            <h4>Undang Teman dan Menangkan Hadiah. Bergabunglah dengan kami sekarang juga.</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 d-flex justify-content-center justify-content-sm-end align-items-center">
                        <div class="btn-area d-flex justify-content-center justify-content-sm-end align-items-center">
                            <a href="<?php echo base_url("login/register")?>" class="cmn-btn">Daftar Sekarang</a>
                        </div>
                        <img src="<?php echo base_url('/assets/begam/images/call-to-action-right.png'); ?>" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Call to Action In end -->

<script src="<?php echo base_url('/assets/begam/js/jquery-3.5.1.min.js'); ?>"></script>

<?php include 'footer.php'; ?>