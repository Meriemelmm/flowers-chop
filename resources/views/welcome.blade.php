@extends('layouts.app')

@section('title', "product")

@section('content')
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
                            <a href="/Shop" class="inline-block bg-white text-primary px-4 py-2 rounded-button font-medium hover:bg-gray-100 transition whitespace-nowrap">Voir Plus</a>
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
                  @foreach($products as $product)   <!-- Product 1 -->
                    <div class="product-card w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2 flex-shrink-0 transition duration-300">
                        <div class="bg-white rounded-lg overflow-hidden shadow-md h-full">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $product->product_image) }}" 
                                     alt="{{$product->product_name}}"
                  class="w-full h-64 object-cover object-top">
                                <button class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm hover:bg-gray-100 transition">
                                    <i class="ri-heart-line text-gray-400 hover:text-primary"></i>
                                </button>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{$product->product_name}}</h3>
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
                                    <span class="text-primary font-bold text-xl">{{$product->product_prix}}</span>
                                    <form action="{{route('Panier.store')}}"method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <button class="bg-primary text-white px-4 py-2 rounded-button hover:bg-opacity-90 transition flex items-center whitespace-nowrap">
                                        <i class="ri-shopping-cart-line mr-2"></i> Ajouter
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     @endforeach
                    <!-- Product 2 -->
                   
                    
                    
                    
                    
                    <!-- Product 5 -->
                    
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
                <a href="/Shop" class="inline-block border border-primary text-primary px-6 py-3 rounded-button font-medium hover:bg-primary hover:text-white transition whitespace-nowrap">Voir Tous les Produits</a>
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
    @endsection
