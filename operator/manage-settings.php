<?php session_start(); ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Settings  - TSI Group Limited</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="images/icons/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <style> th, td { max-width: 90px} </style>
    <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
    <div id="wrapper">
        <?php include('includes/top-bar.php'); ?> 
        <!-- /. NAV TOP  -->
        <?php include('includes/side-bar.php'); ?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="messageBox"></div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3> <i class="fa fa-cogs"></i> All Settings</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="settinglist" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Setting Name</th>
                                                <th>Value</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="messageBox"></div>
                        <div class="panel panel-info" id="hiddenUpdateForm">
                            <div class="panel-heading">
                                <h3><i class="fa fa-cog"></i>  Add/Edit Setting</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="CreateSetting" name="CreateSetting" action="../REST/manage-settings.php" method="POST"  enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label" for="name2">Setting Name:</label>
                                        <div class="controls">
                                            <input type="hidden" id="name" name="name"> 
                                            <input type="text" id="name2" name="name2" placeholder="setting name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="value"> Value:</label>
                                        <div class="controls">
                                            <textarea placeholder="Value" id="value" name="value" data-original-title="" class="form-control"></textarea>
                                            <script>CKEDITOR.replace('value');</script>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="hidden" name="addNewSetting" id="addNewSetting" value="addNewSetting"/>
                                            <button type="submit" class="btn btn-success" id="multi-action-catAddEdit">Add Setting</button> &nbsp; &nbsp;
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="messageBox"></div>
            </div>
             <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/common-handler.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/manage-settings.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
