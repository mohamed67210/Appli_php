<?php
// : démarrer une session sur le serveur pour l'utilisateur courant
session_start();

// $nombre_produit = count($_SESSION['products']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Ajouter nouveau produit</title>
</head>

<body>
    <header class="w-full h-10 flex  flex-row justify-around items-center bg-green-300 ">
        <ul class=" h-full flex flex-row justify-around items-center gap-5 text-white ">
            <a href="index.php" class="no-underline">
                <li class="w-40 text-center	rounded-sm bg-teal-300">index</li>
            </a>

            <a href="recap.php" class="no-underline">
                <li class="w-40 text-center	rounded-sm bg-teal-300">Panier</li>
            </a>
        </ul>
        <a class="w-40 text-center text-white rounded-sm bg-teal-300" href="recap.php" class="no-underline">
            <i class="fa-solid fa-basket-shopping "> <?php if (empty($_SESSION['products']))  {echo "vide";}else{ echo count($_SESSION['products']);} ?></i>
        </a>
    </header>
    <div class="w-full h-screen flex  flex-col justify-center items-center bg-green-200">
        <div class="w-full max-w-xs flex  flex-col justify-center items-center">
            <h1 class="text-xl">ajouter un produit</h1>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="traitement.php" method="POST">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nom du produit
                    </label>
                    <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                        Prix du produit
                    </label>
                    <input name="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="qtt">
                        Quantité
                    </label>
                    <input name="qtt" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="qtt" type="number" value="1">
                </div>
                <div class="flex flex-row items-center justify-center">
                    <input class=" cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit" value="Ajouter produit" />
                </div>
            </form>
        </div>
    </div>

</body>

</html>
<!-- <p>
    <label>Nom du produit <input type="text" name="name" /></label>
</p>
<p>
    <label>Prix du produit <input type="number" step="any" name="price" /></label>
</p>
<p>
    <label>Quantité <input type="number" value="1" name="qtt" /></label>
</p>
<p>
    <input type="submit" name="submit" value="Ajouter le produit" />
</p> -->