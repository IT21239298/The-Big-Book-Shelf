<div class="row">
    <div class="row">
        <div>
            <img src="image/logo.jpg" class="logo">
        </div>
        <div>
            <h1 class="center title">
                THE BIG BOOK SHELF
            </h1>
            <h2 class="center sub-title">
                ONLINE BOOK STORE
            </h2>
        </div>
    </div>
    
    <div>
        <input id="search-input"
               class="w3-input w3-border w3-round search-bar"
               type="text"
               placeholder="🔍 Search"
               onchange="onSearchTextChanged">
    </div>
    
    <div>
        <div class="row">
            <div>
                <?php
                if (!isset($_COOKIE["username"]))
                {
                    ?>
                    <div>
                        <button class="signin" onclick="window.location = 'signin.php'">Sign in</button>
                    </div>

                    <div>
                        <button class="register" onclick="window.location = 'register.php'">Register</button>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div>
                        <p>
                            <?php
                            echo "Username : " . $_COOKIE["username"]
                            ?>
                        </p>
                        <p>
                            <?php
                            echo "User Type : " . $_COOKIE["user-type"]
                            ?>
                        </p>
                    </div>

                    <form action="logout.php" method="POST">
                        <button class="signin" type="submit">log out</button>
                    </form>
                    <?php
                }
                ?>
            </div>
            <div>
                <a href="userdashboard.php" onclick="myFunction()"> <img src="image/profile.jpg" class="profile"> </a>
            </div>
        </div>
    </div>
</div>

<!--Navigation bar-->
<div class="navi">
    <a href="index.php" class="home" onclick="myfunction()">Home<br>
    <a href="category.php" class="category" onclick="myfunction()">Category</a>
    <a href="contact.php" class="contact" onclick="myfunction()">Contact us</a>
    <a href="about.html" class="about" onclick="myfunction()">About us</a>
   
    
    
    

</div>

<script src="js/main.js"></script>