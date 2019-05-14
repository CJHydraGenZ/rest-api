function tampilMenu() {
    $('#daftar-menu').html('');

    $.getJSON('data/pizza.json', function (data) {
        // menguba menjadi object
        let menu = data.menu;

        // melakukan looping terhadap object
        $.each(menu, function (index, data) {
            $('#daftar-menu').append('<div class="col-md-4"><div class="card mb-3"><img src="img/menu/' + data.gambar + '"class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><h5 class="card-title">Rp.' + data.harga + '</h5><a href="#" class="btn btn-primary">PEsan Sekarang</a></div></div></div>');

        })


    });
}

tampilMenu();


$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    // khusus yang di click
    $(this).addClass('active');
    // ambil isi dari html
    let kategori = $(this).html();
    $('h1').html(kategori);



    if (kategori == 'All Menu') {
        tampilMenu();
        return;
    }


    $.getJSON('data/pizza.json', function (data) {
        let menu = data.menu;
        let content = '';

        $.each(menu, function (i, data) {
            if (data.kategori == kategori.toLowerCase()) {
                content += '<div class="col-md-4"><div class="card mb-3"><img src="img/menu/' + data.gambar + '"class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><h5 class="card-title">Rp.' + data.harga + '</h5><a href="#" class="btn btn-primary">PEsan Sekarang</a></div></div></div>';
            }
        });

        $('#daftar-menu').html(content);
    })


});