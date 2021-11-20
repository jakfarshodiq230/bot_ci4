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
                        <h6 class="card-title">Edit Tahun</h6>
                    <form id="form_tahun" method="POST" role="form" action="<?= base_url('Tahun/update/'.$tahun->id_ta)?>">
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
                                <input class="mdc-text-field__input" id="tahun" name="tahun" value="<?= $tahun->nama_ta;?>"  required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="tahun" class="mdc-floating-label">Tahun</label>
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
                                <a href="<?= base_url('Tahun')?>" class="mdc-button mdc-button--raised w-100">
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