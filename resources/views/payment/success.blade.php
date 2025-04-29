@extends('layouts.app')

@section('title', "Paiement Réussi")

@section('content')
<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8 text-center">
            <!-- Checkmark icon -->
            <div class="mb-6 flex justify-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
            
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Paiement Réussi!</h1>
            <p class="text-lg text-gray-600 mb-6">Merci pour votre commande. Votre paiement a été traité avec succès.</p>
            
            <!-- Order details -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8 text-left">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Détails de la commande</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Numéro de commande:</span>
                        <span class="font-medium">#FL-{{ rand(1000, 9999) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Date:</span>
                        <span class="font-medium">{{ now()->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Montant total:</span>
                        <span class="font-medium text-primary">€{{ number_format(rand(30, 120) + 0.99, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Méthode de paiement:</span>
                        <span class="font-medium">Carte Bancaire</span>
                    </div>
                </div>
            </div>
            
            <!-- Delivery info -->
            <div class="bg-blue-50 rounded-lg p-6 mb-8 text-left border-l-4 border-blue-400">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Livraison</h3>
                <p class="text-gray-600 mb-2">Votre commande sera livrée le <span class="font-medium">{{ now()->addDays(1)->format('d/m/Y') }}</span>.</p>
                <p class="text-gray-600">Une confirmation a été envoyée à votre adresse email.</p>
            </div>
            
            <!-- Action buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('shop') }}" class="bg-primary text-white px-8 py-3 rounded-button font-medium hover:bg-opacity-90 transition shadow-md whitespace-nowrap">
                    Continuer vos achats
                </a>
                <a href="{{ route('orders') }}" class="bg-white text-primary px-8 py-3 rounded-button font-medium border border-primary hover:bg-gray-50 transition whitespace-nowrap">
                    Voir ma commande
                </a>
            </div>
        </div>
    </div>
</section>
@endsection