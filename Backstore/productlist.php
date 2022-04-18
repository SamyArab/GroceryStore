<?php
    session_start();
    class product{
        private $name;
        private $price;
        private $description;

        public function __construct($n, $p, $d){
        $this->name = $n;
        $this->price = $p;
        $this->desription = $d;
        }

    }

    $xml = @simplexml_load_file('products.xml');

    if(isset($_POST["productToDelete"])) {
        foreach($xml->product as $product){  
            if($product->name == $_POST["productToDelete"]){
                unset($product[0]);
                $xml->asXML('products.xml');
                break;
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
    <title>Product List</title>
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
        
        
            <div class="listHeader">
               <h1>Product List</h1>
               <a class="btn" href="./product_edit.php">Add</a>
            </div>
            <div class="itemList">
                <?php
                    foreach($xml->product as $product){
                        
                        print "<div class=\"item\">";

                        print "<img class=\"itemImg\" src=\"./images/$product->image\" alt=\"$product->image\">";
                        print "<h2 class=\"itemName\">$product->name</h2>";

                        print "<form action=\"./product_edit.php\" method=\"post\">";
                        print "<input type=\"hidden\" name=\"editName\" value=\"$product->name\">";
                        print "<input type=\"hidden\" name=\"editPrice\" value=\"$product->price\">";
                        print "<input type=\"hidden\" name=\"editDesc\" value=\"$product->description\">";
                        print "<input type=\"hidden\" name=\"editAisle\" value=\"$product->aisle\">";
                        print "<input type=\"submit\" name=\"edit\" value=\"Edit\" class=\"btn\">";

                        print "</form>";

                        print "<form method=\"post\"\">";
                        print "<input type=\"hidden\" name=\"productToDelete\" value=\"$product->name\">";
                        print "<input type=\"submit\" name=\"delete\" value=\"Delete\" class=\"btn\" style=\"float: right; margin-left: 50px;\">";
                        print "</form>";

                        print "</div>";
                    }
                ?>
            </div>
        </div>
    </main>

    <footer>

        <span>Made By Tanzir Hoque & Nicholas Piperni</span>
        <a class = "btn" href="/index.php">Go Back</a>

    </footer>

</body>
</html>