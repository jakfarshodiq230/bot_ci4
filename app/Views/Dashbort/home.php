<?= $this->extend('layout/template') ?>
 
<?= $this->section('content') ?>
<main class="content-wrapper">
    <div class="mdc-layout-grid pop">
         <?php
            if(session('error')){
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><i class="material-icons mdc-button__icon">warning</i></strong> <?= session('error') ?>
              <button type="button" class="close" id="exit" name="exit" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
            }elseif(session('success')){
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong><i class="material-icons mdc-button__icon">warning</i></strong> <?= session('success') ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php } ?>
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
            <div class="mdc-card info-card info-card--success">
                <div class="card-inner">
                <h5 class="card-title">Mahasiswa</h5>
                <h5 class="font-weight-light pb-2 mb-1 border-bottom"><?=  $data['mahasiswa'] ?> Orang</h5>
                <div class="card-icon-wrapper">
                    <i class="material-icons">account_circle</i>
                </div>
                </div>
            </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
            <div class="mdc-card info-card info-card--danger">
                <div class="card-inner">
                <h5 class="card-title">Tahun Ajaran</h5>
                <h5 class="font-weight-light pb-2 mb-1 border-bottom"><?=  $data['tahun_ajaran'] ?></h5>
                <div class="card-icon-wrapper">
                    <i class="material-icons">attach_money</i>
                </div>
                </div>
            </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
            <div class="mdc-card info-card info-card--primary">
                <div class="card-inner">
                <h5 class="card-title">Matakuliah</h5>
                <h5 class="font-weight-light pb-2 mb-1 border-bottom"><?=  $data['matakuliah'] ?></h5>
                <div class="card-icon-wrapper">
                    <i class="material-icons">trending_up</i>
                </div>
                </div>
            </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
            <div class="mdc-card info-card info-card--info">
                <div class="card-inner">
                <h5 class="card-title">Akun</h5>
                <h5 class="font-weight-light pb-2 mb-1 border-bottom"><?=  $data['akun'] ?></h5>
                <div class="card-icon-wrapper">
                    <i class="material-icons">credit_card</i>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>