<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesScore.css">
    <title>Tableau des scores</title>
</head>

<body style="background-color:rgba(52, 57, 111, 0.909);">
    <div style="margin:50px;text-align:center;font-size:40px;font-weight:bold;color:white;">
        <h1>Tableau des scores</h1>
    </div>
    <div style="margin-right:50px;margin-left:50px;background-color:#f8f8f8;border:1px solid #ccc;box-shadow:0 1px 1px rgba(0,0,0,.05);border-radius:4px;">
        <div style="display:flex">
            <p style="margin-left:10px;margin-right:20px;font-size:40px">Temps restant : </p><strong style="font-size:40px" id="minuteur"></strong>
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
        <a style="background-color:blue;color:white;font-size:30px;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;border-radius:15px;cursor:pointer;" href="index.php?uc=enigme&action=afficherEnigmes">Retour</a>

    </div>

    <script type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>

    <script>
        // chaque seconde on rafraichit le tableau
        setInterval(function() {
            $.ajax({
                type: "GET",
                url: "ajax/ajax.php",
                data: "action=tabScore",
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
                        body += '<td>' + response.partie[i].libelle + '</td>';
                        body += '<td>' + image + '</td>';
                        body += '<td>' + response.partie[i].scoreTotal + '</td>';
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