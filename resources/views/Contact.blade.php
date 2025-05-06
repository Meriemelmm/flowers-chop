@extends('layouts.app')

@section('title', "Contactez-nous")

@section('content')
    <!-- Hero Section -->
    <section class="contact-hero w-full relative">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="container mx-auto px-4 py-32 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">Contactez-Nous</h1>
            <p class="text-xl text-white max-w-2xl mx-auto">Nous sommes là pour répondre à vos questions et demandes, n'hésitez pas à nous contacter !</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Nous Serons Heureux de Vous Aider</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Veuillez remplir le formulaire ci-dessous pour nous envoyer un message, et nous vous répondrons dans les plus brefs délais.</p>
            </div>
            <div class="max-w-2xl mx-auto">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block text-lg font-medium text-gray-700">Nom Complet</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-primary" required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-lg font-medium text-gray-700">Adresse Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-primary" required>
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-lg font-medium text-gray-700">Message</label>
                        <textarea id="message" name="message" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-primary" rows="6" required></textarea>
                    </div>
                    <div class="mb-6 text-center">
                        <button type="submit" class="bg-primary text-white px-8 py-3 rounded-button font-medium hover:bg-opacity-90 transition whitespace-nowrap">Envoyer le Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Nos Coordonnées</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-8">Vous pouvez nous contacter à tout moment via les informations ci-dessous, ou nous rendre visite dans nos locaux.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Address -->
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Adresse</h3>
                    <p class="text-gray-600">123 Rue des Fleurs,nador, maroc</p>
                </div>

                <!-- Phone -->
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Téléphone</h3>
                    <p class="text-gray-600">+212 874583666</p>
                </div>

                <!-- Email -->
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Email</h3>
                    <p class="text-gray-600">contact@merylowers.com</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Map Section -->
    
@endsection
