<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main class="content-wrapper">
    <!-- 2 kolom -->
    <div class="row mt-2">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-12 col-7 d-flex justify-content-between">
                  <h4>Data Bot</h4>
                   <a href="<?= base_url('Bot_nilai/add')?>"><button class="mb-3 mdc-button mdc-button--raised icon-button filled-button--scoundary" title="Edit">
                  <i class="material-icons mdc-button__icon">add</i>
                </button></a>
                </div>
              </div>
            </div>
            <div class="card-body px-3 pb-3">
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
                <div class="table-responsive">
                    <table class="table table-hoverable" id="mydata">
                        <thead>
                        <tr>
                            <th class="text-left">No.</th>
                            <th >Username BOT</th>
                            <th >Api Token</th>
                            <th >URL</th>
                            <th >Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="show_data">

                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-md-0">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h4>Seting Bot Telegram</h4>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <!-- form -->
                  <div id="api_bot" class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop mt-2">
                      <div class="mdc-text-field mdc-text-field--outlined">
                          <select class="mdc-text-field__input"  name="optionBot" id="optionBot" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                              <option value=" ">PILIH</option>
                          </select>
                      <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch">
                          <label for="api_bot" class="mdc-floating-label">Username BOT</label>
                          </div>
                          <div class="mdc-notched-outline__trailing"></div>
                      </div>
                      </div>
                  </div>
                  <div id="aktif" class=" mt-4 mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop mt-2">
                      <div class="mdc-text-field mdc-text-field--outlined">
                          <select class="mdc-text-field__input"  name="status" id="status" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                              <option value=" ">PILIH</option>
                              <option value="aktif">Aktif</option>
                              <option value="tidak_aktif">Tidak Aktif</option>
                          </select>
                      <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch">
                          <label for="api_bot" class="mdc-floating-label">Status BOT</label>
                          </div>
                          <div class="mdc-notched-outline__trailing"></div>
                      </div>
                      </div>
                  </div>
                  <div  class=" mt-2 mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                      <input id="id_simpan" name="id_simpan" type="submit" value="Simpan" class="mdc-button mdc-button--raised w-100">
                  </div>
                  <div  class=" mt-2 mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                      <input id="id_ran" name="id_ran" type="submit" value="Jalankan" class="mdc-button mdc-button--raised w-100 filled-button--secondary">
                  </div>
                  <!-- tutup form -->
                  <div class=" mt-2 alert alert-warning alert-dismissible fade show" role="alert" id='gagal'>
                    <strong><i class="material-icons mdc-button__icon">warning</i></strong>GAGAL
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert" id='success'>
                    <strong><i class="material-icons mdc-button__icon">warning</i></strong>SUCCESS
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <!-- tutup notif -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- running -->
        <div class="mt-3 mdc-card">
            <!-- <div class="d-flex justify-content-between"> -->
              <div class="card">
                  <div class="card-header pb-0">
                    <div class="row">
                      <div class="col-lg-12 col-7 d-flex justify-content-between">
                         <h4 class="card-title mb-0">Runing Bot</h4>
                      </div>
                    </div>
                  </div>
                  <div class="card-body px-12 pb-12">
                    <div class="table-responsive">
                          <div class=" mt-2 alert alert-warning alert-dismissible fade show" role="alert" id='gagal_ran'>
                            <strong><i class="material-icons mdc-button__icon">warning</i></strong>Gagal Menjalankan Bot, Cek Url dan Api Token Bot
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class=" mt-2 alert alert-success alert-dismissible fade show" role="alert" id='success_ran'>
                            <strong><i class="material-icons mdc-button__icon">warning</i></strong>Success Bot Running
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <table class="table table-hoverable">
                          <thead>
                            <tr>
                                <th >OK</th>
                                <th >Result</th>
                                <th >Description</th>
                            </tr>
                        </thead>
                            <tbody class="show_data_runing">

                            </tbody>
                        </table>
                        
                    </div>
                  </div>
              </div>
            </div>
        <!-- </div> -->
    </div>
      
</main>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
    update();
    $("#gagal").hide();
    $("#success").hide();
    $("#id_ran").hide();
    $("#gagal_ran").hide();
    $("#success_ran").hide();
    // pusher realtime
    // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('201794f311ff9c368035', {
            cluster: 'ap1',
            forceTLS: true
        });

        var channel = pusher.subscribe('bot');
        channel.bind('my-event', function(data) {
            if(data.message === 'success'){
                update();
                $("#success").show();
            }else{
                $("#gagal").show();
            }
        });
