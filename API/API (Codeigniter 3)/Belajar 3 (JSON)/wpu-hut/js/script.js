//sebuah metho untuk menyingkat "$.ajax"
function semua_menu(){
    $.getJSON('data/pizza.json', function(data){//mengambil data json
        let menu = data.menu;//sama seperti php mempersingkat
        //console.log(menu);//memanggil variabel menu
        
        //untuk melakukan looping terhadap object di jquery
        $.each(menu, function(index, data){ //"index" = jumlah data pada array //"data" = isi data array
            $('#daftar-menu').append('<div class="col-md-4"><div class="card mb-4"><img src="img/pizza/' + data.gambar + '" class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><h5 class="card-title">Rp.' + data.harga + ',-</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>') 
        })//"#" = id //menangkap id "daftar-menu" yang ada pad row di latihan2-javascript.html //"append" tambahkan di akhir //isi dari card dan hilangkan enternya
        //"data.gambar" = mengambil data json yang gambar
    });
}

//membuat tulisan berubah saat diclick di navbar
$('.nav-link').on('click', function(){
   // $('.nav-link').removeClass('active'); //menghilangkan class active yang pada ssat di hapus
    $(this).addClass('active'); //menambahkan class active pada saat di clik 

    let kategori = $(this).html(); //mengambil data htmlnya
    $('h1').html(kategori); //mengambil data dan dirubah dari h1

    if(kategori == 'All menu'){
        semua_menu();
        return;
    };

    $.getJSON('data/pizza.json', function(data){//ambil data json
        let menu = data.menu;
        let content = '';//isi data yang di pilih

        $.each(menu, function(index, data){//looping object 
            if(data.kategori == kategori.toLowerCase()){//"toLowerCase()" untuk memaksa mengacilkan semua string //menyeleksi data berdasarkan data json sarray "kategori" 
                //menambahkan data array sesuai kategori yang dipilih
                content += '<div class="col-md-4"><div class="card mb-4"><img src="img/pizza/' + data.gambar + '" class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><h5 class="card-title">Rp.' + data.harga + ',-</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>'
            }
        });

        // mencari id "daftar-menu"
        $('#daftar-menu').html(content)//"html()" mengganti apapun isinya
    });


});