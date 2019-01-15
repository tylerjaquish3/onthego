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

                <table id="datatable-posts" class="table table-bordered table-striped table-responsive" width="100%">
                    <thead>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Last Updated</th>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT p.title, u.user_name, c.category_name, p.id, p.updated_at, p.is_active
                            FROM posts p 
                            JOIN users u on p.created_by = u.id 
                            JOIN categories c on c.id = p.category_id 
                            WHERE  p.is_active = 1
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
</script>


