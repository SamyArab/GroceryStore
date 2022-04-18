<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
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
                <h1>Profile List</h1>
                <a class="btn" href="./user_add.php">Add</a>
            </div>

            <div class="itemList" id="emails"></div>

            <script>
                loadXMLDoc();
                function loadXMLDoc() {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            displayUsers(this);
                        }
                    };
                    xmlhttp.open("GET", "../Store/User/users.xml", true);
                    xmlhttp.send();
                }
                function displayUsers(xml){
                    var i;
                    var xmlDoc = xml.responseXML;
                    var div ="";
                    var x = xmlDoc.getElementsByTagName("user");
                    for(i = 0; i<x.length; i++){
                        div += "<div class = \"item\">"+
                        "<h2 class = \"itemName\">"+
                        x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+
                        "</h2>"+
                        "<a class =\"btn\" href = \"./user_edit.php\">Edit</a>"+
                        "<button class=\"btn\">Delete</button>"+
                        "</div>"+
                        "</div>"
                    }
                    document.getElementById("emails").innerHTML = div;
                }
            </script>

        </div>

    </main>
    <footer>

        <span>Made By Tanzir Hoque & Nicholas Piperni</span>
        <a class = "btn" href="/index.php">Go Back</a>
    
    </footer>
</body>


</html>