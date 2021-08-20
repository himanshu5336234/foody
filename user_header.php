<?php
if(!isset($_SESSION['uid']))
{
    header("location:./admin/logout.php");
}

?>
<div class="container">
<div id="logo"><a href="home.php">fOo<span>Dy</span></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav ml-auto">
                   <li class="nav-item active">
                       <a class="nav-link" href="user_info.php">Hi <?php echo $_SESSION['name'];?> <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="products.php">Products </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="user_cart.php">My Cart </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="user_order.php">My Orders </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="user_contact.php">Contact Us </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="admin/logout.php">Logout </a>
                  </li>
                  
               </ul>
            </div>
         </div>