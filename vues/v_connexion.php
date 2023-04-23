<div class="" >

<style>

    /* border radius coins inferieur droit et coin superieur gauche */
    .connexion {
        border-radius: 100 0 0 0;
        border: 2px solid #000;
        color: #fff;
        font-size: 1.2rem;
        font-weight: 600;
        padding: 0.5rem 1rem;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }
</style>


<div class="w-full h-screen p-8 bg-blue-600">
    <div class="h-1/6">
    <h1 class="text-2xl lg:text-6xl text-center">Connexion</h1>        

    </div>
<form method="post" action="index.php?uc=connexion&action=valideConnexion" class="bg-white h-3/4 lg:h-5/6 overflow-hidden rounded-bl-[25vh] rounded-tr-[25vh] lg:mx-32">
<div class="grid grid-cols-1 md:gap-8 md:grid-cols-2 overflow-hidden">
    <div class="m-4 h-full   ">
        <div class=" mx-4  py-8">
            <p class="underline mb-2">Identifiant :</p>
            
            <input class="w-full  px-8 rounded-md border-1 shadow-lg hover:border-2 border-black py-2 " placeholder="Entre votre pseudo" type="text" name="login">
        </div>
        <div class="mx-4  align-items">
            <p class="mx-4  underline py-4">Mot de passe :</p>
            <input class="px-8 w-full rounded-md border-1 shadow-lg hover:border-2 border-black py-2" type="password" name="mdp" placeholder="Entre votre mot de passe">
        </div>
        <div class="block md:flex py-8">
            <div class="md:w-1/2 mx-4">
            <input class="rounded-full w-full bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 " type="submit" value="Connexion">

            </div>
            <div class="h-8 md:hidden">

            </div>
            <div class="md:w-1/2 mx-4">

        <input class="rounded-full w-full bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 " type="submit" value="Tableau des scores">
            </div>

        </div>
    </div>
    <div>
        <div class="h-full  w-full overflow-hidden bg-red-500 hidden md:block">
            <img src="images/connexion.jpg" alt="" srcset="">
        </div>
    </div>
</div>
</form>
</div>
