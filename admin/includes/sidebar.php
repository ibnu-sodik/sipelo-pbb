<?php 
$page = @$_GET['page'];
?>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Utama</div>
                <a class="nav-link <?= (($page == ""||$page=="dashboard") ? 'active' : '') ?>" href="?page=dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link <?= (($page=="peserta") ? 'active' : '') ?>" href="?page=peserta">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Data Peserta
                </a>
                <?php if(has_permission('Admin')): ?>
                    <a class="nav-link <?= (($page=="juara") ? 'active' : '') ?>" href="?page=juara">
                        <div class="sb-nav-link-icon"><i class="fas fa-trophy"></i></div>
                        Data Juara
                    </a>
                <?php endif; ?>

                <div class="sb-sidenav-menu-heading">Data Nilai PBB</div>
                <a class="nav-link collapsed <?= (($page == "gerakan"||$page=="kreasi"||$page=="formasi"||$page=="variasi") ? 'active' : '') ?>" href="#" data-toggle="collapse" data-target="#dataPbb" aria-expanded="false" aria-controls="dataPbb">
                    <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                    Nilai PBB
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= (($page == "gerakan"||$page=="kreasi"||$page=="formasi"||$page=="variasi") ? 'show' : '') ?>" id="dataPbb" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= (($page=="gerakan") ? 'active' : '') ?>" href="?page=gerakan">PBB Murni</a>
                        <a class="nav-link <?= (($page=="kreasi") ? 'active' : '') ?>" href="?page=kreasi">PBB Kreasi</a>
                        <a class="nav-link <?= (($page=="formasi") ? 'active' : '') ?>" href="?page=formasi">PBB Formasi</a>
                        <a class="nav-link <?= (($page=="variasi") ? 'active' : '') ?>" href="?page=variasi">PBB Variasi</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Data Nilai Kategori</div>
                <a class="nav-link collapsed <?= (($page == "danton"||$page=="supporter"||$page=="juri") ? 'active' : '') ?>" href="#" data-toggle="collapse" data-target="#dataKategori" aria-expanded="false" aria-controls="dataKategori">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Nilai Kategori
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= (($page == "danton"||$page=="supporter"||$page=="juri") ? 'show' : '') ?>" id="dataKategori" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= (($page=="danton") ? 'active' : '') ?>" href="?page=danton">Nilai Danton</a>
                        <!-- <a class="nav-link <?= (($page=="supporter") ? 'active' : '') ?>" href="?page=supporter">Nilai Supporter</a> -->
                        <a class="nav-link <?= (($page=="juri") ? 'active' : '') ?>" href="?page=juri">Nilai Kostum (PBB)</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Menu Khusus</div>
                <a class="nav-link <?= (($page=="nilai_minus") ? 'active' : '') ?>" href="?page=nilai_minus">
                    <div class="sb-nav-link-icon"><i class="fas fa-minus"></i></div>
                    Pengurangan Nilai
                </a>
                <a class="nav-link <?= (($page=="nilai_final") ? 'active' : '') ?>" href="?page=nilai_final">
                    <div class="sb-nav-link-icon"><i class="fas fa-award"></i></div>
                    Nilai Final
                </a>
                <?php if(has_permission('Admin')): ?>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link <?= (($page=="user") ? 'active' : '') ?>" href="?page=user">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        User
                    </a>
                <?php endif; ?>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk Sebagai :</div>
            <?= $user_data['l_nama'].' '.$user_data['f_nama']; ?>
        </div>
    </nav>
</div>