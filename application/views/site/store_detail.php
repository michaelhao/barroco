<?php
    include("layout/meta.php");
    include("layout/header.php");
?>
    <!-- BANNER -->
    <div class="banner-header banner-product">
        <div class="container">
            <div class="banner-content">
                <h2 class="page-title"><?=$store['name']?></h2>
                <span class="page-desc"></span>
            </div>
        </div>
    </div>
    <!-- ./BANNER -->
    <div class="section-sevice4">
        <div class="container">
            <div class="bz-service-image right-image service-style2">
            	<div class="row">
            	  <div class="col-md-12 col-sm-12 service-content">
	            		<h3 class="title text-italic playfair-display"><?=$store['name']?></h3>
	            		<div class="service-text">
                            <?=$store['content']?>
	            		</div>
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