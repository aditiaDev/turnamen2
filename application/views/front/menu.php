<!-- header-section start -->
<header id="header-section">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex header-area">
                <div class="logo-section flex-grow-1 d-flex align-items-center">
                    <a class="site-logo site-title" href="index.html"><img src="<?php echo base_url('/assets/begam/images/logo.png'); ?>" alt="site-logo"></a>
                </div>
                <button class="navbar-toggler ml-auto collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <nav class="navbar navbar-expand-lg p-0">
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav main-menu ml-auto">
                            <li><a href="<?php echo base_url("front/")?>" class="active">Home</a></li>
                            <li class="menu_has_children"><a href="#0">Turnamen</a>
                                <ul class="sub-menu">
                                  <?php if($this->session->userdata('id_user')){ ?>
                                    <li><a href="<?php echo base_url("front/turnamenku")?>">Turnamenku</a></li>
                                  <?php }?>
                                    <li><a href="<?php echo base_url("front/pembagianGrup")?>">Pembagian Grup</a></li>
                                    <li><a href="<?php echo base_url("front/jadwal")?>">Jadwal Pertandingan</a></li>
                                    <li><a href="<?php echo base_url("front/hasilPertandingan")?>">Hasil Pertandingan</a></li>
                                </ul>
                            </li>
                            <?php if($this->session->userdata('id_user')){ ?>
                            <li class="menu_has_children"><a href="#0">Team</a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo base_url("front/team")?>">Data Team</a></li>
                                    <li><a href="<?php echo base_url("front/peserta")?>">Data Anggota Team</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
                <?php if(!$this->session->userdata('id_user')){ ?>
                    <div class="right-area header-action d-flex align-items-center">
                        <a href="<?php echo base_url("login/")?>" class="login-btn">Login</a>
                        <a href="<?php echo base_url("login/register")?>" class="cmn-btn">Daftar!</a>
                    </div>
                <?php }else{ ?>
                    <div class="right-area header-action d-flex align-items-center">
                        <a href="<?php echo base_url("login/logout")?>" class="cmn-btn">Logout</a>
                    </div>
                <?php } ?>    
            </div>
        </div>
    </div>
</header>
<!-- header-section end -->