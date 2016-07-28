<?php
    include("layout/meta.php");
    include("layout/header.php");
?>
<!-- BANNER -->
<div class="banner-header banner-shop">
    <div class="container">
        <div class="banner-content">
            <h2 class="page-title"><font face="標楷體" size="10">線上訂購</font></h2>
            <span class="page-desc">Online Shop</span>
        </div>
    </div>
</div>
<!-- ./BANNER -->

<div class="main-container left-slidebar">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-9 main-content">
                <div class="row products columns-3">
<?php foreach ($products as $key => $product) { ?>
<!-- Product -->
<div class="col-sm-6 col-md-4 product">
    <div class="product-thumb">
        <a href="<?=site_url('site/shop_detail')?>"><img src="<?=$product['pic']?>" alt="" /></a>
        <div class="product-button">
            <a  onclick="addCart(<?=$product['id']?>)" class="button add_to_cart_button">放入購物車</a>
            <a href="<?=site_url('site/shop_detail?id=').$product['id']?>" class="button yith-wcqv-button">Quick View</a>
        </div>
    </div>
    <div class="product-info">
        <h3 class="product-name"><a href="<?=site_url('site/shop_detail?id=').$product['id']?>"><?=$product['name']?></a></h3>
        <span class="price">
            <del>$<?=$product['price'];?></del>
            <ins>$<?=$product['special_offer'];?></ins>
        </span>
    </div>
</div>
<!-- ./Product -->
<?php } ?>
                </div>
                <!-- pagination -->
                <nav class="pagination">
                    <ul>
                        <?php echo $this->pagination->create_links();?>
                    </ul>
                </nav>
                <!-- ./pagination -->
            </div>
            <div class="col-sm-4 col-md-3 sidebar">
                <!-- Product category -->
                <div class="widget widget_product_categories">
                    <h2 class="widget-title">商品目錄分類</h2>
                    <ul class="product-categories">
                        <?php foreach ($types as $key => $type) { ?>
                        <?php if($this->input->get('type') == $type['id']) { ?>
                        <li class="current-cat"><a href="shop?type=<?=$type['id']?>"><?=$type['name']?></a></li>
                        <?php } else { ?>
                        <li><a href="shop?type=<?=$type['id']?>"><?=$type['name']?></a></li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <!-- ./Product category -->
                <!-- ./Product tags -->
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