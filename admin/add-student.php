
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
            <h1 class="h3 mb-0 text-gray-800">Register Student</h1>
            
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

                $students = $gradingDB->students;
                $users = $gradingDB->users;


                $std_id = 'std-'.time();

                if (isset($_POST['add_student'])) {
                  extract($_POST);
                if($firstname!=null or $firstname!='' or $surname!=null or $surname!=''){

                   $classdet = (array)$gradingDB->classes->findOne(['_id' =>$classid])->jsonSerialize();
                  $std_Reg = $students->insertOne([
                    '_id'=>$std_id,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'dob' => $dob,
                    'class_id' => $classdet,

                  ]);

                // $std_Reg = json_encode($std_Reg);
                // var_dump($std_Reg);
                // var_dump($std_Reg->getInsertedId());

                  if ($std_Reg->getInsertedId()) {
                    $std_user =  $users->insertOne(
                      [ 
                        '_id' => $std_id,
                        'username' => $std_id,
                        'password' => md5($std_id),
                        'std_id' => $std_id,
                        'role' => 'student'
                      ] );
                  }
                
 if ($std_user && $std_Reg) {?>
                      <script type="text/javascript">
                        alert('student registered');
                        window.location = 'students.php';
                      </script>
                    <?php
                    // header('location: examiners.php');
                  }

              }else{
                ?>
                  <script type="text/javascript">
                    alert()
                  </script>
                <?php
              }
                }
                  
               ?>
                  <form method="post">


                    <div class="form-group">
                      <label for="fname">Student ID: <strong><?=$std_id;?></strong></label>

                    </div>

                    <div class="form-group">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" id="fname" aria-describedby="textHelp" placeholder="Enter First Name" name="firstname" required="required">
                    </div>

                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" id="lname" aria-describedby="textHelp" placeholder="Enter Last Name" name="lastname" required="required">
                    </div>

                    <div class="form-group">
                      <label for="dob">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" aria-describedby="date" placeholder="Enter First Name" name="dob" required="required">
                    </div>
                    
                    <div class="form-group">
                      <label for="fname">Class</label>
                      <select class="form-control" id="fname" aria-describedby="textHelp" name = "classid">
<?php $classes = $gradingDB->classes;
                  $documentlist = $classes->find();?>

                  <?php foreach($documentlist as $doc):?>
                          <?php $data = $doc->jsonSerialize(); ?>
                          <option value="<?=$data->_id?>"> 
                           <?=$data->name?>
                           <?=$data->year?>
                           </option>
                        <?php endforeach;?>
                        </select>
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