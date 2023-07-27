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

	<!--Middle table-->
	<div class="row1">
	    <div class="row1">
	        <div class="cate-group">
                <?php
                require 'config.php';

                $sql = "SELECT * FROM category";
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        ?>
                        <a href="listing.php?category=<?php echo $row["category_id"] ?>" class="cate-type">
                            <?php echo $row["name"] ?>
                        </a>
                        <?php
                    }
                }
                ?>
	        </div> 
        </div>
	
	    <!---Middle fwewc-->
        <img src="image/r.jpg" class="type">
	</div>
</body>

<!--Footer-->
<?php require 'footer.php'; ?>

</html>