<div class="row">
    <div class="row">
        <div>
            <img src="../image/logo.jpg" class="logo">
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
        <div class="row">
            <div>
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

                <form action="../logout.php" method="POST">
                    <button class="signin" type="submit">log out</button>
                </form>     
            </div>
            <div>
                    <a href="profile.html" onclick="myFunction()"> <img src="../image/profile.jpg" class="profile"> </a>
                
            </div>
        </div>
    </div>
</div>