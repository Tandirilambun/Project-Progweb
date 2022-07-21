<?php 
    //Koneksi
    require "koneksi.php";
    session_start();
    
    if (!isset($_SESSION['user'])) {
       header("location:login.php");
    }elseif (isset($_SESSION['user'])) {
        $nama = $_SESSION['user']['username'];
    }else{
        $nama = "Login Dulu";
    }

    if(isset($_SESSION['user'])){
        if ($_SESSION['user']['username'] != 'admin') {
            header("location:login.php");
        }
    }        
    
    //Ambil Data
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $tags = $_POST['tags'];
        $kategori = $_POST['kategori'];
        $gambar = $_FILES['gambar'];

        $tags = join(",", $tags);

        //Validasi File Gambar
        if ($gambar['type'] != 'image/jpg' && $gambar['type'] != 'image/jpeg' && $gambar['type'] != 'image/png' && $gambar['type'] != 'image/gif') {
            echo "File Harus berformat Gambar !!!";
            exit;
        }

        //Ukuran file dalam KB
        if ($gambar['size']/1024 > 10000) {
            echo "Ukuran File Maksimal 10mb !!!";
            exit;
        }

        //Source Path Gambar
        $path = "fileuploads/".$gambar['name'];

        //Move File ke Path dan Insert
        if (move_uploaded_file($gambar['tmp_name'], $path)) {
            
            $namagambar = $gambar['name'];
            
            $sql = "UPDATE data_produk SET Nama='$nama', Harga='$harga', Deskripsi='$deskripsi', Tags='$tags', Kategori='$kategori', Gambar='$namagambar' WHERE ID = '$id'";

            echo $sql;

            $query = mysqli_query($conn, $sql);

            if (!$query) {
                echo "<script>alert('Update Produk Gagal !!!')</script>";
                exit;
            }

            echo "<script>alert('Data Produk Berhasil Diupdate')</script>";

        }else{
            echo "<script>alert('Data Produk Gagal Diupdate')</script>";
            exit;
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seal Clothing | Insert Produk</title>
    <link rel="stylesheet" type="text/css" href="style-update.css">
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
                    <a href="dashboard-admin.php">Home</a>
                    <a href="logout.php">Log Out</a>
                </nav>
            </div>
            <div class="search">
            </div>
        </div>
    </header>
    <main>
        <div>
            <form method="post" enctype="multipart/form-data" id="form-insert">
                <div class="form-input">
                    <label for="id"> Produk : </label>
                    <div class="id">
                        <select name="id" id="id">
                            <?php 
                            $query = "SELECT * FROM data_produk";
                            $test = mysqli_query($conn,$query);
                            while ($rows = mysqli_fetch_assoc($test)) {?>
                                <option value="<?php echo $rows['id'] ?>"><?php echo $rows['Nama']; ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <span class="error-msg"></span>
                    </div>
                </div>

                <div class="form-input">
                    <label for="nama" > Nama Produk : </label>
                    <div class="nampro">
                        <input type="text"  name="nama" id="nama">
                        <br>
                        <span class="error-msg"></span>
                    </div>
                </div>

                <div class="form-input">
                    <label for="harga"> Harga Produk : </label>
                    <div class="harpro">
                        <input type="number"  placeholder="Rp" name="harga" id="harga">
                        <br>
                        <span class="error-msg"></span>
                    </div>
                </div>

                <div class="form-desc">
                    <label for="deskripsi"> Deskripsi Produk : </label>
                    <div class="descpro">
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                        <!-- <input type="text"  name="deskripsi" id="deskripsi"></input> -->
                        <br>
                        <span class="error-msg"></span>
                    </div>
                </div>

                <div class="form-tags">
                    <label for="tags"> Tags Produk : </label>
                    <div class="option-tags">
                        <input class="form-check-input" type="checkbox" name="tags[]" value="Pria Casual" id="tpriacasual"> Pria Casual
                        <!-- <label class="form-check-label" for="tpriacasual"> Pria Casual </label> -->

                        <input class="form-check-input" type="checkbox" name="tags[]" value="Wanita Casual" id="twanitacasual"> Wanita Casual
                        <!-- <label class="form-check-label" for="twanitacasual"> Wanita Casual </label> -->

                        <input class="form-check-input" type="checkbox" name="tags[]" value="Sneakers Pria" id="tsneakerspria"> Sneakers Pria
                        <!-- <label class="form-check-label" for="tsneakerspria"> Sneakers Pria </label> -->

                        <input class="form-check-input" type="checkbox" name="tags[]" value="Sneakers Wanita" id="tsneakerswanita"> Sneakers Wanita
                        <!-- <label class="form-check-label" for="tsneakerswanita"> Sneakers Wanita </label>     -->
                        <br>
                        <span class="error-msg"></span>
                    </div>
                </div>

                <div class="form-input">
                    <label for="kategori"> Kategori Produk : </label>
                    <div class="option-kategori">
                        <select name="kategori" id="kategori">
                            <option value="Pakaian Pria"> Pakaian Pria </option>
                            <option value="Pakaian Wanita"> Pakaian Wanita </option>
                            <option value="Sneakers">Sneakers</option>
                        </select>
                    </div>
                </div>

                <div class="form-input">
                    <label for="gambar"> Upload Gambar Produk : </label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                </div>

                <div class="form-input">
                    <button onclick="return confirm('Apakah anda yakin ?')" type="submit" name="submit" class="submit-button">Tambah</button>
                </div>
            </form>
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
    <script src="validasi_update.js"></script>
</body>
</html>