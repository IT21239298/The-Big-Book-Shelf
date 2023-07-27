<!DOCTYPE html>
<html lang="en">

    <head>
        <?php require 'meta.php'; ?> <!--Meta tags and icon-->

        
        <link rel ="stylesheet" href="styles/stylecontact.css">
        <link rel="stylesheet" href="styles/styleshome.css">
    </head>

    <body>
        <!--Header-->
        <?php require 'header.php'; ?>

        <div class="row">
            <div class="column" >
                <img src="image/contact.jpg" style="width:100%">
            </div>
            
            <div class="column" >
                <div class="container">
                
                <center><h2>HAVE SOME QUESTIONS ? </h2></center>
                
            <form action="/action_page.php">
            
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                
                <input type="email" id="myEmail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$ " placeholder ="abc@gamil.com" required><br>
                <label for="subject">Subject</label>
                </select>

                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

            
            <input type="submit" value="send a message">
                </form>
            </div>
            </div>
        </div>
   
    </body><>
    <div class="dont">
      <!--Footer-->
    <?php require 'footer.php'; ?>
    <div>
</html>