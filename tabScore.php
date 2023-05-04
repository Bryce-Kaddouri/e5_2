<?php 
if (!isset($_REQUEST['numSession'])  || empty($_REQUEST['numSession'])) {
    header('Location: choixPartie.php');
    exit();
} else {
    $numSession = $_REQUEST['numSession'];

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesScore.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Tableau des scores</title>
</head>

<body style="background-color:rgba(52, 57, 111, 0.909);" class="mx-4 w-auto my-4 ">
<input type="text" id="numSession" hidden value="<?php echo $numSession;?>">
    <div class="w-full bg-red-500 mb-4 mx-auto ">
        <h1 class="text-2xl md:text-4xl lg:text-6xl py-4 text-center">Tableau des scores</h1>
    </div>
    <div class="bg-white">
        <div class="mx-auto text">
           <p class=" text-6xl text-center" id="minuteur"></p>
        </div>
    </div>
    <table class="container">
        <thead>
            <tr>
                <th>
                    <h1>Position</h1>
                </th>
                <th>
                    <h1>Nom d'équipe</h1>
                </th>
                <th>
                    <h1>Badge</h1>
                </th>
                <th>
                    <h1>Scores</h1>
                </th>
            </tr>
        </thead>
        <tbody class="tabScore">
        </tbody>
        </div>
    </table>

    </div>
    <div style="margin-top:75px;align-items:center;justify-content:center;display:flex">
        <a style="background-color:blue;color:white;font-size:30px;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;border-radius:15px;cursor:pointer;" href="choixPartie.php">Retour</a>

    </div>

    <script type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>

    <script>
        // chaque seconde on rafraichit le tableau
        setInterval(function() {
            $.ajax({
                type: "GET",
                url: "ajax/ajax.php",
                data: "action=tabScore&numSession=" + $('#numSession').val(),
                dataType: "json",
                success: function(response) {
                    console.log(response.minuteur.time);
                    console.log(response);
                    $('#minuteur').empty();
                    $('#minuteur').append(response.minuteur.time);

                    $('.tabScore').empty();
                    var body = '';
                    for (var i = 0; i < response.partie.length; i++) {
                        var color = 'grey';
                        var image = '';
                        if (i == 0) {
                            var image = '<img id="premier" src="images/college.png" alt="">';
                            var color = '#70c17b';
                        } else if (i == 1) {
                            image = '<img id="deuxieme" src="images/silver-medal.png" alt="">';
                            color = '#f2e783';
                        } else if (i == 2) {
                            image = '<img id="troisieme" src="images/medal.png" alt="">';
                            var color = '#fecb7e';
                        }
                        body += '<tr style="background-color:' + color + ';font-size:25px" >';
                        body += '<td > #' + (i + 1) + '</td>';
                        body += '<td>' + response.partie[i].login + '</td>';
                        body += '<td>' + image + '</td>';
                        body += '<td>' + response.partie[i].score + '</td>';
                        body += '</tr>';
                    }
                    $('.tabScore').append(body);
                    $('.tabScore tr').css('border', '2px solid black');
                    $('.tabScore tr').css('border', '2px solid black');
                }
            });
        }, 1000);
    </script>
</body>

</html>