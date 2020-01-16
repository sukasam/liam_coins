<?php include_once("include/include_app.php");

if(!Login::check($_SESSION['cus_id'])){
	header("Location:login.php");
}

if(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != ""){
	$sqlCustomer = "SELECT * FROM `lc_customer` WHERE `id` = '".$_SESSION['cus_id']."' LIMIT 1";
	$quCustomer = mysqli_query($conn,$sqlCustomer);
	$rowCustomer = mysqli_fetch_array($quCustomer, MYSQLI_ASSOC);

	$sqlCusOrder = "SELECT * FROM `lc_order` WHERE `cus_id` = '".$rowCustomer['id']."' LIMIT 1";
	$quCusOrder = mysqli_query($conn,$sqlCusOrder);
	$rowCusOrder = mysqli_fetch_array($quCusOrder, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo ORDER_HISTORY;?></title>
	<?php include_once('head_meta.php');?>
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<?php include_once("header.php");?>

		<?php include_once("header_mobile.php");?>

		<?php include_once("nav_menu_mobile.php");?>

		<?php include_once("modal_search.php");?>
	</header>

	<?php include_once('cart.php');?>
	
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo HOME;?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo ORDER_HISTORY;?>
			</span>

		</div>
	</div>

	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="">
						<h3 class="mtext-111 cl2 p-b-16 text-center">
							<?php echo ORDER_HISTORY;?>
						</h3>

						<div class="row p-t-30">
							<div class="col-md-4 col-lg-3 p-b-80">
								<?php include_once('account_menu.php')?>
							</div>
							<div class="col-md-8 col-lg-9 p-b-80">
								<div class="wrap-table-shopping-cart">
									<table class="table-shopping-cart">
										<tr class="table_head">
											<th class="column-1 text-center" style="width: 20%;">ORDER NUMBER</th>
											<th class="column-2 text-center" style="width: 20%;">DATE</th>
											<th class="column-3 text-center" style="width: 20%;">EMAIL:</th>
											<th class="column-4 text-center" style="width: 20%;">TOTAL</th>
											<th class="column-5 text-center" style="width: 20%;">PAYMENT Status</th>
										</tr>

										<tr class="table_row" style="height: 60px;">
											<td class="column-1 text-center" style="padding-bottom: 0px;white-space: nowrap;"><a href="order-summary.php?orderID=<?php echo encode($rowCusOrder['orderID'],LIAM_COINS_KEY)?>" target="_blank" class="hov-cl1"><?php echo $rowCusOrder['order_number'];?></a></td>
											<td class="column-2 text-center" style="padding-bottom: 0px;white-space: nowrap;"><?php echo substr($rowCusOrder['order_date'],0,10);?></td>
											<td class="column-3 text-center" style="padding-bottom: 0px;white-space: nowrap;"><?php echo $rowCusOrder['bill_email'];?></td>
											<td class="column-4 text-center" style="padding-bottom: 0px;white-space: nowrap;"><?php echo number_format($rowCusOrder['order_total'],2);?></td>
											<td class="column-5 text-center" style="padding-bottom: 0px;white-space: nowrap;">
											<?php 
													if(decode($rowCusOrder['payment_status'],LIAM_COINS_KEY) == '1'){
														echo '<span style="color: #0d7d00;">Paid<span>';
													}else if(decode($rowCusOrder['payment_status'],LIAM_COINS_KEY) == '2'){
														echo '<span style="color: #ff0000;">Cancel<span>';
													}else{
														echo '<span style="color: #0d31b7;">Pending<span>';
													}
												?>
											</td>
										</tr>

									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>	
	
		

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