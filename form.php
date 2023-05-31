<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {

    if(isset($_POST['create'])){
        $min=10001;
        $max=999999;
        $unique=  rand($min,$max);
        $reference_id=$_POST['reference_id'];
        $subject=$_POST['subject']; 
        $dor=$_POST['dor']; 
        $section=$_POST['section']; 
        $received_from = $_POST['received_from']; 
    $sql="INSERT INTO `trans_section`(`application_id`, `subject`, `date_of_received`,`period`,`section_id`,`reference_no`,`receive_from`)  VALUES ('$reference_id','$subject', '$dor',1,'$section','$unique', '$received_from')";  
    $msg=mysqli_query($con,$sql);
    if($msg)
     {
      echo "<script>alert('Profile updated successfully' );</script>";
         echo "<script type='text/javascript'> document.location = 'form.php'; </script>";
      }
    }
  include_once("head.php");
?>
          <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Application Form</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label" >Application Number</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="text" id="text-input" name="reference_id" placeholder="Refernce ID" class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Subject</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="subject" placeholder="Subject" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Date of Reciept</label>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <input id="cc-exp" name="dor" type="date" class="form-control cc-exp" required>    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Received from</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="received_from" id="received_from" class="form-control" required>
                                                            <?php
                                                            $query_rf = mysqli_query($con, "SELECT `name` FROM `ma_receive_from` where status = 1;");
                                                            while ($result = mysqli_fetch_array($query_rf))
                                                            echo '<option value="' . $result["name"] . '">' . $result['name'] . '</option>';
                                                            ?>
                                                        </select>
                                                </div>
                                            </div>            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Section</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="section" id="select" class="form-control" required>
                                                            <?php
                                                            $query_bh = mysqli_query($con, "SELECT unique_id,section FROM `trans_dep` where status=0 and unique_id != 1");
                                                            while ($result = mysqli_fetch_array($query_bh))
                                                            echo "<option value=" . $result['unique_id'] . ">" . $result['section'] . "</option>"
                                                            ?>
                                                        </select>
                                                </div>
                                            </div>
                                   
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm"  name="create">
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
    
    