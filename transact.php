
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

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if (isset($_GET["sender"])) {
	$sender = $_GET["sender"];
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
</head>
<body>
    <!-- <form action = "history.php/sender=<?php echo $sender?>" method='post'> -->
    <form action = "history.php" method='post'>
    <input type="hidden" name="sender" value="<?php echo $sender; ?>">
    SELECT USERS:
    <select name="receiver">
        <?php while($rows = $result->fetch_assoc()){
            ?>
            <option value="<?php echo $rows['ID']; ?> "> <?php echo $rows['ID']; ?> </option>
        <?php
        }
        ?>
    </select>
    <label for="number">Enter amount to be transferred</label>
    <input type="number" placeholder="Enter amount" id='number' name='number'>
    <button>Submit</button>
    </form>
</body>
</html>
