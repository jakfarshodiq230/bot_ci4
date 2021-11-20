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
                        <h6 class="card-title">Edit BOT</h6>
                    <form id="form_semester" method="POST" role="form" action="<?= base_url('Bot_nilai/Update/'.$bot['id_bot'])?>">
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
                            <div id="username_bot" class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                   <input class="mdc-text-field__input" id="username_bot" name="username_bot" value="<?= $bot['username_bot']?>" ></input>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="username_bot" class="mdc-floating-label">Username BOT</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div id="api_bot" class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                   <input class="mdc-text-field__input" id="api_bot" name="api_bot" value="<?= $bot['api_token']?>" ></input>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="api_bot" class="mdc-floating-label">Api Token BOT</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div id="url_bot" class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                   <input class="mdc-text-field__input" id="url_bot" name="url_bot" value="<?= $bot['url_bot']?>" ></input>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="url_bot" class="mdc-floating-label">Url BOT</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div  class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <!-- <a herf="#" id="simpan" class="mdc-button mdc-button--raised w-100">
                                    Simpan
                                </a> -->
                                <input id="#id_simpan" type="submit" value="Simpan" class="mdc-button mdc-button--raised w-100">
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <a href="<?= base_url('Bot_nilai')?>" class="mdc-button mdc-button--raised w-100">
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<?= $this->endSection() ?>