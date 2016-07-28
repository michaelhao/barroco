<?php
include("layout/meta.php");
include("layout/header.php");
if(!$this->session->userdata('user')) {
        echo '
        <script>
            alert("尚未登入。");
            window.location.href = "cart01";
        </script>';
}
$user = $this->session->userdata('user');

if($this->session->userdata('order')) {
    $order = $this->session->userdata('order');
} else {
    $order['order_postname'] = '';
    $order['order_postphone'] = ''; 
    $order['order_posttel'] = ''; 
    $order['order_postaddr'] = ''; 
    $order['note'] = ''; 
}
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
                        <div class="accordeon-title"><span class="number">2</span>寄件資料 / 付款方式</div>                
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
<form method="POST" action="cart03">
    <div class="radio" style="margin-bottom: 15px">
        <div class="col-md-4">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                輸入收件人資料
            </label>
        </div>
        <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            同寄件人資料
        </label>
    </div>
    <label>收件人名</label>
    <input type="text" value="<?=$order['order_postname']?>" placeholder="請輸入收件人姓名" class="simple-field">
    <label>收件人性別</label>
    <div class="radio" style="margin-bottom: 15px">
        <label>
            <input type="radio" name="gender" value="male" checked>男
        </label>
        <label>
            <input type="radio" name="gender" value="female">女
        </label>
    </div>
    <label>電話	</label>
    <input type="tel" value="<?=$order['order_posttel']?>" placeholder="請輸入電話，僅接受數字" class="simple-field">
    <label>手機號碼	</label>
    <input type="tel" value="<?=$order['order_postphone']?>" placeholder="請輸入手機號碼，僅接受數字" class="simple-field">
    <label>收件地址</label>
    <input type="password" value="<?=$order['order_postaddr']?>" placeholder="請勿填寫郵政信箱" class="simple-field">
    <label>備註事項</label>
    <input type="password" value="<?=$order['note']?>" placeholder="" class="simple-field">
    <label>可選收貨日期</label>
    <input type="date" value="receive_date" placeholder="西元年/月/日" class="simple-field">
    <label>可選收貨時間</label>
    <select class="form-control" id="receive_time">
        <option name="all" value="0">不指定</option>
        <option name="morning" value="1">上午 08:00~12:00</option>
        <option name="afternoon" value="2">下午 12:01~17:00</option>
        <option name="evening" value="3">晚上 17:01~22:00</option>
    </select>
    <label>是否捐贈發票</label>
    <div class="radio" style="margin-bottom: 15px">
        <label>
            <input type="radio" name="donate" value="yes" checked>是
        </label>
        <label>
            <input type="radio" name="donate" value="no">否
        </label>
    </div>
    <label>發票形式</label>
    <select class="form-control" id="invoice_type">
        <option name="two" value="2">二聯式發票</option>
        <option name="three" value="3">三聯式發票</option>
    </select>
    <label>統一編號</label>
    <input type="number" value="Unumber" placeholder="如需統一編號請在此輸入" class="simple-field">
    <label>發票抬頭</label>
    <input type="text" value="invoice_title" placeholder="如需發票抬頭請在此輸入" class="simple-field">

    <h3>《 請選擇付款方式 》</h3>
    <label class="checkbox-entry radio">
        <input type="radio" name="order_payclass"  value="ATM" checked=""> <span class="check"></span> <b>ATM轉帳</b>
    </label>
    <label class="checkbox-entry radio">
        <input type="radio" name="order_payclass"  value="CreditCard"> <span class="check"></span> <b>信用卡付款</b>
    </label>
    <label class="checkbox-entry radio">
        <input type="radio" name="order_payclass" value="CSV" > <span class="check"></span> <b>超商代碼繳費（ibon）</b>
    </label>
    <label class="checkbox-entry radio">
        <input type="radio" name="order_payclass" value="COD"> <span class="check"></span> <b>貨到付款</b>
    </label>
    <p>&nbsp;</p>
    <div class="button style-10"  onclick="window.location.href='cart002';">回上一頁</div>
    <div class="button style-10">填寫完成，下一步<input type="submit" value=""></div>
</form>
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