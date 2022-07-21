<?php 
    require "koneksi.php";
    session_start();
    
    if (!isset($_SESSION['user'])) {
       header("location:login.php");
    }elseif (isset($_SESSION['user'])) {
        $nama = $_SESSION['user']['username'];
    }else{
        $nama = "Login Dulu";
        header("location:dashboard-user.php");
    }

    if(isset($_SESSION['user'])){
        if ($_SESSION['user']['username'] != 'admin') {
            header("location:login.php");
        }
    }    

    $sql = "SELECT * FROM data_produk";
    $query = mysqli_query($conn, $sql);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Dashboard</title>
    <link rel="stylesheet" href="style-admin.css">
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
				    <a href="insert.php"> Tambah Produk </a>
					<a href="Logout.php">Log Out</a>
				</nav>
			</div>
		</div>
	</header>
	<main>
		<div class="container">
			<table width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Produk</th>
						<th>Harga Produk</th>
						<th>Deskripsi Produk</th>
						<th>Tags Produk</th>
						<th>Kategori Produk</th>
						<th>Gambar Produk</th>
						<th>Update | Delete</th>	
					</tr>
				</thead>
				<tbody>
					<?php while($result = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?php echo $result['id'] ?></td>
                            <td><?php echo $result['Nama'] ?></td>
                            <td><?php echo $result['Harga'] ?></td>
                            <td>
                            	<p><?php echo $result['Deskripsi'] ?></p>
                            </td>
                            <td><?php echo $result['Tags'] ?></td>
                            <td><?php echo $result['Kategori'] ?></td>
                            <td>
                                <img width="150px" src="fileuploads/<?php echo $result['Gambar'] ?>">
                            </td>
                            <td>
                                <div class="button">
                                    <div class="up">
                                    	<button>
                                    		<a href="update.php" style="text-decoration: none; color: black;"> Update Produk </a>
                                    	</button>
                                    </div>
                                    <br>
                                    <div class="del">
                                    	<button>
                                    		<a href="hapus.php?id=<?php echo $result['id'] ?>" style="text-decoration: none; color: black;"> Hapus </a>	
                                    	</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
				</tbody>
			</table>
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