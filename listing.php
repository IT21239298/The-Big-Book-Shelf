<?php
require 'config.php';

$error   = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // User is not logged in?
    if (!isset($_COOKIE["username"]) && !isset($_COOKIE["token"]))
    {
        // Redirect to customer login page
        header("Location: " . "customer-login.php", true, 301);
        exit();
    }

    // Logged in user is not a customer?
    if ($_COOKIE["user-type"] != "CUSTOMER")
    {
        $error = "You are not a customer to add the book to the cart.";
    }
    else
    {
        // Logged in user is a customer
        $username = $_COOKIE["username"];

        $sql = "SELECT * FROM customer WHERE username = '{$username}'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $cart_id = $row["cart_id"];
        $book_id = $_POST['book_id'];

        // Find if book already exist in the cart
        $sql = "SELECT * from cart_item WHERE cart_id = '{$cart_id}' AND book_id = '{$book_id}'";
        $result = $conn->query($sql);

        // Book is already in the cart?
        if ($result->num_rows > 0)
        {
            // Increment Book quantity in cart by one
            $row = $result->fetch_assoc();
            $quantity = (int)$row["quantity"];
            $quantity++;
            $sql = "UPDATE cart_item SET quantity = {$quantity} WHERE cart_id = '{$cart_id}' AND book_id = '{$book_id}'";
            $result = $conn->query($sql);

            $success = "Book is already in your shopping cart. We incremented the quantity of that book in the cart.";
        }
        else
        {
            // Book is not in the cart. So, add the book to the cart
            $sql = "INSERT INTO cart_item (book_id, quantity, cart_id) VALUES ($book_id, 1, $cart_id)";
            $result = $conn->query($sql);

            $success = "Book added to your cart.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'meta.php'; ?> <!--Meta tags and icon-->
	<title>Category</title>
	<link rel="stylesheet" href="styles/stylescategory.css">
</head>

<body>
	<!--Header-->
    <?php require 'header.php'; ?>

    <?php
    if (!empty($error))
    {
        ?>
        <div class="error-msg">
            <?php echo $error ?>
        </div>
        <?php
    }
    if (!empty($success))
    {
        ?>
        <div class="success-msg">
            <?php echo $success ?>
        </div>
        <?php
    }
    ?>

	<!--Middle table-->
	<h3 class="deals">
        <?php
        $category_id = isset($_GET['category'])? $_GET['category'] : $_POST['category'];

        $sql = "SELECT * FROM category WHERE category.category_id = {$category_id}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo $row["name"];
        ?>
    </h3>

    <div class="grid-container">
        <?php
        $sql = "SELECT b.* FROM book b JOIN category c ON b.category_id = c.category_id JOIN book_approval_status bas ON b.book_approval_status_id = bas.book_approval_status_id WHERE c.category_id = {$category_id} AND bas.name = 'APPROVED'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                ?>
                <div class="grid-item">
		            <div class="bookf">
                        <h3 class="bname">
                            <?php echo $row["name"] ?>
                        </h3>
                        <img src="image/<?php echo $row["image"] ?>" class="bookimg">
                        <h3 class="price">
                            <?php echo $row["price"] ?>
                        </h3>

                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                            <input type="hidden" name="book_id" value="<?php echo $row["book_id"] ?>">
                            <input type="hidden" name="category" value="<?php echo $category_id ?>">
                            <button class="adCart" type="submit">Add to Cart</button>
                        </form>
                    </div>
	            </div>
                <?php
            }
        }
        ?>
    </div>
</body>

<!--Footer-->
<?php require 'footer.php'; ?>

</html>