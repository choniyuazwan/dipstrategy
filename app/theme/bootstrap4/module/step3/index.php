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
        <h3 class="m-0 font-weight-bold text-white">Step 3</h3>
      </div>
      <div class="card-body text-justify">
        <div class="row col-lg-12">
          <div class="col-lg-12">
            <ol>
              <li>Setelah kamu menyelesaikan step 2, step saat ini berhubungan dengan step 2</li>
              <li>Buatlah format data yang dibutuhkan pada user di step 2 tadi menjadi format JSON untuk di konsumsi aplikasi lain</li>
              <li>Setelah selesai cukup di print atau echo saja di file step ini</li>
            </ol>
          </div>

          <?php 
            $dataJson = '{"ruasJalan":[{"id":1,"name":"Cawang - Tomang - Pluit","type":"rdk"},{"id":2,"name":"Cawang - Tanjung Priok - Ancol Timur - Jembatan Tiga/Pluit","type":"rdk"},{"id":3,"name":"Prof. Dr. Ir. Soedijatmo","type":"rs1"}],"ruasType":[{"id":1,"name":"RUAS DALAM KOTA","code":"rdk"},{"id":2,"name":"RUAS SEDIJATMO","code":"rs1"}],"ruasTarif":[{"id":1,"code":"rdk","type":"gol1","price":"9,000"},{"id":2,"code":"rdk","type":"gol2","price":"11,000"},{"id":3,"code":"rdk","type":"gol3","price":"14,500"},{"id":4,"code":"rdk","type":"gol4","price":"18,000"},{"id":5,"code":"rdk","type":"gol5","price":"18,000"},{"id":6,"code":"rs1","type":"gol1","price":"6,000"},{"id":7,"code":"rs1","type":"gol2","price":"7,500"},{"id":8,"code":"rs1","type":"gol3","price":"9,500"},{"id":9,"code":"rs1","type":"gol4","price":"11,500"},{"id":10,"code":"rs1","type":"gol5","price":"14,000"}]}';
            $data = json_decode($dataJson);
          ?>


        
          <div class="col-lg-12">
            <a href="./step4">Next</a>
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