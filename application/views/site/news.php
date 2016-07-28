<?php
    include("layout/meta.php");
    include("layout/header.php");
?>
    <!-- BANNER -->
    <div class="banner-header banner-news">
        <div class="container">
            <div class="banner-content">
                <h2 class="page-title" ><font face="標楷體" size="10">快問快答</font></h2>
                <span class="page-desc">Questions</span>
            </div>
        </div>
    </div>
    <!-- ./BANNER -->
    <div class="section-lastest">
        <div class="container">
            <div class="section-title title-style5 text-center">
                <h2 class="title">題目</h2>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="lastest-post style1 margin-bt-30">
                        <?php foreach ($news as $key => $new): ?>
                            <article class="blog-item">
                                <div class="post-format"><img alt="" src="<?=$new['pic']?>"></div>
                                <div class="info-post">
                                    <h4 class="blog-title"><a href="<?=site_url('site/news_detail')?>?id=<?=$new['id']?>">題目</a></h4>
                                    <div class="content-post">
                                        <p><?=$new['description']?></p>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach ?>
                        <nav class="pagination">
                            <ul>
                                <?php echo $this->pagination->create_links();?>
                            </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    include("layout/footer.php");
    include("layout/script.php");
?>       
</body>
</html>