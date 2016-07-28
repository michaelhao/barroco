<?php
    include("layout/meta.php");
    include("layout/header.php");
?>
    <!-- BANNER -->
    <div class="banner-header banner-shops">
        <div class="container">
            <div class="banner-content">
                <h2 class="page-title"><font face="標楷體" size="10">會員專區</font></h2>
                <span class="page-desc">
Member</span>
                <!-- <div class="breadcrumbs">
                    <a href="#">Home</a>
                    <span>Shops</span>
                </div> -->
            </div>
        </div>
    </div>
    <!-- ./BANNER -->
    <div class="main-container">
        <div class="container">
            <div class="bz-horizontalTab bz-tab bz-tab-style2">
                <ul class="resp-tabs-list">
                    <li>會員資料</li>
                    <li>訂單查詢</li>
                    <li>密碼修改</li>
                    <li><a href="logout">登出會員</a></li>
                </ul>
                <div class="resp-tabs-container">
                    <div class="contact-form style-2">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                會員等級：一般會員
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                生日禮：尚未領取
                            </div>
                            <div class="col-md-offset-6 col-sm-offset-6 col-md-6 col-sm-6 col-xs-12">
                                紅利點數：100 點
                            </div>
                            <div class="col-md-offset-6 col-sm-offset-6 col-md-6 col-sm-6 col-xs-12">
                                購物金：0 元
                            </div>
                        </div>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="name">姓名 <span>*</span></label>
                                <input type="text" value="王大明" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="socialID">身份證字號 <span>*</span></label>
                                <input type="text" value="H123456789" name="socialID" id="socialID" disabled>
                            </div>
                            <div class="form-group">
                                <label for="birthday">生日 <span>*</span></label>
                                <input type="text" value="1988-05-20" name="birthday" id="birthday" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">系統通知email <span>*</span></label>
                                <input type="email" value="test@example.com" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="cellPhone">手機 <span>*</span></label>
                                <input type="text" value="0920-123-456" name="cellPhone" id="cellPhone" required>
                            </div>
                            <div class="form-group">
                                <label for="address">地址 <span>*</span></label>
                                <input type="text" value="桃園市桃園區中正路一段二號三樓" name="address" id="address" required>
                            </div>
                            <div class="text-right">
                                <input type="submit" class="" value="修改資料">
                            </div>
                        </form>
                    </div>
                     <div>
                         <table class="tablesaw tablesaw-stack" data-tablesaw-mode="stack">
                             <thead>
                                <tr>
                                    <th>訂單日期</th>
                                    <th>訂單編號</th>
                                    <th>總金額</th>
                                    <th>付款狀態</th>
                                    <th>付款方式</th>
                                    <th>出貨狀態</th>
                                </tr>
                             </thead>
                             <tbody>
                                <tr>
                                    <td>2016-03-26</td>
                                    <td>2016032615153927</td>
                                    <td>$ 9600</td>
                                    <td>未付款</td>
                                    <td>n/a</td>
                                    <td>未出貨</td>
                                </tr>
                                <tr>
                                    <td>2016-02-26</td>
                                    <td>2016022615153927</td>
                                    <td>$ 3100</td>
                                    <td>已付款</td>
                                    <td>ATM 轉帳付款</td>
                                    <td>已出貨</td>
                                </tr>
                                <tr>
                                    <td>2016-02-26</td>
                                    <td>2016022615153927</td>
                                    <td>$ 3100</td>
                                    <td>已付款</td>
                                    <td>信用卡付款</td>
                                    <td>未出貨</td>
                                </tr>
                             </tbody>
                         </table>
                    </div>
                     <div class="contact-form style-2">
                         <form>
                             <div class="form-group">
                                 <label for="password">修改密碼 <span>*</span></label>
                                 <input type="password" name="password" id="password" required>
                             </div>
                             <div class="form-group">
                                 <label for="repactPwd">密碼確認 <span>*</span></label>
                                 <input type="password" name="reactPwd" id="repactPwd" required>
                             </div>
                             <div class="text-right">
                                 <input type="submit" class="" value="修改密碼">
                             </div>
                         </form>
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