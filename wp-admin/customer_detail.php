<?php 
  include_once("include/include_app.php");

  $cus_id = '';

  if(isset($_GET['cus_id']) && $_GET['cus_id'] != ""){

    $cus_id = decode($_GET['cus_id'],LIAM_COINS_KEY);
    
    $sqlCusD = "SELECT * FROM `lc_customer` WHERE `id` = '".$cus_id."' LIMIT 1";
    $quCusD = mysqli_query($conn,$sqlCusD);
    $rowCusD = mysqli_fetch_array($quCusD, MYSQLI_ASSOC);

  }else{
    header("Location:customers.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Liam Coins Admin</title>
<?php include_once('header_meta.php');?>
</head>
<body>
<?php include_once('header.php');?>
<?php include_once('header_menu.php');?>
<?php include_once('sidebar_menu.php');?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Customers</a> </div>
    <h1>Customers</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Customerts Info</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Lase Name</th>
                  <th>Display Name</th>
                  <th>Email</th>
                  <th>Register Since</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

              <tr class="gradeX">
                <td style="vertical-align: middle;"><center><?php echo $rowCusD['fname']?></center></td>
                <td style="vertical-align: middle;"><center><?php echo $rowCusD['lname'];?></center></td>
                <td style="vertical-align: middle;"><center><?php echo $rowCusD['name'];?></center></td>
                <td style="vertical-align: middle;"><center><?php echo $rowCusD['email'];?></center></td>
                <td style="vertical-align: middle;"><center><?php echo $rowCusD['register_date'];?></center></td>
                <td style="vertical-align: middle;"><center><?php if($rowCusD['status'] == '1'){?><span class="label label-success">Enable</span><?php }else{?><span class="label label-important">Disable</span><?php }?></center></td>
              </tr>

              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Address Info</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>BILLING ADDRESS</th>
                  <th>SHIPPING ADDRESS</th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd gradeX">
                  <td class="center">
                    <?php 
                    
                    ?>
                  <!-- <?php if($rowCusD['bill_fname'] != ""){?><p><strong>Full Name :</strong> <?php echo $rowCusD['bill_fname'].' '.$rowCusD['bill_lname'];?></p><?php }?>
												<?php if($rowCusD['bill_company'] != ""){?><p><strong>Company Name :</strong> <?php echo $rowCusD['bill_company'];?></p><?php }?>
												<?php if($rowCusD['bill_address1'] != ""){?><p><strong>Address :</strong> <?php echo $rowCusD['bill_address1'].' '.$rowCusD['bill_address2'];?></p><?php }?>
												<?php if($rowCusD['bill_city'] != ""){?><p><strong>City :</strong> <?php echo $rowCusD['bill_city'];?></p><?php }?>
												<?php if($rowCusD['bill_country'] != ""){?><p><strong>State / Country :</strong> <?php echo $rowCusD['bill_country'];?></p><?php }?>
												<?php if($rowCusD['bill_zipcode'] != ""){?><p><strong>Postcode :</strong> <?php echo $rowCusD['bill_zipcode'];?></p><?php }?>
												<?php if($rowCusD['bill_phone'] != ""){?><p><strong>Phone :</strong> <?php echo $rowCusD['bill_phone'];?></p><?php }?>
												<?php if($rowCusD['bill_email'] != ""){?><p><strong>Email :</strong> <?php echo $rowCusD['bill_email'];?></p><?php }?> -->
                  </td>
                  <td class="center">
                        <!-- <?php if($rowCusD['ship_fname'] != ""){?><p><strong>Full Name :</strong> <?php echo $rowCusD['ship_fname'].' '.$rowCusD['ship_lname'];?></p><?php }?>
												<?php if($rowCusD['ship_company'] != ""){?><p><strong>Company Name :</strong> <?php echo $rowCusD['ship_company'];?></p><?php }?>
												<?php if($rowCusD['ship_address1'] != ""){?><p><strong>Address :</strong> <?php echo $rowCusD['ship_address1'].' '.$rowCusD['ship_address2'];?></p><?php }?>
												<?php if($rowCusD['ship_city'] != ""){?><p><strong>City :</strong> <?php echo $rowCusD['ship_city'];?></p><?php }?>
												<?php if($rowCusD['ship_country'] != ""){?><p><strong>State / Country :</strong> <?php echo $rowCusD['ship_country'];?></p><?php }?>
												<?php if($rowCusD['ship_zipcode'] != ""){?><p><strong>Postcode :</strong> <?php echo $rowCusD['ship_zipcode'];?></p><?php }?>
												<?php if($rowCusD['ship_phone'] != ""){?><p><strong>Phone :</strong> <?php echo $rowCusD['ship_phone'];?></p><?php }?>
												<?php if($rowCusD['ship_email'] != ""){?><p><strong>Email :</strong> <?php echo $rowCusD['ship_email'];?></p><?php }?> -->
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php include_once('footer.php');?>

<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
