
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
            <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
            
          </div>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4 p-2">
                
                
                <div class="row justify-content-around">
                <a href='add-student.php' class="btn btn-primary" 
                    id="#myBtn">
                  <span class="text">Register Student</span>
                  
                  </a>


                  <a href="add-examiner.php" class="btn btn-primary btn-icon-split ">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Register Examiners</span>
                  </a>

                  <a href="add-class.php" class="btn btn-primary btn-icon-split ">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Add CLass</span>
                  </a>


                  
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