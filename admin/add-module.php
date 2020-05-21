
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
            <h1 class="h3 mb-0 text-gray-800">Add Module</h1>
            
          </div>

          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-6">
              <div class="card mb-4 p-2">
                <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Module Form</h6>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="fname">Module Name</label>
                      <input type="text" class="form-control" id="fname" aria-describedby="textHelp" placeholder="Enter Module Name" name="module_name">
                    </div>

                    <div class="form-group">
                      <label for="fname">Module Code</label>
                      <input type="text" class="form-control" id="fname" aria-describedby="textHelp" placeholder="Enter Module Code" name="module_code">
                    </div>

                    
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
                <?php 
                  include '../db.php';
                  $modules = $gradingDB->modules;

                  if (isset($_POST)) {
                    # code...
                    // var_dump($_POST);
                    if(isset($_POST['module_name']) && $_POST['module_name']!='') $module_name = trim(htmlspecialchars($_POST['module_name']));
                    if(isset($_POST['module_code']) && $_POST['module_code']!='') $module_code =  trim(htmlspecialchars($_POST['module_code']));

                    if ($module_name !='' && $module_code !='' ) {
                      $insOne = $modules->insertOne(['name'=>$module_name,'code'=>$module_code]);

                      if($insOne){?>

                      <script type="text/javascript">
                        window.location = 'modules.php';
                      </script>
                        <?php

                      }
                    }
                    
                  }
                 ?>
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