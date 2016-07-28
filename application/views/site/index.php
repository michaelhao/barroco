<?php
    include("layout/meta.php");
    include("layout/header.php");
    
    $banners=$this->db->order_by('sort','desc')->get_where('score', array(
        'Recover' => 0, 
    ))->result_array();
    
    $CI =& get_instance();
    $CI->load->library('image');
    $banners = $CI->image->getImage($banners);
    
    
    ?>
<div class="slide-home owl-carousel imageslide-fullscreen" data-autoplay="false" <?php if(count($banners)>1){echo 'data-loop="true"';}?> data-nav="false" data-items="1" data-dots="false">
    <?php foreach ($banners as $key => $banner): ?>
    <!-- <div class="item-homeslide" data-background="<?=base_url()?>public/site/images/logos/baloca.png"> -->
        <div class="full-height container">
            <div class="content-slide text-left content-style2">
                <h2 class="title">
                <font face="標楷體"></font></h3>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
<div class="section-wellcome">
    <div class="container">
        <div class="bz-service-image left-image res-style-1">
            <div class="row">
                <div class="col-sm-12 col-md-6 service-image">
                    <figure><img src="<?=base_url()?>public/site/images/logos/baloco.jpg" alt=""></figure>
                </div>
                <div class="col-sm-12 col-md-6 service-content">
                    <h1 class="title dancing-script"><font face="標楷體">「光影巴洛克」</h1>
                    <div class="service-text">
                        <p> 巴洛克一詞源自於義大利語：Barocco，意指「不規則的怪異的珍珠」，是一種對於文藝復興追求理性與完美的反動與極致擴展。這種風格於歐洲17世紀(西元1600年代)左右起源於義大利的羅馬，隨後散佈到歐洲的大部分地區。
                            17世紀同時也是歐洲面臨新舊文化衝擊轉換的關鍵時期，自15世紀地理大發現後，造成整個歐洲商業貿易的興盛，帶動經濟繁榮、物質生活提升，理性主義抬頭，財富大量的累積也使得資產階級興起，開始對美洲、非洲、亞洲擴張進行殖民，使歐洲逐漸成為世界的中心。同時期的君主如法王路易14在政治上展現強勢作風，厲行「君主專制」王權神授，宗教力量相形式微，在歐洲各地發生不同形式的「宗教改革」運動。而舊有的教會勢力為了維護權利，又發動「反宗教改革」運動，新舊教之間互相抗衡，產生劇變與衝擊的新時代。
                            在這個劇烈變動的時代，歐洲的藝術發展也有十分突破的表現，相較於文藝復興時期藝術表現著重平衡、適中、莊重、理性與邏輯，巴洛克時期的藝術強調動態與感官效果，更擅長透過光影的營造，創造出戲劇性的聚焦或氛圍營造，也在不同的文化與藝術形式間，產生了多元的創作特色。
                            本展將透過17世紀巴洛克時期的著名藝術家：卡拉瓦喬(Caravaggio)、林布蘭(Rembrandt)、拉圖爾(La Tour)、維梅爾(Vermeer)、貝尼尼(Bernini)等，一覽諸位大師在光影表現上各具特色的精彩手法，也期望學童在日常生活中延伸觀察光影應用的經驗，從中培養生活美感，並藉由了解17世紀的獨特的社會氛圍和藝術風潮，拓展視野與文化世界觀，進而思考文化的歷史脈絡，具備多元審美的能力。
                        </p>
                    </div>
                    <span class="name-client">廣達文教基金會</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("layout/footer.php"); ?>
<div class="modal fade" id="long">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <?=$preferential['content']?>
                <!-- <img style="height: 800px" src="http://i.imgur.com/KwPYo.jpg"> -->
            </div>
            <div class="modal-footer" style="text-align: center;">
                <a class="button primary medium radius" href="#">I'm a link</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php include("layout/script.php");?>
<script type="text/javascript" src="<?=base_url()?>public/store/js/bootstrap.min.js"></script>
</body>
</html>

