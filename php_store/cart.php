<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "ex1");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "produs_id");
		if(!in_array($_GET["produs_id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
			'product_id'			=>	$_GET["produs_id"],
			'product_name'			=>	$_POST["hidden_name"],
			'product_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["cantitate"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
			echo '<script>window.location="cart.php"</script>';
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'product_id'			=>	$_GET["produs_id"],
			'product_name'			=>	$_POST["hidden_name"],
			'product_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["cantitate"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["product_id"] == $_GET["produs_id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cart.css">
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
    <h3>Order Details</h3>
    <div style="clear:both"></div>
			<br />
			<br/>
			<div style="margin-left: 20px;">
				<table style="background-color: #555555">
					<tr>
						<th width="40%" style="color: white; border:2px solid;">Item Name</th>
						<th width="10%" style="color: white; border:2px solid;">Quantity</th>
						<th width="20%" style="color: white; border:2px solid;">Price</th>
						<th width="15%" style="color: white; border:2px solid; ">Total</th>
						<th width="5%" style="color: white; border:2px solid;">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td style="color: white; border:2px solid;  text-align: center;"><?php echo $values["product_name"]; ?></td>
						<td style="color: white; border:2px solid;  text-align: center;"><?php echo $values["item_quantity"]; ?></td>
						<td style="color: white; border:2px solid;  text-align: center;"><?php echo $values["product_price"]; ?> Lei</td>
						<td style="color: white; border:2px solid;  text-align: center;"> <?php echo number_format($values["item_quantity"] * $values["product_price"], 2);?></td>
						<td ><a style="color: white; " href="cart.php?action=delete&produs_id=<?php echo $values["product_id"]; ?>"><span>Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["product_price"]);
						}
					?>
					<tr>

						<th style="color: white; background-color: #4CAF50; border:2px solid; font-size: 20px; font-style: italic;"  colspan="3" align="right">Total</td>
						<td style="color: white; background-color: #4CAF50; border:2px solid; font-size: 20px; font-style: italic;" align="center"> <?php echo number_format($total, 2); ?> Lei</td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
				 <button  type="submit" name="checkout"><a style="text-decoration: none; color: white;" href="checkout.php">Checkout</a></button>
			</div>
			
		</div>
    </main>

    <!-- And here is our main footer that is used across all the pages of our website -->

    <footer>
      <p>©Copyright 2019 by Tudor. All rights reversed.</p>
    </footer>
  </body>
</html>