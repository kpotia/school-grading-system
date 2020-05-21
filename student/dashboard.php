
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
            <h1 class="h3 mb-0 text-gray-800">Student Dashboard</h1>
            
          </div>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4 p-2">
                
                
                <div class="row justify-content-around">
                  <div class="card" width=400px>
                   
                      <?php 
                        include_once '../db.php';
                        // include_once '../db.php';
                        $students = $gradingDB->students;

                       ?>
                      <ul>
                      <?php 
                      $retrieve = $students->findOne(['_id'=>$_SESSION['user']['username']]);
                      // var_dump($retrieve);

                      $retrieve = $retrieve->jsonSerialize();

                      foreach ($retrieve as $key1 => $value1): ?>
                      <li>

                      <?php if ($key1 == '_id'): ?>
                      <b>MYSTUDENT ID:</b>
                      <?php else: ?>
                      <b><?=$key1?>:</b>

                      <?php endif ?>
                      <?php if (is_object($value1)): ?>
                        <?php  $value1arr = (array)$value1->jsonSerialize();           ?>
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
                        <?php    ?>
                  </div>

                  
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

</div>

        </div>
        <!---Container Fluid-->
      </div>
    </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
<?php include_once 'static_html/footer&script.php' ?>
</body>

</html>
</body>

</html>