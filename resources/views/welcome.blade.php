<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleurs Élégantes - Boutique en ligne</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#e84393',secondary:'#6c5ce7'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Poppins', sans-serif;
        }
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }
        .hero-section {
            background-image: url('https://readdy.ai/api/search-image?query=A%20beautiful%20and%20elegant%20floral%20arrangement%20with%20soft%20pink%20and%20white%20roses%2C%20peonies%2C%20and%20delicate%20greenery.%20The%20background%20is%20light%20and%20airy%20with%20a%20soft%20gradient%2C%20creating%20a%20romantic%20and%20dreamy%20atmosphere.%20The%20lighting%20is%20soft%20and%20natural%2C%20highlighting%20the%20delicate%20petals%20and%20creating%20a%20sense%20of%20freshness%20and%20beauty.%20The%20composition%20is%20balanced%20and%20artistic%2C%20perfect%20for%20a%20flower%20shop%20hero%20image.&width=1600&height=800&seq=1&orientation=landscape');
            background-size: cover;
            background-position: center;
        }
        .hero-content {
            background-color: rgba(255, 255, 255, 0.85);
        }
        .category-card:hover .category-overlay {
            opacity: 1;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .custom-checkbox {
            position: relative;
            cursor: pointer;
        }
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 2px solid #e2e8f0;
            border-radius: 4px;
        }
        .custom-checkbox:hover input ~ .checkmark {
            border-color: #e84393;
        }
        .custom-checkbox input:checked ~ .checkmark {
            background-color: #e84393;
            border-color: #e84393;
        }
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        .custom-checkbox .checkmark:after {
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="#" class="text-3xl font-['Pacifico'] text-primary">logo</a>
            
            <nav class="hidden md:flex space-x-8">
                <a href="#" class="text-gray-800 hover:text-primary font-medium transition">Accueil</a>
                <a href="#" class="text-gray-600 hover:text-primary font-medium transition">Boutique</a>
                <a href="#" class="text-gray-600 hover:text-primary font-medium transition">Catégories</a>
                <a href="#" class="text-gray-600 hover:text-primary font-medium transition">À propos</a>
                <a href="#" class="text-gray-600 hover:text-primary font-medium transition">Contact</a>
            </nav>
            
            <div class="flex items-center space-x-4">
                <div class="relative w-10 h-10 flex items-center justify-center">
                    <i class="ri-search-line text-gray-600 hover:text-primary transition cursor-pointer"></i>
                </div>
                <div class="relative w-10 h-10 flex items-center justify-center">
                    <i class="ri-user-line text-gray-600 hover:text-primary transition cursor-pointer"></i>
                </div>
                <div class="relative w-10 h-10 flex items-center justify-center">
                    <i class="ri-heart-line text-gray-600 hover:text-primary transition cursor-pointer"></i>
                    <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                </div>
                <div class="relative w-10 h-10 flex items-center justify-center">
                    <i class="ri-shopping-cart-line text-gray-600 hover:text-primary transition cursor-pointer"></i>
                    <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                </div>
                <button class="md:hidden w-10 h-10 flex items-center justify-center">
                    <i class="ri-menu-line text-gray-600 text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section w-full relative">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="container mx-auto px-4 py-20 md:py-32 relative z-10">
            <div class="hero-content max-w-lg p-8 md:p-12 rounded-lg">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Découvrez la Beauté Naturelle</h1>
                <p class="text-lg text-gray-700 mb-8">Des fleurs fraîches et arrangements floraux pour toutes les occasions. Livraison le jour même disponible.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="bg-primary text-white px-8 py-3 rounded-button font-medium hover:bg-opacity-90 transition shadow-md whitespace-nowrap">Découvrir</button>
                    <button class="bg-white text-primary px-8 py-3 rounded-button font-medium border border-primary hover:bg-gray-50 transition whitespace-nowrap">Notre Collection</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Nos Catégories</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Explorez notre sélection de fleurs magnifiques organisées par catégories pour trouver facilement ce que vous cherchez.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Category 1 -->
                <div class="category-card rounded-lg overflow-hidden shadow-md relative group">
                    <img src="https://readdy.ai/api/search-image?query=A%20beautiful%20bouquet%20of%20fresh%20roses%20in%20various%20shades%20of%20pink%20and%20red%2C%20arranged%20elegantly%20with%20some%20greenery%20and%20babys%20breath.%20The%20bouquet%20is%20photographed%20against%20a%20clean%2C%20light%20background%20that%20highlights%20the%20vibrant%20colors%20of%20the%20roses.%20The%20lighting%20is%20soft%20and%20natural%2C%20creating%20a%20romantic%20and%20elegant%20atmosphere.&width=600&height=400&seq=2&orientation=landscape" 
                         alt="Roses" class="w-full h-64 object-cover object-top transition duration-300 transform group-hover:scale-105">
                    <div class="category-overlay absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 transition duration-300">
                        <div class="text-center p-4">
                            <h3 class="text-white text-xl font-bold mb-2">Roses</h3>
                            <a href="#" class="inline-block bg-white text-primary px-4 py-2 rounded-button font-medium hover:bg-gray-100 transition whitespace-nowrap">Voir Plus</a>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 p-3">
                        <h3 class="text-gray-900 font-bold text-lg">Roses</h3>
                    </div>
                </div>
                
                <!-- Category 2 -->
                <div class="category-card rounded-lg overflow-hidden shadow-md relative group">
                    <img src="https://readdy.ai/api/search-image?query=A%20stunning%20bouquet%20of%20mixed%20tulips%20in%20vibrant%20colors%20including%20yellow%2C%20purple%2C%20pink%2C%20and%20red.%20The%20tulips%20are%20arranged%20in%20a%20beautiful%20display%20with%20their%20long%20green%20stems%20visible.%20The%20background%20is%20clean%20and%20light%2C%20allowing%20the%20bright%20colors%20of%20the%20tulips%20to%20stand%20out.%20The%20lighting%20is%20bright%20and%20natural%2C%20highlighting%20the%20fresh%20and%20cheerful%20nature%20of%20these%20spring%20flowers.&width=600&height=400&seq=3&orientation=landscape" 
                         alt="Tulipes" class="w-full h-64 object-cover object-top transition duration-300 transform group-hover:scale-105">
                    <div class="category-overlay absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 transition duration-300">
                        <div class="text-center p-4">
                            <h3 class="text-white text-xl font-bold mb-2">Tulipes</h3>
                            <a href="#" class="inline-block bg-white text-primary px-4 py-2 rounded-button font-medium hover:bg-gray-100 transition whitespace-nowrap">Voir Plus</a>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 p-3">
                        <h3 class="text-gray-900 font-bold text-lg">Tulipes</h3>
                    </div>
                </div>
                
                <!-- Category 3 -->
                <div class="category-card rounded-lg overflow-hidden shadow-md relative group">
                    <img src="https://readdy.ai/api/search-image?query=An%20elegant%20arrangement%20of%20white%20and%20cream%20orchids%20with%20their%20delicate%2C%20exotic%20blooms%20displayed%20prominently.%20The%20orchids%20are%20arranged%20with%20minimal%20greenery%20to%20highlight%20their%20unique%20shapes%20and%20natural%20beauty.%20The%20background%20is%20neutral%20and%20soft%2C%20creating%20a%20sophisticated%20and%20luxurious%20feel.%20The%20lighting%20is%20gentle%20and%20diffused%2C%20emphasizing%20the%20delicate%20texture%20and%20translucent%20quality%20of%20the%20orchid%20petals.&width=600&height=400&seq=4&orientation=landscape" 
                         alt="Orchidées" class="w-full h-64 object-cover object-top transition duration-300 transform group-hover:scale-105">
                    <div class="category-overlay absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 transition duration-300">
                        <div class="text-center p-4">
                            <h3 class="text-white text-xl font-bold mb-2">Orchidées</h3>
                            <a href="#" class="inline-block bg-white text-primary px-4 py-2 rounded-button font-medium hover:bg-gray-100 transition whitespace-nowrap">Voir Plus</a>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 p-3">
                        <h3 class="text-gray-900 font-bold text-lg">Orchidées</h3>
                    </div>
                </div>
                
                <!-- Category 4 -->
                <div class="category-card rounded-lg overflow-hidden shadow-md relative group">
                    <img src="https://readdy.ai/api/search-image?query=A%20beautiful%20bouquet%20of%20seasonal%20flowers%20featuring%20a%20mix%20of%20daisies%2C%20sunflowers%2C%20lavender%2C%20and%20wildflowers%20in%20a%20rustic%20arrangement.%20The%20bouquet%20has%20a%20natural%2C%20garden-picked%20appearance%20with%20various%20textures%20and%20heights.%20The%20background%20is%20light%20and%20neutral%2C%20allowing%20the%20colorful%20mix%20of%20flowers%20to%20be%20the%20focal%20point.%20The%20lighting%20is%20bright%20and%20natural%2C%20giving%20the%20arrangement%20a%20fresh%2C%20summery%20feel.&width=600&height=400&seq=5&orientation=landscape" 
                         alt="Fleurs Saisonnières" class="w-full h-64 object-cover object-top transition duration-300 transform group-hover:scale-105">
                    <div class="category-overlay absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 transition duration-300">
                        <div class="text-center p-4">
                            <h3 class="text-white text-xl font-bold mb-2">Fleurs Saisonnières</h3>
                            <a href="#" class="inline-block bg-white text-primary px-4 py-2 rounded-button font-medium hover:bg-gray-100 transition whitespace-nowrap">Voir Plus</a>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 p-3">
                        <h3 class="text-gray-900 font-bold text-lg">Fleurs Saisonnières</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Produits Vedettes</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Découvrez nos arrangements floraux les plus populaires, soigneusement sélectionnés pour vous.</p>
            </div>
            
            <div class="relative">
                <div class="products-slider flex overflow-x-auto pb-8 -mx-2 hide-scrollbar" id="productsSlider">
                    <!-- Product 1 -->
                    <div class="product-card w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 flex-shrink-0 transition duration-300">
                        <div class="bg-white rounded-lg overflow-hidden shadow-md h-full">
                            <div class="relative">
                                <img src="https://readdy.ai/api/search-image?query=A%20luxurious%20bouquet%20of%20pink%20peonies%20in%20full%20bloom%2C%20arranged%20with%20eucalyptus%20and%20delicate%20greenery.%20The%20peonies%20are%20fluffy%20and%20voluminous%20with%20layers%20of%20soft%20petals.%20The%20bouquet%20is%20wrapped%20in%20elegant%20cream%20paper%20and%20tied%20with%20a%20satin%20ribbon.%20The%20background%20is%20soft%20and%20neutral%2C%20highlighting%20the%20romantic%20and%20feminine%20nature%20of%20the%20arrangement.&width=400&height=400&seq=6&orientation=squarish" 
                                     alt="Bouquet de Pivoines" class="w-full h-64 object-cover object-top">
                                <button class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm hover:bg-gray-100 transition">
                                    <i class="ri-heart-line text-gray-400 hover:text-primary"></i>
                                </button>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Bouquet de Pivoines</h3>
                                <div class="flex items-center mb-2">
                                    <div class="flex text-yellow-400">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-half-fill"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-2">(24 avis)</span>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-primary font-bold text-xl">49,90 €</span>
                                    <button class="bg-primary text-white px-4 py-2 rounded-button hover:bg-opacity-90 transition flex items-center whitespace-nowrap">
                                        <i class="ri-shopping-cart-line mr-2"></i> Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 2 -->
                    <div class="product-card w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 flex-shrink-0 transition duration-300">
                        <div class="bg-white rounded-lg overflow-hidden shadow-md h-full">
                            <div class="relative">
                                <img src="https://readdy.ai/api/search-image?query=A%20romantic%20bouquet%20of%20red%20roses%20mixed%20with%20white%20gypsophila%20%28babys%20breath%29%20arranged%20in%20a%20classic%20round%20shape.%20The%20roses%20are%20deep%20red%20and%20velvety%2C%20symbolizing%20love%20and%20passion.%20The%20bouquet%20is%20wrapped%20in%20elegant%20burgundy%20paper%20with%20a%20satin%20ribbon.%20The%20background%20is%20soft%20and%20neutral%2C%20emphasizing%20the%20timeless%20elegance%20of%20red%20roses.&width=400&height=400&seq=7&orientation=squarish" 
                                     alt="Roses Éternelles" class="w-full h-64 object-cover object-top">
                                <button class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm hover:bg-gray-100 transition">
                                    <i class="ri-heart-line text-gray-400 hover:text-primary"></i>
                                </button>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Roses Éternelles</h3>
                                <div class="flex items-center mb-2">
                                    <div class="flex text-yellow-400">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-2">(42 avis)</span>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-primary font-bold text-xl">59,90 €</span>
                                    <button class="bg-primary text-white px-4 py-2 rounded-button hover:bg-opacity-90 transition flex items-center whitespace-nowrap">
                                        <i class="ri-shopping-cart-line mr-2"></i> Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 3 -->
                    <div class="product-card w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 flex-shrink-0 transition duration-300">
                        <div class="bg-white rounded-lg overflow-hidden shadow-md h-full">
                            <div class="relative">
                                <img src="https://readdy.ai/api/search-image?query=A%20cheerful%20bouquet%20of%20mixed%20spring%20flowers%20including%20yellow%20daffodils%2C%20purple%20tulips%2C%20pink%20hyacinths%2C%20and%20blue%20muscari%20%28grape%20hyacinths%29.%20The%20arrangement%20is%20bright%20and%20colorful%2C%20capturing%20the%20essence%20of%20spring.%20The%20bouquet%20is%20wrapped%20in%20kraft%20paper%20with%20a%20natural%20twine%20bow.%20The%20background%20is%20light%20and%20airy%2C%20enhancing%20the%20fresh%20and%20seasonal%20feel%20of%20the%20arrangement.&width=400&height=400&seq=8&orientation=squarish" 
                                     alt="Bouquet Printanier" class="w-full h-64 object-cover object-top">
                                <button class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm hover:bg-gray-100 transition">
                                    <i class="ri-heart-line text-gray-400 hover:text-primary"></i>
                                </button>
                                <div class="absolute top-3 left-3 bg-primary text-white text-xs font-bold px-2 py-1 rounded">Nouveau</div>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Bouquet Printanier</h3>
                                <div class="flex items-center mb-2">
                                    <div class="flex text-yellow-400">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-2">(18 avis)</span>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-primary font-bold text-xl">39,90 €</span>
                                    <button class="bg-primary text-white px-4 py-2 rounded-button hover:bg-opacity-90 transition flex items-center whitespace-nowrap">
                                        <i class="ri-shopping-cart-line mr-2"></i> Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 4 -->
                    <div class="product-card w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 flex-shrink-0 transition duration-300">
                        <div class="bg-white rounded-lg overflow-hidden shadow-md h-full">
                            <div class="relative">
                                <img src="https://readdy.ai/api/search-image?query=An%20elegant%20white%20orchid%20plant%20in%20a%20modern%20ceramic%20pot.%20The%20orchid%20has%20multiple%20stems%20with%20several%20pristine%20white%20blooms%20cascading%20gracefully.%20The%20leaves%20are%20deep%20green%20and%20glossy.%20The%20pot%20is%20simple%20and%20sophisticated%20in%20a%20neutral%20color%20that%20complements%20the%20pure%20white%20flowers.%20The%20background%20is%20minimal%20and%20clean%2C%20emphasizing%20the%20orchids%20elegant%20and%20exotic%20beauty.&width=400&height=400&seq=9&orientation=squarish" 
                                     alt="Orchidée Blanche" class="w-full h-64 object-cover object-top">
                                <button class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm hover:bg-gray-100 transition">
                                    <i class="ri-heart-line text-gray-400 hover:text-primary"></i>
                                </button>
                                <div class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-15%</div>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Orchidée Blanche</h3>
                                <div class="flex items-center mb-2">
                                    <div class="flex text-yellow-400">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-half-fill"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-2">(36 avis)</span>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <div>
                                        <span class="text-primary font-bold text-xl">42,50 €</span>
                                        <span class="text-gray-400 line-through text-sm ml-2">49,90 €</span>
                                    </div>
                                    <button class="bg-primary text-white px-4 py-2 rounded-button hover:bg-opacity-90 transition flex items-center whitespace-nowrap">
                                        <i class="ri-shopping-cart-line mr-2"></i> Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 5 -->
                    <div class="product-card w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 flex-shrink-0 transition duration-300">
                        <div class="bg-white rounded-lg overflow-hidden shadow-md h-full">
                            <div class="relative">
                                <img src="https://readdy.ai/api/search-image?query=A%20lush%20and%20vibrant%20succulent%20garden%20in%20a%20stylish%20terrarium.%20The%20arrangement%20features%20various%20types%20of%20succulents%20with%20different%20shapes%2C%20textures%2C%20and%20shades%20of%20green.%20Some%20succulents%20have%20hints%20of%20purple%20and%20red.%20The%20terrarium%20is%20made%20of%20clear%20glass%20with%20geometric%20edges%2C%20allowing%20the%20beautiful%20arrangement%20to%20be%20visible%20from%20all%20angles.%20The%20background%20is%20neutral%20and%20soft%2C%20highlighting%20the%20modern%20and%20trendy%20nature%20of%20this%20low-maintenance%20plant%20arrangement.&width=400&height=400&seq=10&orientation=squarish" 
                                     alt="Terrarium Succulentes" class="w-full h-64 object-cover object-top">
                                <button class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm hover:bg-gray-100 transition">
                                    <i class="ri-heart-line text-gray-400 hover:text-primary"></i>
                                </button>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Terrarium Succulentes</h3>
                                <div class="flex items-center mb-2">
                                    <div class="flex text-yellow-400">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-2">(29 avis)</span>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-primary font-bold text-xl">34,90 €</span>
                                    <button class="bg-primary text-white px-4 py-2 rounded-button hover:bg-opacity-90 transition flex items-center whitespace-nowrap">
                                        <i class="ri-shopping-cart-line mr-2"></i> Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Arrows -->
                <button id="prevBtn" class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-1/2 w-12 h-12 bg-white rounded-full shadow-md flex items-center justify-center z-10 focus:outline-none">
                    <i class="ri-arrow-left-s-line text-gray-600 text-2xl"></i>
                </button>
                <button id="nextBtn" class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/2 w-12 h-12 bg-white rounded-full shadow-md flex items-center justify-center z-10 focus:outline-none">
                    <i class="ri-arrow-right-s-line text-gray-600 text-2xl"></i>
                </button>
            </div>
            
            <!-- Slider Dots -->
            <div class="flex justify-center mt-6">
                <div class="flex space-x-2">
                    <button class="w-3 h-3 rounded-full bg-primary"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                </div>
            </div>
            
            <div class="text-center mt-10">
                <a href="#" class="inline-block border border-primary text-primary px-6 py-3 rounded-button font-medium hover:bg-primary hover:text-white transition whitespace-nowrap">Voir Tous les Produits</a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pourquoi Nous Choisir</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Nous nous engageons à offrir les meilleures fleurs et le meilleur service pour toutes vos occasions spéciales.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 mx-auto bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-leaf-line text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fleurs Fraîches</h3>
                    <p class="text-gray-600">Nous sélectionnons quotidiennement les fleurs les plus fraîches pour garantir leur longévité.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center p-6 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 mx-auto bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-truck-line text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Livraison Rapide</h3>
                    <p class="text-gray-600">Livraison le jour même disponible pour les commandes passées avant 14h.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center p-6 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 mx-auto bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-palette-line text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Design Unique</h3>
                    <p class="text-gray-600">Nos fleuristes créent des arrangements uniques adaptés à chaque occasion.</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="text-center p-6 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 mx-auto bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-shield-check-line text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Garantie Qualité</h3>
                    <p class="text-gray-600">Nous garantissons la fraîcheur de nos fleurs pendant au moins 7 jours.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Ce Que Disent Nos Clients</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Découvrez les témoignages de nos clients satisfaits qui ont choisi nos fleurs pour leurs moments spéciaux.</p>
            </div>
            
            <div class="relative">
                <div class="testimonials-slider flex overflow-x-auto pb-8 -mx-2 hide-scrollbar" id="testimonialsSlider">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-card w-full md:w-1/2 lg:w-1/3 px-2 flex-shrink-0">
                        <div class="bg-white p-6 rounded-lg shadow-md h-full">
                            <div class="flex text-yellow-400 mb-4">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p class="text-gray-600 mb-6 italic">"Les fleurs étaient magnifiques et sont arrivées parfaitement à l'heure pour l'anniversaire de ma mère. Elle était ravie ! La qualité des fleurs était exceptionnelle et elles sont restées fraîches pendant plus de deux semaines."</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                                    <i class="ri-user-line text-gray-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Sophie Dupont</h4>
                                    <p class="text-gray-500 text-sm">Paris, France</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial-card w-full md:w-1/2 lg:w-1/3 px-2 flex-shrink-0">
                        <div class="bg-white p-6 rounded-lg shadow-md h-full">
                            <div class="flex text-yellow-400 mb-4">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-half-fill"></i>
                            </div>
                            <p class="text-gray-600 mb-6 italic">"J'ai commandé des fleurs pour ma femme pour notre anniversaire de mariage. Le bouquet était encore plus beau que sur les photos du site. Le service client a été très attentif à mes demandes spéciales. Je recommande vivement !"</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                                    <i class="ri-user-line text-gray-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Antoine Moreau</h4>
                                    <p class="text-gray-500 text-sm">Lyon, France</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="testimonial-card w-full md:w-1/2 lg:w-1/3 px-2 flex-shrink-0">
                        <div class="bg-white p-6 rounded-lg shadow-md h-full">
                            <div class="flex text-yellow-400 mb-4">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p class="text-gray-600 mb-6 italic">"J'utilise ce fleuriste pour toutes les occasions importantes. Les arrangements sont toujours créatifs et uniques. La livraison est ponctuelle et le service est impeccable. C'est devenu mon fleuriste de référence !"</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                                    <i class="ri-user-line text-gray-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Isabelle Laurent</h4>
                                    <p class="text-gray-500 text-sm">Bordeaux, France</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 4 -->
                    <div class="testimonial-card w-full md:w-1/2 lg:w-1/3 px-2 flex-shrink-0">
                        <div class="bg-white p-6 rounded-lg shadow-md h-full">
                            <div class="flex text-yellow-400 mb-4">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                            </div>
                            <p class="text-gray-600 mb-6 italic">"J'ai commandé un terrarium de succulentes pour mon bureau et je suis très satisfait de la qualité. Les plantes sont en parfaite santé et l'arrangement est élégant. Le guide d'entretien fourni est très utile pour un novice comme moi."</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                                    <i class="ri-user-line text-gray-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Thomas Mercier</h4>
                                    <p class="text-gray-500 text-sm">Toulouse, France</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Arrows -->
                <button id="prevTestimonialBtn" class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-1/2 w-12 h-12 bg-white rounded-full shadow-md flex items-center justify-center z-10 focus:outline-none">
                    <i class="ri-arrow-left-s-line text-gray-600 text-2xl"></i>
                </button>
                <button id="nextTestimonialBtn" class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/2 w-12 h-12 bg-white rounded-full shadow-md flex items-center justify-center z-10 focus:outline-none">
                    <i class="ri-arrow-right-s-line text-gray-600 text-2xl"></i>
                </button>
            </div>
            
            <!-- Slider Dots -->
            <div class="flex justify-center mt-6">
                <div class="flex space-x-2">
                    <button class="w-3 h-3 rounded-full bg-primary"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-primary bg-opacity-5">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Abonnez-vous à Notre Newsletter</h2>
                <p class="text-gray-600 mb-8">Recevez nos dernières offres, nouveautés et conseils d'entretien des fleurs directement dans votre boîte mail.</p>
                <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <input type="email" placeholder="Votre adresse email" class="flex-grow px-4 py-3 rounded-button border border-gray-300 focus:border-primary focus:outline-none">
                    <button type="submit" class="bg-primary text-white px-6 py-3 rounded-button font-medium hover:bg-opacity-90 transition whitespace-nowrap">S'abonner</button>
                </form>
                <p class="text-gray-500 text-sm mt-4">En vous inscrivant, vous acceptez notre politique de confidentialité. Nous ne partagerons jamais vos données.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Column 1 -->
                <div>
                    <a href="#" class="text-3xl font-['Pacifico'] text-white mb-6 inline-block">logo</a>
                    <p class="text-gray-400 mb-6">Nous créons des arrangements floraux uniques pour toutes vos occasions spéciales depuis plus de 15 ans.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-pinterest-line"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
                            <i class="ri-twitter-x-line"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Column 2 -->
                <div>
                    <h3 class="text-lg font-bold mb-6">Liens Rapides</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Accueil</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Boutique</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                
                <!-- Column 3 -->
                <div>
                    <h3 class="text-lg font-bold mb-6">Catégories</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Roses</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Tulipes</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Orchidées</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Fleurs Saisonnières</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Plantes d'Intérieur</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Cadeaux Floraux</a></li>
                    </ul>
                </div>
                
                <!-- Column 4 -->
                <div>
                    <h3 class="text-lg font-bold mb-6">Contact</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="w-5 h-5 flex items-center justify-center mt-1 mr-3">
                                <i class="ri-map-pin-line text-primary"></i>
                            </div>
                            <span class="text-gray-400">123 Rue des Fleurs, 75001 Paris, France</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-phone-line text-primary"></i>
                            </div>
                            <span class="text-gray-400">+33 1 23 45 67 89</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-mail-line text-primary"></i>
                            </div>
                            <span class="text-gray-400">contact@fleurelegante.fr</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-time-line text-primary"></i>
                            </div>
                            <span class="text-gray-400">Lun-Sam: 9h-19h, Dim: 10h-16h</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Payment Methods -->
            <div class="border-t border-gray-800 pt-8 pb-4">
                <div class="flex flex-wrap justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <p class="text-gray-500">© 2025 Fleurs Élégantes. Tous droits réservés.</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500">Modes de paiement:</span>
                        <div class="flex space-x-3">
                            <i class="ri-visa-fill text-2xl text-gray-400"></i>
                            <i class="ri-mastercard-fill text-2xl text-gray-400"></i>
                            <i class="ri-paypal-fill text-2xl text-gray-400"></i>
                            <i class="ri-apple-fill text-2xl text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Products Slider
            const productsSlider = document.getElementById('productsSlider');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            
            let scrollAmount = 0;
            const cardWidth = productsSlider.querySelector('.product-card').offsetWidth + 16; // Card width + gap
            
            prevBtn.addEventListener('click', function() {
                scrollAmount = Math.max(scrollAmount - cardWidth, 0);
                productsSlider.scrollTo({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });
            
            nextBtn.addEventListener('click', function() {
                scrollAmount = Math.min(scrollAmount + cardWidth, productsSlider.scrollWidth - productsSlider.clientWidth);
                productsSlider.scrollTo({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            // Testimonials Slider
            const testimonialsSlider = document.getElementById('testimonialsSlider');
            const prevTestimonialBtn = document.getElementById('prevTestimonialBtn');
            const nextTestimonialBtn = document.getElementById('nextTestimonialBtn');
            
            let testimonialScrollAmount = 0;
            const testimonialCardWidth = testimonialsSlider.querySelector('.testimonial-card').offsetWidth + 16; // Card width + gap
            
            prevTestimonialBtn.addEventListener('click', function() {
                testimonialScrollAmount = Math.max(testimonialScrollAmount - testimonialCardWidth, 0);
                testimonialsSlider.scrollTo({
                    left: testimonialScrollAmount,
                    behavior: 'smooth'
                });
            });
            
            nextTestimonialBtn.addEventListener('click', function() {
                testimonialScrollAmount = Math.min(testimonialScrollAmount + testimonialCardWidth, testimonialsSlider.scrollWidth - testimonialsSlider.clientWidth);
                testimonialsSlider.scrollTo({
                    left: testimonialScrollAmount,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>