
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
            <h1 class="h3 mb-0 text-gray-800">Register Admin</h1>
            
          </div>

          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-6">
              <div class="card mb-4 p-2">
                <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Registration Form</h6>
                </div>
                <div class="card-body">

                  <?php 
                include_once '../db.php';

                // $students = $gradingDB->students;
                $users = $gradingDB->users;


                $adm_id = 'ADM-'.time();

                if (isset($_POST['add_student'])) {
                  extract($_POST);
                
          
                    $admin_usr =  $users->insertOne(
                      [ 
                        '_id' => $adm_id,
                        'username' => $username,
                        'password' => md5($password),                    
                        'role' => 'admin'
                      ] );
                  // }
                     if ($admin_usr ) {?>
                      <script type="text/javascript">
                        alert('admin registered');
                        window.location = 'users.php';
                      </script>
                    <?php
                    // header('location: examiners.php');
                  }
                


              }
               ?>
                  <form method="post">


                    <div class="form-group">
                      <label for="fname">Student ID: <strong><?=$adm_id;?></strong></label>

                    </div>

                    <div class="form-group">
                      <label for="fname">Userame</label>
                      <input type="text" class="form-control" id="fname" aria-describedby="textHelp" placeholder="Enter Username" name="username">
                    </div>

                    <div class="form-group">
                      <label for="lname">Password</label>
                      <input type="password" class="form-control" id="lname" aria-describedby="textHelp" placeholder="Enter password" name="password">
                    </div>

                   
                    
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_student" value="1">Submit</button>
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