<?php
    require_once("lib/ImagesTakerFromDB.php");

    $imagesStoringTB = "image_fullname";
    $imagesTakerDBObj = new ImagesTakerFromDB($imagesStoringTB);

    $allImages = $imagesTakerDBObj->takeAllImagesFromDB();
    $user_name = $_SESSION["User_name"];
    ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Lenta</title>
     <link type="text/css" rel="stylesheet" href="css/Lenta.css">
 </head>
 <body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <span class="logo">100gram</span>
                <nav class="nav">
                    <a class="nav__link" href="Lenta.php">Lenta</a>
                    <?php echo "<a class='nav__link' href='home_page.php'>$user_name</a>" ?>
                    <a class="nav__link" href="upload_image.php">Upload</a>
                    <a class="nav__link" href="index.php">Logout</a>
                </nav>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content">
        <?php
            foreach ($allImages as $img){
                $full_path = $img["path"]."/".$img["name"].".".$img["extension"];
                echo"<img class='picture' src='$full_path'>";
            }
        ?>
        </div>
    </div>
 </body>
 </html>