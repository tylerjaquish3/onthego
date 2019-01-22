<?php

$currentPage = 'Photos';
include('../includes/app.php');
include('../includes/env.php');

if (isset($_GET['page'])) {
    $pageno = $_GET['page'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 16;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM photos WHERE is_active = 1";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM photos WHERE is_active = 1 ORDER BY created_at DESC LIMIT $offset, $no_of_records_per_page";
$photos = mysqli_query($conn,$sql);

$totalPosts = get('SELECT * FROM posts WHERE is_active = 1');

?>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
        
                <div class="clearfix"></div>
                <div class="row">
                    <section id="projects">
                        <ul id="thumbs" class="grid cs-style-3 portfolio">

                            <?php 
                            while($photo = mysqli_fetch_array($photos)) { ?>
                                <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                                    <div class="item">
                                        <a href="/img/uploaded/<?php echo $photo['path']; ?>" data-pretty="prettyPhoto[gallery1]" title="<?php echo $photo['caption']; ?>">
                                            <img src="/img/uploaded/<?php echo $photo['path']; ?>" alt="">
                                        </a>
                                    </div>
                                </li>
                            <?php 
                            } ?>

                        </ul>
                    </section>
                </div>
            </div>
            <?php 
            if($total_pages != 1) { ?>
                <div id="pagination">
                    <ul class="pagination">
                        <?php
                        if($pageno > 1) { ?>
                            <li><a href="?page=1<?php echo $existingUrl; ?>">First Page</a></li>
                            <li><a href="<?php if($pageno <= 1){ echo "#"; } else { echo "?page=".($pageno - 1).$existingUrl; } ?>">Previous Page</a></li>
                        <?php
                        } ?>
                        <?php 
                        if($pageno < $total_pages){ ?>
                            <li><a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?page=".($pageno + 1).$existingUrl; } ?>">Next Page</a></li>
                            <li><a href="?page=<?php echo $total_pages.$existingUrl; ?>">Last Page</a></li>
                        <?php 
                        } ?>
                    </ul>
                </div>
            <?php
            } ?>
        </div>

    </div>
</section>

<?php include('../includes/footer.php'); ?>
