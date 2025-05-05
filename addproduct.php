<?php session_start();
include('dbconnection.php');
if(isset($_SESSION['userData'])){

}
include('header.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    // Retrieve form data
    $productName = $_POST['product'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $selling = $_POST['selling'];
    $quantity = $_POST['quantity'];

    // Check if image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = basename($_FILES['image']['name']);
        $targetDir = "products/";
        $targetFile = $targetDir . $imageName;

        // Move the uploaded image
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Insert into database
            $stmt = $conn->prepare("INSERT INTO product (name, details, cost, selling, quantity, imageurl) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $productName, $description, $cost, $selling, $quantity, $targetFile);

            if ($stmt->execute()) {
                echo "<p style='color: green;'>Product added successfully!</p>";
            } else {
                echo "<p style='color: red;'>Database error: " . $stmt->error . "</p>";
            }

            $stmt->close();
        } else {
            echo "<p style='color: red;'>Failed to upload image.</p>";
        }
    } else {
        echo "<p style='color: red;'>Please select a valid image to upload.</p>";
    }
}
?>
<section id="Top-Selling-product">
        <div class="container">
            <div class="top-scroll-overlay">
                <div>
                    <h2 class="text-center" style="margin-bottom: 30px;">ADD PRODUCT</h2>
                    
            <form method="post" action="addproduct.php" enctype="multipart/form-data">
            	<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
        <div class="div-top-selling-img">
            <h3>Select and Image to Upload</h3>
            <input type="file" id="imageInput" name="image" accept="image/*">
            <div id="preview" class="preview-container">
                <p>No Image Selected</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="align-items-xl-center top-selling-text">
<div>
    <h3>Enter Product Details Below:</h3>
    <div class="table-responsive">

        <table class="table">
            <tbody>
                <tr>
                    <td style="width: 200px;text-align: right;">Product Name:</td>
                    <td><input type="text" style="width: 90%;" id="product" name="product"></td>
                </tr>
                <tr>
                    <td style="width: 200px;text-align: right;">Cost Price:</td>
                    <td><input type="text" style="width: 90%;" id="cost" name="cost"></td>
                </tr>
                <tr>
                    <td style="width: 200px;text-align: right;">Selling Price:</td>
                    <td><input type="text" style="width: 90%;" id="selling" name="selling"></td>
                </tr>
                <tr>
                    <td style="width: 200px;text-align: right;">Quantity:</td>
                    <td><input type="text" style="width: 90%;" id="quantity" name="quantity"></td>
                </tr>
                <tr>
                    <td style="width: 200px;text-align: right;">Description / Specification:</td>
                    <td><textarea cols="50" rows="5" id="description" name="description"></textarea></td>
                </tr>
                <tr>
                    <td style="width: 200px;text-align: right;"></td>
                    <td>
                        <div class="row g-0">
                            <div class="col">
                                <div class="text-center"><input class="btn btn-primary" type="submit" id="save" name="save" value="Save"></div>
                            </div>
                            <div class="col">
                                <div style="text-align: center;"><button class="btn btn-primary" type="submit">Clear</button></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="top-selling-div-btns"></div>
</div>
                            </div>
                        </div>
                    </div>
            </form>        
                    
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>