<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SHOPPING</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<link rel="stylesheet" href="style.css">
	
	
</head>


<body>
<?php require_once("php/header.php") ?>
<BR>

 </body>
</html>





<?php
	session_start();
    require_once('php/test.php');
	require_once('php/component.php');
    $user = "root";
    $pass = "";
    $db = "aka";
    
    // Create connection
    $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");	

if(isset($_POST['add2']))
        //print_r($_POST['product_id2']);
        
        

        $sql="select * from products;";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);
         for($i=0;$i< $resultCheck;$i++)
        {
            while ($row = mysqli_fetch_assoc($result)) {
               if($row['id']==$_POST['product_id2'])
               make($row['product_name'],$row['product_price'],$row['product_discount'],$row['product_image'],$row['product_desc']) ;
            }
		}
		
  function make($pname,$price,$discount,$pic,$desc)
    {
		$t=$price-$discount;
		$element="
		
		
		<div class=\"col-md-12 col-sm-6 col-2 my-3 my-md-2\">
	   
				<div class=\"card shadow\">
					<div class='row'>
						<div class='col-3'>
							<img src=\"$pic\" alt=\"nahi aya image\" class=\"abc\">
						</div>
						<div class='col-6'>
							<font size='+5'> $pname</font>
							<h6><font color=\"green\">
							<i class=\"fas fa-star\"></i>
							<i class=\"fas fa-star\"></i>
							<i class=\"fas fa-star\"></i>
							<i class=\"fas fa-star\"></i>
							<i class=\"far fa-star\"></i>
							</font></h6>
							<font size='+1' face='ELEPHANT'>
							<small>M.R.P:</small> <s class=\"text-danger\"> &#8377 $price</s>
							</font>
							<P>price <font size='+3' face='ELEPHANT'>:&#8377 $discount</FONT> (inclusive all taxes)<br>
							<font size='+1' face='ELEPHANT'>( 	you save :</font><font size='+1.5' face='ELEPHANT' class='text-success'>&#8377 $t </FONT>	<font size='+1' face='ELEPHANT'>)</font>
							<p><font face='times new roman' size='4'> $desc</font></p>
							<hr>
							<center>
							<font size='+3'>
							
							<div class='row'>
								<div class='col-3'><i class='fas fa-gift'></i></div>	
								<div class='col-3'><i class='fas fa-shipping-fast'></i></div>
								<div class='col-3'><i class='fas fa-clipboard-check'></i></div>
							</div> </font>
							
							<font size='+1'>
							
							<div class='row'>
								<div class='col-3'>Gift Wrap</div>	
								<div class='col-3'>Fast Delivery</div>
								<div class='col-3'>Pragmatic Verified</div>
							</div></center>
							</div>
							
							<div class='col-3'>
							
								<p class='text-success'>In stock.<p>
								<small>Delivery by tomorrow
								<br>
								Select <a href='#'>delivery location</a> <i class='fas fa-map-marker-alt'></i> <br>
								Sold by STPL Exclusive Online <br>(4.0 out of 5 | 19,208 ratings) and Fulfilled by Pragmatic.
								</small>	
								</font>
							</div>
					   </div>
					</div> 
				</div>
	
                        
                    
         </div>";
                echo $element;
            }
            ?>