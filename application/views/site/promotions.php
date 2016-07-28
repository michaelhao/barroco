<?php
    include("layout/meta.php");
    include("layout/header.php");
?>
	<!-- BANNER -->
    <div class="banner-header banner-case">
        <div class="container">
            <div class="banner-content">
                <h2 class="page-title"><font face="標楷體" size="10">活動下載</font></h2>
                <span class="page-desc">Promotions</span>
            </div>
        </div>
    </div>
    <!-- ./BANNER -->
    <div class="section-lastest">
        <div class="container">
            <div class="section-title title-style5 text-center">
                <h2 class="title">活動下載</h2>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="lastest-post style1 margin-bt-30">
                        <?php foreach ($promotions as $key => $promotion): ?>
                        <article class="blog-item">
                            <!-- <div class="post-format"><img alt="" src="images/im2.jpg"></div> -->
                            <div class="info-post">
                                <h4 class="blog-title"><!-- <a href="news-detail.html"> --><?=$promotion['name']?><!-- </a> --></h4>
                                <div class="meta-post">
                                    <p><?=date('d F', strtotime($promotion['start_at']))?> <a href="<?=$promotion['field1']?>">即刻下載</a></p>
                                </div>
                                <div class="content-post">
                                    <p><?=$promotion['description']?></p>
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