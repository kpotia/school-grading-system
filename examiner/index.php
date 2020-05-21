
 <!DOCTYPE html>
<html lang="en">

    <?php include_once 'static_html/head.html' ?>


<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include_once 'static_html/sidebar.html' ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
    <?php include_once 'static_html/topbar.php' ?>
        
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>

          </div>

                    <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 
                </div>
                <div class="bg-white">
               <?php 
                    require '../db.php';
                    $students = $gradingDB->students;
                    $documentlist = $students->find();
                    ?>

                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                    <tbody>

<?php


foreach($documentlist as $doc):?>
	<tr>
		
		<?php $data = $doc->jsonSerialize(); ?>

		<td>
			<?=$data->username;?>
		</td>
		<td>
			<?=$data->password;?>
		</td>

				<td>
			<?=$data->role;?>
		</td>

				<td>
			<a href="view.php?e_id=<?=$data->_id;?>">details</a>
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

<pre>
 </pre>



        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
<?php include_once 'static_html/footer&script.php' ?>
</body>

</html>