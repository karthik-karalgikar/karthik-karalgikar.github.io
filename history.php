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

$amount = $_POST["number"];
$receiver = $_POST["receiver"];
$sender = $_POST["sender"];
// if (isset($_GET["sender"])) {
// 	$sender = $_GET["sender"];
// }

$a = "SELECT Balance FROM user WHERE ID=".$sender;
$senderBalance = $conn->query($a);
$row = $senderBalance->fetch_assoc();
$senderBalance = $row['Balance'];
$updatedSenderBalance  = $senderBalance - $amount;

$b = "UPDATE `user` SET `Balance` =".$updatedSenderBalance." "."WHERE `ID`=".$sender;
$conn->query($b);

$c = "SELECT Balance FROM user WHERE ID=".$receiver;
$receiverBalance = $conn->query($c);
$row = $receiverBalance->fetch_assoc();
$receiverBalance = $row['Balance'];
$updatedReceiverBalance  = $receiverBalance + $amount;

$d = "UPDATE `user` SET `Balance` =".$updatedReceiverBalance." "."WHERE `ID`=".$receiver;
$conn->query($d);

$ab = "SELECT Name FROM user WHERE ID=".$receiver;
$receiverName = $conn->query($ab);
$row = $receiverName->fetch_assoc();
$receiverName = $row['Name'];


$ab = "SELECT Name FROM user WHERE ID=".$sender;
$senderName = $conn->query($ab);
$row = $senderName->fetch_assoc();
$senderName = $row['Name'];


$e = "INSERT INTO transaction(Sender, Receiver, balance) VALUES ('$senderName', '$receiverName', '$amount')";
$conn->query($e);

// echo '<script>alert("TRANSACTION SUCCESSFUL")</script>';


$sql = "SELECT * FROM transaction WHERE Sender='$senderName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
<table>
    <thead>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Balance</th>
    </thead>
<?php
      // output data of each row
      while($row = $result->fetch_assoc()) 
      {
      echo '
      <tr>
          <td>'.$row["Sender"].'</td>
          <td>'.$row["Receiver"].'</td>
          <td>'.$row["balance"].'</td>
      </tr>';
      }
?>
      </table>
      
<?php
  }
?>
<button onclick="location.href='bank.html'">
Go to Home Page</button>

