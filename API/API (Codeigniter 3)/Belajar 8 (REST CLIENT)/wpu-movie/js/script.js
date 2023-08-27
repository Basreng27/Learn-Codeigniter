function searchMovie(){
    $('#movie-list').html('')//setiap klik menghilangkan movie list

    $.ajax({ //lebih mudah membuat parameter object tetap sama seperti "$.getJSON()"
        url: 'http://www.omdbapi.com', //mengambil data server API 
        type: 'get',//untuk methodnya seperti "get,post,delete dll"
        dataType: 'json', //kembali data berupa apa? bisa "Json, text, xml, dll"
        data: {//mengirip data apa untuk "url" diatas //kalau data 1 bisa langsung masukan kalau lebih menggunakan object
            'apikey':'8ad78ccf',//API yang di dapatkan sebelumnya dari token
            's': $('#search-input').val()//data apa yang mau di cari "s" menamdakan search //"Val()" mengambil semua value di dalam "s"
        },
        success: function(result){ //"result" nama variabel
            if(result.Response == "True"){//"response" = data ada atau tidak
                let movies = result.Search //"result.Search" ada pada array file Json
                
                $.each(movies, function(index, data){
                    $('#movie-list').append(` 
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="`+ data.Poster +`" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">`+ data.title +`</h5>
                                <h5 class="card-title">`+ data.Year +`</h5>
                                <a href="#" class="card-link see-detail" data-toggle="modal" data-target="#s" data-id="`+ data.imdbID +`">See Detail</a>
                            </div>
                        </div>
                    </div>
                   `)// `` berfungsi gara bisa menyatukan string di enter //menambahkan "data-bs-toggle" dan "data-bs-target" untuk memunculkan detail saat di klik see detail
                })

                $('#search-input').val('')//untuk membuat setelah search menjadi kosong isinya
            }else{
                $('#movie-list').html('<h1 class="text-center">'+ result.Error +'</h1>')
            }
        } // jika data berhasil di kirim 
    })//link untuk API //"?" menambahkan parametera
}

//saat klik search
$('#search-button').on('click', function(){//saat mengklik button search
    searchMovie()
})

//searching menggunakan "enter"
$('#search-input').on('keyup', function(e){//"keyup" tombol dilepas atau tombol yang akan digunakan sebagai keinginan misal "enter" 
    if(e.keyCode === 13){//keycode enter yaitu "13" //untuk lebih lengkao bisa cari di "keycode.info" //keyCode atau which sama saja
        searchMovie()
    }
})

//saat data see detail di clik
$('#movie-list').on('click', '.see-detail', function(){
   // console.log($(this).data('id'))//untuk mengambil "data-id" di dalam see detail
   $.ajax({ //lebih mudah membuat parameter object tetap sama seperti "$.getJSON()"
        url: 'http://www.omdbapi.com', //mengambil data server API 
        type: 'get',//untuk methodnya seperti "get,post,delete dll"
        dataType: 'json', //kembali data berupa apa? bisa "Json, text, xml, dll"
        data: {//mengirip data apa untuk "url" diatas //kalau data 1 bisa langsung masukan kalau lebih menggunakan object
            'apikey':'8ad78ccf',//API yang di dapatkan sebelumnya dari token
            'i': $(this).data('id')//data apa yang mau di cari "s" menamdakan search //"Val()" mengambil semua value di dalam "s"
        },
        success: function(movie){
            if(movie.Response === "True"){ //jika id movie true atau benar
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="col-md-4">
                            <img src="`+ movie.Poster +`" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item"><h3>`+ movie.title +`</h3</li>
                                <li class="list-group-item">`+ movie.Released +`</li>
                                <li class="list-group-item">`+ movie.Genre +`</li>
                                <li class="list-group-item">`+ movie.Director +`</li>   
                                <li class="list-group-item">`+ movie.Actors +`</li>
                                </ul>
                        </div>
                    </div>
                `)
            }
        }
    })
})