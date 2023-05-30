<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {

  include_once("head.php");
  $section=$_SESSION['id'];
  $user_type=$_SESSION['user_type'];
  if ($_SESSION['id']==1) {
    $sql = "SELECT application_id,subject,section_id,ref_date,reference_no FROM trans_section";
  }
  else {
    $sql = "SELECT application_id,subject,section_id,ref_date,reference_no FROM trans_section where section_id=$section and current_state=$user_type";
    if ($user_type==1){
        $sql_user = "SELECT * FROM `trans_user` where `pcId` =$section and user_type=2";
        $ret_user= mysqli_query($con,$sql_user);
    }
} 
    $ret1= mysqli_query($con,$sql);

    /// Submit Filed test value 
if(isset($_POST['send_app'])){
    $sec_user=$_POST['section_user'];
    $application_no = $_POST['application'];




    echo "<script>alert('Inserted Field successfully $sec_user - $application_no');</script>";
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
                                                <th>Pending with</th>
                                                <?php
                                                if (  $user_type==1){
                                                echo "<th> Assign to <th>";
                                                }?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                while ($ftd = mysqli_fetch_array($ret1)) {
                                                echo "<tr class='tr-shadow'>";
                                                    echo "<td name='application' id='application' value=".$ftd['application_id'].">".$ftd['application_id']."</td>";  
                                                    echo "<td>".$ftd['reference_no']."</td>";  
                                                    echo "<td>".$ftd['ref_date']."</td>";  
                                                    echo "<td  class='status--process'>".$ftd['subject']."</td>";  
                                                    echo "<td>Hello</td>";  
                                                    echo "<td>Hello</td>"; 
                                                    if (  $user_type==1){
                                                    echo "<td> <select name='section_user' >";
                                                    
                                                    while ($ftd1 = mysqli_fetch_array($ret_user)) {
                                                        echo "<option  value=" . $ftd1['aid'] . ">" . $ftd1['username'] . "</option>";
                                                    } ?>
                                                        </select> </td>
                                                                
                                                    <td>
                                                        <button class='btn' name='send_app' title='Send'>
                                                        <i class='zmdi zmdi-mail-send'></i>
                                                        </button>
                                                    </td>
                                                <?php }
                                                else if ($user_type==2){ ?>
                                                    <td>
                                                    
                                                    <button class='btn btn-primary' name='send_app' title='Send'>
                                                        Approve
                                                        </button>
                                                        <button class='btn btn-danger' name='send_app' title='Send'>
                                                        Reject
                                                        </button>
                                                    </td>

                                               <?php }
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
                        
                        