<?php

$currentPage = 'Blog';
include('includes/app.php');

$recentPosts = get('SELECT * FROM posts WHERE is_active = 1 ORDER BY updated_at DESC LIMIT 5');
$categories = get('SELECT c.id, COUNT(c.id) as categoryCount, c.category_name FROM posts p JOIN categories c ON c.id = p.category_id GROUP BY c.id');
$whereCategory = '';
if (isset($_GET['category'])) {
    $whereCategory = 'AND category_id ='.$_GET['category'];
}
$categoryPosts = get('SELECT p.id as postId, title, content_html, p.updated_at, c.category_name, u.user_name FROM posts p JOIN users u ON u.id = p.created_by JOIN categories c ON c.id = p.category_id WHERE p.is_active = 1 '.$whereCategory.' ORDER BY p.updated_at DESC');

$photos = get('SELECT * FROM photos WHERE is_active = 1 ORDER BY created_at DESC LIMIT 4');

// var_dump($recentPosts);die;
// while($row = $recentPosts) {
//     echo $row['id'];           
// }
// die;
// dd($recentPosts);
?>

<!-- section intro -->
<section id="intro">
    <div class="intro-content">
        <h2>Welcome!</h2>
        <h3>On the Go with Justin and Oksana</h3>
        <div>
            <a href="#content" class="btn-get-started scrollto">Start Reading</a>
        </div>
    </div>
</section>
<!-- /section intro -->

<section id="content">
    <div class="container">
        <div class="row">
            <div class="span4">
                <aside class="left-sidebar">

                    <div class="widget">
                        <h5 class="widgetheading">Recent posts</h5>
                        <ul class="cat">
                            <?php 
                            while($recentPost = mysqli_fetch_array($recentPosts)) { ?>
                                <li><i class="icon-angle-right"></i> <a href="<?php echo $recentPost['id']; ?>"><?php echo $recentPost['title']; ?></a></li>
                            <?php 
                            } ?>
                        </ul>
                    </div>

                    <div class="widget">
                        <h5 class="widgetheading">Categories</h5>
                        <ul class="cat">
                            <li><i class="icon-angle-right"></i> <a href="/">All</a><span> ({{ $postCount }})</span></li>
                            <?php 
                            while($category = mysqli_fetch_array($categories)) { ?>
                                <li>
                                    <i class="icon-angle-right"></i> 
                                    <a href="?category=<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></a><span> (<?php echo $category['categoryCount']; ?>)</span>
                                </li>
                            <?php 
                            } ?>
                        </ul>
                    </div>

                </aside>
            </div>

            <div class="span8">

                <?php 
                while($post = mysqli_fetch_array($categoryPosts)) { ?>
                <article>
                    <div class="row">
                        <div class="span8">
                            <div class="post-image">
                                <div class="post-heading">
                                    <h3><a href="/blog/<?php echo $post['postId']; ?>"><?php echo $post['title']; ?></a></h3>
                                </div>

                                <img src="img/dummies/blog/img1.jpg" alt="" />
                            </div>
                            <div class="meta-post">
                                <a href="#" class="author">By<br /><?php echo $post['user_name']; ?></a>
                                <a href="#" class="date"><?php echo date('j M', strtotime($post['updated_at'])); ?><br /><?php echo date('Y', strtotime($post['updated_at'])); ?></a>
                                <br /><br /><p>Category: <?php echo $post['category_name']; ?></p>
                            </div>
                            <div class="post-entry">
                                <p>
                                <?php echo substr($post['content_html'], 0, 335)."..."; ?>
                                </p>
                                <a href="/blog/<?php echo $post['postId']; ?>" class="btn btn-color">Read more <i class="icon-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </article>
                <?php
                } ?>

                <div id="pagination">
                    {{ $categoryPosts->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<section id="works">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h3>
                    Photos
                    <a href="/photos" class="btn btn-color">View more <i class="icon-angle-right"></i></a>
                </h3>
                <div class="row">

                    <div class="grid cs-style-3">

                        <?php 
                        while($photo = mysqli_fetch_array($photos)) { ?>
                            <div class="span3">
                                <div class="item">
                                    <a href="/img/dummies/works/<?php echo $photo['path']; ?>" data-pretty="prettyPhoto[gallery1]" title="<?php echo $photo['caption']; ?>">
                                        <img src="/img/dummies/works/<?php echo $photo['path']; ?>" alt="">
                                    </a>
                                </div>
                            </div>
                        <?php 
                        } ?>
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
