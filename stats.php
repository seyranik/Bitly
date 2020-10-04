<?php include 'header.php';?>

<!-- Content -->
<div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->

                <!-- /Widgets -->
                
                    <div class="row">
                    
                    <!--  /Content -->
                        
                        <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <strong>Stats Detail</strong><br>
                    <form class="form-inline" action="#" method="GET">
                    <select name="shortlink" id="shortlink" class="form-control-sm form-control col-8">
                    <?php foreach ($options as $resulta) { ?>
                                                <option value="<?php echo $resulta->id; ?>"><?php echo $resulta->title; ?> - <?php echo $resulta->id; ?></option>
                                                <?php } ?>
                                            </select>&emsp;&emsp;&emsp;&emsp;
                                    <button type="submit" class="btn btn-outline-primary btn-sm col-3 float-right"><i class="fa fa-star"></i>&nbsp; Detailed</button>
                                    </form>
                    </div>
                    
                </div>
            </div></div></div></div>

                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">


                        <div class="row">
                            <!-- / Form Content Here -->

                            <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="ti-link"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php if($totalClick->total_clicks!=null || $totalClick->total_clicks!=""){echo 1;} ?></span></div>
                                            <div class="stat-heading">Total Link</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="ti-hand-point-up"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $totalClick->total_clicks; ?></span></div>
                                            <div class="stat-heading">Total Click</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php if($totalClick->total_clicks!=null || $totalClick->total_clicks!=""){echo 1;} ?></span></div>
                                            <div class="stat-heading">Total Country</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count">0</span></div>
                                            <div class="stat-heading">Total Cash</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    
                            <!--  /Content -->
                                
                                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Detail Stats</strong>
                                
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">logo</th>
                                            <th>Title</th>
                                            <th>Sort Url</th>
                                            <th>Created Date & Time</th>
                                            <th>Total Clicks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="serial">1.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/bit.ly.png" alt=""></a>
                                                </div>
                                            </td>
                                            <td> <?php echo $responsee->title; ?> </td>
                                            <td> <span class="product"><?php echo $query; ?></span> </td>
                                            <td> <span class="product"><?php echo substr($responsee->created_at, 0,10).' & '.substr($responsee->created_at,11,8); ?> </span> </td>
                                            <td><span class="count"><?php echo $totalClick->total_clicks; ?></span></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
                                
                                <!-- /.Form Content Here -->
                                
                            <!--  /Content -->
                            <div class="card-body"></div>
                        
                    
                </div>
                <div class="clearfix"></div>
                
            </div>
        </div>
                        </div> 
                        <div class="card-body"></div>

                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>



                <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->

<?php include 'footer.php';?>