<?php
include("layout/meta.php");
include("layout/header.php");
$id = $this->input->get("id");
$product = $this->db->get_where('product', array('id' => $id,))->row_array();
$product_images = $this->db->get_where('image', array(
    'source_id' => $id, 
    'panel' => $product['panel'], 
    'recover' => 0
))->result_array();
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
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="single-images">
                    <a class="popup-image" href="<?php if(!empty($product_images)) {echo $product_images[0]['url'];}?>">
                    <img class="main-image" src="<?php if(!empty($product_images)) {echo $product_images[0]['url'];}?>"  alt=""/></a>
                    <div class="single-product-thumbnails owl-carousel" data-margin="10" data-nav="false" data-dots="false" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="summary entry-summary">
                    <h1 class="product_title entry-title"><?=$product['name']?></h1>
					<div class="description"><?=$product['description'];?></div>
                    <p class="price">
                        <ins><span class="amount">$<?=$product['special_offer'];?></span></ins>
                        <del><span class="amount">$<?=$product['price'];?></span></del> 
                    </p>
<form class="variations_form " onsubmit="return shopAddCart();">
    <div class="single_variation_wrap">
        <div class="box-qty">
            <a  onclick="shopQtyUp()"  class="quantity-plus"><i class="fa fa-angle-up"></i></a>
            <input type="hidden" name="id" value="<?=$product['id']?>">
            <input type="text" name="qty" value="1" title="Qty" limitvalue="<?=$product['qty']?>"  class="input-text qty text" size="4">
            <a  onclick="shopQtyDown()" class="quantity-minus"><i class="fa fa-angle-down"></i></a>
        </div>
        <button type="submit" class="single_add_to_cart_button ">加入購物車</button>
    </div>
</form>
                       <div class="product-share">
                        <span>分享至</span>
                        <a href="#"><i class="fa fa-facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?=current_url()?>?id=<?=$id?>'), 'facebook-share-dialog', 'width=626,height=436'); return false;"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product tab -->
        <div class="product-tabs">
            <div class="bz-verticalTab bz-tab bz-tab-style4 resp-vtabs" style="display: block; width: 100%; margin: 0px;">
                <div class="resp-tabs-container">
                    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Description</h2>
                    <div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block"><?=$product['content']?></div>
                </div>
            </div>
        </div>
        <!-- ./ Product tab -->
    </div>
</div>
<?php 
    include("layout/footer.php");
    include("layout/script.php");
?>
</body>
</html>