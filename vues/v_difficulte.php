<div class="mx-4 bg-gray-800 flex w-auto h-2/3">
        <div class="w-1/4 px-2">
            <p class="mb-8 mt-4 text-white text-2xl">Difficultés</p>
            <?php
                foreach ($niveaux as $niv){
                    echo '
                    <div class="flex difficulte  h-20" dt-niveau="'.$niv['niveau'].'">
                <a href="" class=" w-16 h-16 rounded-md bg-white" ><img class=" w-16 h-16"src="images/maths.png" alt=""></a>
                <div class="rounded-md ml-4 h-16 w-full  bg-green-300">
                    <p class="text-center text-white pt-4 text-xl">'.$niv['niveau'].'</p>
                </div>
            </div>';
                }
            ?>
            <!-- <div class="flex   h-20">
                <a href="" class=" w-16 h-16 rounded-md bg-white" ><img class=" w-16 h-16"src="images/maths.png" alt=""></a>
                <div class="rounded-md ml-4 h-16 w-full  bg-green-300">
                    <p class="text-center text-white pt-4 text-xl">Facile</p>
                </div>
            </div>
            <div class="flex   h-20">
                <a href="" class=" w-16 h-16 rounded-md bg-white" ><img class=" w-16 h-16"src="images/maths.png" alt=""></a>
                <div class="rounded-md ml-4 h-16 w-full  bg-green-300">
                    <p class="text-center text-white pt-4 text-xl">Facile</p>
                </div>
            </div>
            <div class="flex   h-20">
                <a href="" class=" w-16 h-16 rounded-md bg-white" ><img class=" w-16 h-16"src="images/maths.png" alt=""></a>
                <div class="rounded-md ml-4 h-16 w-full  bg-green-300">
                    <p class="text-center text-white pt-4 text-xl">Facile</p>
                </div>
            </div>
            <div class="flex   h-20">
                <a href="" class=" w-16 h-16 rounded-md bg-white" ><img class=" w-16 h-16"src="images/maths.png" alt=""></a>
                <div class="rounded-md ml-4 h-16 w-full  bg-green-300">
                    <p class="text-center text-white pt-4 text-xl">Facile</p>
                </div>
            </div> -->
        </div>