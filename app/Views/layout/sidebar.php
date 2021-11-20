<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      <div class="mdc-drawer__header">
        <a href="<?=base_url('/Home')?>" class="brand-logo">
          <img src="<?= base_url('template/assets/images/logo.svg')?>" alt="logo">
        </a>
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name"><?= session('nama'); ?></p>
          <p class="email"><?= session('level'); ?></p>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link"  href="<?=base_url('/Home')?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                Dashboard
              </a>
            </div>
             <?php if(session('level') == "admin"){?>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="ui-sub-menu">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">list</i>
                Master Data
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="ui-sub-menu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?=base_url('/Matakuliah')?>">
                      Matakuliah
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?=base_url('/Semester')?>">
                      Semester
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?=base_url('/Tahun')?>">
                      Tahun Ajaran
                    </a>
                  </div>
                </nav>
              </div>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?=base_url('/Mahasiswa')?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">folder_shared</i>
                Mahasiswa
              </a>
            </div>
            <?php } ?>
            <?php if(session('level') == "admin" || session('level') == "dosen" ){?>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?=base_url('/Nilai')?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">poll</i>
                Nilai
              </a>
            </div>
             <?php } ?>
              <?php if(session('level') == "admin"){?>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?=base_url('/Akun')?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">account_circle</i>
                Akun
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?=base_url('/Bot_nilai')?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">send</i>
                BOT SMS
              </a>
            </div>
           <?php } ?>
           <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="<?=base_url('/Login/Logout')?>">
              <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">account_circle</i>
              Logout
            </a>
          </div>
          </nav>
        </div>
      </div>
    </aside>