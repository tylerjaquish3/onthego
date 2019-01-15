<?php

$currentPage = 'Blog';
include('../includes/app.php');

$recentPosts = get('SELECT * FROM posts WHERE is_active = 1 ORDER BY updated_at DESC LIMIT 5');
$categories = get('SELECT c.id, COUNT(c.id) as categoryCount, c.category_name FROM posts p JOIN categories c ON c.id = p.category_id GROUP BY c.id');
$whereCategory = '';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];
}
$postQuery = get('SELECT p.id as postId, title, content_html, p.updated_at, c.category_name, u.user_name FROM posts p JOIN users u ON u.id = p.created_by JOIN categories c ON c.id = p.category_id WHERE p.id = '.$postId);

$post = mysqli_fetch_array($postQuery);

$comments = get('SELECT * FROM comments WHERE post_id = '.$postId);

// var_dump($recentPosts);die;
// while($row = $recentPosts) {
//     echo $row['id'];           
// }
// die;
// dd($recentPosts);
?>

<section id="content">
    <div class="container">
        <div class="row">

            <div class="span4">
                <?php include('../includes/sidebar.php'); ?>
            </div>
            <div class="span8">

                <article class="single">
                    <div class="row">
                        <div class="span8">
                            <div class="post-image">
                                <div class="post-heading">
                                    <h3><?php echo $post['title']; ?></h3>
                                </div>
                                <img src="img/dummies/blog/img1.jpg" alt="" />
                            </div>
                            <div class="meta-post">
                                <a href="#" class="author">By<br /> <?php echo $post['user_name']; ?></a>
                                <a href="#" class="date"><?php echo date('j M', strtotime($post['updated_at'])); ?><br /><?php echo date('Y', strtotime($post['updated_at'])); ?></a>
                            </div>
                            <?php echo $post['content_html']; ?>
                        </div>
                    </div>
                </article>

                <!-- author info -->
                <div class="about-author span8">
                    <a href="#" class="thumbnail align-left"><img src="img/avatar.png" alt="" /></a>
                    <h5><strong><a href="#">We Would Love to Hear from You!</a></strong></h5>
                    <p>Leave a comment below, or <a href="/contact">contact us here</a>.</p>
                </div>

                <div class="comment-area">

                    <h4><?php echo mysqli_num_rows($comments); ?> Comments</h4>

                    <?php 
                    while($comment = mysqli_fetch_array($comments)) { ?>
                        <div class="media">
                            <div class="media-body">
                                <div class="media-content">
                                    <h6><span><?php echo date('M j, Y', strtotime($comment['created_at'])); ?></span> <?php echo $comment['user_name']; ?></h6>
                                    <p>{{ $comment->comment_text }} </p>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>

                    <div class="marginbot30"></div>
                    <h4>Leave your comment</h4>

                    <div class="row">
                        <div class="span8">
                            <input type="text" id="user_name" placeholder="* Enter your full name" />
                        </div>
                        <div class="span8 margintop10">
                            <p><textarea id="comment_text" rows="12" class="input-block-level" placeholder="*Your comment here"></textarea></p>
                            <p><button class="btn btn-color margintop10" id="save_comment">Submit Comment</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('../includes/footer.php'); ?>

<script>

    var post = @json($post);

    $('#save_comment').on('click', function(e) {
        $.ajax({
            url: '/comment',
            type: 'POST',
            dataType: 'json',
            data: {
                user_name: $('#user_name').val(), 
                comment_text: $('#comment_text').val(),
                post_id: post.id,
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                alert('saved');
            }
        });
    });

</script>
