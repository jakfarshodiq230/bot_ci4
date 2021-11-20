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
                        <h6 class="card-title">Tambah Nilai</h6>
                    <form id="form_semester" method="POST" role="form" action="<?= base_url('Nilai/add')?>">
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
                                <input class="mdc-text-field__input" id="nim" name="nim"  required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')" onKeyUp="CekNIM()" onkeypress="return hanyaAngka(event)">
                                <span id="notif">NIM Tidak Terdaftar</span>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="nim" class="mdc-floating-label">NIM</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" value=" " id="nama" name="nama"  readonly>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="nama" class="mdc-floating-label">NAMA</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div id="id_matakuliah" class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                    <select class="mdc-text-field__input"  name="matakuliah" id="matakuliah" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                        <option value=" ">PILIH</option>
                                        <?php
                                            foreach ($matakuliah as $Matakuliah) {        
                                        ?>    
                                        <option value="<?=  $Matakuliah['id_makul']?>"><?= $Matakuliah['id_makul'].'-'. $Matakuliah['nama_makul']?></option>
                                        <?php } ?>
                                    </select>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="matakuliah" class="mdc-floating-label">Mata Kuliah</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div id="id_tahun" class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                   <input class="mdc-text-field__input" id="kurikulum" name="kurikulum" value="pilih" readonly></input>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="kurikulum" class="mdc-floating-label">Tahun Kurikulum</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            
                            <div id="id_semester"  class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                   <input class="mdc-text-field__input" id="semester" name="semester" value="pilih" readonly>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                    <label for="semester" class="mdc-floating-label">Semester</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div id="id_nilai" class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                <input class="mdc-text-field__input" id="nilai" name="nilai"  required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="nilai" class="mdc-floating-label">Nilai</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                </div>
                            </div>
                            <div id="id_tanggalher" class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                <input type="date" class="mdc-text-field__input" id="tanggalher" name="tanggalher"  required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="tanggalher" class="mdc-floating-label">Tanggal Her</label>
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
                                <a href="<?= base_url('Nilai')?>" class="mdc-button mdc-button--raised w-100">
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

<script type="text/javascript">
        //  nim
    document.getElementById("#id_simpan").disabled = true;
    $('#notif').hide();
    $("#id_tahun").hide();
    $("#id_semester").hide();  
    $("#id_nilai").hide();
    $("#id_tanggalher").hide();
    $("#id_matakuliah").hide();
    function CekNIM(){
        var nim=$("#nim").val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Nilai/cekMahasiswa')?>",
            dataType : "JSON",
            data : {nim: nim},
            cache:false,
            success: function(data){
                $.each(data,function(nim,nama){
                    $('[id="nama"]').val(data.nama);
                console.log(data);    
                });
                if(data !== null){
                    $("#id_matakuliah").show();
                     $('#notif').hide();
                }else{
                    $("#nama").val('');
                    $("#id_tahun").hide();
                    $("#id_semester").hide();
                    $("#id_nilai").hide();
                    $("#id_tanggalher").hide();
                    $("#matakuliah").hide();
                    $('#notif').show();
                }
            }
        });
        return false;
    }
 $(document).ready(function() {
      
    //  matakuliah 
     $('#matakuliah').change(function(){
        var id_makul=$("#matakuliah").val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Nilai/cekMatakuliah')?>",
            dataType : "JSON",
            data : {id_makul: id_makul},
            cache:false,
            success: function(data){
                $.each(data,function(id_makul,nama_makul,nama_sem, nama_ta){
                    $('[id="kurikulum"]').val(data.nama_ta);
                    $('[id="semester"]').val(data.nama_sem);
                console.log(data);    
                });
                if(data !== null){
                    $("#id_tahun").show();
                    $("#id_semester").show();
                    $("#id_nilai").show();
                    $("#id_tanggalher").show();
                    document.getElementById("#id_simpan").disabled = false;
                }else{
                   
                    $("#id_tahun").hide();
                    $("#id_semester").hide();
                    $("#id_nilai").hide();
                    $("#id_tanggalher").hide();
                }
            }
        });
        return false;
     })
    
 })
 function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}
</script>

<?= $this->endSection() ?>