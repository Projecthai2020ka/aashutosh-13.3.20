<?php
	session_start();
    require_once('php/test.php');
	require_once('php/component.php');
	


	if(isset($_POST['add'])){
	//	print_r($_POST['product_id']);
		
		if(isset($_SESSION['cart'])){
			
			
			$item_array_id=array_column($_SESSION['cart'],	 "product_id");
			
			if(in_array($_POST['product_id'],$item_array_id)){
				echo " <script> alert('product is already added') </script> ";
				echo " <script> window.location='index.php' </script> " ;
			}else{
				$count=count($_SESSION['cart']);
				$item_array=array(
					'product_id' => $_POST['product_id']
				);

				$_SESSION['cart'][$count]=$item_array;
				//print_r($_SESSION['cart']); 
			}
		
		}

		else{
			
			$item_array=array(
				'product_id' => $_POST['product_id']
			);
	
		 
			$_SESSION['cart'][0]=$item_array;
			print_r($_SESSION['cart']);
	
	}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SHOPPING</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="style.css">
	
	
</head>


<body>
<?php require_once("php/header.php") ?>
	<br>
<div class="container">
	<div class="row text-center py-2">	
	<?php
			
			lol($row['product_name'],$row['product_price'],$row['product_discount'],$row['product_image'],$row['id']);
			for($i=0;$i< $resultCheck;$i++){
				while ($row = mysqli_fetch_assoc($result)) {
			lol($row['product_name'],$row['product_price'],$row['product_discount'],$row['product_image'],$row['id']);
														   }
											}
		?>
	</div>
</div>	
</body>
</html>