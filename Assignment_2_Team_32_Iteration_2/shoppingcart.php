<!DOCTYPE html>
<html>
<head >
 <title>Assignment 2 Team #32 Shopping Cart</title>
 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="shoppingcart.css">
 

</head>
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


// sql to create table
$sql = "CREATE TABLE Artist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL
)";
$result = $conn->query($sql);


$sql = "INSERT INTO Artist (firstname, lastname) VALUES ('Pablo', 'Picasso')";

if (mysqli_query($conn, $sql)) {
    echo "Table Artist created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


echo "<br>";
echo "<br>";

//$sql = "DELETE FROM StRec WHERE firstname = 'John'";
//$result = $conn->query($sql);

echo "<br>";
echo "<br>";

$sql = "SELECT id, firstname, lastname FROM Artist";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}


mysqli_close($conn);
?> 


<h2 >Assignment 2 Team #32 Shopping Cart</h2>


<div class="container-fluid">
		<div class="col-sm-3">

<br><br><br>

	<div class="quantitytext">Quantity</div><br>
		<select id="painting" onchange= displayPrice()>
			<option value="" selected>-- Choose Painting --</option>
			<option value="Geurnica" nameOfPainting="Geurnica" id="Geurnica" price="179">Geurnica</option>
			<option value="MonaLisa" nameOfPainting="Mona Lisa" id="MonaLisa" price="100">Mona Lisa</option>
			<option value="MarilynDiptych" nameOfPainting="Marilyn Diptych" id="MarilynDiptych" price="17">Marilyn Diptych</option>
			<option value="Nighthawks" nameOfPainting="Nighthawks" id="Nighthawks" price="10">Nighthawks</option>
			<option value="TheKiss" nameOfPainting="The Kiss" id="TheKiss" price="135">The Kiss</option>
		</select>
		<span id="message"></span>
		
		<input id="quantity" class="floatright" type="number" name="quantity" value="1" min="1" max="100">

		<br><br><br>

		<button id="add-to-cart" class="clear">Add to Cart</button>
		
		<button id="clear-cart">Clear Cart</button>
		
		<br> <br> <br>
		<div>
			<ul id = "show-cart">
				
			<ul>
		</div>
		<br>
		<a href="home.html"><button>Continue Shopping</button></a>
		

		</div>


	<div class="col-sm-4">
	
	
	
	</div>
	
	<div class="col-sm-5">
		<br><br>
		<div class="size">Total: <span class="red">$</span><span class="red" id="total-cart"></span></div>
	</div>

</div>

<script src="shoppingcart.js"></script>






</body>
</html>