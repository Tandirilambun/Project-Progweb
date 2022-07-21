window.onload = function(){

	var	InsertFile = document.getElementById("form-insert");

	//Getting Path Data
	InsertFile.onsubmit = function(event){
		var input_nama_produk = document.getElementById("nama");
		var input_harga_produk = document.getElementById("harga");
		var input_deskripsi_produk = document.getElementById("deskripsi");
		var input_tags_produk = document.querySelectorAll(".tags:checked");

		var error_nama_produk = document.getElementsByClassName("error-msg")[0];
		var error_harga_produk = document.getElementsByClassName("error-msg")[1];
		var error_deskripsi_produk = document.getElementsByClassName("error-msg")[2];
		var error_tags_produk = document.getElementsByClassName("error-msg")[3];

		var valueTags = [];

		input_tags_produk.forEach(function(element){
			valueTags.push(element.value);
		});

		//Error Message
		if (input_nama_produk.value == "") {
			error_nama_produk.innerHTML = "Nama Produk Tidak Boleh Kosong !!!";
			event.preventDefault();
		}else{
				error_nama_produk.innerHTML = "";
			}

		if (input_harga_produk.value == "") {
			error_harga_produk.innerHTML = "Harga Produk Tidak Boleh Kosong !!!";
			event.preventDefault();
		}else{
			if (input_harga_produk.value == "0") {
				error_harga_produk.innerHTML = "Harga Produk Harus Lebih Dari 1 Rupiah !!!";
				event.preventDefault();	
			}else{
				error_harga_produk.innerHTML = "";	
			}
		}

		if (input_deskripsi_produk.value == "") {
			error_deskripsi_produk.innerHTML = "Deskripsi Produk Tidak Boleh Kosong !!!";
			event.preventDefault();
		}else{
			error_deskripsi_produk.innerHTML = "";	
		}
	}
}