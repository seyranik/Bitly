<?php include 'header.php';?>
                            <!-- / Form Content Here -->

                            <div class="content">
            <!-- Animated -->
<div class="row">
<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Detail Stats</strong>
                                
                            </div>
                            <div class="col-lg-12 card">
                            
                            <div class="card-body card-block">
                            <form action="#" method="POST"> 
                                <div class="form-group"><label for="title" class=" form-control-label">Title</label><input type="text" id="title" name="title" value="<?php echo $title; ?>" placeholder="My Short Url Title" class="form-control"></div>
                                <div class="form-group"><label for="shortlink" class=" form-control-label">Short Url</label><input type="text" id="shortlink" readonly="readonly" name="shortlink" value="<?php echo $shortlink; ?>"  placeholder="Your Short Url" class="form-control" ></div>
                                <button type="submit" class="btn btn-primary float-right col-3"><i class="fa fa-magic"></i>&nbsp; Update</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
</div></div>
<?php include 'footer.php';?>