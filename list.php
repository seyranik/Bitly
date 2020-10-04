<?php include 'header.php';?>

<!-- Content -->
<div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                   
                            
                            <div class="row">
                                <!-- / Form Content Here -->
                                
                                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Short Link</strong>
                            </div>
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
                                            <th>Quick Operations</th>
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
                                            ?>
                                            <td><span class="count"><?php echo $totalClick->total_clicks; ?></span></td>
                                            <td>
                                            <a href='update.php?title=<?php echo $resulta->title; ?>&shortlink=<?php echo $resulta->id; ?>'><span class="badge badge-warning">Update</span></a>
                                                <a href='stats.php?shortlink=<?php echo $resulta->id; ?>''><span class="badge badge-complete">Stats</span></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
                                
                                <!-- /.Form Content Here -->
                                
                            </div> <!-- /.row -->
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