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
                        <h6 class="card-title">Edit Mahasiswa</h6>
                    <form id="form_mahasiswa" method="POST" role="form" action="<?= base_url('Mahasiswa/update/'.$mahasiswa->nim)?>">
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
                                <input class="mdc-text-field__input" id="nim" name="nim" value="<?= $mahasiswa->nim?>"  required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')" readonly>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="nim" class="mdc-floating-label">nim</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" id="nama" name="nama" value="<?= $mahasiswa->nama?>" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="nama" class="mdc-floating-label">nim</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                 <select class="mdc-text-field__input"  name="tahunangkatan" id="tahunangkatan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                        <option value=" ">PILIH</option>
                                        <?php for($thn=date('Y'); $thn>=2000; $thn--) {
                                            if($mahasiswa->tahun_angkatan == $thn){
                                        ?>
                                            <option value="<?= $thn ?>" selected><?= $thn ?></option>
                                        <?php
                                            }else{
                                        ?>
                                            <option value="<?= $thn ?>"><?= $thn ?></option>
                                        <?php }} ?>
                                    </select>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="tahunangkatan" class="mdc-floating-label">Tahun Angkatan</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                    <select class="mdc-text-field__input"  name="keterangan" id="keterangan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                       <?php if($mahasiswa->keterangan == "aktif"){?>    
                                            <option value="aktif" selected>Aktif</option>
                                            <option value="tidak aktif">Tidak Aktif</option>
                                        <?php }elseif($mahasiswa->keterangan == "tidak aktif"){?>  
                                            <option value="aktif" >Aktif</option>
                                            <option value="tidak aktif" selected>Tidak Aktif</option>
                                        <?php } ?>
                                    </select>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="keterangan" class="mdc-floating-label">Keterangan</label>
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
                                <a type="button" href="<?= base_url('Mahasiswa')?>" class="mdc-button mdc-button--raised w-100">
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
<?= $this->endSection() ?>