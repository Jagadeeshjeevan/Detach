<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {

    if(isset($_POST['signUp'])){
        $user_name=$_POST['user_name'];
        $user_password1=$_POST['user_password1'];
        $user_password2=$_POST['user_password2'];
        $section=$_POST['section'];
        $created_by=$_SESSION['user_id'];
        $user_role=$_POST['user_role'];
    $sql="INSERT INTO `trans_user`(`username`, `password`, `pcId`, `created_by`, `user_type`) VALUES ('$user_name','$user_password1','$section','$created_by','$user_role')";  
    $msg=mysqli_query($con,$sql);
    if($msg)
     {
      echo "<script>alert('User Added successfully');</script>";
         echo "<script type='text/javascript'> document.location = 'add_user.php'; </script>";
      }
    }
  include_once("head.php");
?>
          <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                <form action="" method="post" class="form-horizontal">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                           
                            <div class="card">
                                    <div class="card-header">
                                        <strong>Add User</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="text" id="hf-email" name="user_name" placeholder="Enter Name..." class="form-control" required >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="password" id="user_password1" name="user_password1" placeholder="Enter Password..." class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Confim Password</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="password" id="user_password2" name="user_password2" placeholder="Confim Password" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">User Role</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="user_role" id="select" class="form-control" onchange="showDiv('hidden_div', this)" required>
                                                        <option value="0">Admin</option>
                                                        <option value="1">Master</option>
                                                        <option value="2">Section</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="hidden_div">
                                                <div class="row form-group" >
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">Section</label>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <select name="section" id="select" class="form-control" required>
                                                        <option value="1">Select Section</option>
                                                            <?php
                                                            $query_bh = mysqli_query($con, "SELECT unique_id,section FROM `trans_dep` where status=0 and unique_id!=1;");
                                                            while ($result = mysqli_fetch_array($query_bh))
                                                            echo "<option value=" . $result['unique_id'] . ">" . $result['section'] . "</option>"
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="signUp">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    include_once("footer.php");
      }
    ?>
    
    