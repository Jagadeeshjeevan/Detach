<?php 
session_start(); 

include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else if ($_SESSION['id']==1) {
    include_once("head.php") ;

    $n_sec_sql ="SELECT count(*) count,`current_state` FROM `trans_section` where section_id='7788' GROUP BY `current_state`;";
    $me_sec_sql="SELECT count(*) count,`current_state` FROM `trans_section` where section_id='2233' GROUP BY `current_state`;";
    $t_sec_sql = "SELECT count(*) count,`current_state` FROM `trans_section` where section_id='8866' GROUP BY `current_state`;";
    $total_sql     = "SELECT count(*)count,`current_state` FROM `trans_section`  GROUP BY `current_state`;";
    
    $ret_n_dashboard= mysqli_query($con,$n_sec_sql);
    $ret_me_dashboard= mysqli_query($con,$me_sec_sql);
    $ret_t_dashboard= mysqli_query($con,$t_sec_sql);
    $total_dashboard= mysqli_query($con,$total_sql);


    function dashboard($dashboard){
        $approved=0;
        $rejected=0;
        $pending=0;
        while ($ftd = mysqli_fetch_array($dashboard)) {
            if(in_array($ftd['current_state'],array(0,1,3 ) )) {
                $pending+=$ftd['count'];
            }
            if($ftd['current_state'] == 4  ){
                $rejected=$ftd['count'];
            }
            if($ftd['current_state'] == '3'  ){
                $approved=$ftd['count'];
            }
        }
        
            $total= $approved+$rejected+$pending;
        return print_r("   
        <span>Total : $total</span><br>
        <span>Approved: $approved</span><br>
        <span>Pending : $pending</span><br>
        <span>Rejected : $rejected</span>");
    }


?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                            <h2>Me Section</h2>
                                            <?php
                                            dashboard($ret_me_dashboard);
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2>N Section</h2>
                                                <?php
                                            dashboard($ret_n_dashboard);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2>T sections</h2>
                                                <?php
                                            dashboard($ret_t_dashboard);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2>Total Sections</h2>
                                                <?php
                                            dashboard($total_dashboard);
                                                ?>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">char by %</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>products</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>services</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>


<?php
include_once("footer.php");
  }else{
    header('location:logout.php');
  }
?>



<!-- 


SELECT unique_id FROM `trans_dep` where unique_id!=1;

SELECT * FROM `trans_section` WHERE `section_id` in (SELECT unique_id FROM `trans_dep` where unique_id!=1);



SELECT count(*),`section`,`current_state` FROM `trans_section` INNER JOIN `trans_dep` on `trans_dep`.`unique_id`= `trans_section`.`section_id` where `trans_section`.`section_id`!=1 GROUP BY `section_id`,`current_state`;

SELECT count(*),`current_state` FROM `trans_section` where section_id='7788' GROUP BY `current_state`;

SELECT count(*),`current_state` FROM `trans_section` where section_id='2233' GROUP BY `current_state`;

SELECT count(*),`current_state` FROM `trans_section` where section_id='8866' GROUP BY `current_state`;

 -->


