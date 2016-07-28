<?php
    include("layout/meta.php");
    include("layout/header.php");
?>
    <!-- BANNER -->
    <div class="banner-header banner-contact">
        <div class="container">
            <div class="banner-content">
                <h2 class="page-title"><font face="標楷體" size="10">常見問題</font></h2>
                <span class="page-desc">FAQ</span>
            </div>
        </div>
    </div>
    <!-- ./BANNER -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="bz-contactinfo">
                        <?=$faq['content']?>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </div>
<?php 
    include("layout/footer.php");
    include("layout/script.php");
?>
</body>
</html>