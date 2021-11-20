<?= $this->extend('layout/template') ?>
 
<?= $this->section('content') ?>
<main class="content-wrapper ">
    <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-layout-grid">
                <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-12-tablet"></div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-12-tablet">
                    <div class="mdc-card">
                        <h6 class="card-title">Tambah Matakuliah</h6>
                    <form id="form_semester" method="POST" role="form" action="<?= base_url('Matakuliah/add')?>">
                        <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo session()->getFlashdata('error'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" id="matakuliah" name="matakuliah"  required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="matakuliah" class="mdc-floating-label">Matakuliah</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" id="standartnilai" name="standartnilai"  required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="standartnilai" class="mdc-floating-label">Batas Ambang Nilai</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                    <select class="mdc-text-field__input"  name="semester" id="semester" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                        <option value=" ">PILIH</option>
                                        <?php
                                            foreach ($data['semester'] as $semester) {        
                                        ?>    
                                        <option value="<?= $semester['id_sem']?>"><?= $semester['id_sem'].'-'.$semester['nama_sem']?></option>
                                        <?php } ?>
                                    </select>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="semester" class="mdc-floating-label">Semester</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                    <select class="mdc-text-field__input"  name="tahunajaran" id="tahunajaran" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                        <option value=" ">PILIH</option>
                                        <?php
                                            foreach ($data['tahun'] as $tahun) {        
                                        ?>    
                                        <option value="<?= $tahun['id_ta']?>"><?= $tahun['id_ta'].'-'. $tahun['nama_ta']?></option>
                                        <?php } ?>
                                    </select>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="tahunajaran" class="mdc-floating-label">Tahun Ajaran</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <!-- <a herf="#" id="simpan" class="mdc-button mdc-button--raised w-100">
                                    Simpan
                                </a> -->
                                <input type="submit" value="Simpan" class="mdc-button mdc-button--raised w-100">
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <a href="<?= base_url('Matakuliah')?>" class="mdc-button mdc-button--raised w-100">
                                    Batal
                                </a>
                            </div>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-1-tablet"></div>
                </div>
            </div>
              </div>
            </div>
          </div>
</main>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
 $(document).ready(function() { 
     //Simpan Barang
        $('#simpan').on('click',function(){
            var semester=$('#semester').val();
            var keterangan=$('#keterangan').val();
                $.ajax({
                    type : "POST",
                    url  : "",
                    data : {semester:semester , keterangan:keterangan},
                    success: function(response){
                        $('input[name="semester"]').val("");
                        alert('sukses');
                    }
                });
                return false;
        });
 })
</script> -->
<?= $this->endSection() ?>