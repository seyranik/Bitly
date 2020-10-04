<?php include 'header.php';?>
        <!-- Content -->
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
                                            <div class="stat-text"><span class="count"><?php echo $fullclick; ?></span></div>
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
                                            <div class="stat-text"><span class="count">0</span></div>
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
                                            <div class="stat-text"><span class="count">0</span></div>
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
                                            <div class="stat-text"><span class="count">0</span></div>
                                            <div class="stat-heading">Total Cash</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Link List </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                        <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">logo</th>
                                            <th>Title</th>
                                            <th>Sort Url</th>
                                            <th>Long Url</th>
                                            <th>Total Clicks</th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                    <?php $i=1; ?>
                            <?php foreach ($options as $resulta) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i; $i++; ?>.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="images/avatar/bit.ly.png" alt=""></a>
                                                </div>
                                            </td>
                                            <td >  <span class="name"><?php echo $resulta->title; ?></span> </td>
                                            <td> <span class="product"><a href="<?php echo $resulta->link; ?>"><?php echo $resulta->id; ?></a></span> </td>
                                            <td> <span class="product"><a href="<?php echo $resulta->long_url; ?>"><?php echo substr($resulta->long_url, 8, 12).'...'; ?></a></span> </td>
                                            <?php 
                                            $authorization = "Authorization: Bearer 955eee00cd08e504088dda3b743c6c2355c62442";
                                            $ch = curl_init('https://api-ssl.bitly.com/v4/bitlinks/'.$resulta->id.'/clicks/summary?unit=month&units=-1');                                                                      
                                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                
                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
                                                curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                                                    $authorization,                                                                                
                                                    'Content-Type: application/json')                                                                       
                                                );
                                                $totalClick = curl_exec($ch);
                                                $totalClick = json_decode($totalClick);
                                                $fullclick=$fullclick+$totalClick;
                                            ?>
                                            <td><span class="count"><?php echo $totalClick->total_clicks; ?></span></td>
                                            
                                        </tr>
                                        <?php } print_r($fullclick); ?>
                                    </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                        <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="box-title">Chandler</h4> -->
                                <div class="calender-cont widget-calender">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                        
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <?php include 'footer.php';?>