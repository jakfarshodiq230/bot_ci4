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
            <h4 class="card-title mb-0">Data Semester</h4>
            <div>
                <a href="<?= base_url('Semester/tambah')?>"><button class="mdc-button mdc-button--raised icon-button filled-button--scoundary mb-3" title="Edit">
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
                <th >Semester</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              <?php
              foreach ($semester as $semester) {
                // var_dump($semester);
                
              ?>
              <tr>
                <td class="text-left"><?= $nomor++; ?></td>
                <td ><?= $semester['id_sem'];?></td>
                <td ><?= $semester['nama_sem'];?></td>
                <td><?= $semester['keterangan'];?></td>
                <td>
                  <div>
                      <a href="<?= base_url('Semester/delete/'.$semester['id_sem']) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--secondary" title="Hapus">
                        <i class="material-icons mdc-button__icon">delete</i>
                      </button></a>
                      <a href="<?= base_url('Semester/edit/'.$semester['id_sem']) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--success" title="Edit">
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