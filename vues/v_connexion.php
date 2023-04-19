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
<form method="post" action="index.php?uc=connexion&action=valideConnexion" class="bg-white h-full lg:h-5/6 rounded-bl-[25vh] rounded-tr-[25vh] lg:mx-32">
<div class="grid grid-cols-1 md:gap-8 md:grid-cols-2">
    <div class="m-4 h-full   ">
        <div class=" mx-4  py-12">
            <p class="underline mb-2">Nom :</p>
            
            <input class=" px-8 rounded-md border-1 shadow-lg hover:border-2 border-black py-2" placeholder="Entre votre pseudo" type="text" name="login">
        </div>
        <div class="m-4 bg-red-500 align-items">
            <p class="mx-4  py-12">Mot de passe</p>
            <input class="px-8 rounded-md border-1 shadow-lg hover:border-2 border-black py-2" type="password" name="mdp" placeholder="Entre votre mot de passe">
        </div>
        <div class="mx-8">
        <input class="rounded-full bg-blue-600 hover:bg-blue-700 text-white px-5 py-2" type="submit" value="Connexion">

        </div>
    </div>
    <div>
        <div class="h-48 w-48 bg-red-500 hidden md:block">
        </div>
    </div>
</div>
</form>
</div>
