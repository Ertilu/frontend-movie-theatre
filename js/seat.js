let uri = decodeURIComponent(window.location.search)
uri = uri.substring(1)
let arr = uri.split('&')
let movie_name = arr[0]
let movie_id = arr[1]
console.log(arr)

let theatre = ''
$.ajax({
    url: 'http://restful-api-movie-theatre.herokuapp.com/hall',
    dataType: 'json',
    type: 'get',
    data: {
        token: ''
    },
    success: function(hall) {
        theatre = hall.data[0].name
    },
})

function onLoaderFunc() {
    $(".seatStructure *").prop("disabled", true);
    $(".displayerBoxes *").prop("disabled", true);
}

function takeData() {
    if (($("#Numseats").val().length == 0)) {
        alert("Please Enter your Name and Number of Seats");
    } else {
        $(".inputForm *").prop("disabled", true);
        $(".seatStructure *").prop("disabled", false);
        document.getElementById("notification").innerHTML =
            "<b style='margin-bottom:0px;background:#ff9800;letter-spacing:1px;'>Please Select your Seats NOW!</b>";
    }
}

function updateTextArea(user, user_id) {
    if ($("input:checked").length == ($("#Numseats").val())) {
        $(".seatStructure *").prop("disabled", true);

        var allNameVals = [];
        var allNumberVals = [];
        var allSeatsVals = [];
        let allSeatsId = [];

        //Storing in Array
        allNameVals.push($("#Username").val());
        allNumberVals.push($("#Numseats").val());
        $('#seatsBlock :checked').each(function () {
            allSeatsVals.push($(this).val());
        });

        const date = '1 November 2019'

        $('#table').append(`
            <table class="Displaytable w3ls-table" width="100%">
            <h1>Your Ticket : </h1>
                <tr>
                    <th>Name</th>
                    <th>Number of Seats</th>
                    <th>Seats</th>
                    <th>Date Played</th>
                    <th>Movie Name</th>
                    <th>Theatre Location</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>
                        ${user}
                    </td>
                    <td>
                        ${allNumberVals}
                    </td>
                    <td>
                        ${allSeatsVals}
                    </td>
                    <td>
                        ${date}
                    </td>
                    <td>
                        ${movie_name}
                    </td>
                    <td>
                        ${theatre}
                    </td>
                    <td>
                        ${30000 * parseInt(allNumberVals)}
                    </td>
                </tr>
            </table>
            <h2>Congratulations. Your ticket has been insterted to database you see that here restful-api-movie-theatre.herokuapp.com/ticket</h2>
            <h2>Thanks for buying ticket in Kota Digivice. See you in the theatre :)</h2>
            <a href="index.php" class="back">Back to homepage</a>
        `)

        allNumberVals.push($("#Numseats").val());
        $('#seatsBlock :checked').each(function () {
            allSeatsId.push($(this).data('id'));
        });

        $.ajax({
            url: 'http://restful-api-movie-theatre.herokuapp.com/ticket',
            dataType: 'json',
            type: 'post',
            data: {
                name: user,
                user_id: user_id,
                date_played: date,
                movie_id: movie_id,
                seat_id: allSeatsId[0],
                hall_id: '5db864cca581fb0017867cc1',
                person: allNumberVals[0],
                price: 30000 * parseInt(allNumberVals)
            },
            success: function(data) {
                console.log(data)
            },
        })

        alert('buy ticket success')
    } else {
        alert("Please select " + ($("#Numseats").val()) + " seats")
    }
}


function myFunction() {
    alert($("input:checked").length);
}

$(":checkbox").click(function () {
    if ($("input:checked").length == ($("#Numseats").val())) {
        $(":checkbox").prop('disabled', true);
        $(':checked').prop('disabled', false);
    } else {
        $(":checkbox").prop('disabled', false);
    }
});