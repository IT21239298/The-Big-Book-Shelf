<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'meta.php'; ?> <!--Meta tags and icon-->
	<title>HOME PAGE</title>
	<link rel="stylesheet" href="styles/styleshome.css">
</head>

<body>
    <!--Header-->
    <?php require 'header.php'; ?>
    <!--Add to cart-->
    <a href="cart.php" onclick="myfunction()"> <img src="image/cart.png" class="profile"> </a>
    <!--Midle table-->
    <table class="mitable" >
        <tr>
			<td rowspan="2"><div class="div1"></div></td> <!--Slide show-->
		</tr>
    </table>
        
	<!--Book table-->
    <table  class="booktable" >
		<h3 class="deals">Deals of the day..!</h3>

        <?php
        require 'config.php';

        $sql = "SELECT b.* FROM book b JOIN book_approval_status bas ON b.book_approval_status_id = bas.book_approval_status_id WHERE bas.name = 'APPROVED' ORDER BY price ASC LIMIT 5";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                ?>
                <td class="td1">
                    <div class="bookd">
                        <h3 class="bname">
                            <?php echo $row["name"] ?> <!--Book name-->
                        </h3>
                        <img src="image/<?php echo $row["image"] ?>" class="bookimg"> <!--Book image-->
                        <h3 class="price">
                            <?php echo $row["price"] ?> <!--Book price-->
                        </h3>
                        <button class="buy">BUY</button>
                    </div>
                </td>
                <?php
            }
        }
        ?>
    </table>
</body>

<!--Footer-->
<?php require 'footer.php'; ?>

</html>