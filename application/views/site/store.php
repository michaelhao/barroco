<?php
    include("layout/meta.php");
    include("layout/header.php");
?>
    <!-- BANNER -->
    <div class="banner-header banner-product">
        <div class="container">
            <div class="banner-content">
                <h2 class="page-title"><font face="標楷體" size="10">分店查詢</font></h2>
                <span class="page-desc">Store</span>
            </div>
        </div>
    </div>
    <!-- ./BANNER -->

    <!-- PORTFOLIO -->
    <div class="section-portfolio4">
        <div class="container">
            <div class="bz-portfolio">
                <div class="portfolio-grid portfolio-style4 pf-hover4 pf-gap-30" data-cols="3" data-layoutMode="fitRows">
                    <?php foreach ($stores as $key => $store): ?>
                    <div class="item-portfolio photo">
                        <div class="pf-caption">
                            <div class="pf-image">
                                <img src="<?=$store['pic']?>" alt="<?=$store['name']?>">
                            </div>
                            <div class="pf-hover">
                                <ul class="pf-social">
                                    <li><a href="<?=site_url('site/store_detail')?>?id=<?=$store['id']?>"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="pf-info text-center">
                            <div class="pf-content-info">    
                                <h3 class="pf-title"><a href="<?=site_url('site/store_detail')?>?id=<?=$store['id']?>"><?=$store['name']?></a></h3>
                                <div class="pf-cat"><a href="<?=site_url('site/store_detail')?>?id=<?=$store['id']?>"><?=$store['field1']?></a></div>
                            </div>
                        </div>
                    </div>                        
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ./PORTFOLIO -->
<?php 
    include("layout/footer.php");
    include("layout/script.php");
?>
</body>
</html>