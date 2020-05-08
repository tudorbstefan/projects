<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
      <!-- It contains an article -->
        <article>
        <h2 class="h2-style">Article heading</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Donec a diam lectus. Set sit amet ipsum mauris. Maecenas congue ligula as quam viverra nec consectetur ant hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur.</p>

        <h3>Subsection</h3>
        <p>Donec ut librero sed accu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aenean ut gravida lorem. Ut turpis felis, pulvinar a semper sed, adipiscing id dolor.</p>
        <p>Pelientesque auctor nisi id magna consequat sagittis. Curabitur dapibus, enim sit amet elit pharetra tincidunt feugiat nist imperdiet. Ut convallis libero in urna ultrices accumsan. Donec sed odio eros.</p>

        <h3>Another subsection</h3>
        <p>Donec viverra mi quis quam pulvinar at malesuada arcu rhoncus. Cum soclis natoque penatibus et manis dis parturient montes, nascetur ridiculus mus. In rutrum accumsan ultricies. Mauris vitae nisi at sem facilisis semper ac in est.</p>
        <p>Vivamus fermentum semper porta. Nunc diam velit, adipscing ut tristique vitae sagittis vel odio. Maecenas convallis ullamcorper ultricied. Curabitur ornare, ligula semper consectetur sagittis, nisi diam iaculis velit, is fringille sem nunc vet mi.</p>
        </article>

      <!-- the aside content can also be nested within the main content -->
        <aside>
            <h2 class="h2-style">Related</h2>
            <ul>
                <li><a href="#">-first article-</a></li>
                <li><a href="#"></a></li>
                <li><a href="#">-second article-</a></li>
                <li><a href="#"></a></li>
                <li><a href="#">-third article-</a></li>
                <li><a href="#"></a></li>
                <li><a href="#">-fourth article-</a></li>
                <li><a href="#"></a></li>
                <li><a href="#">-fifth article-</a></li>
            </ul>
        </aside>
    </main>

    <!-- And here is our main footer that is used across all the pages of our website -->

    <footer>
      <p>©Copyright 2019 by Tudor. All rights reversed.</p>
    </footer>
  </body>
</html>