<aside class="left-sidebar">

    <div class="widget">
        <h5 class="widgetheading">Recent posts</h5>
        <ul class="cat">
            <?php 
            while($recentPost = mysqli_fetch_array($recentPosts)) { ?>
                <li><i class="icon-angle-right"></i> <a href="/blog?id=<?php echo $recentPost['id']; ?>"><?php echo $recentPost['title']; ?></a></li>
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
                    <a href="/?category=<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></a><span> (<?php echo $category['categoryCount']; ?>)</span>
                </li>
            <?php 
            } ?>
        </ul>
    </div>

</aside>