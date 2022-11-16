<div class="droit">
            <nav>
                <label for="btn" class="button">Enigmes
                <span class="fas fa-caret-down"></span>
                </label>
                <input type="checkbox" id="btn">
               
                <ul class="menu">
                <div class="scroller">
                    <?php 
                   
                    foreach ($enigmes as $enigme){
                    ?>

                        <li><a href="index.php?uc=enigme&action=focusEnigme&numChallenge=<?php echo $enigme['numero'] ?>"><?php echo $enigme['numero'] ?> - <?php echo $enigme['libelle'] ?></a></li>
                    <?php 
                    }
                    ?>
                </div>
                
                </ul>
             </nav>
        </div>  
    <a href="" class="containboutton"><p class="textretour">Retour</p></a>