<?php
    include("layout/meta.php");
    include("layout/header.php");
?>
	<!-- BANNER -->
    <div class="banner-header banner-blog">
        <div class="container">
            <div class="banner-content">
                <h2 class="page-title"><font face="標楷體" size="10">排行榜</font></h2>
                <span class="page-desc">Ranks</span>
            </div>
        </div>
    </div>
    <!-- ./BANNER -->
    <div class="main-container">
        <div class="container">
            <div class="col-sm-8 col-md-9 main-content">
                <div class="blog-single">
                    <article class="blog-item style6">
                        <div class="meta-post">
                            <div class="post-cat"><a href="#"></a></div>
                        </div>
                        <div class="footer-post">
                            <span><?=date('d F', strtotime($blog['created_at']))?><a href="#"></a></span>
                        </div>
                        <div class="content-post">
                            學校 : <?=$blog['school']?><br>
                            姓名 : <?=$blog['name']?><br>
                            分數 : <?=$blog['score']?>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 sidebar blog-slidebar">
                <div class="widget widget_categories">
                    <h2 class="widget-title">類別</h2>
                    <ul class="product-categories">
                        <?php foreach ($types as $key => $type): ?>
                            <?php if ($blog['type'] == $type['id']): ?>
                                <li class="current-cat"><a href="<?=site_url('site/blog')?>?type=<?=$type['id']?>"><?=$type['name']?></a></li>            
                            <?php else: ?>
                                <li><a href="<?=site_url('site/blog')?>?type=<?=$type['id']?>"><?=$type['name']?></a></li>    
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
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