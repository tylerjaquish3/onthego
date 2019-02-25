<?php
session_start();

include('adminHeader.php');

?>

<!-- page content -->
<div class="page-title">
    <div class="title_left">
        <h1>Admin Dashboard</h1>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel dashboard_graph">
            <div class="x_title">
                <h2>Blog Posts</h2>
                <a href="editPost.php" class="btn btn-primary">New Post</a>
            </div>
            <div class="x_content">

                <table id="datatable-posts" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Last Updated</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT p.title, u.user_name, c.category_name, p.id, p.updated_at, p.is_active
                            FROM posts p 
                            JOIN users u on p.created_by = u.id 
                            JOIN categories c on c.id = p.category_id
                            ";
                        $posts = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($posts) > 0) {
                            while($post = mysqli_fetch_array($posts)) 
                            { ?>
                                <tr>
                                    <td><a href="editPost.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></td>
                                    <td><?php echo $post['category_name']; ?></td>
                                    <td><?php $badge_color = $post['is_active'] == 1 ? 'green' : 'red';
                                        $badge_text = $post['is_active'] == 1 ? 'Published' : 'Draft';
                                        echo '<span class="badge bg-' . $badge_color . '">' . $badge_text . '</span>';?>    
                                    </td>
                                    <td><?php echo $post['user_name']; ?></td>
                                    <td><?php echo $post['updated_at']; ?></td>
                                    <td><a onclick="deletePost(<?php echo $post['id']; ?>);"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            <?php 
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel dashboard_graph">
            <div class="x_title">
                <h2>Comments</h2><br /><br />

            </div>
            <div class="x_content">

                <table id="datatable-comments" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <th>Blog</th>
                        <th>Commentor</th>
                        <th>Text</th>
                        <th>Date Time</th>
                        <th>Replied</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT c.id, c.user_name, c.comment_text, c.created_at, p.title, c.replied
                            FROM comments c
                            JOIN posts p on p.id = c.post_id 
                            WHERE c.is_active = 1
                            ";
                        $posts = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($posts) > 0) {
                            while($post = mysqli_fetch_array($posts)) 
                            { ?>
                                <tr>
                                    <td><?php echo $post['title']; ?></td>
                                    <td><?php echo $post['user_name']; ?></td>
                                    <td><?php echo $post['comment_text']; ?></td>
                                    <td><?php echo $post['created_at']; ?></td>
                                    <td><?php $badge_color = $post['replied'] == 1 ? 'green' : 'red';
                                        $badge_text = $post['replied'] == 1 ? 'Yes' : 'No';
                                        echo '<span class="badge bg-' . $badge_color . '">' . $badge_text . '</span>';?>    
                                    </td>
                                    <td>
                                        <a style="cursor: pointer;" onclick="reply(<?php echo $post['id']; ?>);">Reply</a> or 
                                        <a style="cursor: pointer;" onclick="deleteComment(<?php echo $post['id']; ?>);"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php 
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="comment_reply_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reply to Comment</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 field form-group">
                        <span id="comment-to-reply"></span>
                    </div>
                </div>
                <form>
                    <input type="hidden" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="hidden" id="comment_id">
                    <div class="row form-row">
                        <div class="col-xs-12 field form-group">
                            <textarea id="comment_reply" class="col-xs-12"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer pull-right">
                <button type="button" class="btn btn-warning" class="close" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="submit-reply-btn">Save</button>
            </div>
        </div>
    </div>
</div>

<?php include('adminFooter.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){

        $('#datatable-posts').DataTable({
            "order": [[4, "desc"]]
        });

        $('#datatable-comments').DataTable({
            "order": [[3, "desc"]]
        });

    });

    function deletePost(id)
    {
        var r = confirm('Are you sure you want to delete this post? This cannot be undone.');

        if (r == true) {
            $.ajax({
                url: 'handleForm.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'delete-post',
                    post_id: id, 
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    location.reload();
                }
            });
        } 
    }

    function deleteComment(id)
    {
        var r = confirm('Are you sure you want to delete this comment?');

        if (r == true) {
            $.ajax({
                url: 'handleForm.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'delete-comment',
                    comment_id: id, 
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    location.reload();
                }
            });
        } 
    }

    function reply(id)
    {
        $('#comment_reply_modal').modal('show'); 
        $('#comment_id').val(id);

        $.ajax({
            url: 'handleForm.php',
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'get-comment',
                comment_id: id, 
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                $('#comment-to-reply').text(data.message.comment_text);
            }
        }); 
    }

    $('#submit-reply-btn').click(function () {
        $.ajax({
            url: 'handleForm.php',
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'reply-comment',
                comment_id: $('#comment_id').val(), 
                user_id: $('#user_id').val(),
                reply_text: $('#comment_reply').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                $('#comment_reply_modal').modal('toggle'); 
                addAlertToPage('success', 'Success', data.message, 5);
            }
        });
    });
</script>


