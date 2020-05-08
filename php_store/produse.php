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
      'product_id'      =>  $_GET["produs_id"],
      'product_name'    =>  $_POST["hidden_name"],
      'product_price'   =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["cantitate"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    }
    else
    {
      echo '<script>alert("Item Already Added")</script>';
    }
  }
  else
  {
    $item_array = array(
      'product_id'      =>    $_GET["produs_id"],
      'product_name'    =>    $_POST["hidden_price"],
      'product_price'   =>    $_POST["hidden_price"],
      'item_quantity'   =>    $_POST["cantitate"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
} 
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
    <link rel="stylesheet" href="produse.css">
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
    <h2>Smartphones</h2>
    <main>
<?php
        $query = "SELECT * FROM produse WHERE produs_categorie='Mobile' ORDER BY produs_id ASC";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>
      <div>
        <form method="post" style="width: 340px; height: 550px;margin-top: 10px; margin-left: 1px; " action="cart.php?action=add&produs_id=<?php echo $row["produs_id"]; ?>">
          <div style="border:2px ridge #53c9c7; background-color:white; border-radius:10px; padding:16px; " align="center">
            <h4 class="text-info"><?php echo $row["produs_nume"]; ?></h4>
            <img src="img\<?php echo $row["imagine"]; ?>" width=200px; height=200px; class="img-responsive" id="imgprod" /><br />
            <h4 class="price"><?php echo $row["produs_pret"]; ?> Lei</h4>
            <p class="descriere"><?php echo $row["descriere"]; ?></p>
            <p class="valabilitate"><?php if ($row["cantitate"] > 2){ echo "Available";} else { echo  "This product is not available.";} ?></p>
            <p>Cantitate: <input type="text" name="cantitate" value="1"  /></p>

            <input type="hidden" name="hidden_name" value="<?php echo $row["produs_nume"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row["produs_pret"]; ?>" />

            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
          </div>
        </form>
      </div>
      <?php
          }
        }
      ?>
    </main>

    <!-- And here is our main footer that is used across all the pages of our website -->

    <footer>
      <p>©Copyright 2019 by Tudor. All rights reversed.</p>
    </footer>
  </body>
</html>