
 <!DOCTYPE html>
<html lang="en">

<?php include_once 'static_html/head.html' ?>
<body id="page-top">
  <div id="wrapper">
    <?php include_once 'static_html/sidebar.html' ?>
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
        <?php include_once 'static_html/topbar.php' ?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <?php 

                    if (isset($_GET)) {
                      foreach ($_GET as $key => $value) {
                        include_once '../db.php';
                        $tble = $gradingDB->$key;


                        ?>
                  
            <h1 class="h3 mb-0 text-gray-800">VIEW <?=strtoupper($key);?><h1>
            
          </div>

          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4 p-2">
                <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <!-- <h6 class="m-0 font-weight-bold text-primary">Registration Form</h6> -->
                </div>
                <div class="card-body">

                          <ul>
                            <?php 
                              $retrieve = $tble->findOne(['_id'=>$value]);
                              // var_dump($retrieve);

                              $retrieve = $retrieve->jsonSerialize();

                            foreach ($retrieve as $key1 => $value1): ?>
                            <li>

                              <?php if ($key1 == '_id'): ?>
                                <b><?=$key.'-ID'?>:</b>
                              <?php else: ?>
                                <b><?=$key1?>:</b>

                              <?php endif ?>
<?php if (is_object($value1)): ?>
  <?php 
    $value1arr = (array)$value1->jsonSerialize();

   ?>
   <?php foreach ($value1arr as $key2 => $value2): ?>
     <ul>
       <li><?=$key2?>:<?=$value2?></li>
     </ul>
   <?php endforeach ?>
  <?php else: ?>
                              <?=$value1?>
  
<?php endif ?>

                            </li>
                          <?php endforeach; ?>
                          </ul>
                        <?php
                      }
                    }
                   ?>
                
                </div>
              </div>



                
              </div>
            </div>
          </div>



</div>

        </div>
        <!---Container Fluid-->
      </div>
    </div>
      <?php include_once 'static_html/footer&script.php' ?>
</body>

</html>