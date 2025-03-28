<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <title>Ajouter un Nouveau Produit | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet">    <script src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1"></script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000" data-border-radius="small"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-white border-b border-gray-200">            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">                        <div class="flex-shrink-0 flex items-center">
                                       </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="#" class="border-custom text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">                                Tableau de bord
                            </a>
                        </div>
                    </div>                    <div class="flex items-center">
                        <button type="button" class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none">                            <span class="sr-only">Voir les notifications</span>
                            <i class="fas fa-bell text-xl"></i>
                        </button>
                        <div class="ml-3 relative">
                            <div>
                                <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none" id="user-menu-button">                                                                  </button>
                            </div>
                        </div>
                    </div>                </div>
            </div>
        </nav>

        <div class="flex-grow flex">
            <div class="hidden md:flex md:w-64 md:flex-col">                <div class="flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">                        <div class="flex items-center flex-shrink-0 px-4">
                            <h2 class="text-lg font-semibold text-gray-900">Administration</h2>
                        </div>
                        <nav class="mt-5 flex-1 px-2 bg-white space-y-1">
                            <a href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">                                <i class="far fa-plus-square mr-3 text-gray-500"></i>
                                Ajouter un produit
                            </a>                            <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">                                <i class="far fa-list-alt mr-3 text-gray-400"></i>
                                Liste des produits
                            </a>   
                            <a href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">                                <i class="far fa-plus-square mr-3 text-gray-500"></i>
                                gestion  users 
                            </a>                       </nav>
                    </div>
                </div>
            </div>

            <div class="flex-1 flex flex-col">                <main class="flex-1">
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">                            <div class="flex items-center justify-between">
                                <h1 class="text-2xl font-semibold text-gray-900">Ajouter un Nouveau Produit</h1>
                                <button class="!rounded-button bg-custom px-4 py-2 text-white text-sm font-medium hover:bg-indigo-700">                                    Retour au tableau de bord
                                </button>
                            </div>      
                            <!-- /resources/views/post/create.blade.php -->



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->                      <div class="mt-8">
                                <form action="{{route('store')}}"  enctype="multipart/form-data"method="POST" class="space-y-6 bg-white shadow-sm rounded-lg p-6">                                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                @csrf  <div class="sm:col-span-4">                                            <label for="product_name" class="block text-sm font-medium text-gray-700">
                                                Nom du produit
                                            </label>                                            <div class="mt-1">
                                                <input type="text" name="product_name" id="product_name" class="!rounded-button shadow-sm block w-full sm:text-sm border-gray-300 focus:ring-custom focus:border-custom" placeholder="Ex: Bouquet de Roses Rouges">                                            </div>
                                        </div>

                                        <div class="sm:col-span-6">                                            <label for="description" class="block text-sm font-medium text-gray-700">
                                                Description
                                            </label>                                            <div class="mt-1">
                                                <textarea id="description" name="product_description" rows="4" class="!rounded-button shadow-sm block w-full sm:text-sm border border-gray-300 focus:ring-custom focus:border-custom" placeholder="Décrivez votre produit en détail..."></textarea>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">                                            <label for="price" class="block text-sm font-medium text-gray-700">
                                                Prix (€)
                                            </label>                                            <div class="mt-1">
                                                <input type="number" name="product_prix" id="price" class="!rounded-button shadow-sm block w-full sm:text-sm border-gray-300 focus:ring-custom focus:border-custom" placeholder="0.00">                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">                                            <label for="stock" class="block text-sm font-medium text-gray-700">
                                                Stock
                                            </label>                                            <div class="mt-1">
                                                <input type="number" name="product_stock" id="stock" class="!rounded-button shadow-sm block w-full sm:text-sm border-gray-300 focus:ring-custom focus:border-custom" placeholder="0">                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">                                            <label for="flower_type" class="block text-sm font-medium text-gray-700">
                                                Type de fleur
                                            </label>                                            <div class="mt-1">
                                                <select id="flower_type" name="type_id" class="!rounded-button shadow-sm block w-full sm:text-sm border-gray-300 focus:ring-custom focus:border-custom">                                                    <option>Roses</option>
                                                    @foreach  ($types as $type) <option value=" {{$type->id}}">{{$type->type_name}}</option> @endforeach
                                                    <option>Lys</option>
                                                    <option>Orchidées</option>
                                                </select>
                                            </div>
                                        </div>                                        <div class="sm:col-span-3">
                                            <label for="occasion" class="block text-sm font-medium text-gray-700">                                                Occasion
                                            </label>
                                            <div class="mt-1">       
                                     <select id="occasion" name="occassion" class="!rounded-button shadow-sm block w-full sm:text-sm border-gray-300 focus:ring-custom focus:border-custom">  
                                     <option value=""></option>  
                                                <option>Anniversaire</option>
                                                   
                                                                                         <option value="Mariage" name="">Mariage</option>
                                                    <option value="Saint-Valentin">Saint-Valentin</option>
                                                    <option value="Deuil">Deuil</option>
                                                </select>
                                            </div>
                                        </div>                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">                                                Photos du produit
                                            </label>
                                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed !rounded-button">                                                <div class="space-y-1 text-center">
                                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-custom hover:text-indigo-500">                                                            <span>Télécharger un fichier</span>
                                                            <input id="file-upload" name="product_image" type="file" class="sr-only" >                                                        </label>
                                                      
                                                    </div>
                                                                                                   </div>
                                            </div>
                                        </div>                                        
                                        <div class="sm:col-span-6">
                                            <!-- <label class="block text-sm font-medium text-gray-700">                                                Options de livraison
                                            </label> -->
                                            <!-- <div class="mt-2 space-y-4">                                                <div class="flex items-center">
                                                    <input id="delivery_standard" name="delivery_options" type="checkbox" class="h-4 w-4 text-custom border-gray-300 !rounded-button">                                                    <label for="delivery_standard" class="ml-3 text-sm text-gray-700">
                                                        Livraison standard (2-3 jours)
                                                    </label>                                                </div>
                                                <div class="flex items-center">                                                    <input id="delivery_express" name="delivery_options" type="checkbox" class="h-4 w-4 text-custom border-gray-300 !rounded-button">                                                    <label for="delivery_express" class="ml-3 text-sm text-gray-700">
                                                        Livraison express (24h)
                                                    </label>                                                </div>
                                            </div> -->
                                        </div>                                    </div>

                                    <div class="pt-5">
                                        <div class="flex justify-end">                                            <button type="button" class="!rounded-button bg-white py-2 px-4 border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50">                                                Annuler
                                            </button>
                                            <button type="submit" class="!rounded-button ml-3 bg-custom py-2 px-4 border border-transparent text-sm font-medium text-white hover:bg-indigo-700">                                                Ajouter le produit
                                            </button>
                                        </div>                                    </div>
                                </form>
                            </div>
                        </div>                    </div>
                </main>
            </div>
        </div>

        <footer class="bg-white">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">                <div class="flex justify-center space-x-6 md:order-2">
                    <a href="#" class="text-gray-400 hover:text-gray-500">                        <span class="sr-only">Support</span>
                        <i class="far fa-question-circle"></i>
                    </a>                </div>
                <div class="mt-8 md:mt-0 md:order-1">
                    <p class="text-center text-base text-gray-400">                        &copy; 2024 Fleuriste Admin. Tous droits réservés.
                    </p>
                </div>
            </div>        </footer>
    </div>
</body>
</html>