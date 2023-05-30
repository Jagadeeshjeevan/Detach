<?php session_start();

if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {

  //formula
  // weightOFwater = (Weight of Container<br> + Wet Soil(g) ) - (Weight of Container<br> + Dry Soil(g) )
  //Weight of Dry Soil(g) = (Weight of Container<br> + Dry Soil(g) ) - ( Weight of <br> Container(g))
  //Moisture Content(%) = ((  Weight of Water(g)) / (    Weight of Dry Soil(g)) ) * 100 

  include_once("head.php");
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>SNO</th>
                                                <th>Reference ID</th>
                                                <th>Dated</th>
                                                <th>Subject</th>
                                                <th>Date of Reciept</th>
                                                <th>Period</th>
                                                <th>Pending with</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">

                                                <td>1</td>
                                                <td>567898765</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>Samsung S8 Black</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>
                                                <td class="desc">M section</td>
                                                
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">

                                                <td>2</td>
                                                <td>567898765</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>Samsung S8 Black</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>
                                                <td class="desc">M section</td>
                                                
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">

                                                <td>3</td>
                                                <td>567898765</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>Samsung S8 Black</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>
                                                <td class="desc">M section</td>
                                                
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">

                                                <td>4</td>
                                                <td>567898765</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>Samsung S8 Black</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>
                                                <td class="desc">M section</td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <?php
                        include_once("footer.php");
                          }
                        ?>
                        
                        