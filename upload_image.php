<?php
    require_once("lib/ImagesMiddleStoring.php");
    require_once("lib/ImagesAdder.php");

    $imagesStoringDir = "uploads";
    $imagesStoringTB = "image_fullname";
    $user_name = $_SESSION["User_name"];

    $imagesMSObj = new ImagesMiddleStoring();
    $imagesAddObj = new ImagesAdder($imagesStoringTB,$imagesStoringDir);

    if (isset($_FILES['images'])){
        if(!file_exists($imagesStoringDir)) {
            mkdir($imagesStoringDir);
        }

        $images = ($imagesMSObj->reArrayFiles($_FILES['images']));

        foreach ($images as $file) {
            $filename = date_create_from_format('U.u', microtime(true))->format('Y_m_d_H_i_s_u');
            $ary = explode('.', $file['name']);
            $extension = end($ary);

            $imagesAddObj->addImagesIntoDir($file,$filename,$extension);
            if (file_exists($imagesStoringDir."/".$filename.".".$extension)){
                $imagesAddObj->addImagesIntoDB($_SESSION["User_ID"],$filename,$extension);
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link rel="stylesheet" type="text/css" href="css/Lenta.css">
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
<div class="content">
    <div class="container">
        <form class='box' method="post" enctype="multipart/form-data">
            <input type="file" name="images[]" multiple>
            <input type="submit" name="submit_button">
        </form>
    </div>
</div>
</body>
</html>
