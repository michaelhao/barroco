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
                <div class="blog-list">
                    <?php foreach ($blogs as $key => $blog): ?>
                    <article class="blog-item style6">
                        <div class="post-format">
                            <a href="<?=site_url('site/blog_detail')?>?id=<?=$blog['id']?>" class="hover-format">
                            </a>
                        </div>
                        <div class="meta-post">
                        </div>
                        <div class="content-post">
                            <p>學校 : <?=$blog['school']?></p>
                            <p>姓名 : <?=$blog['name']?></p>
                            <p>分數 : <?=$blog['score']?></p>
                        </div>
                        <div class="footer-post">
                            <span><a class="button readmore-button" href="<?=site_url('site/blog_detail')?>?id=<?=$blog['id']?>">READ MORE</a></span>
                           
                        </div>
                    </article>                        
                    <?php endforeach ?>
                </div>
                <nav class="pagination">
                    <ul>
                        <?php echo $this->pagination->create_links();?>
                    </ul>
                </nav>
            </div>
            <div class="col-sm-4 col-md-3 sidebar blog-slidebar">
                <div class="widget widget_categories">
                    <h2 class="widget-title">類別</h2>
                    <ul class="product-categories">
                        <?php foreach ($types as $key => $type): ?>
                            <?php if ($this->input->get('type') == $type['id']): ?>
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