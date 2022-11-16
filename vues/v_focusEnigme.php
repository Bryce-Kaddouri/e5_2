<div class="droit">
    <h1 class="repondre"></h1>
    <div class="repondreboite">
        <p class="message">
        <pre>
                <!-- le nombre de fois  ou l’on peut obtenir 974 avec les resultat de la division de 2056 par 3 ou 6 ou 9.
                Auteur : 
                Olivier sicard (olivier.sicard@mail.com) -->
                 <h1><?php echo $enigme['libelle'] ?></h1>
                 <h2>url : <?php echo $enigme['url'] ?></h2>
                    <h2>catégorie : <?php echo $enigme['categorie'] ?></h2>
                    <h2>thématique : <?php echo $enigme['thematique'] ?></h2>
                    <h2> difficulté : <?php echo $enigme['difficulte'] ?></h2>
                    <h2>contenu : <?php echo $enigme['contenu'] ?></h2>

            </pre>
        </p>
    </div>
    <button class="btnTestFlag" dt-idPartie="<?php echo 1; ?>" dt-idEquipe="<?php echo $idEquipe ?>" dt-numChallenge="<?php echo $enigme['numero'] ?>">Tester le flag</button>
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