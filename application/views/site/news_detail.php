<?php 
include( "layout/meta.php"); 
include( "layout/header.php"); 
?>
<!-- BANNER -->
<div class="banner-header banner-news">
    <div class="container">
        <div class="banner-content">
            <h2 class="page-title">快問快答</h2>
            <span class="page-desc">Questions</span>
        </div>
    </div>
</div>
<!-- ./BANNER -->
<div class="main-container">
    <div class="container">
        <div class="col-sm-8 col-md-9 main-content">
            <div class="blog-single">
                <article class="blog-item style6">
                    <h4 class="blog-title"><a href="#"><?=$new['id']?></a></h4>
                    <div class="meta-post">
                        <div class="post-cat">

                            <div class="content-post">
                                <?php foreach ($news as $key=> $new): ?>
                                
                                    <span class="post-img">
                                    <img alt="<?=$new['description']?>"><br>
                                    </span>
                                
                                <?php endforeach ?>

                </article>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include( "layout/footer.php"); include( "layout/script.php"); ?>
</body>

</html>