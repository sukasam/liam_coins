<?php 
	include_once("include/include_app.php");

	if(!Login::check($_SESSION['cus_id'])){
		header("Location:login.php");
	}

	if(isset($_SESSION['cus_id']) && $_SESSION['cus_id'] != ""){
		$sqlCustomer = "SELECT * FROM `lc_customer` WHERE `id` = '".$_SESSION['cus_id']."' LIMIT 1";
        $quCustomer = mysqli_query($conn,$sqlCustomer);
        $rowCustomer = mysqli_fetch_array($quCustomer, MYSQLI_ASSOC);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo MY_ACCOUNT;?></title>
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
				<?php echo MY_ACCOUNT;?>
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
							<?php echo MY_ACCOUNT;?>
						</h3>

						<?php
							if(isset($_GET['action']) && $_GET['action'] != ""){

								if($_GET['action'] === "failure"){
									$msgErrors = "";
									if(isset($_GET['error']) && $_GET['error'] != ""){
										if($_GET['error'] == 1){$msgErrors = 'Your current password is incorrect.';}
										else if($_GET['error'] == 2){$msgErrors = 'New passwords do not match.';}
										else{}
									}
									?>
									<ul class="msg-error" role="alert">
										<li><strong><?php echo ERROR;?>:</strong><?php echo $msgErrors;?></li>
									</ul>
									<?php
								}else if($_GET['action'] === "success"){
									?>
									<ul class="msg-success" role="alert">
										<li><strong>Account details changed successfully.</li>
									</ul>
									<?php
								}
							}
						?>

						<div class="row p-t-30">
							<div class="col-md-4 col-lg-3 p-b-80">
								<?php include_once('account_menu.php')?>
							</div>
							<div class="col-md-8 col-lg-9 p-b-80">
								<form name="frmAccount" method="post" action="control/my-account.php">
									<div class="row">
										<div class="col-12 col-sm-6 col-xl-6 col-lg-6">
											<label class="">FIRST NAME *</label>
											<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="cus_fname" placeholder="FIRST NAME" required value="<?php echo $rowCustomer['fname'];?>">
										</div>
										<div class="col-12 col-sm-6 col-xl-6 col-lg-6">
											<label class="">LAST NAME *</label>
											<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="cus_lname" placeholder="LAST NAME" required value="<?php echo $rowCustomer['lname'];?>">
										</div>
										<div class="col-12 col-sm-6 col-xl-6 col-lg-6">
											<label class="">DISPLAY NAME *</label>
											<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="cus_name" placeholder="DISPLAY NAME" required value="<?php echo $rowCustomer['name'];?>">
										</div>
										<div class="col-12 col-sm-6 col-xl-6 col-lg-6">
											<label class="">EMAIL *</label>
											<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="cus_email" placeholder="EMAIL" required value="<?php echo $rowCustomer['email'];?>">
										</div>
									</div>

									<h3 class="mtext-111 cl2 p-b-16 p-t-20 p-b-20">
										PASSWORD CHANGE
									</h3>

									<div class="row">
										<div class="col-12">
											<label class="">CURRENT PASSWORD (LEAVE BLANK TO LEAVE UNCHANGED)</label>
											<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="password" name="cus_password" placeholder="">
										</div>
										<div class="col-12">
											<label class="">NEW PASSWORD (LEAVE BLANK TO LEAVE UNCHANGED)</label>
											<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="password" name="cus_password_new" placeholder="">
										</div>
										<div class="col-12">
											<label class="">CONFIRM NEW PASSWORD</label>
											<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="password" name="cus_password_confirm" placeholder="">
										</div>
									</div>

									<input type="hidden" name="_token" value="<?php echo Token::generate();?>">
									<button id="btPayment" type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="width: 250px;justify-content: center;margin: 0 auto;">
										SAVE CHANGE
									</button>
								</form>

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