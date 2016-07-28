<?php
include("layout/meta.php");
include("layout/header.php");
if ($this->cart->contents()==null) {
  echo '
        <script>
            alert("購物車無商品");
            window.location.href = "index";
        </script>';
}
if($this->session->userdata('user')) {
    redirect('site/cart02');
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
                        <div class="accordeon-title"><span class="number">1</span>登入 / 註冊會員</div>
                            
                        <div class="information-blocks" style="display: block;">
                            <div class="table-responsive">
                                <table class="cart-table">
                                    <tbody><tr>
                                        <th class="column-1">商品名稱</th>
                                        <th class="column-2">單價</th>
                                        <th class="column-3">數量</th>
                                        <th class="column-4">小計</th>
                                    </tr>
<?php foreach ($this->cart->contents() as $key => $content) { ?>
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
<?php } ?>

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
                                        <h3>《 首次購物 / 註冊資料 》</h3>
                                        <p>&nbsp;</p>
<form onsubmit="return false;">
    <label>註冊Email</label>
    <input type="text" name="registr_email" value="" placeholder="查詢訂單進度，登入時使用" class="simple-field">
    <label>密碼</label>
    <input type="password" name="registr_password" value="" placeholder="請輸入至少6個字元，大小寫有差別" class="simple-field">
    <label>密碼確認</label>
    <input type="password" name="registr_repeatpassword" value="" placeholder="請再次輸入密碼" class="simple-field">
    <div class="button style-10">加入會員<input type="submit" value="" onclick="registr()"></div>
</form>
                                  </div>
                                </div>
                                <div class="col-md-6 information-entry">
                                    <div class="article-container style-1">
                                        <h3>《 老顧客 / 登入網站 》</h3>
                                        <p>&nbsp;</p>
<form>
    <label>您的Email</label>
    <input type="text" name="login_email" value="" placeholder="請輸入您的Email帳號" class="simple-field">
    <label>密碼</label>
    <input type="password" name="login_password" value="" placeholder="請輸入您的密碼" class="simple-field">
    <label>驗證碼</label>
    <input type="password" name="captcha" value="" placeholder="請輸入數字" class="simple-field">
    <img style="float: right;" id="preview" src="<?=base_url()?>public/site/captcha.php?1460463388">
    <div class="button style-10">登入網站<input type="submit" value="" onclick="login()"></div>
    <a class="forgot-password" href="<?=site_url('site/forget_password')?>">忘記密碼請按此</a>
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
<script>
// 註冊會員
function registr() {
  if ($("input[name*='registr_email']").val() == '' ||
      $("input[name*='registr_password']").val() == '' ||
      $("input[name*='registr_repeatpassword']").val() == '' ) {
      alert("請填入註冊資料");
        return false;
  } else {

    var input = {
        'email': $("input[name*='registr_email']").val(),
        'password': $("input[name*='registr_password']").val(),
        'repeatpassword': $("input[name*='registr_repeatpassword']").val(),
    }
    $.post( "../member/register", input )
        .done(function( data ) {
            dataJson = JSON.parse(data);
            console.log(dataJson);
            if(dataJson.error == true) {
                alert(dataJson.message);
                return ;
            } else {
                var input2 = {
                    'email': $("input[name*='registr_email']").val(),
                    'password': $("input[name*='registr_password']").val(),
                }
                $.post( "../member/login", input2 )
                    .done(function( data2 ) {
                        dataJson2 = JSON.parse(data2);
                        console.log(dataJson2);
                        if(dataJson2.error == true) {
                            alert(dataJson2.message);
                            return ;
                        } else {
                            window.location.href = 'cart02';
                        }
                    });
            }
        });
    }
}

function login() {
    var validate = {
        'captcha': $("input[name*='captcha']").val(),
    }
    $.post( "<?=base_url()?>public/site/validate.php", validate )
        .done(function( data ) {
            if (data != "OK") {
                alert(data);
                return;
            } else {

                if ($("input[name*='login_email']").val() == '' ||
                    $("input[name*='login_password']").val() == '' ) {
                    alert("請輸入帳號密碼");
                    return false;
                } else {
                    var input = {
                        'email': $("input[name*='login_email']").val(),
                        'password': $("input[name*='login_password']").val(),
                    }

                    $.post( "../member/login", input )
                        .done(function( data ) {
                            dataJson = JSON.parse(data);
                            console.log(dataJson);
                            if(dataJson.error == true) {
                                alert(dataJson.message);
                                return ;
                            } else {
                                window.location.href = 'cart02';
                            }
                        });
                }
            }
        });
}

</script>
</body>
</html>