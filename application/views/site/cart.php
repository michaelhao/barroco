<?php
include("layout/meta.php");
include("layout/header.php");
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
<div class="section-service1" ng-app="orderApp" ng-controller="orderCtrl">
    <div class="container" id="container" style="display:none;">
        <div class="information-blocks">
            <div class="table-responsive">
                <table class="cart-table">
                    <tr>
                        <th class="column-1">商品名稱</th>
                        <th class="column-2">單價</th>
                        <th class="column-3">數量</th>
                        <th class="column-4">小計</th>
                        <th class="column-5"></th>
                    </tr>
                    <tr ng-repeat="(key, item) in items"  ng-if="item['qty'] != 0">
                        <td>
                            <div class="traditional-cart-entry">
                                <a href="#" class="image"><img src="{{item['options']['image']}}" alt=""></a>
                                <div class="content">
                                    <div class="cell-view">
                                        <a href="#" class="tag">{{item['options']['type']}}</a>
                                        <a href="#" class="title">{{item['name']}}</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>${{item['price']}}</td>
                        <td>
                            <div class="quantity-selector detail-info-entry">
                                <div ng-click="qtyDown(item)" class="entry number-minus">&nbsp;</div>
                                <div class="entry number">{{item['qty']}}</div>
                                <div ng-click="qtyUp(item)" class="entry number-plus">&nbsp;</div>
                            </div>
                        </td>
                        <td><div class="subtotal">${{item['qty']*item['price']}}</div></td>
                        <td><a ng-click="deleteItems(item)" class="remove-button"><i class="fa fa-times"></i></a></td>
                    </tr>
                </table>
            </div>
			<div class="cart-submit-buttons-box">
                <a class="button style-15" style="float:left; margin-left:0px;">購物說明</a>
                <a class="button style-15" href="<?=site_url('site/shop')?>">繼續購物</a>
            </div>
            <div class="row">
               <div class="col-md-6 information-entry">
                    <div class="cart-summary-box">
                        <div class="sub-total">此筆訂單共 {{total_items}} 件</div>
                        <div class="grand-total">總計 NT.${{total}}</div>
                        <a class="button style-10" ng-click="updateCart()">前往結帳</a>
                        <a id="free_shipping" class="simple-link" href="#">此訂單只差${{free_ship_now}}元即可享有免運優惠</a>

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
<script type="text/javascript" src="<?php echo base_url(); ?>public/site/js/angular.min.js"></script>
<script>
   'use strict';
   $("#container").hide();
    angular.module('orderApp', [])
      .controller('orderCtrl', ['$scope', '$http', function($scope, $http) {
        $scope.items = [];
        $scope.total_items = 0;
        $scope.total = 0;
        $scope.free_ship = 0;
        $scope.free_ship_now = 0;


        // 抓取類別資料
        $http.get("../cart/items").success(function(data) {
          $scope.items = data;
          $("#container").show();
        });

        $http.get("../cart/total_items").success(function(data) {
          $scope.total_items = data;
        });

        $http.get("../cart/free_shipment").success(function(data) {
          $scope.free_ship = data['free_shipment'];
          $scope.free_ship_now = data['free_shipment'];
        });


        $http.get("../cart/total").success(function(data) {
            
          $scope.total = data;
          $scope.free_ship_now = $scope.free_ship - $scope.total;
          if ($scope.free_ship_now<0) { $("#free_shipping").hide(); }
          else{ $("#free_shipping").show(); }
        });

        $scope.deleteItems = function (item) {
            var data = {
                'rowid': item.rowid,
                'qty': 0
            }
            $.post( "../cart/update", data )
                .done(function( data ) {
                    alert('已從購物車移除');
                    window.location.reload();
            });  
        }

        $scope.qtyUp = function (item) {
            if(item.options.limit > item.qty ) {
                $scope.items[item.rowid].qty = item.qty+1;
                $scope.total_items=parseInt($scope.total_items)+1;

                $scope.total = parseInt($scope.total) + parseInt(item.price);
                $scope.free_ship_now = $scope.free_ship - $scope.total;
                if ($scope.free_ship_now<0) {
                    $("#free_shipping").hide();
                }else{
                    $("#free_shipping").show();
                }

            }
        }

        $scope.qtyDown = function (item) {
            if(item.qty > 1) {
                $scope.items[item.rowid].qty = item.qty-1;
                $scope.total_items=parseInt($scope.total_items)-1;

                $scope.total = parseInt($scope.total) - parseInt(item.price);
                $scope.free_ship_now = $scope.free_ship - $scope.total;
                if ($scope.free_ship_now<0) {
                    $("#free_shipping").hide();
                }else{
                    $("#free_shipping").show();
                }

            }
        } 

        $scope.updateCart = function () {
            var dataObj = {data: $scope.items};
            $http.post(
              "../cart/update_list",
              dataObj
            ).success(function(data) {
                window.location.href = 'cart01';
            });
        }

      }]);
</script>
</body>
</html>