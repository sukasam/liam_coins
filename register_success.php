<?php include_once("include/include_app.php");
	if(isset($_GET['key']) && $_GET['key'] != ""){
		$email = decode($_GET['key'],LIAM_COINS_KEY);
	}else{
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
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
				Registration
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
							Registration
						</h3>

						<div class="stext-113 cl6 p-b-26">
							<?php 
							$string = get_page($conn,13);
							$content = sprintf($string,$email);;
							?>
							<center><?php echo $content;?></center>
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