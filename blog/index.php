<?php

$currentPage = 'Blog';
include('../includes/app.php');

$recentPosts = get('SELECT * FROM posts WHERE is_active = 1 ORDER BY updated_at DESC LIMIT 5');
$categories = get('SELECT c.id, COUNT(c.id) as categoryCount, c.category_name FROM posts p JOIN categories c ON c.id = p.category_id WHERE p.is_active = 1 GROUP BY c.id');
$whereCategory = '';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];
}

$sql = $conn->prepare("SELECT p.id as postId, title, header_image, content_html, p.updated_at, c.category_name, u.user_name FROM posts p JOIN users u ON u.id = p.created_by JOIN categories c ON c.id = p.category_id WHERE p.id = ?");
$sql->bind_param('i', $postId);
$sql->execute();
$result = $sql->get_result();
$post = $result->fetch_assoc();

$sql = $conn->prepare("SELECT c.comment_text, c.user_name, c.created_at, cr.reply_text FROM comments c
    LEFT JOIN comment_replies cr ON cr.comment_id = c.id
    WHERE is_active = 1 AND post_id = ?");
$sql->bind_param('i', $postId);
$sql->execute();
$comments = $sql->get_result();

$totalPosts = get('SELECT * FROM posts WHERE is_active = 1');

?>

<section id="content">
    <div class="container mobile-container">
        <div class="row">

            <div class="col-xs-12 col-md-8 col-md-push-4">

                <article class="single">
                    <div class="row">
                        <div class="span8">
                            <div class="post-image">
                                <div class="post-heading">
                                    <h3><?php echo $post['title']; ?></h3>
                                </div>
                                <?php
                                if ($post['header_image'] && $post['header_image'] != '') { ?>
                                    <div class="center-cropped" style="background-image: url('/img/uploaded/<?php echo $post['header_image']; ?>')" alt="" />
                                <?php
                                } ?>
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
                <div class="about-author col-xs-12">
                    <h5><strong><i class="icon-envelope"></i> We Would Love to Hear from You!</strong></h5>
                    <p>Leave a comment below, or <a class="white-hover" href="/contact">send us a message</a>.</p>
                </div>

                <div class="comment-area">

                    <h4><?php echo mysqli_num_rows($comments); ?> Comments</h4>

                    <?php 
                    while($comment = mysqli_fetch_array($comments)) { ?>
                        <div class="media">
                            <div class="media-body">
                                <div class="media-content">
                                    <h6><span><?php echo date('M j, Y', strtotime($comment['created_at'])); ?></span> <?php echo $comment['user_name']; ?></h6>
                                    <p><?php echo nl2br($comment['comment_text']); ?></p>
                                    <?php 
                                    if ($comment['reply_text'] != '') {
                                        echo '<p class="reply-text">'.nl2br($comment['reply_text']).'<br />- j+o</p>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>

                    <div class="marginbot30"></div>
                    <h4>Leave your comment</h4>

                    <input type="text" class="form-control" id="user_name" placeholder="* Enter your full name" />
                
                    <div class="margintop10 marginbot30">
                        <p><textarea id="comment_text" rows="12" class="input-block-level form-control" placeholder="*Your comment here"></textarea></p>
                        <span id="error" style="display:none; color: red;">Comment is required</span>
                        <p><button class="btn btn-color margintop10" id="save_comment">Submit Comment</button></p>
                    </div>

                </div>
            </div>

            <div class="col-xs-12 col-md-4 col-md-pull-8">
                <?php include('../includes/sidebar.php'); ?>
            </div>
        </div>
    </div>
</section>

<?php include('../includes/footer.php'); ?>

<script>

    var postId = "<?php echo $post['postId']; ?>"; 

    $('#save_comment').on('click', function(e) {
        $('#error').hide();

        if ($('#comment_text').val()) { 
            $.ajax({
                url: '../includes/handleForm.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'save-comment',
                    user_name: $('#user_name').val(), 
                    comment_text: $('#comment_text').val(),
                    post_id: postId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    location.reload();
                }
            });
        } else {
            $('#error').show();
        }
    });

</script>
