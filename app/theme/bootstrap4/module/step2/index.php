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
        <h3 class="m-0 font-weight-bold text-white">Step 2</h3>
      </div>
      <div class="card-body text-justify">
        <div class="row col-lg-12">
          <div class="col-lg-12">
            <ol>
              <li>Dibawah ini terdapat 3 data table non database.</li>
              <li>Yang harus kamu lakukan adalah menggabungkan ke 3 table tersebut menjadi 1 table yang di butuhkan user</li>
              <li>Untuk bentuk data 3 table tersebut bisa dilihat pada kodingan di step ini</li>
            </ol>
          </div>

          <?php 
            $dataJson = '{"ruasJalan":[{"id":1,"name":"Cawang - Tomang - Pluit","type":"rdk"},{"id":2,"name":"Cawang - Tanjung Priok - Ancol Timur - Jembatan Tiga/Pluit","type":"rdk"},{"id":3,"name":"Prof. Dr. Ir. Soedijatmo","type":"rs1"}],"ruasType":[{"id":1,"name":"RUAS DALAM KOTA","code":"rdk"},{"id":2,"name":"RUAS SEDIJATMO","code":"rs1"}],"ruasTarif":[{"id":1,"code":"rdk","type":"gol1","price":"9,000"},{"id":2,"code":"rdk","type":"gol2","price":"11,000"},{"id":3,"code":"rdk","type":"gol3","price":"14,500"},{"id":4,"code":"rdk","type":"gol4","price":"18,000"},{"id":5,"code":"rdk","type":"gol5","price":"18,000"},{"id":6,"code":"rs1","type":"gol1","price":"6,000"},{"id":7,"code":"rs1","type":"gol2","price":"7,500"},{"id":8,"code":"rs1","type":"gol3","price":"9,500"},{"id":9,"code":"rs1","type":"gol4","price":"11,500"},{"id":10,"code":"rs1","type":"gol5","price":"14,000"}]}';
            $data = json_decode($dataJson);
          ?>

          <div class="col-lg-4">
            <h5>Ruas Jalan</h5>
            <table class="table table-bordered">
              <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama Ruas</th>
                    <th>Tipe Ruas</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach ($data->ruasJalan as $key => $value) :?>
                  <tr>
                    <td><?=$value->id?></td>
                    <td><?=$value->name?></td>
                    <td><?=$value->type?></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          
          <div class="col-lg-4">
            <h5>Ruas Type</h5>
            <table class="table table-bordered">
              <thead>
                  <th>Id</th>
                  <th>Tipe Ruas</th>
                  <th>Kode Ruas</th>
              </thead>
              <tbody>
                <?php foreach ($data->ruasType as $key => $value) :?>
                  <tr>
                    <td><?=$value->id?></td>
                    <td><?=$value->name?></td>
                    <td><?=$value->code?></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          
          <div class="col-lg-4">
            <h5>Ruas Tarif</h5>
            <table class="table table-bordered">
              <thead>
                  <tr>
                    <th>Id</th>
                    <th>Kode</th>
                    <th>Golongan</th>
                    <th>Harga</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach ($data->ruasTarif as $key => $value) :?>
                  <tr>
                    <td><?=$value->id?></td>
                    <td><?=$value->code?></td>
                    <td><?=$value->type?></td>
                    <td><?=$value->price?></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <div class="col-lg-12">
            <h5>Data yang dibutuhkan user</h5>
            <table class="table table-bordered">
              <thead>
                  <tr>
                    <th rowspan="2">Id</th>
                    <th rowspan="2">Nama Ruas Jalan</th>
                    <th rowspan="2">Tipe Ruas Jalan</th>
                    <th colspan="5">Tarif</th>
                  </tr>
                  <tr>
                    <th>Gol 1</th>
                    <th>Gol 2</th>
                    <th>Gol 3</th>
                    <th>Gol 4</th>
                    <th>Gol 5</th>
                  </tr>
              </thead>
              <tbody>
              <?php
              function ruasType($data, $code) {
                foreach ($data->ruasType as $item) {
                  if ($code == $item->code) {
                    return $item->name;
                  }
                }
              }
              function ruasTarif($data, $code, $type) {
                foreach ($data->ruasTarif as $item) {
                  if ($code == $item->code && $type == $item->type) {
                    return $item->price;
                  }
                }
              }
              ?>
              <?php foreach ($data->ruasJalan as $key => $value) :?>
                  <tr>
                      <td><?= $value->id ?></td>
                      <td><?= $value->name ?></td>
                      <td><?= ruasType($data, $value->type) ?></td>
                      <td><?= ruasTarif($data, $value->type, "gol1") ?></td>
                      <td><?= ruasTarif($data, $value->type, "gol2") ?></td>
                      <td><?= ruasTarif($data, $value->type, "gol3") ?></td>
                      <td><?= ruasTarif($data, $value->type, "gol4") ?></td>
                      <td><?= ruasTarif($data, $value->type, "gol5") ?></td>
                  </tr>
              <?php endforeach;?>
              
              </tbody>
            </table>
          </div>
          <div class="col-lg-12">
            <a href="./step3">Next</a>
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
