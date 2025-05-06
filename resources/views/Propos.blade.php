@extends('layouts.app')

@section('title', "product")

@section('content')


 <!-- Hero Section -->
 <section class="about-hero w-full relative">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="container mx-auto px-4 py-32 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">Notre Histoire</h1>
            <p class="text-xl text-white max-w-2xl mx-auto">Découvrez la passion et l'engagement derrière Merylowers</p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <img src="{{ asset('section.png.jpg') }}" 
                         alt="Première boutique Merylowers" class="rounded-lg shadow-lg w-full">
                </div>
                <div class="lg:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Notre Voyage Florissant</h2>
                    <p class="text-gray-600 mb-4">Fondée en 2010 par Marie Dupont, Merylowers est née d'une passion profonde pour la beauté naturelle des fleurs et le désir de partager cette passion avec le monde.</p>
                    <p class="text-gray-600 mb-6">Ce qui a commencé comme une petite boutique de quartier à Paris est rapidement devenu une référence dans l'art floral, grâce à notre engagement envers la qualité, la créativité et le service exceptionnel.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg text-center">
                            <span class="text-primary text-3xl font-bold">15+</span>
                            <p class="text-gray-600">Années d'expérience</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg text-center">
                            <span class="text-primary text-3xl font-bold">10k+</span>
                            <p class="text-gray-600">Clients satisfaits</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg text-center">
                            <span class="text-primary text-3xl font-bold">50+</span>
                            <p class="text-gray-600">Variétés de fleurs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Nos Valeurs</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Les principes qui guident chaque bouquet que nous créons</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 mx-auto bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-6">
                        <i class="ri-leaf-line text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Fraîcheur Inégalée</h3>
                    <p class="text-gray-600">Nous travaillons directement avec les meilleurs producteurs locaux et internationaux pour garantir que chaque fleur est à son apogée de beauté.</p>
                </div>
                
                <!-- Value 2 -->
                <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 mx-auto bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-6">
                        <i class="ri-heart-line text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Passion Créative</h3>
                    <p class="text-gray-600">Nos fleuristes talentueux mettent tout leur cœur dans chaque arrangement, créant des designs uniques qui racontent une histoire.</p>
                </div>
                
                <!-- Value 3 -->
                <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 mx-auto bg-primary bg-opacity-10 rounded-full flex items-center justify-center mb-6">
                        <i class="ri-earth-line text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Engagement Durable</h3>
                    <p class="text-gray-600">Nous nous engageons à des pratiques écologiques, de l'approvisionnement responsable aux emballages recyclables.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team Section -->
  

    <!-- Our Promise Section -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Notre Promesse</h2>
            <p class="text-xl max-w-3xl mx-auto mb-8">Chez Merylowers, nous nous engageons à créer des arrangements floraux qui dépassent vos attentes, en combinant beauté naturelle, créativité artisanale et service exceptionnel.</p>
            <a href="#" class="inline-block bg-white text-primary px-8 py-3 rounded-button font-medium hover:bg-opacity-90 transition whitespace-nowrap">Découvrir Notre Collection</a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Ils Nous Ont Fait Confiance</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Découvrez ce que nos clients disent de leur expérience avec Merylowers</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Les fleurs pour mon mariage étaient tout simplement magnifiques. L'équipe de Merylowers a su capturer exactement ce que je voulais. Le service était impeccable du début à la fin."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                            <i class="ri-user-line text-gray-500"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Élodie Martin</h4>
                            <p class="text-gray-500 text-sm">Mariage - Juin 2023</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Je commande régulièrement chez Merylowers pour les anniversaires de ma famille. Les fleurs sont toujours fraîches et durent longtemps. Le service client est exceptionnel."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                            <i class="ri-user-line text-gray-500"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Pierre Lambert</h4>
                            <p class="text-gray-500 text-sm">Client fidèle depuis 2018</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"L'arrangement floral que j'ai reçu pour mon anniversaire était encore plus beau que sur la photo. La livraison était ponctuelle et l'emballage soigné. Je recommande vivement !"</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                            <i class="ri-user-line text-gray-500"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Amandine Roux</h4>
                            <p class="text-gray-500 text-sm">Première commande - Avril 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-primary bg-opacity-5">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Rejoignez Notre Communauté</h2>
                <p class="text-gray-600 mb-8">Abonnez-vous à notre newsletter pour recevoir des conseils d'entretien, des offres exclusives et des inspirations florales.</p>
                <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <input type="email" placeholder="Votre adresse email" class="flex-grow px-4 py-3 rounded-button border border-gray-300 focus:border-primary focus:outline-none">
                    <button type="submit" class="bg-primary text-white px-6 py-3 rounded-button font-medium hover:bg-opacity-90 transition whitespace-nowrap">S'abonner</button>
                </form>
            </div>
        </div>
    </section>
@endsection