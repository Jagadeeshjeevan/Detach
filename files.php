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
    where current_state not in (1,4);";
  }
  else {
    $sql = "SELECT application_id,subject,section_id,ref_date,reference_no,current_state,receive_from,`trans_dep`.`section`,date_of_received  FROM trans_section
    INNER join 	`trans_dep` ON `trans_dep`.`unique_id` = `trans_section`.`section_id` 
    where section_id=$section and current_position=$user_type and current_state not in (1,4)";
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
                                                $dt = new DateTime($ftd['ref_date']);
                                                $dt2 = new DateTime($ftd['date_of_received']);
                                                echo "<td>".$dt->format('Y-m-d')."</td>";  
                                                echo "<td>".$dt2->format('Y-m-d')."</td>";  
                                                echo "<td>".$ftd['subject']."</td>";  
                                                echo "<td>".$ftd['receive_from']."</td>"; 
                                                echo "<td>".$ftd['section']."</td>"; 
                                                $sectionFeature = statusColor($ftd['current_state']);
                                                echo "<td> <span class=".$sectionFeature[1].">".$sectionFeature[0]."</span></td>"; 
                                             ?>
                                                
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
                        
                        