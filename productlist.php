<?php session_start();
if(isset($_SESSION['userData'])){
    $storedData = isset($_SESSION['userData']) ? $_SESSION['userData'] : [];
    $userid = $storedData['userid'];
    $role = $storedData['role'];
    echo "userid: " . $userid ." - Role: " . $role ;
} else {
    // Redirect to login page
    header('Location: login.php');
}
include('dbconnection.php');

// Capture Date
$datecaptured = date("Y-m-d");

$messages = isset($_GET['messages']) ? $_GET['messages'] : '';

 include('header.php'); ?>

<section id="ProductList">
        <div class="productlist-overlay">
            <h2 style="text-align: center;">Product List</h2>
            
<?php 
// Fetch all products
$query = "SELECT * FROM product";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Format price
        $formattedPrice = number_format($row['selling'], 0);

        echo '
        <div class="product-div">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div><img class="product-img" src="' . htmlspecialchars($row['imageurl']) . '"></div>
                </div>
                <div class="col">
                    <div class="product-text">
                        <h3>' . htmlspecialchars($row['name']) . '</h3>
                        <p style="margin-bottom: 0px;">' . nl2br(htmlspecialchars($row['details'])) . '</p>
                        <p style="margin-bottom: 0px;margin-top: 20px;text-align: center;font-size: 1.2rem;">Price:&nbsp;<strong>UGX ' . $formattedPrice . '/-</strong></p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="d-flex align-items-center align-items-xl-center product-div-btns">
                        <div>
                            
                            <form method="post" action="addtoshoppingchart.php" class="d-inline">
    <input type="hidden" name="pdctid" value="'. $row['pdctid'].'">
    <input type="hidden" name="userid" value="'.$userid.'">
    <input type="hidden" name="datecaptured" value="'. $datecaptured.'">
    <input type="hidden" name="selling" value="'. $row['selling'].'">
    <input type="hidden" name="quantity" value="1">
    <input type="hidden" name="total" value="'.$row['selling'].'">
    <input type="hidden" name="status" value="pending">
    <button type="submit" name="add_to_chart" class="btn btn-primary product-btn">Add to Chart</button>
</form>

                            <a class="btn btn-primary product-btn" href="productdetails.php?id=' . $row['pdctid'] . '" role="button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
} else {
    echo "<p>No products available.</p>";
}
?>

        <!--    <div class="product-div">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div><img class="product-img" src="assets/img/bestlaptops-2048px-9765.jpg"></div>
                    </div>
                    <div class="col">
                        <div class="product-text">
                            <h3>Lenovo PI 1htr3</h3>
                            <p style="margin-bottom: 0px;">With five new performance-driving and portable IdeaPad laptops, a sleek and compact IdeaCentre desktop, and a 9-inch Lenovo tablet, these devices are designed for all the spaces and places in line with the on-the-go lifestyle of today’s consumer.&nbsp;</p>
                            <p style="margin-bottom: 0px;margin-top: 20px;text-align: center;font-size: 1.2rem;">Price:&nbsp;<strong>UGX 3,400,000/-</strong></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="d-flex align-items-center align-items-xl-center product-div-btns">
                            <div>
                                <a class="btn btn-primary product-btn" href="" role="button">Buy Now</a>
                                <a class="btn btn-primary product-btn" href="" role="button">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-div">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div><img class="product-img" src="assets/img/bestlaptops-2048px-9765.jpg"></div>
                    </div>
                    <div class="col">
                        <div class="product-text">
                            <h3>Lenovo PI 1htr3</h3>
                            <p style="margin-bottom: 0px;">With five new performance-driving and portable IdeaPad laptops, a sleek and compact IdeaCentre desktop, and a 9-inch Lenovo tablet, these devices are designed for all the spaces and places in line with the on-the-go lifestyle of today’s consumer.&nbsp;</p>
                            <p style="margin-bottom: 0px;margin-top: 20px;text-align: center;font-size: 1.2rem;">Price:&nbsp;<strong>UGX 3,400,000/-</strong></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="d-flex align-items-center align-items-xl-center product-div-btns">
                            <div><a class="btn btn-primary product-btn" role="button">Buy Now</a><a class="btn btn-primary product-btn" role="button">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-div">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div><img class="product-img" src="assets/img/bestlaptops-2048px-9765.jpg"></div>
                    </div>
                    <div class="col">
                        <div class="product-text">
                            <h3>Lenovo PI 1htr3</h3>
                            <p style="margin-bottom: 0px;">With five new performance-driving and portable IdeaPad laptops, a sleek and compact IdeaCentre desktop, and a 9-inch Lenovo tablet, these devices are designed for all the spaces and places in line with the on-the-go lifestyle of today’s consumer.&nbsp;</p>
                            <p style="margin-bottom: 0px;margin-top: 20px;text-align: center;font-size: 1.2rem;">Price:&nbsp;<strong>UGX 3,400,000/-</strong></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="d-flex align-items-center align-items-xl-center product-div-btns">
                            <div><a class="btn btn-primary product-btn" role="button">Buy Now</a><a class="btn btn-primary product-btn" role="button">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-div">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div><img class="product-img" src="assets/img/bestlaptops-2048px-9765.jpg"></div>
                    </div>
                    <div class="col">
                        <div class="product-text">
                            <h3>Lenovo PI 1htr3</h3>
                            <p style="margin-bottom: 0px;">With five new performance-driving and portable IdeaPad laptops, a sleek and compact IdeaCentre desktop, and a 9-inch Lenovo tablet, these devices are designed for all the spaces and places in line with the on-the-go lifestyle of today’s consumer.&nbsp;</p>
                            <p style="margin-bottom: 0px;margin-top: 20px;text-align: center;font-size: 1.2rem;">Price:&nbsp;<strong>UGX 3,400,000/-</strong></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="d-flex align-items-center align-items-xl-center product-div-btns">
                            <div><a class="btn btn-primary product-btn" role="button">Buy Now</a><a class="btn btn-primary product-btn" role="button">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
<?php include('footer.php'); ?>