<!-- Menu desktop -->
<div class="menu-desktop">
    <ul class="main-menu">
        <li>
            <a href="index.php"><?php echo HOME;?></a>
        </li>

        <li>
            <?php 
                $rowCatSub1 = get_redirect_product($conn,1);
            ?>
            <a href="product.php?cat_id=<?php echo encode(1,LIAM_COINS_KEY);?>&catsub_id=<?php echo encode($rowCatSub1,LIAM_COINS_KEY);?>"><?php echo get_category_name($conn,1);?></a>
            <ul class="sub-menu">
                <?php
                $sqlCatSubMenu = "SELECT * FROM `lc_category_sub` WHERE `category` = 1 ORDER BY id ASC";
                $quCatSubMenu = mysqli_query($conn,$sqlCatSubMenu);
                while($rowCatSubMenu = mysqli_fetch_array($quCatSubMenu, MYSQLI_ASSOC)){
                    ?>
                    <li><a href="product.php?cat_id=<?php echo encode(1,LIAM_COINS_KEY);?>&catsub_id=<?php echo encode($rowCatSubMenu['id'],LIAM_COINS_KEY);?>"><?php echo $rowCatSubMenu['name'];?></a></li>
                    <?php
                }
                ?>
            </ul>
        </li>

        <li>
            <?php $rowCatSub2 = get_redirect_product($conn,2);?>
            <a href="product.php?cat_id=<?php echo encode(2,LIAM_COINS_KEY);?>&catsub_id=<?php echo encode($rowCatSub2,LIAM_COINS_KEY);?>"><?php echo get_category_name($conn,2);?></a>
            <ul class="sub-menu">
                <?php
                $sqlCatSubMenu = "SELECT * FROM `lc_category_sub` WHERE `category` = 2 ORDER BY id ASC";
                $quCatSubMenu = mysqli_query($conn,$sqlCatSubMenu);
                while($rowCatSubMenu = mysqli_fetch_array($quCatSubMenu, MYSQLI_ASSOC)){
                    ?>
                    <li><a href="product.php?cat_id=<?php echo encode(2,LIAM_COINS_KEY);?>&catsub_id=<?php echo encode($rowCatSubMenu['id'],LIAM_COINS_KEY);?>"><?php echo $rowCatSubMenu['name'];?></a></li>
                    <?php
                }
                ?>
            </ul>
        </li>

        <li>
            <a href="numismatics-buy-and-sell.php"><?php echo NUMISMATICS;?></a>
            <ul class="sub-menu">
                <li><a href="numismatics-buy-and-sell.php"><?php echo BUY_AND_SELL;?></a></li>
                <li><a href="numismatics-service.php"><?php echo NUMISMATIC_SERVICE;?></a></li>
            </ul>
        </li>

        <li>
            <a href="upcoming-auctions.php"><?php echo AUCTIONS;?></a>
            <ul class="sub-menu">
                <li><a href="upcoming-auctions.php"><?php echo UPCOMING_AUCTIONS;?></a></li>
                <li><a href="intresting-auctions-results.php"><?php echo INTERESTING_AUCTIONS_RESULTS;?></a></li>
                <li><a href="auctions-bid.php"><?php echo BID;?></a></li>
            </ul>
        </li>

        <li>
            <a href="banknotes-investment.php"><?php echo INVESTMENT;?></a>
            <ul class="sub-menu">
                <li><a href="banknotes-investment.php"><?php echo BANKNOTES_INVESTMENT;?></a></li>
                <li><a href="coins-investment.php"><?php echo COINS_INVESTMENT;?></a></li>
            </ul>
        </li>

        <li>
            <a href="about-us.php"><?php echo ABOUT_US;?></a>
        </li>

        <li>
            <a href="register.php"><?php echo REGISTER;?></a>
        </li>
    </ul>
</div>