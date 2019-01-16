<?php
session_start();

include('adminHeader.php');

// include('../includes/app.php');

$photos = get('SELECT * FROM photos ORDER BY created_at DESC LIMIT 20');

?>

<!-- page content -->
<div class="page-title">
    <div class="title_left">
        <h1>Admin Photos</h1>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Blog Photos</h2>

                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link" data-toggle="tooltip" data-placement="left" title="" data-original-title="Collapse Area">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="container">
                    <div class="row">
                        <a id="save_photos" class="btn btn-success">Save Changes</a>
                        <a href="/admin/addPhotos.php" class="btn btn-primary">Upload Photos</a>
                    </div>

                    <form id="editPhotoForm">
                        <input type="hidden" name="action" value="update-photos">
                        <?php 
                        $count = 0; 
                        while($photo = mysqli_fetch_array($photos)) { 

                            if ($count % 2 === 1) { 
                                echo '<div class="row">';
                            } ?>
                                <div class="col-xs-12 col-md-2">
                                    <img src="/img/uploaded/<?php echo $photo['path']; ?>" width="100%">
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <textarea name="caption[<?php echo $photo['id']; ?>]" class="form-control full-width"><?php echo $photo['caption']; ?></textarea>
                                    <input type="checkbox" name="is_active[<?php echo $photo['id']; ?>]" <?php echo $photo['is_active'] ?  'checked' : ''; ?>> Active
                                </div>
                            <?php
                            if ($count % 2 === 1) { 
                                echo '</div>';
                            } 

                             $count++;
                         } ?>
                    
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    // Send form to controller
    $('#save_photos').on('click', function(e) {
        
        $.ajax({
            url: "handleForm.php",
            method: 'POST',
            dataType: 'json',
            data:  $("#editPhotoForm").serialize(),
            success: function (data) {
                addAlertToPage('success', 'Success', 'Photos were saved.', 5);
            }
        });
    });

</script>
