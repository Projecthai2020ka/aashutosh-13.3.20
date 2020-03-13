<table bgcolor="black" width="100%">

<tr><td><a href="index.php" class="navbar-brank">
    <img src="pics/logo.png" width="40%" align="left">
</a></td >

<td width="180">
<a href="login.php"><button type="button" class="btn btn-outline-success">Log In</button></a>    
 &nbsp
 <a href="regis.php"><button type="button" class="btn btn-info">Sign up</button></a>
</td>
<td width="140" align="right">

<button class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup"
    aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

            <a href="cart.php" class="nav-item active">
                <h5 class="px-2 cart">
                   <font color="white"> <i class="fas fa-shopping-cart"></i>Cart

                    <?php
                        if(isset($_SESSION['cart'])){

                            $count=count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }
                        else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }
                    ?>
                   
                </font></h5>
            </a>
<br>

</td></tr>


</table>
