<h1 align="center">The Sparks Bank</h1>
<h3 align="center">User List</h3>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_GET["run"] == "true") {
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
    <div class="center">
    <table>
        <thead>
            <th style = "width:50px">ID</th>
            <th style = "width:50px">Name</th>
            <th style = "width:50px">Email</th>
            <th style = "width:50px">PhNo</th>
            <th style = "width:50px">Address</th>
            <th style = "width:50px">Balance</th>
            <th style = "width:50px">Select Sender</th>
        </thead>
<?php

        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
        echo '
        <tr>
            <td>'.$row["ID"].'</td>
            <td>'.$row["Name"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["PhNo"].'</td>
            <td>'.$row["Address"].'</td>
            <td>'.$row["Balance"].'</td> 
            <td><a href="transact.php?sender='.$row['ID'].'"
            <button type="button" class="user-button">Send Money</button>
            </a></td>
        </tr>';


        }
?>
        </table>
    </div>
<?php
    }
}
$conn->close();
?>

<html>
<style>
    table, th, td{
        box-shadow: 2px 2px 10px black;
        border-radius: 0.1px;
        font-weight: bold;
        background-color: white;
        font-family: Arial, Helvetica, sans-serif;
        border: 1px solid;
        width: 50%;
        border-collapse: collapse; 
        text-align: center; 
        height: 150px;
    }

    th, td{
        height:70px;
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th{
        background-color: #60a9ff;
    }
    
    .center {
        margin: auto;
        width: 57.5%;
        border: 3px solid #73AD21;
        padding: 10px;
        text-align: center;
        border: 3px solid black;
    }
    .user-button{
    border: 2px solid #9dd1ff;
    border-radius: 10px;
    color: #348efe;
    display: inline-block;
    padding: 5px 25px;
    text-decoration: none;
    margin: 25px 0;
    transition: background-color 200ms ease-in-out;
    }
    .user-button:hover,.user-button:focus{
    background-color: #e1f1ff ;
    }

    html{
    background-color: #e0ffff;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
    </style>
    </html>

