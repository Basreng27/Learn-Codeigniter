//array
// let mahasiswa = {
//     nim : "1218022",
//     nama : "Rayandra Wandi Marselana",
//     email : "wandirayandra@gmail.com"
// }

// //merubah array ke json dalam javascript
// console.log(JSON.stringify(mahasiswa));

//==================================================================
//menggunakan ajax sederhana
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function(){
//     //mengecek ketika ajax siap
//     if(xhr.readyState == 4 && xhr.status == 200){
//         let mahasiswa = JSON.parse(this.responseText); //"JSON.parse()" merubah menjadi object
//         console.log(mahasiswa);
//     }
// }

// xhr.open('GET', 'coba.json', true);//method yang di pakai "GET", file yang di pakai "coba.json", jika asincronus pakai "true"
// xhr.send

//========================================================================
//menggunakan JQuery
$.getJSON('coba.json', function(data){
    console.log(data);
})//lakukan ajax untuk mengambil data JSON