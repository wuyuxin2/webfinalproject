<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>index</title>
	<link href="css/index.css" rel="stylesheet">
	<link href="lib/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
	<link href="lib/bootstrap.css" rel="stylesheet">
	<link href="lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="lib/jquery-3.2.1.js"></script>
	<script src="lib/bootstrap.js"></script>
	<script src="js/index.js"></script>
</head>
<body>
	<div class="row" id="hearder-before">
		<div class="col-md-9"></div>
		<div class="col-md-3" id="hearder-before-spancont">
			<span class="login">登录</span>
			<span class="register">注册</span>
			<span class="global">Global</span>
		</div>
	</div>
	<div class="row" id="hearder">
		<div class="col-md-1"></div>
		<div class="col-md-5" id="logo">
			<img src="img/logo.svg" width="120" height="20">
		</div>
		<div class="col-md-5">
			<div class="header-spancont">
				<span>首页</span>
				<span>产品</span>
				<span>商城</span>
				<span>体验店</span>
				<span>服务</span>

				<i class="glyphicon glyphicon-shopping-cart"></i>
				<input class="count" value="0"></div>
			</div>
		</div>
		<div class="body">
			<div class="row" id="hearder-after">
				<div class="col-md-1"></div>
				<span>首页</span>
				<span>/ 购物车</span>
			</div>

			<div class="row" id="buying-order-bar">
				<div class="col-md-1"></div>

				<div class="col-md-10" id="buying-order-bar-cont">
					<div class="shopping-cart">
						<span>购物车</span>
					</div>
					<div class="fill-form">
						<span>填写订单</span>
					</div>
					<div class="pay">
						<span >支付</span>
					</div>

				</div>
			</div>

			
			<div class="row" id="list-header">
				<div class="col-md-1"></div>  
				<div class="col-md-10" id="list-hearder-cont">


					<span class="all-choose">
						<input type="checkbox" name="all-check" id="all-checkbox" checked="checked">全选
					</span>


					<span class="product-name">产品</span>
					<div class="col-md-3"></div>

					<span class="product-num">数量</span>


					<span class="product-price">单价</span>


					<span class="operate">操作</span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" id="blank-shopcart">
					<span class="blank-shopcart-span1">购物车空空的，去</span>
					<span class="blank-shopcart-span2">逛逛</span>
					<span class="blank-shopcart-span3">吧</span>
				</div>
			</div>
			<?php
			try{
				$pdo=new PDO("mysql:host=localhost;dbname=webproduct","root","123456",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
				$pdo->query("set names utf8");
				$sql="select p.id,p.cover,p.title,p.price,p.subtitle,c.num from shop_product as p right join shop_cart as c on p.id=c.productid";
				$stmt=$pdo->prepare($sql);
			/*session_start();
			$userid=$_SESSION["memberid"];*/
			$stmt->execute();
			$data=$stmt->fetchAll(PDO::FETCH_ASSOC);


		}
		catch(PDOException $e){

			echo $e->getMessage();
		}


		?>

		<?php
		$count=0;
		$total=0;
		foreach($data as $product):
			?>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10" id="chose-product">
				<div class="chose-product">
					<div class="col-md-6" id="chose-product-left">	

						<input type="checkbox" name="check" id="checkbox1" checked="checked">
						<img src="../<?php echo $product['cover']?>" alt="" class="chose-product-img">
						<div class="chose-product-info-span">
							<span class="chose-product-info1">

								<?php echo $product['title']?>
							</span>

							<span class="chose-product-info2">
								<?php echo $product['subtitle']?>
							</span>
						</div>
					</div>
					<div class="product-buying-num">
						
							
							<input type="text" value="<?php echo $product['num']?>" class="
							input-numofproduct" 
							onblur="changeNum(<?php echo $product['id']?>,this.value)"
							id="product-<?php echo $product['id']?>"
							>
							
							</div>

							<script type="text/javascript">
								

							</script>
							<span class="chose-product-price"  >
								<i class="fa fa-jpy" aria-hidden="true"></i>


								<span id="p-<?php echo $product['id']?>"><?php echo $product['price']?></span>
							</span>

							<div class="chose-product-delete">
								删除
							</div>
						</div>		
					</div>
				</div>

				<?php
				$total += $product['price']*$product['num'];
				$count+=$product['num'];
				endforeach;
				?>

				



				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10" id="result">
						<div class="row">
							<div class="col-md-9"></div>
							<div class="col-md-2"><span class="result-numofproduct">商品数量：</span></div>
							<span class="result-numofproduct2"><?php echo $count?></span>
						</div>
						<div class="row">
							<div class="col-md-9"></div>
							<div class="col-md-1" id="result-money"><span class="result-money">小计：</span></div>
							<span class="result-money2" id="total-<?php echo $product['id']?>"><i class="fa fa-jpy" aria-hidden="true"></i><?php echo $total?></span>
						</div>
						<div class="row">
							<span class="result-newpayway">
								<img src="img/花呗蓝色.png" alt="">
								订单满600可使用花呗分期3/6/12期</span>

							</div>
						</div>
					</div>
					<script type="text/javascript">

						function changeNum(productid,num){


							var url="../changeNum.php";
							var data={"productid":productid,"num":parseInt(num)};
							var success=function(response){
								if(response.errno==0)
								{


									var price=($("#product-"+productid).val())*($("#p-"+productid).html());

									alert(price);
								}


							}

							$.post(url,data,success,"json");


						}

					</script>
					

					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10" id="account">
							<span class="continue-shop">继续购买>></span>
							<div class="account">
								结算
							</div>
						</div>

					</div>

				</div>

			</body>
			</html>