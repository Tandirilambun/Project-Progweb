<?php 
    session_start();
    require "koneksi.php";
    $nama = "";

    if (!isset($_SESSION['user'])) {
       header("location:login.php");
    }elseif (isset($_SESSION['user'])) {
    	$nama = $_SESSION['user']['username'];
    }else{
    	$nama = "Login Dulu";
    }

    if(isset($_SESSION['user'])){
        if ($_SESSION['user']['username'] != 'user') {
            header("location:login.php");
        }
    }          

    if (isset($_GET['cari'])) {
    	$search = $_GET['search'];

    	$sql = "SELECT * FROM data_produk WHERE Nama LIKE ".'"%'.$search.'%"'." or Tags LIKE ".'"%'.$search.'%"'." or Kategori LIKE ".'"%'.$search.'%"';

    	$_SESSION['test'] = $sql;
    	header("location:direct-search.php");
    }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DashBoard Seal Clothing</title>
	<link rel="stylesheet" href="style-user.css">
</head>
<body>
	<header>
		<div>
			<div class="banner">
				<img src="banner.jpg">
				<a href="#">Anda login sebagai <?php echo $nama ?></a>
			</div>
			<div class="navi">
				<nav>
					<a href="dashboard-user.php">Home</a>					
					<a href="logout.php">Log Out</a>
					
				</nav>
			</div>
			<div class="search">
				<form action="" method="GET">
					<input type="text" placeholder="Cari Pakaian...." name="search">
					<button name="cari" type="submit">Cari</button>
				</form>
			</div>
		</div>
	</header>
	<main>
		<div class="layout">
			<div class="wrap left">
				<?php
					$sql = "SELECT * FROM data_produk";
					$query = mysqli_query($conn, $sql);
					while($result =mysqli_fetch_assoc($query)):
					?>
				<div class="item">
					<a href=<?php echo "direct-product.php?id=".$result['id'] ?>>
						<img src="fileuploads/<?php echo $result['Gambar'];?>">
					</a>
					<h3>
						<center>
							<?php echo "Rp " . number_format($result['Harga'],2, ",", "."); ?>
						</center>

					</h3>
					<span>
						<center><?php echo $result['Nama']; ?></center>
					</span>
				</div>
				<?php endwhile; ?>
			</div>
			<div class="wrap right">
				<div class="sidebar">
					<img src="side.jpg">
				</div>
			</div>
		</div>
	</main>
	<footer>
		<div class="colom">
			<div class="help">
				<span>Customer Service</span>
					<li><a href="#">Track Buyer Orders</a></li>
					<li><a href="#">Track Seller Delivery</a></li>
					<li><a href="#">Returns & Refunds</a></li>
					<li><a href="#">Free Shipping</a></li>
					<li><a href="#">Contact us</a></li>
			</div>
			<div class="us">
				<span>About Us</span>
				<div class="as">
					<span>a contemporary clothing brand known for its trend-driven styles with affordable prices. Drawing inspiration from the latest trends, from street style to runway, About Us clothing brand offers an array of styles that is fit for the fashion loving girl.
					</span>
				</div>
			</div>
			<div class="paymentlogo">
				<img src="pay.png">
			</div>
		</div>
		<div class="copy">
			<span>Copyright &copy 71190463 || Gregorius Sakti Ginantaka || 25 Maret 2021</span>
		</div>
	</footer>
</body>
</html>