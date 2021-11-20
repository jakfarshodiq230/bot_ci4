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
                        <h6 class="card-title">Edit Akun</h6>
                    <form id="form_akun" method="POST" role="form" action="<?= base_url('Akun/update/'.$akun->id_user)?>">
                        <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">                            
                           <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" id="nama" name="nama" value="<?= $akun->nama_user ?>" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="nama" class="mdc-floating-label">Nama</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" id="username" name="username" value="<?= $akun->username ?>" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="username" class="mdc-floating-label">Username</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" id="email_user" name="email_user"  value="<?= $akun->email ?>" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="email_user" class="mdc-floating-label">Email</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                    <select class="mdc-text-field__input"  name="level_user" id="level_user" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                        <?php if($akun->level == "admin"){?>    
                                            <option value="admin" selected>Admin</option>
                                            <option value="dosen">Dosen</option>
                                        <?php }elseif($akun->level == "dosen"){?>  
                                            <option value="admin" >Admin</option>
                                            <option value="dosen" selected>Dosen</option>
                                        <?php } ?>
                                    </select>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="level_user" class="mdc-floating-label">Level</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                    <select class="mdc-text-field__input"  name="keterangan" id="keterangan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                        <?php if($akun->keterangan == "aktif"){?>    
                                            <option value="aktif" selected>Aktif</option>
                                            <option value="tidak aktif">Tidak Aktif</option>
                                        <?php }elseif($akun->keterangan == "tidak aktif"){?>  
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
                                <a href="<?= base_url('akun')?>" class="mdc-button mdc-button--raised w-100">
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