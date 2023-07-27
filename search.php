<?php
require 'config.php';

$searchText = $_GET['q'];

$sql = "SELECT b.* from book b JOIN book_approval_status bas ON b.book_approval_status_id = bas.book_approval_status_id WHERE bas.name = 'APPROVED' AND b.name LIKE '%{$searchText}%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'meta.php'; ?> <!--Meta tags and icon-->
	<title>Search</title>
	<link rel="stylesheet" href="styles/stylescategory.css">
</head>

<body>
	<!--Header-->
    <?php require 'header.php'; ?>

    <?php
    if ($result->num_rows > 0)
    {
        ?>
        <div class="success-msg">
            We found books with title similar to "<?php echo $searchText ?>"
        </div>
        <?php
    }
    else
    {
        ?>
        <div class="error-msg">
            We cannot find any book with a title similar to "<?php echo $searchText ?>"
        </div>
        <?php
    }
    ?>

    <div class="grid-container">
        <?php
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
                        <button class="buy">BUY</button>
			            <button class="adCart">Add to Cart</button>
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