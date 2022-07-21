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

	$id = $_GET['id'];
    $sql = "SELECT * FROM data_produk WHERE id=".$id;
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

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
	<title>Seal Clothing</title>
	<link rel="stylesheet" href="style-direct.css">
</head>
<body>
	<header>
		<div>
			<div class="banner">
				<img src="banner.jpg">
				<a href="#">Anda Login Sebagai : <?php echo $nama ?></a> 
			</div>
			<div class="navi">
				<nav>
					<a href="dashboard-user.php">Home</a>
					<a href="Logout.php">Log Out</a>
				</nav>
			</div>
			<div id="breadcrumb">
				<div class="crumb">
					<ul>
						<li>
							<a href="dashboard-user.php">
								Home
							</a>
						</li>
						<li>
							<a href="dashboard-user.php">
								<?php echo $result['Kategori']; ?>
							</a>
						</li>
						<li>
							<a href="dashboard-user.php">
								<?php echo $result['Nama']; ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="search">
					<form action="" method="GET">
						<input type="text" placeholder="Cari Pakaian...." name="search">
						<button name="cari" type="submit">Cari</button>
					</form>
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="layout">
			<div class="wrap left">
				<img src="fileuploads/<?php 
				echo $result['Gambar'];
				?>">
			</div>
			<div class="wrap right">
				<div class="jud">
					<span>
						<?php echo $result['Nama']; ?>
					</span>
				</div>
				<div class="rate">
					<div class="img">
						<img src="rev.png">
					</div>
					<span>
						41 Reviewers
					</span>
				</div>
				<div class="detail">
					<div class="list">
						<span>
							<?php echo $result['Deskripsi']; ?>
						</span>
					</div>
				</div>
				<hr>
				<div class="tags">
					<span>
						Tags : <?php echo $result['Tags']; ?>
					</span>
				</div>
				<div class="category">
					<span>
						Kategori : <?php echo $result['Kategori']; ?>
					</span>
				</div>
				<div class="price">
					<h3>
						Current Price : <?php echo "Rp " . number_format($result['Harga'],2, ",", "."); ?>
					</h3>
				</div>
				<div class="option">
					<select>
						<option>Select Size</option>
						<option>XXL</option>
						<option>XL</option>
						<option>L</option>
						<option>M</option>
						<option>S</option>
					</select>
					<select>
						<option>Delivery Method</option>
						<option>Express - Door To Door Delivery</option>
						<option>Quick Courier</option>
						<option>Rapid Delivery</option>
						<option>Blink Courier</option>
						<option>Sprint - Delivery Service</option>
					</select>
					<select>
						<option>Payment Method</option>
						<option>Visa Payment</option>
						<option>Master Card Payment</option>
						<option>Maestro Payment</option>
						<option>American Express Payment</option>
					</select>
				</div>
				<div class="cart">
					<button class="but1" name="but1" type="submit">
						<a href="finish.php" style="color:black;text-decoration: none;">
							Beli
						</a>
					</button>
					<button class="but2" name="but2" type="submit">Keranjang</button>
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