<!doctype html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=8">
    <title>交易详情</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="http://img.taobaocdn.com/favicon.ico" type="image/x-icon" />


    <link href="http://a.tbcdn.cn/tbsp/tbsp.css?t=20090602.css" rel="stylesheet" />
    <!-- start vmc css 3.1-->
    <link rel="stylesheet" href="http://a.tbcdn.cn/??p/global/1.0/global-min.css?t=2013102420110728.css" /><!-- end vmc css 3.1-->

    <link href="http://a.tbcdn.cn/apps/trademanager/common/header.css?t=20130725" rel="stylesheet" />


    <link rel="stylesheet" href="http://g.tbcdn.cn/tb/trademanager/0.3.4/pages/detail/page/normal-min.css?t=20131205" >
    <link rel="stylesheet" href="http://a.tbcdn.cn/apps/trademanager/2.0/order_detail/buyer_delay.css?t=20110905" >
    <style type="text/css">
        .order-info dl{clear: both;}
        .order-info .wt_phone_and_amount dt{
            width: 78px;
            float: left;
            position: relative;
            font-weight: bold;
        }
        .order-info .wt_phone_and_amount dd{
            margin-bottom: 4px;
            word-wrap: break-word;
            padding-left: 80px;
            min-height: 30px;
            _height: 30px;
            *padding-left: 0;
            /*_padding-left: 80px;*/
        }
        .order-info .wt_phone_and_amount {line-height: 190%;}

        .order-info .wt_user_info dt,
        .order-info .wt_plan_info dt { width: 135px; text-align: right; }
        .order-info .wt_user_info dd,
        .order-info .wt_plan_info dd {width: 200px; min-height: 30px; _height: 18px;}
        .order-info .wt_user_info dt,
        .order-info .wt_plan_info dt,
        .order-info .wt_user_info dd,
        .order-info .wt_plan_info dd {float: left; position: relative;}
        .order-info .wt_user_info dd.a,
        .order-info .wt_plan_info dd.a {width: 400px; min-height: 30px; _height: 18px;}
    </style>
</head>

<body id="trade-order-detail" class="tm-buyer  "><script type="text/javascript">
    (function (d) {
        var t=d.createElement("script");t.type="text/javascript";t.async=true;t.id="tb-beacon-aplus";
        t.setAttribute("exparams","category=&userid=672106323&aplus&yunid=");
        t.src=("https:"==d.location.protocol?"https://s":"http://a")+".tbcdn.cn/s/aplus_v2.js";
        d.getElementsByTagName("head")[0].appendChild(t);
    })(document);
</script>


<div class="tabs-container" id="J_TabView">
<ul class="tabs-nav">
    <li class="current ks-switchable-trigger-internal164"><a name="tab0">订单信息</a></li>
</ul>
<div class="tabs-panels">
    <div class="info-box order-info ks-switchable-panel-internal165" style="display: block;">
        <h2>订单信息</h2>
        <div class="bd">
            <div class="addr_and_note">
                <dl>
                    <dt>
                        收货地址
                        ：
                    </dt>
                    <dd>
                        <?php
                            echo $model->receiver_name.' ，'.$model->receiver_mobile.' ，';
                            echo Order::model()->showDetailAddress($model);
                        ?>
                    </dd>
                    <dt>买家留言：</dt>
                    <dd>
                        <p id="J_ExistMessage"></p>
                    </dd>
                </dl>
            </div>

            <hr>
            <!-- 订单信息 -->
            <div class="misc-info">
                <h3>订单信息</h3>
                <dl>
                    <dt>订单编号：</dt>
                    <dd>
                        <?php
                            echo $model->order_id;
                        ?>
                    </dd>
                    <dt>成交时间：</dt>
                    <dd>
                        <?php
                            echo $model->create_time;
                        ?>
                    </dd></dl>
                <dl>
                    <dt>发货时间：</dt>
                    <dd>
                        <?php
                            echo $model->ship_time;
                        ?>
                    </dd>

                    <dt>付款时间：</dt>
                    <dd>
                        <?php
                            echo $model->pay_time;
                        ?>
                    </dd>

                    <dt>&nbsp;</dt>
                    <dd>&nbsp;</dd>
                </dl>
                <div class="clearfix"></div>
            </div>

            <!-- 订单信息 -->
            <table>
                <colgroup>
                    <col class="item">
                    <col class="sku">
                    <!-- 宝贝 -->

                    <col class="status">
                    <!-- 交易状态 -->

                    <col class="service">
                    <!-- 服务 -->

                    <col class="price">
                    <!-- 单价（元） -->

                    <col class="num">
                    <!-- 数量 -->

                    <col class="discount">
                    <!-- 优惠 -->

                    <col class="order-price">

                    <!-- 合计（元） -->
                    <!-- 买/卖家信息 -->
                </colgroup>
                <tbody class="order">
                <tr class="sep-row">
                    <td colspan="8"></td>
                </tr>
                <tr class="order-hd">
                    <th class="item">宝贝</th>
                    <th class="sku">宝贝属性</th>
                    <th class="status">订单状态</th>
                    <th class="status">配送状态</th>
                    <th class="status">付款状态</th>
                    <th class="status">退款状态</th>
                    <th class="price">单价(元)</th>
                    <th class="num">数量</th>
                    <th class="order-price last">商品总价(元)</th>
                </tr>
                <tr class="order-item">
                    <td class="item">
                        <div class="pic-info">
                            <div class="pic s50">
                                <a hidefocus="true" href="http://trade.taobao.com/trade/detail/trade_snap.htm?trade_id=516691042382363" target="_blank" title="商品图片">
                                    <img alt="查看宝贝详情" src="http://img01.taobaocdn.com/bao/uploaded/i1/T1kwDCFfdkXXXXXXXX_!!0-item_pic.jpg_sum.jpg ">
                                </a>
                            </div>
                        </div>
                        <div class="txt-info">
                            <div class="desc">
                                <span class="name"><a href="#" title="" target="_blank"><?php echo $order_item[0]->title?></a></span>
                                <br>
                            </div>
                        </div>
                    </td>
                    <td class="sku">
                        <div class="props"><span>口味: 奶油口味</span></div>
                    </td>
                    <td class="status">
                        <?php
                            echo Tbfunction::showStatus($model->status);
                        ?>
                    </td>
                    <td class="status">
                        <?php
                            echo Tbfunction::showPayStatus($model->pay_status);
                        ?>
                    </td>
                    <td class="status">
                        <?php
                            echo Tbfunction::showShipStatus($model->ship_status);
                        ?>
                    </td>
                    <td class="status">
                        <?php
                            echo Tbfunction::showRefundStatus($model->refund_status);
                        ?>
                    </td>
                    <td class="price">
                        <?php
                            echo $order_item[0]->price;
                        ?>
                    </td>
                    <td class="num">
                        <?php
                            echo $order_item[0]->quantity;
                        ?>
                    </td>
                    <td class="order-price" rowspan="1">
                        <?php
                            echo $order_item[0]->total_price;
                        ?>
                        <li>
                            (快递: <?php echo $model->ship_fee;?>)
                        </li>
                    </td>
                </tr>
                <tr class="order-ft">
                    <td colspan="8">
                        <div class="get-money" colspan="6">
                            <br>
                                实付款：
                                <strong>9.50</strong>元
                            <br>
                        </div>
                    </td>
                </tr>
                </tbody>

            </table>



        </div>
    </div><!-- end order-info -->

</body>
</html>
