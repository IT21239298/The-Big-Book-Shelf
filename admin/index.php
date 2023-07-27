<?php
// Logged in user is not an admin
if (!isset($_COOKIE["user-type"]) || $_COOKIE["user-type"] != "ADMIN")
{
    // Redirect to admin login page
    header("Location: " . "../admin-login.php", true, 301);
    exit();
}

require '../config.php';

$error   = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $book_id              = $_POST['book_id'];
    $book_approval_status = $_POST['book_approval_status'];

    $sql = "SELECT * FROM book_approval_status WHERE name = '{$book_approval_status}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $book_approval_status_id = $row["book_approval_status_id"];

    $sql = "UPDATE book SET book_approval_status_id = {$book_approval_status_id} WHERE book_id = '{$book_id}'";
    $result = $conn->query($sql);
    $success = "Book approval status updated.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
    <?php require 'meta.php'; ?> <!--Meta tags and icon-->
	<title>Admin dashboard</title>
	<link rel="stylesheet" href="../styles/stylesadmin.css">
</head>

<body>
	<!--Header-->
    <?php require 'header.php'; ?>
	
	<!--Middle table-->
	<div class="row1">
        <div class="row1">
            <!--Sidebar-->
            <?php require 'sidebar.php'; ?>

            <div>
                <h3 class="Added">DashBoard</h3>
                
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

                <h2>Approved Books</h2>

                <div class="grid-container">
                    <?php
                    $sql = "SELECT b.* FROM book b JOIN book_approval_status bas ON b.book_approval_status_id = bas.book_approval_status_id WHERE bas.name = 'APPROVED'";
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
                                    <img src="../image/<?php echo $row["image"] ?>" class="bookimg">
                                    <h3 class="price">
                                        <?php echo $row["price"] ?>
                                    </h3>

                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                        <input type="hidden" name="book_id" value="<?php echo $row["book_id"] ?>">

                                        <input type="radio" name="book_approval_status" value="REJECTED" required>
                                        <label for="html">Reject</label><br>

                                        <input type="radio" name="book_approval_status" value="PENDING">
                                        <label for="css">Pending</label><br>
                                        
                                        <button type="submit" class="adCart">Update</button>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <div class="status-msg">No books are approved yet.</div>
                        <?php
                    }
                    ?>
                </div>

                <h2>Rejected Books</h2>

                <div class="grid-container">
                    <?php
                    $sql = "SELECT b.* FROM book b JOIN book_approval_status bas ON b.book_approval_status_id = bas.book_approval_status_id WHERE bas.name = 'REJECTED'";
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
                                    <img src="../image/<?php echo $row["image"] ?>" class="bookimg">
                                    <h3 class="price">
                                        <?php echo $row["price"] ?>
                                    </h3>

                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                        <input type="hidden" name="book_id" value="<?php echo $row["book_id"] ?>">

                                        <input type="radio" name="book_approval_status" value="APPROVED">
                                        <label for="css">Approve</label><br>

                                        <input type="radio" name="book_approval_status" value="PENDING">
                                        <label for="css">Pending</label><br>
                                        
                                        <button type="submit" class="adCart">Update</button>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <div class="status-msg">No books are rejected yet.</div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
	</div>
</body>

<!--Footer-->
<?php require 'footer.php'; ?>

</html>