<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>HOTEL- ADMIN</title>
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
                        <a href="<?php echo site_url();?>/Dashboard"> <span id="hotelname"></span></a>

                            <!-- <a href="<?php echo base_url();?>/Dashboard"> <span id="hotelname"></span></a> -->
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
                                            <div class="profile-data-name"></div>
                                            <div class="profile-data-title">Hotel Admin</div>
                                        </div>
                                    
                                    </div>
                                </li>

                    <li class="xn-title">Navigation</li>


        <ul class="navmenu">
        
                    <li class="de ">
                        <a href="<?php echo site_url();?>/Dashboard"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a>
                    </li>

                    <li class="de ">
                        <a href="<?php echo site_url();?>/Booking"><span class="fa fa-list"></span> <span class="xn-text">Bookings</span></a>
                    </li>

                    <li class="de ">
                        <a href="<?php echo site_url();?>/Customer"><span class="fa fa-users"></span> <span class="xn-text">Customers</span></a>
                    </li>
                   
                            <li class="xn-openable active" >
                                <a href="<?php echo site_url();?>"><span class="fa fa-home"></span>Rooms</a>
                                <ul>
                                    <li><a href="<?php echo site_url();?>/Rooms"><span class="fa fa-inbox"></span> Rooms Types</a></li>
                                    <li><a href="<?php echo site_url();?>/Roomamenties"><span class="fa fa-pencil"></span> Rooms Amenties</a></li>
                                    <li><a href="<?php echo site_url();?>/Roomdetails"><span class="fa fa-file-text"></span> Rooms Details</a></li>
                                </ul>
                            </li>

                            <li class="xn-openable">
                                <a href="<?php echo site_url();?>"><span class="fa fa-th-list"></span>Orders</a>
                                <ul>
                                    <li ><a href="<?php echo site_url();?>/Orders"><span class="fa fa-list"></span>Orders</a></li>
                                    <li ><a href="<?php echo site_url();?>/Products"><span class="fa fa-list"></span>Products</a></li>
                                </ul>
                            </li>

                            <li class="xn-openable">
                                <a href="<?php echo site_url();?>"><span class="fa fa-money"></span>Payments</a>
                                <ul>
                                    <li><a href="<?php echo site_url();?>/Payment"><span class="fa fa-money"></span>Payment</a></li>
                                    <li><a href="<?php echo site_url();?>/Payments"><span class="fa fa-money"></span>Payments Types</a></li>
                                </ul>
                            </li>

                            <li class="xn-openable">
                                <a href="<?php echo site_url();?>"><span class="fa fa-file-text-o"></span>Documents</a>
                                <ul>
                                    <li><a href="<?php echo site_url();?>/Documents"><span class="fa fa-inbox"></span>Documents Types</a></li>
                                </ul>
                            </li>
        </ul>


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

        <script>
            fetch_admininfo();

            function fetch_admininfo(){
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo site_url('/Login/fetch_admininfo'); ?>',
                    async: true,
                    dataType: 'json',
                    success: function(response) {
                        $("#hotelname").html(response[0].HotelName);
                        $(".profile-data-name").html(response[0].userName.toUpperCase());
                    }

                });                
            }


            // $('li').removeClass('active');
            // var regex = /[A-Za-z _]+.php/g;
            // var input = location.pathname;
            // if(regex.test(input)) {
            //   var matches = input.match(regex);
            //      $('a[href="'+matches[0]+'"]').closest('li').addClass('treeview active');
            //      $('a[href="'+matches[0]+'"]').closest('ul').closest('li').addClass('active');
            //     }
            //    $('li').removeClass('active');


                $(function (){
                        setNavigation();
                    });

                function setNavigation() {
                    var path = window.location.pathname;
                    path = path.replace(/\/$/, "");
                    path = decodeURIComponent(path);
                   // alert(path);

                    $(".navmenu a").each(function () {
                        var href = $(this).attr('href');
                        if (path.substring(0, href.length) === href) {
                            $(this).closest('li').addClass('de active');
                            $(this).closest('ul').closest('li').addClass('xn-openable active');
                            $(this).closest('ul').closest('li').closest('ul').closest('li').addClass('active');


                        }
                    });
                }

        </script>