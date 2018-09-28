<!DOCTYPE html>
<html>


<body>

<?php

$servername = "localhost";
$username = "j62zhang";
$password = "yuryeun5";
$dbname = "j62zhang";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


/*// sql to create table
$sql = "CREATE TABLE Artist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL
)";*/



$sql = "CREATE TABLE Artwork (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artworkName VARCHAR(30) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL
)";
$result = $conn->query($sql);

/*$sql = "CREATE TABLE Museum (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
museumname VARCHAR(30) NOT NULL
)";*/

$artworkName = $_GET['artworkName'];
$artworkName = mysql_real_escape_string($artworkName);
$firstname = $_GET['firstname'];
$firstname = mysql_real_escape_string($firstname);
$lastname = $_GET['lastname'];
$lastname = mysql_real_escape_string($lastname);
$price = $_GET['price'];
$price = mysql_real_escape_string($price);
$genre = $_GET['genre'];
$genre = mysql_real_escape_string($genre);

$result = $conn->query($sql);

if ($_GET['action'] == 'Add') {
    $sql = "INSERT INTO Artwork (artworkName, firstname, lastname, price, genre) LIKE ('$artworkName', '$firstname', '$lastname', '$price', '$genre')";
} else if ($_GET['action'] == 'Remove') {
    $sql = "DELETE FROM Artwork WHERE firstname = '$firstname'";
} else {
    echo "invalid action";
}

//$sql = "INSERT INTO Museum (museumname) VALUES ('Museo')";
//$sql = "INSERT INTO Artwork (artworkname) VALUES ('Guernica')";



if (mysqli_query($conn, $sql)) {
    //echo "Table Artist created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


echo "<br>";
echo "<br>";

//$sql = "DELETE FROM Artist WHERE firstname = 'Pablo'";
//$result = $conn->query($sql);

echo "<br>";
echo "<br>";

$sql = "SELECT id, firstname, lastname FROM Artist";
$result = $conn->query($sql);



/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}*/




mysqli_close($conn);



?>

</body>


</html>