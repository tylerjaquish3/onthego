<?php
session_start();

include('adminHeader.php');

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
                <h2>Add Photos</h2>

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
                    <form method="POST" action="handleForm.php" enctype="multipart/form-data">
                        <div class="row">
                            <button type="submit" class="btn btn-success">Upload Photos</button>
                        </div>

                        <input type="hidden" name="action" value="new-photos">
                        <input type="file" class="form-control-file" name="image_path1" aria-describedby="fileHelp">
                        <input type="file" class="form-control-file" name="image_path2" aria-describedby="fileHelp">
                        <input type="file" class="form-control-file" name="image_path3" aria-describedby="fileHelp">
                        <input type="file" class="form-control-file" name="image_path4" aria-describedby="fileHelp">
                        <input type="file" class="form-control-file" name="image_path5" aria-describedby="fileHelp">
                        <input type="file" class="form-control-file" name="image_path6" aria-describedby="fileHelp">
                        <input type="file" class="form-control-file" name="image_path7" aria-describedby="fileHelp">
                        <input type="file" class="form-control-file" name="image_path8" aria-describedby="fileHelp">
                        <input type="file" class="form-control-file" name="image_path9" aria-describedby="fileHelp">
                        <input type="file" class="form-control-file" name="image_path10" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Only jpg, gif, and png formats are acceptable.</small>
                    
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
