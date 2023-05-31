<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {

  include_once("head.php");
  $section=$_SESSION['id'];
  $user_type=$_SESSION['user_type'];

  if ($_SESSION['id']==1 | $_SESSION['id']==3  ) {
    $sql = "SELECT application_id,subject,section_id,ref_date,reference_no,current_state,receive_from,`trans_dep`.`section`,date_of_received FROM trans_section 
    INNER join 	`trans_dep` ON `trans_dep`.`unique_id` = `trans_section`.`section_id`
    where current_state in (1,4);";
  }
  else {
    $sql = "SELECT application_id,subject,section_id,ref_date,reference_no,current_state,receive_from,`trans_dep`.`section`,date_of_received  FROM trans_section
    INNER join 	`trans_dep` ON `trans_dep`.`unique_id` = `trans_section`.`section_id` 
    where section_id=$section and current_state=$user_type and current_state in (1,4)";
    if ($user_type==1){
        $sql_user = "SELECT * FROM `trans_user` where `pcId` =$section and user_type=2";     
    }
  } 
    $ret1= mysqli_query($con,$sql);

// function
function statusColor($statusColor){
    $secStatus = "";
    $secColor = "";
    switch ($statusColor) {
        case 1:
          $secStatus = "Created";
          $secColor = "status--process";
          break;
        case 2:
          $secStatus = "Assigned";
          $secColor = "";
          break;
        case 3:
          $secStatus = "Approved";
          $secColor = "";
          break;
        case 4:
          $secStatus = "Return";
          $secColor = "status--denied";
          break;
        }
    return [$secStatus,$secColor];
}

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
    $sqll="UPDATE `trans_section` SET `current_state` = $current_state WHERE `application_id` = '$application_no' ";
    if (mysqli_query($con, $sqll)) {
    $sql="INSERT INTO `trans_application`(`application_id`, `send_to`, `comments`) VALUES ('$application_no','$sec_user','$comments')";  
    $msg=mysqli_query($con,$sql);
    if($msg)
     {
      echo "<script>alert('User Added successfully');</script>";
         echo "<script type='text/javascript'> document.location = 'table.php'; </script>";
      }
    }else{
        echo "<script>alert('Error updating record $current_state $application_no $sqll');</script>";

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
                                                <th>Date of Entry</th>
                                                <th>Applicatio Date</th>
                                                <th>Subject</th>
                                                <th>Received from</th>
                                                <?php
                                                if (  $user_type==1){
                                                echo "<th> Assign to <th>";
                                                }
                                                else if (  $user_type==2){
                                                   echo  "<th>Comments</th>";
                                                }
                                                else{
                                                    echo  "<th>Section</th>";
                                                    echo  "<th>Status</th>";
                                                    
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <form action="" method="post">
                                        <?php 
                                                while ($ftd = mysqli_fetch_array($ret1)) {
                                                echo "<tr class='tr-shadow'>";
                                                echo "<td>".$ftd['reference_no']."</td>"; 
                                                    echo "<td>".$ftd['application_id']."</td>";
                                                    $dt = new DateTime($ftd['ref_date']);
                                                    $dt2 = new DateTime($ftd['date_of_received']);
                                                    echo "<td>".$dt->format('Y-m-d')."</td>";  
                                                    echo "<td>".$dt2->format('Y-m-d')."</td>";  
                                                    echo "<td>".$ftd['subject']."</td>";  
                                                    echo "<td>".$ftd['receive_from']."</td>"; ?>
                                                    
                                                    <?php
                                                    if (  $user_type==1){
                                                        
                                                    echo "<td> <select name='section_user' >";
                                                    $ret_user= mysqli_query($con,$sql_user);
                                                    while ($ftd1 = mysqli_fetch_array($ret_user)) {
                                                        echo "<option  value=" . $ftd1['aid'] . ">" . $ftd1['username'] . "</option>";
                                                    } ?>
                                                        </select> </td>
                                                                
                                                    <td>
                                                        <button class='btn' name='send_app' title='Send'>
                                                        <i class='zmdi zmdi-mail-send'></i>
                                                        </button>
                                                    </td>
                                                    <input type="hidden" id="application" value=<?php echo $ftd['application_id'];?> name="application" >
                                                </form>
                                                <?php }
                                                else if ($user_type==2){ ?>
                                                <form action="" method="post">
                                                <td>
                                                <input type="text" id="comments" value="" name="comments" require>
                                                <input type="hidden" id="application" value=<?php echo $ftd['application_id'];?> name="application" >

                                                </td>
                                                <td>
                                                <select name='current_state' >
                                                    <option value=3>Approve</option>
                                                    <option value=4>Send Back</option>
                                                </select> 
                                                <td>
                                                        <button class='btn' name='send_app' title='Send'>
                                                        <i class='zmdi zmdi-mail-send'></i>
                                                        </button>
                                                    </td>
                                                    </td>
                                                </form>
                                               <?php }
                                                 else{
                                                    echo "<td>".$ftd['section']."</td>"; 
                                                    $sectionFeature = statusColor($ftd['current_state']);
                                                    echo "<td> <span class=".$sectionFeature[1].">".$sectionFeature[0]."</span></td>"; 
                                                 }
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
                        
                        