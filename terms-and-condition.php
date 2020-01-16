<?php include_once("include/include_app.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo TERMS_AND_CONDITION;?></title>
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
				<?php echo TERMS_AND_CONDITION;?>
			</span>

		</div>
	</div>

	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-12 col-lg-12">
					<div class="p-t-7">
						<h3 class="mtext-111 cl2 p-b-16 text-center">
							<?php echo TERMS_AND_CONDITION;?>
						</h3>

                        <div class="stext-113 cl6 ">
                            <p>Please read the following terms and conditions very carefully as your use of service is subject to your acceptance of and compliance with the following terms and conditions ("Terms").</p>
                            <p>&nbsp;</p>
                            <p>By subscribing to or using any of our services you agree that you have read, understood and are bound by the Terms, regardless of how you subscribe to or use the services. If you do not want to be bound by the Terms, you must not subscribe to or use our services.</p>
                            <p>&nbsp;</p>
                            <p>In these Terms, references to “you”, “User” shall mean the end user accessing the Website, its contents and using the Services offered through the Website. “Service Providers” mean independent third party service providers, and “we”, “us” and “our” shall mean www.liamconis.uk, its franchisor, affiliates and partners.</p>
                            <p>&nbsp;</p>
                            <p>1. www.liamconis.uk website is an Internet based content and e-commerce portal a company incorporated under the laws of India.</p>
                            <p>&nbsp;</p>
                            <p>2. Use of the Website is offered to you conditioned on acceptance without modification of all the terms, conditions and notices contained in these Terms, as may be posted on the Website from time to time.</p>
                            <p>&nbsp;</p>
                            <p>www.liamconis.uk at its sole discretion reserves the right not to accept a User from registering on the Website without assigning any reason thereof.</p>
                            <p>&nbsp;</p>
                            <p><strong>USER ACCOUNT/ PASSWORD / SECURITY</strong><br>
                            You will receive a password and account designation upon completing the Website’s registration process. You are responsible for maintaining the confidentiality of the password and account, and are fully responsible for all activities that occur under your password or account. You agree to immediately notify www.liamconis.uk of any unauthorized use of your password or account or any other breach of security, and ensure that you logout from your account at the end of each session. www.liamconis.uk cannot and will not be liable for any loss or damage arising from your failure to comply with this Section 2. www.liamconis.uk saves all user details in a safe and secure encrypted format, and are not responsible incase of any web theft, unauthorized access to the user details, web server breach, etc. However we will from time to time review and safeguard user information with the latest technology trend.</p>
                            <p>&nbsp;</p>
                            <p><strong>DELIVERY</strong><br>
                            www.liamconis.uk will deliver all products via our appointed courier partners. Please allow ample time for delivery. Urgent or special deliveries can be accommodated at an extra cost. Our Courier Partners will make a maximum of two attempts to deliver your order. In case the customer is not reachable or does not accept delivery of products in these attempts www.liamconis.uk reserves the right to cancel the order(s) at its discretion.</p>
                            <p>&nbsp;</p>
                            <p><strong>ORDER CANCELLATION / REFUND POLICY</strong><br>
                            We do not charge any fees for cancelling any orders. However, if the orders are shipped, then the customer needs to pay for the shipping charges incurred by us. We provide a 100% refund towards returns if there are any errors in the order. However if the order / product is returned based on customers liking/ disliking, we would charge a small fees 10% of the order value along with 100% of the Delivery Charges incurred.</p>
                            <p>&nbsp;</p>
                            <p><strong>COPYRIGHT</strong><br>
                            All copyright is wholly owned and reserved by “www.liamconis.uk”, no part may be reproduced in whole or part under any circumstance.</p>
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