<?= $this->extend('layout/template') ?>
 
<?= $this->section('content') ?>
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
          <div class="d-flex justify-content-between mb-4">
            <h4 class="card-title mb-0">Data Mahasiswa</h4>
            <div>
               <a href="<?= base_url('Mahasiswa/importExcel')?>"><button class="mdc-button mdc-button--raised icon-button filled-button--warning" title="excel">
                  <i class="material-icons mdc-button__icon">cloud_upload</i>
                </button></a>
                <a href="<?= base_url('Mahasiswa/tambah')?>"><button class="mdc-button mdc-button--raised icon-button filled-button--scoundary" title="Tambah">
                  <i class="material-icons mdc-button__icon">add</i>
                </button></a>
            </div>
          </div>
        <div class="table-responsive">
          <table class="table table-hoverable" id="myTable">
            <thead>
              <tr>
                <th class="text-left">No.</th>
                <th >NIM</th>
                <th >Nama</th>
                <th >Tahun Angkatan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              <?php
              $nomor =0;
              foreach ($data['mahasiswa'] as $Mahasiswa) {
                $nomor = $nomor +1;
                
              ?>
              <tr>
                <td class="text-left"><?= $nomor ?></td>
                <td ><?= $Mahasiswa['nim'];?></td>
                <td ><?= $Mahasiswa['nama'];?></td>
                <td ><?= $Mahasiswa['tahun_angkatan'];?></td>
                <td><?= $Mahasiswa['keterangan'];?></td>
                <td>
                  <div>
                      <a href="<?= base_url('Mahasiswa/delete/'.$Mahasiswa['nim']) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--secondary" title="Hapus">
                        <i class="material-icons mdc-button__icon">delete</i>
                      </button></a>
                      <a href="<?= base_url('Mahasiswa/edit/'.$Mahasiswa['nim']) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--success" title="Edit">
                        <i class="material-icons mdc-button__icon">edit</i>
                      </button></a>
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</main>
<?= $this->endSection() ?>