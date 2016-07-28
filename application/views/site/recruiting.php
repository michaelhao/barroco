<?php
    include("layout/meta.php");
    include("layout/header.php");
?>
    <!-- BANNER -->
    <div class="banner-header banner-shops">
        <div class="container">
            <div class="banner-content">
                <h2 class="page-title"><font face="標楷體" size="10">人員招募</font></h2>
                <span class="page-desc">
Recruiting</span>
            </div>
        </div>
    </div>
    <!-- ./BANNER -->
    <div class="main-container">
        <div class="container">
            <div class="row">
			<?=$recruiting['content']?>
            </div>
        </div>
    </div>
<?php 
    include("layout/footer.php");
    include("layout/script.php");
?>
</body>
</html>