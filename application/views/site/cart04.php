<?php
include("layout/meta.php");
include("layout/header.php");
if(!$this->session->userdata('order')) {
    echo '
    <script>
        alert("沒有訂單資料。");
        window.location.href = "cart002";
    </script>';
exit;
}

if(!$this->session->userdata('user')) {
    echo '
    <script>
        alert("尚未登入。");
        window.location.href = "cart002";
    </script>';
exit;
}

$user = $this->session->userdata('user');
$order = $this->session->userdata('order');

// 判斷使用者 TOKEN 是否正常
$sessions = $this->db->get_where('sessions', array(
    'hash' => $user['hash']
))->row_array();

//是否需要運費
$total=$this->cart->total();
$ship=$this->db->get_where('backadmin', array('id'=>1))->row_array();
if ($total>=$ship['free_shipment']) {
    $shipment=0;
}else{
    $shipment=$ship['shipment'];
}
// 寫入訂單資料
$order_id = date('ymd').''.substr(time(), -4).''.sprintf("%04d", $sessions['uid']);
$input = array(
    'order_id' => $order_id, 
    'order_uid' => $sessions['uid'], 
    'order_payclass' => $order['order_payclass'], 
    'order_status' => 1, 
    'order_postname' => $order['order_postname'], 
    'order_postaddr' => $order['order_postaddr'], 
    'order_postphone' => $order['order_postphone'], 
    'note' => $order['note'], 
    'order_total' => $this->cart->total()+$shipment, 
    'created_at' => date('Y-m-d H:i:s'), 
);
$this->db->insert('order', $input); 

// 寫入訂單細項資訊
foreach ($this->cart->contents() as $key => $content) {
    $inputCart = array(
        'order_id' => $order_id, 
        'order_pid' => $content['id'], 
        'order_pcount' => $content['qty'], 
        'order_pname' => $content['name'], 
        'order_pcolor' => $content['options']['spec'], 
        'order_psubtotal' => $content['subtotal'], 
        'created_at' => date('Y-m-d H:i:s'), 
    );
    $this->db->insert('order_detail', $inputCart); 
}

if ($total<$ship['free_shipment']) {
    // 寫入訂單運費
    $inputShip = array(
        'order_id' => $order_id, 
        'order_pid' => 0, 
        'order_pcount' => 1, 
        'order_pname' => "運費", 
        'order_pcolor' => "", 
        'order_psubtotal' => $shipment, 
        'created_at' => date('Y-m-d H:i:s'), 
    );
    $this->db->insert('order_detail', $inputShip); 
}

// 刪除購物車資料
$this->cart->destroy();
// 刪除訂單資訊
$this->session->unset_userdata('order');
// 刪除使用者資訊
// $this->session->unset_userdata('user');

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
                        <div class="accordeon-title"><span class="number">4</span>完成訂購</div>
                        <div></div>   
                        <div class="accordeon-entry" style="display: block;">
                            <div class="row">
                                <div class="col-md-6 information-entry">
                                    <div class="article-container style-1">
                                        <h3>非常感謝您的訂購</h3>
                                        <h3 style="color:#C06">您的訂單編號為：<?=$order_id?></h3>
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
                                        <p class="orderfont">請稍後，即將轉去歐付寶完成訂單...</p>
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
<script>

$(document).ready(function() {
    $(".orderfont").hide();
});

    // setTimeout(function(){ 
    //     window.location.href="<?=site_url('site/allpay/'.$order_id)?>"; }, 3000);
</script>
</body>
</html>