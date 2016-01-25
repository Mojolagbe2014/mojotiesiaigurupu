<?php session_start(); ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Web Pages  - TSI Group Limited</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="images/icons/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                                <h3> <i class="fa fa-files-o"></i> All Web Pages</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="webpagelist" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Page Name</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Keywords</th>
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
                                <h3><i class="fa fa-file"></i>  Add/Edit Web Page</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="CreateWebPage" name="CreateWebPage" action="../REST/manage-webpages.php"  enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Page Name:</label>
                                        <div class="controls">
                                            <input type="hidden" id="id" name="id"> 
                                            <input type="text" id="name" name="name" placeholder="category name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="title">Page Title:</label>
                                        <div class="controls">
                                            <input type="hidden" id="id" name="id" />
                                            <input data-title="" type="text" placeholder="Page Title" id="title" name="title" data-original-title="" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="description">Page Description:</label>
                                        <div class="controls">
                                            <textarea id="description" placeholder="Page Description" name="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="keywords">Page Keywords:</label>
                                        <div class="controls">
                                            <textarea id="keywords" placeholder="Page Keywords" name="keywords" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="hidden" name="addNewWebPage" id="addNewWebPage" value="addNewWebPage"/>
                                            <button type="submit" class="btn btn-success" id="multi-action-catAddEdit">Add Web Page</button> &nbsp; &nbsp;
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
    <script src="assets/js/manage-webpages.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
