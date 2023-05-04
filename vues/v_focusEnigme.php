

<div class="w-full pl-4 bg-gray-800">
         
         <div class="w-full h-full  bg-green-500">
             <div class="bg-gray-900 p-4">
                 <p class="text-2xl text-white">Enigmes</p>
             </div>
             <div class="bg-indigo-500 grid grid-cols-1 h-96 overflow-y-auto p-4">
             <h1><?php echo $enigme['libelle'] ?></h1>
                 <h2>url : <?php echo $enigme['url'] ?></h2>
                    <h2>catégorie : <?php echo $enigme['niveau'] ?></h2>
                    <h2>thématique : <?php echo $enigme['thematique'] ?></h2>
                    <h2> difficulté : <?php echo $enigme['difficulte'] ?></h2>
                    <h2>contenu : <?php echo $enigme['contenu'] ?></h2>
                    <button class="btnTestFlag bg-red-500 rounded-md hover:shadow-lg m-4" dt-idPartie="<?php echo 1; ?>" dt-idEquipe="<?php echo $idEquipe ?>" dt-numChallenge="<?php echo $enigme['numEnigme'] ?>">Tester le flag</button>

            </div>
         </div>
         
     </div>
     
     
 </div>





<script>
    $(document).ready(function() {
        $(".btnTestFlag").click(function() {
            var numChallenge = $(this).attr("dt-numChallenge");
            var idEquipe = $(this).attr("dt-idEquipe");
            var idPartie = $(this).attr("dt-idPartie");

            swal.fire({
                title: 'Saisir le flag',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Valider',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    $.ajax({
                        url: "ajax/ajax.php",
                        type: "POST",
                        data: {
                            action: "testFlag",
                            flag: login,
                            numChallenge: numChallenge
                        },
                        success: function(data) {
                            if (data == 'true') {
                                swal.fire({
                                    title: 'Bravo ! ',
                                    text: 'Vous avez trouvé la bonne réponse',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: "ajax/ajax.php",
                                            type: "POST",
                                            data: {
                                                action: "addPoint",
                                                idPartie: idPartie,
                                                numChallenge: numChallenge,
                                                idEquipe: idEquipe
                                            },
                                            success: function(data) {
                                                swal.fire({
                                                    text: 'Vous avez gagné ' + data + ' points',
                                                    html: '<img src="images/trophyWin.GIF" alt="gif" width="80%" height="90%">',
                                                    confirmButtonText: 'OK',
                                                    background: '#6766A9',
                                                    timer: 5000
                                                }).then((result) => {
                                                    window.location.href = "index.php?uc=enigme&action=afficherEnigmes";

                                                })
                                                // reload #tabScore
                                                // $('.enigme' + idEnigme).css('background', 'green');

                                            }
                                        });
                                    }
                                })
                            } else {
                                swal.fire({
                                    title: 'Mauvaise réponse',
                                    icon: 'error',
                                    text: 'Vous avez trouvé la mauvaise réponse',
                                    confirmButtonText: 'OK'
                                })
                            }
                        }
                    });
                },
                allowOutsideClick: () => !swal.isLoading()
            })
        });
    });
</script>