<?php
    session_start();
    $add = true;
    if(isset($_POST["editName"]) && $_POST["editPrice"]  && $_POST["editDesc"] && $_POST["editAisle"]) {
        $editName = $_POST["editName"];
        $editPrice = $_POST["editPrice"];
        $editDesc = $_POST["editDesc"];
        $editAisle = $_POST["editAisle"];
        $add = false;
        $_SESSION["productNames"] = $editName;
        $_SESSION["productPrice"] = $editPrice;
        $_SESSION["productDesc"] = $editDesc;
        $_SESSION["productAisle"] = $editAisle;
    }

    if(isset($_POST['pName']) && isset($_POST['pPrice']) && isset($_POST['pDesc']) && isset($_FILES["file"])){
        $productName = $_POST['pName'];
        $productPrice = $_POST['pPrice'];
        $productDesc = $_POST['pDesc'];
        $productAisle = $_POST["aisleName"];
        $fileName = $_FILES["file"]["name"];

        // Check if price is a number

        if(!is_numeric($productPrice)) {
            $message = "Price must be a number";
        }

        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check === false) {
            $message = "File is not an image.";
        }
        
        
        // write to xml file
        if(!isset($message)) {
            
            if($_POST["add"] == "add") {
                $xml = simplexml_load_file('products.xml');
                if(!isset($xml)){
                    $xml = '<?xml version="1.0" encoding="UTF-8" ?><products></products>';

                    $xml = simplexml_load_string($xml);
                }
                $product = $xml->addChild('product');
                $product->addChild('name', $productName);
                $product->addChild('price', $productPrice);
                $product->addChild('description', $productDesc);
                $product->addChild('image', $fileName);
                $product->addChild('aisle', $productAisle);

                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

                file_put_contents('products.xml', $xml->asXML());
                $message = "Product Saved!";
            } else {
                $xml = simplexml_load_file('products.xml');
                foreach($xml->product as $product){
                    
                    if($product->name == $_SESSION["productNames"] && $product->price == $_SESSION["productPrice"] && $product->description == $_SESSION["productDesc"]){
                        $product->name = $productName;
                        $product->price = $productPrice;
                        $product->description = $productDesc;

                        $xml->asXML('products.xml');
                        $message = "This product has been updated!";
                        break;
                    }
                }
            }
        }
          
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header class = "header">
        <nav>
            <a class="navbtn" href="./productlist.php">Product List</a>
            <a class="navbtn" href="./userlist.php">User List</a>
            <a class="navbtn" href="./orderlist.php">Order List</a>
            <a class="navbtn" href="#"><?= $_SESSION['email'] ?></a>
        </nav>
    </header>
    <main>
        <div class="pageContainer">

            <div class="editorContainer">
                <h1 style="align-self: center;">Edit Product</h1>
                <div class="editArea">
                    <form method="post" enctype="multipart/form-data">
                        <p>Product Name:</p>
                        <input class="editFields" type="text" name="pName" placeholder="Enter product name" <?php if(isset($editName)) {print "value=\"$editName\"";} ?>>
                        <p>Price:</p>
                        <input class="editFields" type="text" name="pPrice" placeholder="Enter product price in dollars" <?php if(isset($editPrice)) {print "value=\"$editPrice\"";} ?>>
                        <p>Description:</p>
                        <textarea class="editFields" name="pDesc" id="" cols="30" rows="10" placeholder="Enter information about the product"><?php if(isset($editPrice)) {print $editDesc;} ?></textarea>
                        <p>Image:</p>
                        <input type="file" id="myFile" name="file" >
                        <p>Aisle:</p>
                        <input class="editFields" type="text" name="aisleName" placeholder="Enter aisle" <?php if(isset($editAisle)) {print "value=\"$editAisle\"";} ?>>
                        <input type="hidden" name="add" value=<?php $add ? print "\"add\"" : print "\"edit\"" ?>>
                        <input type="submit" class="btn" value="Save" style="float: right; margin-top: 20px;">
                    </form>
                    <?php
                        if(isset($message)) {
                            print $message;
                        }
                    ?>
                </div>
                <br>
            </div>

        </div>
    </main>
    <footer>

        <span>Made By Tanzir Hoque & Nicholas Piperni</span>
        <a class = "btn" href="/index.php">Go Back</a>
    
    </footer>
</body>


</html>