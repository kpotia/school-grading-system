
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
            <h1 class="h3 mb-0 text-gray-800">Classes</h1>
            
          </div>
  <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <a href="add-class.php" class="btn btn-primary">Create Class</a>
                </div>
                <div class="bg-white">
                <?php 
                  require '../db.php';
                  $classes = $gradingDB->classes;
                  $documentlist = $classes->find();?>

                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <!-- <th></th> -->
                        <th>Class Name</th>
                        <!-- <th>Tutor Name</th> -->
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <!-- <th></th> -->
                        <th>Class Name</th>
                        <!-- <th>Tutor Name</th> -->
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                    <tbody>

                      <?php


                      foreach($documentlist as $doc):?>
                        <tr>
                          
                          <?php $data = $doc->jsonSerialize(); ?>

                          <td>
                            <?=$data->name;?> 
                            <?=$data->year;?>
                          </td>
                     
                             

                              <td>
                            <a class="btn btn-outline-primary" href="view.php?classes=<?=$data->_id;?>">details</a>
                            <a class="btn btn-outline-danger" href="delete.php?classes=<?=$data->_id;?>">Delete</a>
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