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
            <h4 class="card-title mb-0">Data Matakuliah</h4>
            <div>
                <a href="<?= base_url('Matakuliah/importExcel')?>"><button class="mdc-button mdc-button--raised icon-button filled-button--warning" title="Excel">
                  <i class="material-icons mdc-button__icon">cloud_upload</i>
                </button></a>
                <a href="<?= base_url('Matakuliah/tambah')?>"><button class="mdc-button mdc-button--raised icon-button filled-button--scoundary" title="Tambah">
                  <i class="material-icons mdc-button__icon">add</i>
                </button></a>
            </div>
          </div>
        <div class="table-responsive">
          <table class="table table-hoverable" id="myTable">
            <thead>
              <tr>
                <th class="text-left">No.</th>
                <th >IDMatakuliah</th>
                <th >Matakuliah</th>
                <th >Ambang Batas</th>
                <th>Semester</th>
                <th>Tahun Ajaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            
            <tbody>
              <?php
              foreach ($data['joinmatakuliah'] as $matakuliah) {
                // var_dump($semester);
                
              ?>
              <tr>
                <td class="text-left"><?= $data['nomor']++; ?></td>
                <td ><?= $matakuliah->id_makul;?></td>
                <td ><?= $matakuliah->nama_makul;?></td>
                <td ><?= $matakuliah->standart_nilai;?></td>
                <td><?= $matakuliah->nama_sem;?></td>
                 <td><?= $matakuliah->nama_ta;?></td>
                <td>
                  <div>
                      <a href="<?= base_url('Matakuliah/delete/'.$matakuliah->id_makul) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--secondary" title="Hapus">
                        <i class="material-icons mdc-button__icon">delete</i>
                      </button></a>
                      <a href="<?= base_url('Matakuliah/edit/'.$matakuliah->id_makul) ?>"><button class="mdc-button mdc-button--raised icon-button filled-button--success" title="Edit">
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