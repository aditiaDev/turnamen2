<?php include 'atas.php'; ?>
<?php include 'menu.php'; ?>


<!-- banner-section start -->
<section id="banner-section" class="inner-banner profile">
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
                            <h1>Profile Page</h1>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb d-flex justify-content-center">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url("front/")?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Team</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="heading-area">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <div class="profile-area d-flex align-items-center">
                            <div class="photo">
                                <img style="max-width: 100px;border-radius: 50px;" src="<?php echo base_url('/assets/images/team/'.$data[0]['logo']); ?>" alt="Image">
                            </div>
                            <div class="name-area">
                                <h4><?php echo $data[0]['nm_team']; ?></h4>
                                <span><?php echo $data[0]['alamat_team']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-end">
                        <div class="right d-flex align-items-center">
                            <a href="#" class="cmn-btn">Message</a>
                            <div class="user-logo d-flex align-items-center justify-content-center">
                                <img src="<?php echo base_url('/assets/begam/images/user-icon.png'); ?>" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- banner-section end -->

<!-- Trophies Content Start -->
<section id="all-trophies" class="pb-120">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="overview-tab">
                
                <div class="statistics-area">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="total-area">
                                <div class="head-area d-flex justify-content-between">
                                    <div class="left">
                                        <h5>Game Statistics</h5>
                                        <p class="text-sm">Player's game specific statistics</p>
                                    </div>
                                    <div class="right">
                                        <p class="text-sm">Last Update: <span>3 days ago</span></p>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="fortnite-tab" data-toggle="tab" href="#fortnite" role="tab" aria-controls="fortnite"
                                            aria-selected="true">Mobile Legend</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContents">
                                    <div class="tab-pane fade show active" id="fortnite" role="tabpanel" aria-labelledby="fortnite-tab">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="single-item text-center">
                                                    <img src="<?php echo base_url('/assets/begam/images/statistics-icon-1.png'); ?>" alt="image">
                                                    <p>Tournaments Entered</p>
                                                    <h4>10</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="single-item text-center">
                                                    <img src="<?php echo base_url('/assets/begam/images/statistics-icon-2.png'); ?>" alt="image">
                                                    <p>Kills Per Game (Average)</p>
                                                    <h4>20</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="single-item text-center">
                                                    <img src="<?php echo base_url('/assets/begam/images/statistics-icon-3.png'); ?>" alt="image">
                                                    <p>Games Played League of Legends</p>
                                                    <h4>5</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="single-item text-center">
                                                    <img src="<?php echo base_url('/assets/begam/images/statistics-icon-4.png'); ?>" alt="image">
                                                    <p>Earnings (Per tournament)</p>
                                                    <h4>0</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="sidebar-area">
                                <div class="title-area">
                                    <h5>My Statistics</h5>
                                    <p class="text-sm">My Current progress</p>
                                </div>
                                <ul>
                                    <li>
                                        <span><img src="<?php echo base_url('/assets/begam/images/my-statistics-icon-1.png'); ?>" alt="image">Avg. Finish Rank</span>
                                        <span>313</span>
                                    </li>
                                    <li>
                                        <span><img src="<?php echo base_url('/assets/begam/images/my-statistics-icon-2.png'); ?>" alt="image">Total Games Played</span>
                                        <span>1193</span>
                                    </li>
                                    <li>
                                        <span><img src="<?php echo base_url('/assets/begam/images/my-statistics-icon-3.png'); ?>" alt="image">Tournaments Played</span>
                                        <span>24</span>
                                    </li>
                                    <li>
                                        <span><img src="<?php echo base_url('/assets/begam/images/my-statistics-icon-4.png'); ?>" alt="image">Times Paid</span>
                                        <span>10</span>
                                    </li>
                                    <li>
                                        <span><img src="<?php echo base_url('/assets/begam/images/my-statistics-icon-5.png'); ?>" alt="image">Tournaments Won</span>
                                        <span>02</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trophies Content End -->


<script src="<?php echo base_url('/assets/begam/js/jquery-3.5.1.min.js'); ?>"></script>
<script>
  
</script>
<?php include 'footer.php'; ?>