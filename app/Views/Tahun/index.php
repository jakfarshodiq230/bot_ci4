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
          <div class="d-flex justify-content-between">
            <h4 class="card-title mb-0">Data Tahun</h4>
            <div>
                <a href="<?= base_url('Tahun/tambah')?>"><button class=" mb-3 mdc-button mdc-button--raised icon-button filled-button--scoundary" title="Edit">
                  <i class="material-icons mdc-button__icon">add</i>
                </button></a>
            </div>
          </div>
        <div class="table-responsive">
          <table class="table table-hoverable" id="myTable">
            <thead>
              <tr>
                <th class="text-left">No.</th>
                <th >ID</th>
                <th >Tahun</th>
                <th>Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              <?php
              foreach ($data['tahun'] as $tahun) {
                // var_dump($semester);
                
              ?>
              <tr>
                <td class="text-left"><?= $data['nomor']++; ?></td>
                <td ><?= $tahun['id_ta'];?></td>
                <td ><?= $tahun['nama_ta'];?></td>
                <td>
                  <div>
                      <a href="<?= base_url('Tahun/delete/'.$tahun['id_ta']) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--secondary" title="Hapus">
                        <i class="material-icons mdc-button__icon">delete</i>
                      </button></a>
                      <a href="<?= base_url('Tahun/edit/'.$tahun['id_ta']) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--success" title="Edit">
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