<?php global $site;
  $this->Controller();
  
  $this->layout('template/tpl-default');
   $assign = array(
        'title' => "Info"
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
        <h3 class="m-0 font-weight-bold text-white">Info</h3>
      </div>
      <div class="card-body text-justify">
        <div class="row col-lg-12">
          <ol>
            <li>
                <span>Source Code Ini menggunakan :</span>
                <ul>
                  <li><a href="http://www.phpactiverecord.org/projects/main/wiki/Quick_Start">Php ActiveRecord</a> sebagai ORM (untuk komunikasi ke database)</li>
                  <li><a href="https://github.com/mikecao/flight">Flight</a> sebagai Routing</li>
                  <li><a href="https://platesphp.com/engine/overview/">Plates</a> sebagai Template Strukture Folder pada modul yang akan di gunakan sebagai file suatu halaman atau fitur</li>
                  <li><a href="https://dev.mysql.com/doc/">Mysql</a> sebagai Database</li>
                </ul>
            </li>
            <li>Untuk menjalankan source code ini bisa menggunakan xampp / semacamnya</li>
            <li>Buatlah folder pada htdoc (menggunakan xampp) dengan nama <b>exam</b> sehingga dapat diakses melalu broser dengan url <b>http://localhost/exam</b> </li>
            <li>Copy source code ini kedalam folder yang sudah dibuat lalu akses melalu broser dengan url <b>http://localhost/exam</b></li>
            <li>Jalankan script database.sql pada database mysql yang sudah terinstal</li>
            <li>Klik <a href="./step1">Next</a> untuk melanjutkan</li>
          </ol>
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