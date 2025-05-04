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
            
           
            
            
         
            
            <!-- Action buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('shop.index') }}" class="bg-primary text-white px-8 py-3 rounded-button font-medium hover:bg-opacity-90 transition shadow-md whitespace-nowrap">
                    Continuer vos achats
                </a>
               
            </div>
        </div>
    </div>
</section>
@endsection