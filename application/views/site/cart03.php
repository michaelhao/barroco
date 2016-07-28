<?php
include("layout/meta.php");
include("layout/header.php");
if(!$this->session->userdata('user') || !$this->input->post()) {
        echo '<script>
            alert("尚未登入。");
            window.location.href = "cart002";
        </script>';
}

// 購物車無資料
if(!$this->cart->contents()) {
        echo '
        <script>
            alert("購物車無商品，無法結帳。");
            window.location.href = "'.site_url().'";
        </script>';
exit;
}
$input = $this->input->post();
$this->session->set_userdata('order', $input);
$user = $this->session->userdata('user');
?>
<!-- BANNER -->
<div class="banner-header banner-shop">
    <div class="container">
        <div class="banner-content">
            <h2 class="page-title">購物車</h2>
            <span class="page-desc">Cart</span>
        </div>
    </div>
</div>
<!-- ./BANNER -->
<div class="section-service1">
    <div class="container">
        <div class="information-blocks">
            <div class="row">
                <div class="col-sm-12 information-entry">
                    <div class="accordeon size-1">
                        <div class="accordeon-title"><span class="number">3</span>資料再次確認</div> 
                        <div class="information-blocks">
                            <div class="table-responsive">
                                <table class="cart-table">
                                    <tbody>
                                        <tr>
                                            <th class="column-1">商品名稱</th>
                                            <th class="column-2">單價</th>
                                            <th class="column-3">數量</th>
                                            <th class="column-4">小計</th>
                                        </tr>
<? foreach ($this->cart->contents() as $key => $content) { ?>
<tr>
    <td>
        <div class="traditional-cart-entry">
            <a href="#" class="image"><img src="<?=$content['options']['image']?>" alt=""></a>
            <div class="content">
                <div class="cell-view">
                    <a href="#" class="tag"><?=$content['options']['type']?></a>
                    <a href="#" class="title"><?=$content['name']?></a>
                </div>
            </div>
        </div>
    </td>
    <td>$<?=$content['price']?></td>
    <td><div class="entry number"><?=$content['qty']?></div></td>
    <td><div class="subtotal">$<?=$content['qty']*$content['price']?></div></td>
</tr>
<? } ?>
                                    </tbody>
                                </table>
                            </div>
        					<div class="cart-submit-buttons-box">
                                <a class="button style-15">此筆訂單共 <?=count($this->cart->contents())?> 件 / 總計 NT.$<?=$this->cart->total()?></a>
                            </div>
                        </div>                                
                        <div class="accordeon-entry" style="display: block;">
                            <div class="row">
                                <div class="col-md-6 information-entry">
                                    <div class="article-container style-1">
                                        <h3>《 訂購人 》 <?=$user['email']?></h3>
                                        <p>&nbsp;</p>
                                        <h3>《 宅配快遞 / 寄件資料 》</h3>
                                        <p>&nbsp;</p>
                                        <p><span class="orderfont">收件人名</span><?=$input['order_postname']?></p>
                                        <p><span class="orderfont">手機號碼</span><?=$input['order_postphone']?></p>
                                        <p><span class="orderfont">收件地址</span><?=$input['order_postaddr']?></p>
                                        <p><span class="orderfont">備註事項</span><?=$input['note']?></p>
                                        <p>&nbsp;</p>
                                        <h3>《 付款方式 》 
                                        <?php 
                                            if($input['order_payclass'] == 'ATM') {
                                                echo "ATM轉帳";
                                            } elseif ($input['order_payclass'] == 'CreditCard') {
                                                echo "信用卡付款";
                                            } elseif ($input['order_payclass'] == 'CSV') {
                                                echo "超商代碼繳費（ibon）";
                                            } elseif ($input['order_payclass'] == 'COD') {
                                                echo "貨到付款";
                                            }
                                        ?>
                                        </h3>
                                        <p>&nbsp;</p>
                                        <div class="button style-10" onclick="window.location.href='cart02';">回上一頁</div>
                                        <div class="button style-10" onclick="window.location.href='cart04';">資料正確，去結帳</div>
                                    </div>
                                </div>
                            </div>
                        </div> 
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