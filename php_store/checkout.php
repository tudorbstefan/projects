<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "ex1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tudor's PCs</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="checkout.css">
</head>

<body>
    <header>
    <div class="header-top">
        <h1><a href="index.php">Tudor's PCs</a></h1>
        <form>
            <input type="search" name="q" placeholder="Search query">
            <input type="submit" value="Go!">
        </form>
        <?php
          if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true)
          {
            echo "<a href='logout.php'>Logout from ".$_SESSION["username"]."</a>";
            echo "<a href='changepassword.php'>Change password</a>";
          }
          else{
            echo "<a href='login.php'>Login</a>";
          }
        ?>
    </div>
    <nav>
        <ul>
            <li><a href="produse.php">Produse</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    </header>

    <main>
	<?php
	if(empty($_SESSION["shopping_cart"]))
	{
		echo "<h3 style='text-align: center; color: black; font-size: 50px;'> The cart is empty! Please go back and do some shopping!</h3>";
	}
	else
	{
	?>
	<form>
		<strong>Numele dumneavoastra: </strong><br>
		<input style="width: 300px; color: black;" type="text" name="numeclient" required="true"><br>
		<br>
		<strong>Adresa de email: </strong><br>
		<input style="width: 300px; color: black;"type="email" name="emailclient" required="true"><br>
		<br>
		<strong>Adresa de livrare: </strong><br>
		<input style="width: 300px; color: black;" type="text" name="adresaclient" placeholder="Strada, Numar, Bloc, Ap., Oras, Judet.." required="true"><br>
		<br>
		<br>
		<strong>Metoda de plata: </strong><br>
		<input type="radio" name="plata" value="ramburs"> Ramburs la livrare<br>
		<input type="radio" name="plata" value="card"> Card<br>
		<br>

		<button  type="submit" name="placeorder">Place Order</button>
	</form>
	<?php
	}
	?>
    </main>

<!-- And here is our main footer that is used across all the pages of our website -->

<footer>
  <p>©Copyright 2019 by Tudor. All rights reversed.</p>
</footer>
</body>
</html>