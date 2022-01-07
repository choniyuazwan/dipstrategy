<?php global $site;
  $this->Controller();
  
  $this->layout('template/tpl-default');
   $assign = array(
        'title' => "Step 2"
    );
  $this->start('header'); 
  $this->insert('include/inc-header', $assign); 
  $this->stop();
?>


<?php
    $this->start('extheader');
    ?>
     
    <?php
    $this->stop('extheader');
?>



<?php $this->start('section')?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
</div>  
<div class="row">
  <div class="col-lg-6 offset-3">
    <div class="card shadow mb-4">
      <div class="card-header bg-info d-flex flex-row align-items-center justify-content-between">
        <h3 class="m-0 font-weight-bold text-white">Step 4</h3>
      </div>
      <div class="card-body text-justify">
        <div class="row col-lg-12">
          <div class="col-lg-12">
            <ol>
              <li>Pada step ini, buatlah form yang dapat terintegrasi ke database setelah user menginput data dan klik button save.</li>
              <li>Tampilkan data pada table yang sudah kamu buat untuk menampung inputan data oleh user dan tempatkan table dibawah form yang kamu buat</li>
              <li>Untuk form, table dan cara kamu mengintegrasikan ke database bisa menggunakan apa yang kamu ketahui dan untuk tema atau struktur table dan formnya ditentukan oleh kamu sendiri</li>
              <li>Untuk lokasi database bisa menggunakan database yang sudah digunakan pada source code ini atau step 1</li>
            </ol>
          </div>

          <div class="col-lg-12">
            <a href="./finish">Next</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->stop() ?>



<?php
    $this->start('footer'); $this->insert('include/inc-footer'); $this->stop();
?>




<?php $this->start('extfooter');?>
<?php $this->stop();?>