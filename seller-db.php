<link rel="styleSheet" href="styles/seller-db.css" />
<link rel="styleSheet" href="styles/sidebar.css" />
<?php 
    $title = 'Seller Dashboard';
    include 'header.php'; 
    include_once ('./includes/seller-config.inc.php');
?>
<?php
   require 'includes/dbh.inc.php';

   $result = mysqli_query($conn, "SELECT COUNT(bookID) FROM Book");
   $totalBooks = mysqli_fetch_array($result);

   
   $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal");
   $totalIncome = mysqli_fetch_array($result);

   echo '<script>
         document.addEventListener("DOMContentLoaded", () => {
            dbCounter("c1", 0, '.$totalBooks[0].', 2500);
            dbCounter("c2", 0, '.$totalIncome[0].', 2500);
         });
         </script>';

    $result = mysqli_query($conn, "SELECT COUNT(bookID) FROM Book WHERE publisherID = 1 AND publishDate BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
    $totalBooks = mysqli_fetch_array($result);

    $result = mysqli_query($conn, "SELECT SUM(amount)FROM Withdrawal WHERE publisherID = 1 AND withdrawDate BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
    $totalIncome = mysqli_fetch_array($result);
 ?>
 
 <div class="a-container">
      <?php include 'seller-sidebar.php'; ?>
      <div class="db-container">
        <div class="db-counter">
          <div class="counter-coulmn">
            <span id="c1" class="counter-item"></span>
            <h4>Total books added</h4>
          </div>
          <div class="counter-coulmn">
            <span id="c2" class="counter-item"></span>
            <h4>Total Income</h4>
          </div>
        </div>

        <div class="in-numbers">
          <?php
            echo '<div>
                  <div class="in-numbers-item">
                    <h3>Total Books added this month:</h3>
                    <p>'.$totalBooks[0].'</p>
                  </div>
                  <div class="in-numbers-item">
                    <h3>Total Income this month:</h3>
                    <p>'.$totalIncome[0].'</p>
                  </div>
                  </div>'
          ?>
        </div>
        
        <div class="graph">
          <h3>Monthly Income (Past 12 Months)</h3>
          <canvas class="line-graph">
          </canvas>
        </div>
      </div>
    </div>
<script src="./js/seller-db.js"></script>
<?php 
  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 2 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 1 month)");
  $income1 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 3 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 2 month)");
  $income2 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 4 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 3 month)");
  $income3 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 5 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 4 month)");
  $income4 = mysqli_fetch_array($result);
  
  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 6 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 5 month)");
  $income5 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 7 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 6 month)");
  $income6 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 8 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 7 month)");
  $income7 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 9 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 8 month)");
  $income8 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 10 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 9 month)");
  $income9 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 11 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 10 month)");
  $income10 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 12 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 11 month)");
  $income11 = mysqli_fetch_array($result);

  $result = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) FROM Withdrawal WHERE withdrawDate BETWEEN last_day(curdate() - interval 13 month) + INTERVAL 1 DAY AND last_day(curdate() - interval 12 month)");
  $income12 = mysqli_fetch_array($result);

  $dateMonth = 'Month';
  echo "<script>
          let graphData = {
            '".date('Y-m', strtotime(date('Y-m').' -12 month'))."': ".$income12[0].",
            '".date('Y-m', strtotime(date('Y-m').' -11 month'))."': ".$income11[0].",
            '".date('Y-m', strtotime(date('Y-m').' -10 month'))."': ".$income10[0].",
            '".date('Y-m', strtotime(date('Y-m').' -9 month'))."': ".$income9[0].",
            '".date('Y-m', strtotime(date('Y-m').' -8 month'))."': ".$income8[0].",
            '".date('Y-m', strtotime(date('Y-m').' -7 month'))."': ".$income7[0].",
            '".date('Y-m', strtotime(date('Y-m').' -6 month'))."': ".$income6[0].",
            '".date('Y-m', strtotime(date('Y-m').' -5 month'))."': ".$income5[0].",
            '".date('Y-m', strtotime(date('Y-m').' -4 month'))."': ".$income4[0].",
            '".date('Y-m', strtotime(date('Y-m').' -3 month'))."': ".$income3[0].",
            '".date('Y-m', strtotime(date('Y-m').' -2 month'))."': ".$income2[0].",
            '".date('Y-m', strtotime(date('Y-m').' -1 month'))."': ".$income1[0].",
            };
          const entries = Object.entries(graphData);
          drawChart(entries);
        </script>";
        mysqli_close($conn); 
?>
<?php include('./footer.php'); ?>

