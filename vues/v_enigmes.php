
        <div class="w-full pl-4 bg-gray-800">
         
            <div class="w-full h-full  bg-green-500">
                <div class="bg-gray-900 p-4">
                    <p class="text-2xl text-white">Enigmes</p>
                </div>
                <div class="bg-indigo-500 grid grid-cols-1 h-96 overflow-y-auto">
            <?php 
                   
                   foreach ($enigmes as $enigme){
                   ?>

                     <a class="p-4 <?php echo $enigme['niveau'] ?>" href="index.php?uc=enigme&action=focusEnigme&numChallenge=<?php echo $enigme['numEnigme'] ?>"><?php echo $enigme['numEnigme'] ?> - <?php echo $enigme['libelle'] ?> (<?php echo $enigme['nbPoints'] ?> points)</a>
                   <?php 
                   }
                   foreach ($enigmesNonRes as $enigmeNonRes){
                    ?>
 
                      <a style="background-color:green" class="p-4"  ><?php echo $enigmeNonRes['numEnigme'] ?> - <?php echo $enigmeNonRes['libelle'] ?></a>
                    <?php 
                    }
                   
                   ?>
            </div>
            </div>
            
        </div>
        
        
    </div>

   
