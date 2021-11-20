<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php 
    function encrypt_url($string)
    {
        $output = false;
        //Hasil parsing masukkan kedalam variable
        $secret_key     = 4987632563987124;
        $secret_iv      = 4532879263570159;
        $encrypt_method = 'aes-256-cbc';

        //hash $secret_key dengan algoritma sha256 
        $key = hash("sha256", $secret_key);

        //iv(initialize vector), encrypt iv dengan encrypt method AES-256-CBC (16 bytes)
        $iv     = substr(hash("sha256", $secret_iv), 0, 16);
        $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($result);
        return $output;
    } 
?>
<main class="content-wrapper ">
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
       <div class="mdc-card">
         <?php
            if(session('error')){
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><i class="material-icons mdc-button__icon">warning</i></strong> <?= session('error') ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
          <div class="d-flex justify-content-between">
            <h4 class="card-title mb-0">Data Akun</h4>
            <div>
                <a href="<?= base_url('Akun/tambah')?>"><button class="mb-3 mdc-button mdc-button--raised icon-button filled-button--scoundary" title="Edit">
                  <i class="material-icons mdc-button__icon">add</i>
                </button></a>
            </div>
          </div>
        <div class="table-responsive">
          <table class="table table-hoverable">
            <thead>
              <tr>
                <th class="text-left">No.</th>
                <th >Nama</th>
                <th >Username</th>
                <th >Email</th>
                <th >level</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              <?php
              foreach ($data['akun'] as $Akun) {
                // var_dump($Akun);
                
              ?>
              <tr>
                <td class="text-left"><?= $data['nomor']++; ?></td>
                <td ><?= $Akun['nama_user'];?></td>
                <td ><?= $Akun['username'];?></td>
                <td ><?= $Akun['email'];?></td>
                <td ><?= $Akun['level'];?></td>
                <td><?= $Akun['keterangan'];?></td>
                <td>
                  <div>
                      <a href="<?= base_url('Akun/delete/'.encrypt_url($Akun['id_user'])) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--secondary" title="Hapus">
                        <i class="material-icons mdc-button__icon">delete</i>
                      </button></a>
                      <a href="<?= base_url('Akun/edit/'.encrypt_url($Akun['id_user'])) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--success" title="Edit">
                        <i class="material-icons mdc-button__icon">edit</i>
                      </button></a>
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <div style="float: right">
            <?php echo $data["pager"]->links('default', 'custom_pager') ?>
          </div>
        </div>
      </div>
    </div>
</main>
<?= $this->endSection() ?>