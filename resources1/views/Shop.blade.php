<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique de Fleurs - Produits</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#e84c93',secondary:'#4a8b3b'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #e84c93;
            cursor: pointer;
        }
        
        input[type="range"]::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #e84c93;
            cursor: pointer;
            border: none;
        }
        
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type="number"] {
            -moz-appearance: textfield;
        }
        
        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        
        .checkmark {
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            position: relative;
        }
        
        .custom-checkbox input:checked ~ .checkmark {
            background-color: #e84c93;
            border-color: #e84c93;
        }
        
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            left: 7px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        
        .custom-select {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .custom-select-selected {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 14px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .custom-select-options {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 10;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 4px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
        }
        
        .custom-select-option {
            padding: 10px 14px;
            cursor: pointer;
        }
        
        .custom-select-option:hover {
            background-color: #f9f9f9;
        }
        
        .custom-pagination-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            cursor: pointer;
        }
        
        .custom-pagination-button.active {
            background-color: #e84c93;
            color: white;
        }
        
        .custom-pagination-button:hover:not(.active) {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
@include('UserNav')

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar filtres -->
            <div class="w-full md:w-72 shrink-0">
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-4">
                    <h2 class="text-xl font-semibold mb-6">Filtres</h2>
                    
                    <!-- Filtre par prix -->
                    <div class="mb-6">
                        <h3 class="font-medium mb-4">Prix</h3>
                        <div class="mb-4">
                            <input type="range" id="priceRange" min="0" max="200" value="100" class="w-full h-2 bg-gray-200 rounded-full appearance-none">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <span class="px-3 bg-gray-100 text-gray-500">€</span>
                                <input type="number" id="minPrice" value="0" min="0" max="200" class="w-16 py-2 px-2 border-none text-center">
                            </div>
                            <span class="text-gray-400">-</span>
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <span class="px-3 bg-gray-100 text-gray-500">€</span>
                                <input type="number" id="maxPrice" value="100" min="0" max="200" class="w-16 py-2 px-2 border-none text-center">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Filtre par occasion -->
                    <div class="mb-6">
                        <h3 class="font-medium mb-4">Occasion</h3>
                        <div class="space-y-3">
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" checked>
                                <span class="checkmark mr-3"></span>
                                <span>Anniversaire</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox">
                                <span class="checkmark mr-3"></span>
                                <span>Mariage</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox">
                                <span class="checkmark mr-3"></span>
                                <span>Saint-Valentin</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox">
                                <span class="checkmark mr-3"></span>
                                <span>Remerciement</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox">
                                <span class="checkmark mr-3"></span>
                                <span>Deuil</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Filtre par type -->
                    <div class="mb-6">
                        <h3 class="font-medium mb-4">Type de Fleurs</h3>
                        <div class="space-y-3">
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox">
                                <span class="checkmark mr-3"></span>
                                <span>Roses</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox" checked>
                                <span class="checkmark mr-3"></span>
                                <span>Tulipes</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox">
                                <span class="checkmark mr-3"></span>
                                <span>Lys</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox">
                                <span class="checkmark mr-3"></span>
                                <span>Orchidées</span>
                            </label>
                            <label class="custom-checkbox flex items-center">
                                <input type="checkbox">
                                <span class="checkmark mr-3"></span>
                                <span>Pivoines</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Filtre par catégorie -->
                    <div class="mb-6">
                        <h3 class="font-medium mb-4">Catégorie</h3>
                        <div class="custom-select">
                            <div class="custom-select-selected" id="categorySelect">
                                <span>Toutes les catégories</span>
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                            <div class="custom-select-options" id="categoryOptions">
                                <div class="custom-select-option" data-value="all">Toutes les catégories</div>
                                <div class="custom-select-option" data-value="bouquets">Bouquets</div>
                                <div class="custom-select-option" data-value="plants">Plantes</div>
                                <div class="custom-select-option" data-value="arrangements">Arrangements</div>
                                <div class="custom-select-option" data-value="gift-baskets">Paniers cadeaux</div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full py-3 bg-primary text-white font-medium rounded-button hover:bg-opacity-90 transition-colors whitespace-nowrap">Appliquer les filtres</button>
                </div>
            </div>
            
            <!-- Zone d'affichage des produits -->
            <div class="flex-1">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h1 class="text-2xl font-semibold mb-4 md:mb-0">Nos Fleurs <span class="text-gray-500 text-lg"></span></h1>
                 
                </div>
                
                <!-- Grille de produits -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Produit 1 -->
                     @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <div class="relative h-64">
                            <img src="{{ asset('storage/' . $product->product_image) }}">
                       
                        </div>
                        <div class="p-4">
                            <h3 class="font-medium text-lg mb-2">{{$product->product_name}}</h3>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-primary font-semibold">{{$product->prix}}</span>
                                <div class="flex">
                                    <i class="ri-star-fill text-yellow-400"></i>
                                    <i class="ri-star-fill text-yellow-400"></i>
                                    <i class="ri-star-fill text-yellow-400"></i>
                                    <i class="ri-star-fill text-yellow-400"></i>
                                    <i class="ri-star-half-fill text-yellow-400"></i>
                                </div>
                            </div>
                            <form action="{{route('Panier.store')}}"method="POST">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id">

                            <button class="w-full py-2 bg-primary text-white font-medium rounded-button hover:bg-opacity-90 transition-colors flex items-center justify-center gap-2 whitespace-nowrap">
                                <i class="ri-shopping-cart-2-line"></i>
                                Ajouter au panier
                            </button></form>
                        </div>
                    </div>
                    @endforeach
                    
                  
                </div>
                
                
                <!-- Pagination -->
                <div class="mt-10 flex justify-center">
                    <div class="flex items-center space-x-2">
                        <button class="custom-pagination-button border border-gray-200">
                            <i class="ri-arrow-left-s-line"></i>
                        </button>
                        <button class="custom-pagination-button active">1</button>
                        <button class="custom-pagination-button">2</button>
                        <button class="custom-pagination-button">3</button>
                        <span class="mx-1">...</span>
                        <button class="custom-pagination-button">8</button>
                        <button class="custom-pagination-button border border-gray-200">
                            <i class="ri-arrow-right-s-line"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>