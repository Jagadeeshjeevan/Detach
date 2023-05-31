<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {

  include_once("head.php");
  $section=$_SESSION['id'];
  $user_type=$_SESSION['user_type'];
  if ($_SESSION['id']==1 | $_SESSION['id']==3  ) {
    $sql = "SELECT application_id,subject,section_id,ref_date,reference_no,current_state FROM trans_section where current_state not in (1,4)";
  }
  else {
    $sql = "SELECT application_id,subject,section_id,ref_date,reference_no,current_state FROM trans_section where section_id=$section and current_state not in (1,4)";
    if ($user_type==1){
        $sql_user = "SELECT * FROM `trans_user` where `pcId` =$section and user_type=2";
        $ret_user= mysqli_query($con,$sql_user);
    }
} 
    $ret1= mysqli_query($con,$sql);

    /// Submit Filed test value 
if(isset($_POST['send_app'])){

    if (  $user_type==1){
        $current_state = 2;
    }
    else{
        $current_state=$_POST['current_state'];
    }
    $sec_user=$_POST['section_user'];
    
    $application_no = $_POST['application'];
    $comments=$_POST['comments'];
    $sqll="UPDATE `trans_section` SET `current_state` = $current_state WHERE `application_id` = $application_no";
    if (mysqli_query($con, $sqll)) {
    $sql="INSERT INTO `trans_application`(`application_id`, `send_to`, `comments`) VALUES ('$application_no','$sec_user','$comments')";  
    $msg=mysqli_query($con,$sql);
    if($msg)
     {
      echo "<script>alert('User Added successfully');</script>";
         echo "<script type='text/javascript'> document.location = 'table.php'; </script>";
      }
    }else{
        echo "<script>alert('Error updating record $current_state $sec_user');</script>";

    }

}
    
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Table</h3>
                                <div class="table-data__tool">
                                <form class="form-sample" method="post">
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Reference ID</th>
                                                <th>Application No</th>
                                                <th>Dated</th>
                                                <th>Subject</th>
                                                <th>Period</th>
                                                <th>Section</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <form action="" method="post">
                                        <?php 
                                                while ($ftd = mysqli_fetch_array($ret1)) {
                                                echo "<tr class='tr-shadow'>";
                                                echo "<td>".$ftd['reference_no']."</td>"; 
                                                    echo "<td>".$ftd['application_id']."</td>";
                                                    echo "<td>".$ftd['ref_date']."</td>";  
                                                    echo "<td  class='status--process'>".$ftd['subject']."</td>";  
                                                    echo "<td>Hello</td>"; 
                                                    echo "<td>".$ftd['section_id']."</td>"; 
                                                    echo "<td>".$ftd['current_state']."</td>"; 
                                                
                                                ?>
                                                    <tr class='spacer'></tr>
                                                <?php }  ?>
                                        </tbody>
                                    </table>
                                </div>
                                </form>
                                <!-- END DATA TABLE -->
                                              
                            </div>
                        </div>
                      
                        </div>
                        </div>
                        <?php
                        include_once("footer.php");
                          }
                        ?>
                        
                        