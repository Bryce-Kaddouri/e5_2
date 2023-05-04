<div class="grid grid-cols-4 md:hidden py-4 gap-4">
<?php
                foreach ($niveaux as $niv){
                    echo '
                    <div class="mx-auto">
                <a href="" class=" w-16 h-16 rounded-md bg-white" ><img class=" w-16 h-16"src="images/'.$niv['icone'].'" alt=""></a>
                <p class="text-center text-white">'.$niv['libelle'].'</p>
                </div>
        ';
                }
            ?>
</div>

<div class="mx-4  bg-gray-800 flex w-auto h-2/3">
        <div class="w-1/4 px-2 hidden md:block">
            <p class="mb-8 mt-4 text-white text-2xl">Difficultés</p>
            <?php
                foreach ($niveaux as $niv){
                    echo '
                    <div class="flex difficulte  h-20" dt-niveau="'.$niv['difficulte'].'">
                <a href="" class=" w-16 h-16 rounded-md bg-white" ><img class=" w-16 h-16"src="images/'.$niv['icone'].'" alt=""></a>
                <div class="rounded-md ml-4 h-16 w-full  bg-green-300">
                    <p class="text-center text-white pt-4 text-xl">'.$niv['libelle'].'</p>
                </div>
            </div>';
                }
            ?>
           
        </div>