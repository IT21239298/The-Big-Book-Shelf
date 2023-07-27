<?php
require 'config.php';

$error   = "";
$success = "";

if ($_COOKIE["user-type"] != "CUSTOMER")
{
    $error = "You are not a customer. So, you do not have a cart.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $task    = $_POST['task'];
    $cart_id = $_POST["cart_id"];
    $book_id = $_POST['book_id'];

    if ($task == "remove")
    {
        $sql = "DELETE FROM cart_item WHERE cart_id = '{$cart_id}' AND book_id = '{$book_id}'";
        $result = $conn->query($sql);

        $success = "Book removed from your cart.";
    }
    else if ($task == "update")
    {
        $quantity = $_POST['quantity'];
        $sql = "UPDATE cart_item SET quantity = {$quantity} WHERE cart_id = '{$cart_id}' AND book_id = '{$book_id}'";
        $result = $conn->query($sql);

        $success = "Book quantity updated.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'meta.php'; ?> <!--Meta tags and icon-->
	<title>Shopping cart</title>
	<link rel="stylesheet" href="styles/stylecart.css">
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

	<h2 class="scart">Shopping Cart</h2>
        
	<!--Book table-->
    <table  class="booktable" >
        <?php
        // Logged in user should be a customer
        if ($_COOKIE["user-type"] != "CUSTOMER")
        {
            exit(); // exit if logged in user is not a customer
        }
        
        $username = $_COOKIE["username"];

        $sql = "SELECT * FROM customer WHERE username = '{$username}'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $cart_id = $row["cart_id"];

        // Get books in the cart
        $sql = "SELECT * from cart_item WHERE cart_id = '{$cart_id}'";
        $result = $conn->query($sql);

        $books_in_cart = array(); // Array to hold books in cart 

        // Books available in the cart?
        if ($result->num_rows > 0)
        {
            // Loop through all books in the cart
            while($row = $result->fetch_assoc())
            {
                $book_id = $row["book_id"];

                // Get book
                $sql = "SELECT * from book WHERE book_id = '{$book_id}'";
                $book_result = $conn->query($sql);
                $book_row = $book_result->fetch_assoc();

                $book_in_cart = array();
                $book_in_cart["id"] = $row["book_id"];
                $book_in_cart["name"] = $book_row['name'];
                $book_in_cart["price"] = floatval( $book_row['price'] );
                $book_in_cart["image"] = $book_row['image'];
                $book_in_cart["quantity"] = (int)$row['quantity'];

                array_push($books_in_cart, $book_in_cart);
            }

            foreach ($books_in_cart as $book_in_cart)
            {
                ?>
                <td>
                    <div class="bookd">
                        <h3 class="bname">
                            <?php echo $book_in_cart['name'] ?>
                        </h3>
                        <img src="image/<?php echo $book_in_cart['image'] ?>" class="bookimg">
                        
                        <h3 class="price">
                            <?php echo $book_in_cart['price'] ?>
                        </h3>
                        
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                            <input type="hidden" name="task" value="remove">
                            <input type="hidden" name="cart_id" value="<?php echo $cart_id ?>">
                            <input type="hidden" name="book_id" value="<?php echo $book_in_cart['id'] ?>">
                            <button class="buy" type="submit">Remove</button>
                        </form>

                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                            <h4 class="qty">Quantity</h4>
                            <input type="hidden" name="task" value="update">
                            <input type="hidden" name="cart_id" value="<?php echo $cart_id ?>">
                            <input type="hidden" name="book_id" value="<?php echo $book_in_cart['id'] ?>">
                            <input type="number" id="fname" name="quantity" class="box" min="1" max="10" value="<?php echo $book_in_cart['quantity'] ?>"><br>
                            <button class="up" typ="submit">Update</button>
                        </form>
                    </div>
                </td>
                <?php
            }
        }
        ?>
    </table>

    <table border ="3" width ="100%" style="padding:2px; background-color:white;">
		<tr>
			<th>Book Title</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Price</th>
		</tr>
		
        <?php
        $total_price = 0;

        foreach ($books_in_cart as $book_in_cart)
        {
            ?>
            <tr>
                <td>
                    <?php echo $book_in_cart['name'] ?>
                </td>
                
                <td>
                    <?php echo $book_in_cart['quantity'] ?>
                </td>
                
                <td>
                    <?php echo $book_in_cart['price'] ?>
                </td>
                
                <td>
                    <?php echo $book_in_cart['quantity'] * $book_in_cart['price'] ?>
                </td>
            </tr>
            <?php

            $total_price += $book_in_cart['quantity'] * $book_in_cart['price'];
        }
        ?>

        <tr>
            <td><center><strong>Total Price</strong></center></td>
            <td colspan="3">
                <?php echo $total_price ?>
            </td>
        </tr>
    </table>
	  
    <a href="payment.php" class="check">CONFIRM PAYMENT</a>
</body>

<!--Footer-->
<?php require 'footer.php'; ?>

</html>