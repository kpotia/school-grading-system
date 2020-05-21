
 <!DOCTYPE html>
<html lang="en">

<?php include_once 'static_html/head.html'; ?>
<body id="page-top">
  <div id="wrapper">
    <?php include_once 'static_html/sidebar.html' ?>
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
        <?php include_once 'static_html/topbar.php'; ?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <?php 

                    if (isset($_GET)) {
                      foreach ($_GET as $collection => $value) {
                        include_once '../db.php';
                        $tble = $gradingDB->$collection;

                              $delete = $tble->deleteOne(['_id'=>$value]);

                              var_dump($delete);
                              ?>
<script type="text/javascript">
  alert('<?=$collection?> deleted successfuly');
                              window.location = "<?=$collection.'.php'?>";

                              </script><?php
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
      <?php include_once 'static_html/footer&script.php'; ?>
</body>

</html>