<?php
session_start();
include('dbconnection.php');
include('header.php');

if (isset($_SESSION['userData'])) {
    $storedData = $_SESSION['userData'];
    $userid = $storedData['userid'];
    $role = $storedData['role'];
    //echo "userid: " . $userid . " - Role: " . $role;
} else {
    header('Location: login.php');
    exit();
}

$status = "pending"; // Define this before using it in the query
?>

<section id="Charts">
    <div class="container">
<form method="post" action="payment.php">
<div>
            <h2>Shopping Chart:</h2>
            <div style="padding-bottom: 30px;">
                <div class="table-responsive">


                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

<?php
$count = 1;
$totalSum = 0;
$stmt1 = $conn->prepare("
    SELECT sc.id, sc.userid, sc.pdctid, sc.datecaptured, sc.quantity, sc.selling, sc.total, sc.status, p.name AS productName, p.imageurl 
    FROM shopping_chart sc
    JOIN product p ON sc.pdctid = p.pdctid
    WHERE sc.userid = ? AND sc.status = ?");
$stmt1->bind_param("ss", $userid, $status);
$stmt1->execute();
$stmt1_results = $stmt1->get_result();

$totalSum = 0;

if ($stmt1_results->num_rows > 0) {
    while ($data = $stmt1_results->fetch_assoc()) {
    	$quantity = $data['quantity'];
    	$selling = $data['selling'];
    	$total = $data['total'];
    	$rowId = $data['id'];
    	//$totalSum += $data['total'];

        echo '<tr>';
        echo '<td>' . $count . '</td>';
        echo '<td>' . $data['datecaptured'] . ' 
        <input type="text" id="userid" name="userid['.$rowId.']" value="'.$data['userid'].'" data-row="'.$rowId.'" hidden> 
        <input type="text" id="pdctid" name="pdctid['.$rowId.']" value="'.$data['pdctid'].'" data-row="'.$rowId.'" hidden >
        <input type="text" id="datecaptured" name="datecaptured['.$rowId.']" value="'.$data['datecaptured'].'" data-row="'.$rowId.'" hidden> </td>';
echo '<td><img class="chart-product-image" src="' . $data['imageurl'] . '" style="width:50px;">&nbsp; ' . $data['productName'] . '</td>';
echo '<td><input type="number" class="quantity" name="quantity['.$rowId.']" id="quantity" value="'.$quantity.'" data-row="'.$rowId.'" min="1" style"width:50px;" oninput="updateTotals()" ></td>';
echo '<td><input type="number" class="selling" name="selling['.$rowId.']" id="selling" value="'.$selling.'" data-row="'.$rowId.'" readonly ></td>';
echo '<td><input type="number" class="total" name="total['.$rowId.']" id="total" value="'.$total.'" data-row="'.$rowId.'" readonly></td>';

        echo '</tr>';

        $totalSum += $data['total'];
        $count++;
    }
} else {
    echo '<tr><td colspan="6" style="text-align:center;">No items in your shopping cart.</td></tr>';
}
?>

    <tr>
    <td colspan="4"></td>
    <td><strong>TOTAL:</strong></td>
    <td><strong>UGX <span id="totalSumDisplay"><?php echo number_format($totalSum); ?> 
     </span>/-</strong>
 	<input type="number" id="totalSum" name="totalSum" value="<?php echo $totalSum; ?>" ></td>
</tr>

                        </tbody>
                    </table>
                </div>
                <div style="text-align: right;">
                    <input type="submit" class="btn btn-primary" id="complete" name="complete" value="COMPLETE PAYMENT">
                </div>
            </div>
        </div>	
	
</form>    	
        
    </div>
</section>
<script>
function formatNumber(num) {
    return num.toLocaleString('en-UG', { minimumFractionDigits: 0 });
}

function updateTotals() {
    let totalSum = 0;

    document.querySelectorAll('.quantity').forEach(function(qtyInput) {
        const row = qtyInput.dataset.row;
        const quantity = parseInt(qtyInput.value) || 0;
        const sellingInput = document.querySelector('.selling[data-row="' + row + '"]');
        const totalInput = document.querySelector('.total[data-row="' + row + '"]');

        const selling = parseFloat(sellingInput.value) || 0;
        const total = quantity * selling;
        totalInput.value = total.toFixed(2);

        totalSum += total;
    });

    // Update the total sum display
    document.getElementById('totalSumDisplay').innerText = formatNumber(totalSum);
    document.getElementById('totalSum').value = totalSum;
}

// Attach event listeners
document.querySelectorAll('.quantity').forEach(function(input) {
    input.addEventListener('input', updateTotals);
});
</script>




<?php include('footer.php'); ?>
