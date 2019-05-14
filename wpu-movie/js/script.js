function seacrhMovie() {
    // untuk me respres
    $('#movie-list').html('');

    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': '3b1c489',

            // parameter pencarian
            's': $('#search-input').val()
        },
        success: function (res) {
            // di liat di console.log();

            if (res.Response == "True") {
                // mengambil array object
                let movies = res.Search;
                // console.log(movies);

                $.each(movies, function (i, data) {
                    $('#movie-list').append(`
                  <div class="col-md-4"
                      <div class="card mb-3">
                      <img src="` + data.Poster + `" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">` + data.Title + `</h5>
                          <h6 class="card-subtitle mb-2 text-muted">` + data.Year + `</h6>
                          <a href="#" class="card-link see-detail" data-toggle="modal" data-target="#exampleModal" data-id="` + data.imdbID + `">See Detail</a>
                      </div>
                      </div>
                  <div>
                      `)
                });
                // untuk mengosongkan input
                $('#search-input').val('');

            } else {
                $('#movie-list').html(`
                  <div class="col">
                      <h1 class="text-center">` + res.Error + `</h1>
                  </div>
                  `)
            }

        }
    });
}

$('#search-button').on('click', function () {
    // $.getJSON('http://omdbapi.com?apikey=3b1c489')
    seacrhMovie();

});
// untuk ketika tombol enter di click
$('#search-input').on('keyup', function (e) {
    if (e.keyCode == 13) {
        seacrhMovie();
    }
});

// $('.see-detail').on('click', function () {
//     // untuk mangambil data di see detail
//     console.log($(this).data('id'));

// })
// untuk mengatasi error
$('#movie-list').on('click', '.see-detail', function () {
    // untuk mangambil data di see detail
    // console.log($(this).data('id'));

   

    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': '3b1c489',
            'i': $(this).data('id')
        },
        success: function (movie) {
            if (movie.Response === "True") {
                let Rating = movie.Ratings[0];


                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="` + movie.Poster + `"class="img-fluid">
                            </div>
                            <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item"<h3>` + movie.Title + `<h3></li>
                                <li class="list-group-item">Released :` + movie.Released + `</li>
                                <li class="list-group-item">Genre :` + movie.Genre + `</li>
                                <li class="list-group-item">Diretor :` + movie.Director + `</li>
                                <li class="list-group-item">Diretor :` + movie.Actors + `</li>
                                <li class="list-group-item">Source :` + Rating.Source + `</li>
                                <li class="list-group-item">Rating :` + Rating.Value + `</li>
                                
                                
 
                            </ul>
                            </div>
                        </div>
                    </div>
                `);
            }
        }
    })

})



