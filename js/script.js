$('.see-detail').on('click', function() {
    $('.movie-detail').html('')

    $('.movie-detail').append(`
        <div class="loading" style="text-align: center">
            <img src="images/loading.jpg" alt="loading">
            <h1 style="color: white">Loading, Please wait...</h1>
        </div>
    `)
    const id = $(this).data('id')

    $.ajax({
        url: 'http://restful-api-movie-theatre.herokuapp.com/movie/'+id,
        dataType: 'json',
        type: 'get',
        data: {
            token: ''
        },
        success: function(movie) {
            const data = movie.data
            if(movie.error === false) {
                $('.movie-detail').append(`
                    <div class="header-info">
                        <h1>${data.title}</h1>
                        <p class="age"><a href="#">All Age</a> ${data.actor}</p>
                        <p class="review">Rating	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;  ${data.rating}</p>
                        <p class="review reviewgo">Genre	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; ${data.genre}</p>
                        <p class="review">Release &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; ${data.release}</p>
                        <p class="special">${data.description}</p>
                        <a class="video" href="http://www.youtube.com" target="_blank"><i class="video1"></i>WATCH TRAILER</a>
                        <a class="book" href="seat.php?${data.title}&${data._id}"><i class="book1"></i>BOOK TICKET</a>
                `)

                $('.movie-detail').append(`
                    <div class="header" style="background: url(${data.poster}) no-repeat 300px 100px">
                `)            
            }
        },
        complete: function() {
            $('.loading').hide()
        }
    })

})