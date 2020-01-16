<?php 
	include_once("include/include_app.php");

	if(isset($_GET['orderID']) && $_GET['orderID'] != ""){

		$orderID = decode($_GET['orderID'],LIAM_COINS_KEY);

		$sqlCusOrder = "SELECT * FROM `lc_order` WHERE `order_number` = '".$orderID."' LIMIT 1";
		$quCusOrder = mysqli_query($conn,$sqlCusOrder);
		$rowCusOrder = mysqli_fetch_array($quCusOrder, MYSQLI_ASSOC);

		if($rowCusOrder['id'] === ""){
			header("Location:index.php");
		}

	}else{
		header("Location:index.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<?php include_once('head_meta.php');?>
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<?php include_once("header.php");?>

		<?php include_once("header_mobile.php");?>

		<?php include_once("nav_menu_mobile.php");?>

		<?php include_once("modal_search.php");?>

	<script>
	function chk_shipaddress(){
		// Get the checkbox
		var checkBox = document.getElementById("chkshipaddress");
		// Get the output text
		var boxShipAdd = document.getElementById("boxShipAdd");

		// If the checkbox is checked, display the output text
		if (checkBox.checked == true){
			boxShipAdd.style.display = "block";
			document.getElementById("type_address").value= "0";
		} else {
			boxShipAdd.style.display = "none";
			document.getElementById("type_address").value= "1";
		}
	}

	function chk_login(){

		var frmLogin = document.getElementById("frmLogin");
		frmLogin.style.display = "block";
	}
	

	function chk_termcondition(){
		// Get the checkbox
		var checkBox = document.getElementById("chktermcondition");
		// Get the output text
		var btPayment = document.getElementById("btPayment");

		// If the checkbox is checked, display the output text
		if (checkBox.checked == true){
			document.getElementById("btPayment").disabled = false;
		} else {
			document.getElementById("btPayment").disabled = true;
		}
	}
	</script>
	</header>

	<?php include_once('cart.php');?>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Checkout
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">

					<div class="col-lg-10 col-xl-10 m-lr-auto m-b-50">
						<div class="m-l-25 m-r--38 m-lr-0-xl">
							<h4 class="mtext-109 cl2 p-b-40 text-center p-t-20">
								Order Details
							</h4>
							<div class="wrap-table-shopping-cart">
								<table class="table-shopping-cart">
									<tr class="table_head">
										<th class="column-1">Product</th>
										<th class="column-2"></th>
										<th class="column-3 text-center">Price</th>
										<th class="column-4">Quantity</th>
										<th class="column-5">Total</th>
									</tr>

									<?php
									$total_price = 0;
									$num = 0;
									$sqlOrderDetail = "SELECT * FROM `lc_order_detail` WHERE `order_id` = '".$rowCusOrder['id']."' ORDER BY `id` ASC";
									$qyOrderDetail = mysqli_query($conn,$sqlOrderDetail);
									while ($rowOrderDetail = mysqli_fetch_assoc($qyOrderDetail)){

											$total_price = ((float)$total_price + (float)$rowOrderDetail['pro_price']);
										
											$proImages = '';
											if(!empty($rowOrderDetail['pro_img'])){
												$proImages = 'uploads/product/'.$rowOrderDetail['pro_img'];
											}else{
												$proImages = 'uploads/product/none.jpg';
											}
											?>

											<tr class="table_row">
												<td class="column-1">
													<img src="<?php echo $proImages;?>" alt="<?php echo $rowOrderDetail['name'];?>" width="60">
												</td>
												<td class="column-2">	
													<a href="product-detail.php?id=<?php echo encode($rowOrderDetail['id'],LIAM_COINS_KEY);?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04"><?php echo $rowOrderDetail['pro_name'];?></a>
												</td>
												<td class="column-3 text-center"><?php echo LIAM_COINS_CURRENCY.number_format($rowOrderDetail['pro_price'],2);?></td>
												<td class="column-4">
													<?php echo $rowOrderDetail['pro_qty'];?>
												</td>
												<td class="column-5"><?php echo LIAM_COINS_CURRENCY.number_format((float)$rowOrderDetail['pro_price']*(float)$rowOrderDetail['pro_qty'],2);?></td>
											</tr>

											<?php 
										//}
										$num++;
									}
									?>

								</table>
							</div>

							<div class="bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm" style="justify-content: center;">
								<div class="p-t-40 p-b-40 m-l-40 m-r-40">
									<div class="flex-w flex-t bor12 p-b-27">
										<div class="size-208">
											<span class="stext-110 cl2">
												SUBTOTAL:
											</span>
										</div>

										<div class="size-209" style="text-align: right;">
											<span class="stext-110 cl2">
												<?php echo LIAM_COINS_CURRENCY.number_format($total_price, 2); ?>
											</span>
										</div>
									</div>

									<div class="flex-w flex-t p-t-27 bor12 p-b-27">

										<div class="size-208">
											<span class="stext-101 cl2">
												PAYMENT METHOD:
											</span>
										</div>

										<div class="size-209 p-t-1" style="text-align: right;">
											<span class="stext-110 cl2">
												PayPal
											</span>
										</div>

									</div>

									<div class="flex-w flex-t p-t-27 bor12 p-b-27">
										<div class="size-208">
											<span class="stext-101 cl2">
												TOTAL:
											</span>
										</div>

										<div class="size-209 p-t-1" style="text-align: right;">
											<span class="stext-110 cl2">
												<?php echo LIAM_COINS_CURRENCY.number_format($total_price, 2); ?>
											</span>
										</div>
									</div>

									<br><br>

									<div class="row">
										<div class="col-12 col-lg-6">
dsds
										</div>
										<div class="col-12 col-lg-6">
sdsd
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
		
	
	<?php include_once('footer.php');?>
	
	<?php include_once('back_to_top.php');?>	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>