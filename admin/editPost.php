
<?php 
session_start();

include('adminHeader.php');

if (!isset($_SESSION["user_id"])) {
    header('location:/admin/login.php');
}

if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $postQuery = get('SELECT p.id as postId, title, header_image, content_html, p.category_id, p.updated_at, c.category_name, u.user_name FROM posts p JOIN users u ON u.id = p.created_by JOIN categories c ON c.id = p.category_id WHERE p.id = '.$postId);

    $post = mysqli_fetch_array($postQuery);
}

?>

<div class="page-title">
    <div class="title_left">
        <h1>Posts</h1>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php
                if( isset($post)) {
                    echo '<h2>Edit Post: '.$post['title'].'</h2>';
                } else {
                    echo '<h2>Create Post</h2>';
                } ?>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="x_panel">

                    <form class="form-horizontal form-label-left" action="handleForm.php" enctype="multipart/form-data" method="POST">
                    
                        <input type="hidden" name="action" value="save-post">
                        <?php
                        if( isset($post)) {
                            echo '<input type="hidden" name="is_new" value="0">';
                            echo '<input type="hidden" name="post_id" value="'.$postId.'">';
                            echo '<input type="hidden" name="header_image" value="'.$post['header_image'].'">';
                        } else {
                            echo '<input type="hidden" name="is_new" value="1">';
                            echo '<input type="hidden" name="post_id" value="0">';
                        } ?>

                        <div class="row">
                            <div class="col-xs-12 col-md-4">

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input type="text" required class="form-control col-xs-12" placeholder="Title *" name="title" value="<?php echo isset($post) ? $post['title'] : ''; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <select name="category" required class="form-control col-xs-12" id="category">
                                            <option value="">Category</option>
                                            <?php
                                            $categories = mysqli_query($conn,"SELECT * FROM categories");
                                            if (mysqli_num_rows($categories) > 0) {
                                                while($div = mysqli_fetch_array($categories)) {
                                                    if (isset($post) && $post['category_id'] == $div['id']) { ?>
                                                        <option selected="selected" value="<?php echo $post['category_id']; ?>"><?php echo $div['category_name']; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $div['id']; ?>"><?php echo $div['category_name']; ?></option>
                                                    <?php }
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        Header Image 
                                        <input type="file" class="form-control-file" name="header_image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <?php if (isset($post['header_image']) && $post['header_image'] != '') { 
                                    echo '<img src="../img/uploaded/'.$post['header_image'].'" style="max-height: 200px">';
                                } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="document-editor">
                                        <textarea name="content_html" id="editor1">
                                            <?php
                                            if(isset($post)) {
                                                echo $post['content_html'];
                                            } ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group buttons-down">
                                <div class="col-md-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin" class="btn btn-warning">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="save-draft">Save as Draft</button>
                                    <button type="submit" class="btn btn-success" name="publish-post">Publish</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include('adminFooter.php');
?>

<script type="text/javascript">

    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: '',
        filebrowserUploadUrl: 'handleForm.php'
    });

    var postId = <?php echo isset($post) ? json_encode($post['postId']) : 0; ?>;

    // User saved post as draft, set is_active = 0
    // $('#save-post').on('click', function(e) {
    //     submitForm(0);
    // });

    // // User published post, set is_active = 1
    // $('#publish-post').on('click', function(e) {
    //     submitForm(1);
    // });

    // // Send form to save function
    // function submitForm(isActive)
    // {
    //     if ($('#title').val() == "") {
    //         addAlertToPage('error', 'error', 'Please add a title', 5);
    //     } else {
    //         var isNew = true;
    //         if (postId != 0) {
    //             isNew = false;
    //         }

    //         $.ajax({
    //             url: "handleForm.php",
    //             method: "POST",
    //             dataType: 'json',
    //             data: {
    //                 action: 'save-post',
    //                 is_new: isNew,
    //                 post_id: postId,
    //                 title: $('#title').val(), 
    //                 content_html: CKEDITOR.instances.editor1.getData(),
    //                 category: $('#category').val(),
    //                 is_active: isActive,
    //                 header_image: JSON.stringify($('#header_image').prop('files'))
    //             },
    //             success: function (data) {
    //                 // console.log(data);
    //                 window.location = '/admin';
    //             }
    //         });
    //     }
    // }

</script>