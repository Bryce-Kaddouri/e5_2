
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesScore.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Selectionner une partie</title>
</head>

<body style="background-color:rgba(52, 57, 111, 0.909);" class="mx-4 w-auto my-4 ">
<!-- <input type="text" id="numSession" hidden value="<?php echo $numSession;?>"> -->
    <div class="w-full bg-red-500 mb-4 mx-auto ">
        <h1 class="text-2xl md:text-4xl lg:text-6xl py-4 text-center">Choisir une partie</h1>
    </div>
   <div class="bg-white w-auto mx-4 p-4 md:flex">
    <p class="mr-4">Selctionner une partie :</p>
    <select  class="border-2 border-gray-900 w-48" name="numSession" id="numSession">
        <option value="">Choisir une partie</option>
    </select>
   </div>
   <div id="blockEquipe" class=" hidden bg-white mx-4 w-auto p-4">
    <h2 class="text-2xl">Liste des équipes :</h2>
    <div id="contentEquipe">

    </div>
   
   </div>
   <div id="lstBtn" class="bg-gray-800 mx-4 py-4 my-4 grid grid-cols-1 gap-4">
   <button id="btnTab" class="mx-12 px-8 py-2 bg-blue-400 hover:bg-blue-600 rounded-md shadow-lg hover:text-white hidden">Tableau des scores</button>
        <button onclick="window.location.href='index.php'" class=" mx-12 px-8 py-2 bg-blue-400 hover:bg-blue-600 rounded-md shadow-lg hover:text-white">Retour a l'accueil</button>

    </div>
   <script type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>

   <script>
    $(document).ready(function () {

        var html = "";

        $.ajax({
            type: "POST",
            url: "ajax/ajax.php",
            data: "action=choixPartie",
            dataType: "json",
            success: function (response) {
                console.log(response.session.length);
                for (var i = 0; i < response.session.length; i++) {
                    console.log(response.session[i].numSession);
                    html += "<option value='" + response.session[i].numSession + "'>Partie n°" + response.session[i].numSession + " ("+response.session[i].dateDebut +" - "+response.session[i].dateFin +")</option>";
                    console.log(html);
                }

                $("#numSession").html('<option value="">Choisir une partie</option>' + html);


               
            }
        });

        $('#numSession').on('change', function () {
            if(this.value != ""){
                $('#blockEquipe').removeClass('hidden');
                $.ajax({
                    type: "POST",
                    url: "ajax/ajax.php",
                    data: "action=getEquipeByPartie&numSession=" + this.value,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        var html = "";
                        for (var i = 0; i < response.equipe.length; i++) {
                            html += "<div class='bg-white w-auto mx-4 md:flex'>";
                            html += "<p>Equipe n°" + response.equipe[i].equipeID + " : " + response.equipe[i].login + "</p>";
                            html += "</div>";
                        }
                        $("#contentEquipe").html(html);
                        $("#btnTab").removeClass('hidden');
                    }
                });
            }else{
                $('#blockEquipe').addClass('hidden');
                $("#btnTab").addClass('hidden');
            }

        });

        $('#btnTab').on('click', function () {
            window.location.href = "tabScore.php?numSession="+$('#numSession').val();
        });
    });
   </script>
</body>

</html>
