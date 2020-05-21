
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
            <h1 class="h3 mb-0 text-gray-800">Register Examiner</h1>
            
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

                $examiners = $gradingDB->examiners;
                $users = $gradingDB->users;


                $examiner_id = 'exm-'.time();

                if (isset($_POST['add_examiner'])) {
                  extract($_POST);
                $classdet = (array)$gradingDB->classes->findOne(['_id' =>$class])->jsonSerialize();
                  $exm_reg = $examiners->insertOne([
                    '_id'=>$examiner_id ,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'class' => $classdet,
                    
                  ]);

                // $exm_reg = json_encode($exm_reg);
                // var_dump($exm_reg);
                // var_dump($exm_reg->getInsertedId());

                  if ($exm_reg->getInsertedId()) {
                    $std_user =  $users->insertOne(
                      [ '_id' => $examiner_id,
                        'username' => $examiner_id,
                        'password' => md5($examiner_id),
                        'examiner_id' => $examiner_id,
                        'role' => 'examiners'
                      ] );
                  }
                  if ($std_user && $exm_reg) {?>
                      <script type="text/javascript">
                        alert('examiners registered');
                        window.location = 'examiners.php';
                      </script>
                    <?php
                    // header('location: examiners.php');
                  }
                


              }
               ?>
                  <form method="post">


                    <div class="form-group">
                      <label for="fname">Examiner ID: <strong><?=$examiner_id;?></strong></label>

                    </div>

                    <div class="form-group">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" id="fname" aria-describedby="textHelp" placeholder="Enter First Name" name="firstname">
                    </div>

                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" id="lname" aria-describedby="textHelp" placeholder="Enter Last Name" name="lastname">
                    </div>

                    <div class="form-group">
                      <label for="fname">Examiner</label>
                      <select class="form-control" id="fname" aria-describedby="textHelp" name = "class">
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
                    <button type="submit" class="btn btn-primary" name="add_examiner" value="1">Submit</button>
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