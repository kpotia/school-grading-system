
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
            <h1 class="h3 mb-0 text-gray-800">Examiners</h1>
            
          </div>
  <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <a href="add-examiner.php" class="btn btn-primary">Register Examiner</a>
                </div>
                <div class="bg-white">
                <?php 
                  require '../db.php';
                  $examiners = $gradingDB->examiners;
                  $documentlist = $examiners->find();?>

                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Examiner_ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Class</th>
                        
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Examiner_ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Class</th>
                        
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                    <tbody>

                      <?php


                      foreach($documentlist as $doc):?>
                        <tr>
                          
                          <?php $data = $doc->jsonSerialize(); ?>

                          <td>
                            <?=strtoupper($data->_id);?>
                          </td>
                          <td>
                            <?=$data->firstname;?>
                          </td>
                          <td>
                            <?=$data->lastname;?>
                          </td>
                       <td>
<?php
// var_dump($data);
 $classdet = $data->class->jsonSerialize(); //var_dump($classdet);?>

                            <?=$classdet->name.' '.$classdet->year;?>
                          </td>
                     

                              <td>
                            <a href="view.php?examiners=<?=$data->_id;?>">details</a>
                            <a class="btn btn-danger" href="delete.php?examiners=<?=$data->_id;?>">delete</a>
                          </td>
                        </tr>


                      <?php endforeach;?>


                    </tbody>
                  </table>
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
<?php include_once 'static_html/footer&script.php' ?>
</body>

</html>