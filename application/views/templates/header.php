<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>Hotel Admin - Dashboard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url();?>css/theme-default.css"/>
        <script type="text/javascript" src="<?php echo base_url();?>js/plugins/jquery/jquery.min.js"></script>
       
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="<?php echo base_url();?>/Dashboard">Joli Admin</a>
                        <a href="<?php echo base_url();?>" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="<?php echo base_url();?>" class="profile-mini">
                            <img src="<?php echo base_url();?>assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo base_url();?>assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">John Doe</div>
                                <div class="profile-data-title">Web Developer/Designer</div>
                            </div>
                            <!-- <div class="profile-controls">
                                <a href="<?php echo base_url();?>pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="<?php echo base_url();?>pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div> -->
                        </div>
                    </li>
                    <li class="xn-title">Navigation</li>

                    <li class="active">
                        <a href="<?php echo site_url();?>/Dashboard"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url();?>/Booking"><span class="fa fa-list"></span> <span class="xn-text">Bookings</span></a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url();?>/Customer"><span class="fa fa-users"></span> <span class="xn-text">Customers</span></a>
                    </li>
                    <!-- <li class="">
                        <a href="<?php echo site_url();?>/Customers"><span class="fa fa-desktop"></span> <span class="xn-text">Orders</span></a>
                    </li>   -->

                    <li class="xn-openable">
                                <a href="<?php echo site_url();?>"><span class="fa fa-home"></span> Rooms</a>
                                <ul>
                                    <li><a href="<?php echo site_url();?>/Rooms"><span class="fa fa-inbox"></span> Rooms Types</a></li>
                                    <li><a href="<?php echo site_url();?>/Roomdetails"><span class="fa fa-file-text"></span> Room Details</a></li>
                                    <!-- <li><a href="<?php echo site_url();?>pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li> -->
                                </ul>
                            </li>
                            <li class="xn-openable">
                                <a href="<?php echo site_url();?>"><span class="fa fa-th-list"></span> Orders</a>
                                <ul>
                                    <li ><a href="<?php echo site_url();?>/Products"><span class="fa fa-list"></span>Products</a></li>
                                    <!-- <li><a href="<?php echo site_url();?>pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li> -->
                                    <!-- <li><a href="<?php echo site_url();?>pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li> -->
                                </ul>
                            </li>
                            <li class="xn-openable">
                                <a href="<?php echo site_url();?>"><span class="fa fa-money"></span> Payments</a>
                                <ul>
                                    <li><a href="<?php echo site_url();?>/Payments"><span class="fa fa-money"></span>Payments Types</a></li>
                                    <!-- <li><a href="<?php echo site_url();?>pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li> -->
                                    <!-- <li><a href="<?php echo site_url();?>pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li> -->
                                </ul>
                            </li>

                            <li class="xn-openable">
                                <a href="<?php echo site_url();?>"><span class="fa fa-file-text-o"></span> Documents</a>
                                <ul>
                                    <li><a href="<?php echo site_url();?>/Documents"><span class="fa fa-inbox"></span>Documents Types</a></li>
                                    <!-- <li><a href="<?php echo site_url();?>pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li> -->
                                    <!-- <li><a href="<?php echo site_url();?>pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li> -->
                                </ul>
                            </li>




                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="<?php echo site_url();?>" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="<?php echo site_url();?>" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- END SIGN OUT -->


                </ul>
                <!-- END X-NAVIGATION VERTICAL -->
