<?php
    session_start();
    $add = true;
    if(isset($_POST["editNames"]) && $_POST["editAmounts"]) {
        $editNames = $_POST["editNames"];
        $editAmounts = $_POST["editAmounts"];
        $add = false;
        $_SESSION["editNames"] = $editNames;
        $_SESSION["editAmounts"] = $editAmounts;
    }

    if(isset($_POST['names']) && isset($_POST['amounts'])){
        // remove whitespace and seperate by comma
        $productNamesNoSpaces = preg_replace('/,([\s])+/', ',', $_POST['names']);
        $productAmountsNoSpaces = preg_replace('/,([\s])+/', ',', $_POST['amounts']);

        $orderNames = preg_split("/\,/", $productNamesNoSpaces);
        $orderAmounts = preg_split("/\,/", $productAmountsNoSpaces);

        if(sizeof($orderNames) != sizeof($orderAmounts)){
            $message = "Each product must correspond to an amount";
        } else {
            // Check if amounts are numbers
            foreach($orderAmounts as $keys => $value) {
                if(!is_numeric($value)) {
                    $message = "Amounts must be numbers";
                    break;
                }
            }
            // write to xml file
            if(!isset($message)) {
                
                if($_POST["add"] == "add") {
                    $xml = simplexml_load_file('orders.xml');
                    if(!isset($xml)){
                        $xml = '<?xml version="1.0" encoding="UTF-8" ?><orders></orders>';

                        $xml = simplexml_load_string($xml);
                    }
                    $order = $xml->addChild('order');
                    $order->addChild('names', $productNamesNoSpaces);
                    $order->addChild('amounts', $productAmountsNoSpaces);

                    file_put_contents('orders.xml', $xml->asXML());
                    $message = "Order Saved!";
                } else {
                    $xml = simplexml_load_file('orders.xml');
                    foreach($xml->order as $order){
                        
                        if($order->names == $_SESSION["editNames"] && $order->amounts == $_SESSION["editAmounts"]){
                            $order->names = $productNamesNoSpaces;
                            $order->amounts = $productAmountsNoSpaces;
                            $xml->asXML('orders.xml');
                            $message = "This order has been updated!";
                            break;
                        }
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
    <title>Edit Order</title>
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
        
        
            <div class="editorContainer">
                <h1 style="align-self: center;">Edit Order</h1>
                <div class="editArea">
                    <form  method="post">
                        <p>Product Names:</p>
                        <input class="editFields" type="text" name="names" placeholder="Enter product names seperated by commas" <?php if(isset($editNames)) {print "value=\"$editNames\"";} ?>>
                        <p>Amount:</p>
                        <input class="editFields" type="text" name="amounts" placeholder="Enter the amount of each product seperated by commas" <?php if(isset($editAmounts)) {print "value=\"$editAmounts\"";} ?>>
                        <input type="hidden" name="add" value=<?php $add ? print "\"add\"" : print "\"edit\"" ?>>
                        <input type="submit" class="btn" value="Save" style="float: right; margin-top: 20px;">
                    </form>
                    <?php
                        if(isset($message)) {
                            print $message;
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer>

        <span>Made By Tanzir Hoque & Nicholas Piperni</span>
        <a class = "btn" href="/index.php">Go Back</a>
    
    </footer>
</body>

</html>