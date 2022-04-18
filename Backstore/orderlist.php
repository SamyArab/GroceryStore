<?php
    

    $xml = @simplexml_load_file('orders.xml');

    if(isset($_POST["productsToDelete"]) && isset($_POST["amountsToDelete"])) {
        foreach($xml->order as $order){  
            if($order->names == $_POST["productsToDelete"] && $order->amounts == $_POST["amountsToDelete"]){
                unset($order[0]);
                $xml->asXML('orders.xml');
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
    <title>Order List</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header class ="header">
        <nav>
            <a class="navbtn" href="./productlist.php">Product List</a>
            <a class="navbtn" href="./userlist.php">User List</a>
            <a class="navbtn" href="./orderlist.php">Order List</a>
        </nav>
    </header>
    <main>
        <div class="pageContainer">
        
            <div class="listHeader">
                <h1>Order List</h1>
                <a class="btn" href="./order_edit.php">Add</a>
            </div>
            <div class="itemList">
                <?php
                    foreach($xml->order as $order){
                        print "<div class=\"item\">";
                        
                        print "<h2 class=\"itemName\">";
                        
                        $orderNames = preg_split("/\,/", $order->names);
                        $orderAmounts = preg_split("/\,/", $order->amounts);
                        
                        $orderArr = array_combine($orderNames, $orderAmounts);

                        
                        foreach($orderArr as $key => $value) {
                            if($key != array_key_last($orderArr)) {
                                print $value."x ".$key.", ";
                            } else {
                                print $value."x ".$key;
                            }
                        }

                        print "</h2>";

                        print "<form action=\"./order_edit.php\" method=\"post\">";

                        //print "<a class=\"btn\" href=\"./order_edit.php\">Edit</a>";
                        print "<input type=\"hidden\" name=\"editNames\" value=\"$order->names\">";
                        print "<input type=\"hidden\" name=\"editAmounts\" value=\"$order->amounts\">";
                        print "<input type=\"submit\" name=\"edit\" value=\"Edit\" class=\"btn\">";

                        print "</form>";

                        print "<form method=\"post\"\">";
                        print "<input type=\"hidden\" name=\"productsToDelete\" value=\"$order->names\">";
                        print "<input type=\"hidden\" name=\"amountsToDelete\" value=\"$order->amounts\">";
                        print "<input type=\"submit\" name=\"delete\" value=\"Delete\" class=\"btn\" style=\"float: right; margin-left: 50px;\">";
                        print "</form>";

                        print "</div>";

                        //print $order->names;
                        //print $order->amounts;
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