<?php include('inc/db.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deduct - Pricing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/pricing.css" rel="stylesheet" />
</head>

<body>
    <?php include('inc/navbar.php') ?>
    <div id="generic_price_table">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--PRICE HEADING START-->
                        <div class="price-heading clearfix">
                            <h1>
                                Just Simply select your deductible amount below and start
                                saving now!
                            </h1>
                        </div>
                        <!--//PRICE HEADING END-->
                    </div>
                </div>
            </div>
            <div class="container">
                <!--BLOCK ROW START-->
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM packages";
                    $result = mysqli_query($conn, $sql);
                    $level = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $package_id = $row['id'];
                        $monthly_payment = $row['monthly_payment'];
                        $payment_array = explode('.', "$monthly_payment");
                        if (!isset($payment_array[1])) {
                            $payment_array[1] = '00';
                        }
                        $total_coverage = $row['total_coverage'];
                    ?>
                    <div class="col-md-4 mb-4">

                        <!--PRICE CONTENT START-->
                        <div class="generic_content clearfix">

                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">

                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">

                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Level <?php echo $level ?></span>
                                    </div>
                                    <!--//HEAD END-->

                                </div>
                                <!--//HEAD CONTENT END-->

                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">$</span>
                                        <span class="currency"><?php echo $payment_array[0] ?></span>
                                        <span class="cent">. <?php echo $payment_array[1] ?></span>
                                        <span class="month">/MON</span>
                                    </span>
                                </div>
                                <!--//PRICE END-->

                            </div>
                            <!--//HEAD PRICE DETAIL END-->

                            <!--FEATURE LIST START-->
                            <div class="generic_feature_list">
                                <ul>
                                    <li>Upto <span>$<?php echo $total_coverage ?></span></li>
                                </ul>
                            </div>
                            <!--//FEATURE LIST END-->

                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix">
                                <a class=""
                                    href="get_package.php?package_id=<?php echo $package_id ?>&package_level=<?php echo $level ?>">Get
                                    Now</a>
                            </div>
                            <!--//BUTTON END-->

                        </div>
                        <!--//PRICE CONTENT END-->

                    </div>

                    <?php
                        $level++;
                    }
                    ?>


                </div>
                <!--//BLOCK ROW END-->
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>