// update tabel
  function update() {     
    $.ajax({
      url:"<?php echo base_url('Bot_nilai/DetailBOT')?>",
      type: "GET",
      async : true,
      dataType : 'json',
      success: function(data){
      var html = ' ';
      var no=0;
      for(i=0; i<data.length; i++){
        //console.log(data);
        var no= no+1;
          html +='<tr><td>'+no+'</td>'+
          '<td>'+data[i]['username_bot']+'</td>'+
          '<td>'+data[i]['api_token']+'</td>'+
          '<td>'+data[i]['url_bot']+'</td>'+
          '<td>'+data[i]['status']+'</td>'+
          '<td>'+
                  '<div>'+
                      '<a href="<?= base_url('Bot_nilai/delete') ?>/'+data[i]['id_bot']+'"><button class="mdc-button mdc-button--raised icon-button filled-button--secondary" title="Hapus">'+
                          '<i class="material-icons mdc-button__icon">delete</i>'+
                      '</button></a>'+
                      '<a href="<?= base_url('Bot_nilai/edit') ?>/'+data[i]['id_bot']+'"><button class="mdc-button mdc-button--raised icon-button filled-button--success" title="Edit">'+
                          '<i class="material-icons mdc-button__icon">edit</i>'+
                      '</button></a>'+
                  '</div>'+
                  '</td>'+
          '</tr>';
        }
        $('.show_data').html(html);
      }
    });
  }
// update table
    // pusher
      $.ajax({
        url  : "<?php echo base_url('Bot_nilai/DetailBOT')?>",
        dataType : "JSON",
        success: function(response){
          var data = response;    //Response should be array like option1 , option2, option3
          
          var option = '';
          for (var i=0;i<data.length;i++){
            option += '<option value="'+ data[i]['id_bot'] + '">' + data[i]['username_bot'] + '</option>';
          }
          //Now populate the second dropdown i.e "Sub Category"
          $('#optionBot').append(option);
        },
        error: function(){
          alert('failure');
        }
      });
      // seting webhook
      $(document).on('click', '#id_simpan', function(){
        var id_bot = $('#optionBot').val();
        var status = $('#status').val();
        $.ajax({
          url: "<?php echo base_url('Bot_nilai/SetingStatus')?>",
          type: 'POST',
          data: {
            'update': 1,
            'id_bot': id_bot,
            'status': status,
          },
          success: function(response){
                $.ajax({
                  type : "GET",
                  url  : "<?php echo base_url('Bot_nilai/DetailBOT')?>",
                  dataType : "JSON",
                  success: function(data1){
                    // console.log(data1);
                        for (var i=0;i<data1.length;i++){
                          if(id_bot == data1[i]['id_bot']){
                            console.log(data1[i]['id_bot']);
                              if(data1[i]['status'] == 'aktif'){
                                  $.ajax({
                                    type : "POST",
                                    url  : "https://api.telegram.org/bot2093405295:AAGVt0RXk2Xu_yeKS0eoV1xEYjuKq6QeG9E/setWebhook?url="+data1[i]['url_bot']+"/bot/administrator/public/CatBot",
                                    dataType : "JSON",
                                    success: function(data2){
                                    var html3=" ";
                                      console.log(data2);
                                      if(data2.ok == true){
                                        html3 += '<tr><td>'+data2.ok+'</td>'+
                                          '<td>'+data2.result+'</td>'+
                                          '<td>'+data2.description+'</td></tr>';
                                        $("#id_simpan").hide();
                                        $("#id_ran").show();
                                        $('.show_data_runing').html(html3);
                                      }
                                    },
                                    error:function(error){
                                      var html4="";
                                          html4 += '<tr><td>false</td>'+
                                          '<td>false</td>'+
                                          '<td>Bad Request: bad webhook: Failed to resolve host: No address associated with hostname</td></tr>';
                                          $('.show_data_runing').html(html4);
                                          $("#gagal_ran").show();
                                    }
                                    
                                  });
                              }
                          }
                        }
                  }
              });
          }
        });
      });
      // jalankan webhok
      $(document).on('click', '#id_ran', function(){
        var id_bot = $('#optionBot').val();
        var status = $('#status').val();
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('Bot_nilai/DetailBOT')?>",
            dataType : "JSON",
            success: function(data1){
              console.log(id_bot);
              for (var i=0;i<data1.length;i++){
                if(id_bot == data1[i]['id_bot']){
                  console.log(data1[i]['id_bot']);
                    if(data1[i]['status'] == 'aktif'){
                        $.ajax({
                          type : "POST",
                          url  : "https://api.telegram.org/bot2093405295:AAGVt0RXk2Xu_yeKS0eoV1xEYjuKq6QeG9E/setWebhook?url="+data1[i]['url_bot']+"/bot/administrator/public/CatBot",
                          dataType : "JSON",
                          success: function(data2){
                            // ran bot
                            var html2= " ";
                            console.log(data2);
                            if(data2.ok == true){
                              html2 += '<tr><td>'+data2.ok+'</td>'+
                                      '<td>'+data2.result+'</td>'+
                                      '<td>'+data2.description+'</td></tr>';
                              $("#id_simpan").show();
                              $("#id_ran").hide();
                              $('.show_data_runing').html(html2);
                              $("#success_ran").show();
                            }
                          }
                        });
                    }
                }
              }
            }
        });
      });
});
</script>
<?= $this->endSection() ?>