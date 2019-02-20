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

<?php include('adminFooter.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){

        $('#datatable-posts').DataTable({
            "order": [[4, "desc"]]
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
</script>


