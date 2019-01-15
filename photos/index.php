<?php

$currentPage = 'Photos';
include('../includes/app.php');

$photos = get('SELECT * FROM photos WHERE is_active = 1 ORDER BY created_at DESC LIMIT 20');

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
            <div class="span12">
        
                <div class="clearfix"></div>
                <div class="row">
                    <section id="projects">
                        <ul id="thumbs" class="grid cs-style-3 portfolio">

                            <?php 
                            while($photo = mysqli_fetch_array($photos)) { ?>
                                <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                                    <div class="item">
                                        <a href="/img/dummies/works/<?php echo $photo['path']; ?>" data-pretty="prettyPhoto[gallery1]" title="<?php echo $photo['caption']; ?>">
                                            <img src="/img/dummies/works/<?php echo $photo['path']; ?>" alt="">
                                        </a>
                                    </div>
                                </li>
                            <?php 
                            } ?>

                        </ul>
                    </section>
                </div>
            </div>
            <div id="pagination">
                {{ $photos->links() }}
            </div>
        </div>

    </div>
</section>

<?php include('../includes/footer.php'); ?>
