
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
            <h1 class="h3 mb-0 text-gray-800">Add Class</h1>
            
          </div>

          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-6">
              <div class="card mb-4 p-2">
                <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">


                  <h6 class="m-0 font-weight-bold text-primary">Class Form</h6>
                </div>
                <div class="card-body">
                  
                  <?php 
                include_once '../db.php';

                $classes = $gradingDB->classes;

                if (isset($_POST['add_class'])) {
                  extract($_POST);
                
                  $class_reg = $classes->insertOne([
                    '_id'=>'CLS'.time() ,
                    'name' => $class,
                    'year' => $year,
                    // 'examiners' => $examiner,
                    
                  ]);
                  if (isset($class_reg)) {
                ?>
                  <script type="text/javascript">
                    alert('class created ');
                    window.location = 'classes.php';
                  </script>
                <?php
              }
              
              }
               ?>
                  <form method="POST">
                    <div class="form-group">
                      <label for="fname">Class</label>
                      <select class="form-control" id="fname" aria-describedby="textHelp" placeholder="Enter Class Name" name="class">
                            <option value="Form 1">Primary Form 1</option>
                            <option value="Form 2">Primary Form 2</option>
                            <option value="Form 3">Primary Form 3</option>
                           <option value="Form 4">Primary Form 4</option>
                            <option value="Form 5">Primary Form 5</option>
                           <option value="Form 6">Primary Form 6</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="fname">Year</label>
                      <input type="date-year" class="form-control" id="fname" aria-describedby="textHelp" placeholder="Enter Class Year" name="year">
                    </div>


                 
                    <button type="submit" class="btn btn-primary" name="add_class">Submit</button>
                  </form>
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