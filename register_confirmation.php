<?php include_once("include/include_app.php");

	$confirmed = '';
	
	if(isset($_GET['key']) && $_GET['key'] != ""){

		$key = $_GET['key'];
		$sqlCustomer = "SELECT * FROM `lc_customer` WHERE `active_link` = '".$key."' AND `confirm_email` = 0 LIMIT 1";
		$quCustomer = mysqli_query($conn,$sqlCustomer);
		$rowCustomer = mysqli_fetch_array($quCustomer, MYSQLI_ASSOC);

		if($rowCustomer['id'] != ""){
			$cusUpdate = "UPDATE `lc_customer` SET `status` = '1', `confirm_email` = '1' WHERE `id` = ".$rowCustomer['id'].";";
			@mysqli_query($conn,$cusUpdate);
			$confirmed = '<center>Your registration has been successfully confirmed.</center>';
		}else{
			$confirmed = '<center>The following error has occurred: Hash does not match.<br/>
	Please make sure the link from your email has been copied completely.</center>';
		}

	}else{
		$confirmed = '<center>The following error has occurred: Hash does not match.<br/>
	Please make sure the link from your email has been copied completely.</center>';
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Confirm Registration</title>
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
				Confirm Registration
			</span>

		</div>
	</div>

	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-12 col-lg-12">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-20 text-center">
							Confirm Registration
						</h3>

						<div class="stext-113 cl6 p-b-26">
							<?php 
							echo $confirmed;
							?>
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