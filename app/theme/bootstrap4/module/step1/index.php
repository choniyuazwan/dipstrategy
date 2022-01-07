<?php global $site;
  $this->Controller();
  
  $this->layout('template/tpl-default');
   $assign = array(
        'title' => "Step 1"
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
        <h3 class="m-0 font-weight-bold text-white">Step 1</h3>
      </div>
      <div class="card-body text-justify">
        <div class="row col-lg-12">
          <?php
            try {
              $DbConnected = Project\Model\Setting\Setting::find_by_setting_key("database_connecteds");
              if($DbConnected){
                if($DbConnected->setting_value){
                  ?>
                  <div>
                    <p><?= $DbConnected->setting_values?></p>
                    <br />
                    <p>
                      <a href="<?=DOMAIN?>step2">Next</a>
                    </p>
                  </div>
                  <?php
                }
              }else{
                error();
              }
            } catch (\Throwable $th) {
              ?>
                <ol>
                  <li>Jika tampilan saat ini hanya berisi text saja. perbaikilah dengan yang seharusnya menampilkan 1 card bootstrap, dimana headernya bertuliskan Step 1, bodynya bertuliskan tulisan ini.</li>
                  <li>Seharusnya 2 petunjuk ini tidak muncul, yang seharusnya muncul adalah "Database Success Connected" dan sumbernya dari database</li>
                </ol>
              <?php
            }
          ?>
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
