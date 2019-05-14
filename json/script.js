// // JSON menggunakan javascript
// let mahasiswa = {
//     nama: "cahya",
//     nim: "212122",
//     email: "cahya@"
// }


// // mengubah object menjadi json mengunakan JSON.stringify
// console.log(JSON.stringify(mahasiswa));



// // mangunakan ajax
// let ajax = new XMLHttpRequest();
// ajax.onreadystatechange = function () {
//     if (ajax.readyState == 4 && ajax.status == 200) {
//         // JSON.parse untuk menjadikan object
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);

//     }
// }

// // menjalankan ajax
// ajax.open('GET', 'coba.json', true);
// ajax.send();










// dengan jquery
$.getJSON('coba.json', function (data) {
    console.log(data);

});