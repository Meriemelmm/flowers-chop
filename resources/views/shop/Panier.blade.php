
@extends('layouts.app')

@section('title', "product")

@section('content')


    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-semibold mb-2">Votre Panier</h1>
            <div class="flex items-center text-gray-500">
                <a href="/" class="text-primary hover:underline">Accueil</a>
                <i class="ri-arrow-right-s-line mx-2"></i>
                <a href="{{route('shop.index')}}" class="text-primary hover:underline">Boutique</a>
                <i class="ri-arrow-right-s-line mx-2"></i>
                <span>Panier</span>
            </div>
        </div>
        
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Liste des articles -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="hidden md:grid grid-cols-12 gap-4 border-b pb-4 mb-4">
                        <div class="col-span-5 font-medium">Produit</div>
                        <div class="col-span-2 font-medium text-center">Prix</div>
                        <div class="col-span-3 font-medium text-center">Quantité</div>
                        <div class="col-span-2 font-medium text-right">Total</div>
                    </div>
                      @foreach ($products as $product)
                    <!-- Article 1 -->
                    <div class="cart-item bg-white rounded-lg p-4 mb-4 border border-gray-100">
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex items-center md:w-5/12">
                                <form action="{{route('Panier.destroy',['Panier'=>$product->id])}}" onsubmit="return confirm('Voulez-vous vraiment retirer ce produit du panier ?  ?');"  method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="remove-btn text-gray-400 hover:text-primary mr-4">
                                    <i class="ri-close-line text-lg"></i>
                                </button>
                            </form>
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/' . $product->product_image) }}"
                                         alt="Bouquet Élégance" 
                                         class="w-20 h-20 object-cover rounded-lg">
                                    <div>
                                        <h3 class="font-medium">{{$product->product_name}}</h3>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-2/12 flex md:justify-center">
                                <span class="text-primary font-semibold">{{$product->product_prix}}€</span>
                            </div>
                            <div class="md:w-3/12 flex md:justify-center">
                                <div class="quantity-selector">
                                    <button class="decrement">-</button>
                                    <input type="number" value="{{$product->pivot->quantity}}" min="1" class="quantity" data-id="{{$product->id}}">
                                    <button class="increment">+</button>
                                </div>
                            </div>
                            <div class="md:w-2/12 flex md:justify-end">
                                <span class="text-primary font-semibold">45,90 €</span>
                            </div>
                        </div>
                    </div>
                     @endforeach
                    <!-- Article 2 -->
                 
                    
                  
                    
                   
                </div>
            </div>
            
            <!-- Récapitulatif de commande -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-4">
                    <h2 class="text-xl font-semibold mb-6">Récapitulatif de commande</h2>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sous-total</span>
                            <span class="font-medium"> €</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Livraison</span>
                            <span class="font-medium">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Réduction</span>
                            <span class="text-green-500 font-medium">0,00 €</span>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4 mb-6">
                        <div class="flex justify-between text-lg font-semibold">
                            <span>Total</span>
                            <span class="item-total text-primary">{{ $product->product_prix * $product->pivot->quantity }} €</span>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <div class="flex items-start mb-4">
                            <input type="checkbox" id="terms" class="mt-1 mr-3">
                            <label for="terms" class="text-gray-600 text-sm">J'accepte les <a href="#" class="text-primary hover:underline">conditions générales</a> et la <a href="#" class="text-primary hover:underline">politique de confidentialité</a></label>
                        </div>
                        <button class="w-full py-3 bg-primary text-white font-medium rounded-button hover:bg-opacity-90 transition-colors mb-4">
                            Passer la commande
                        </button>
                        <div class="text-center text-gray-500 text-sm">
                            Paiement sécurisé avec
                            <div class="flex justify-center space-x-2 mt-2">
                                <i class="ri-visa-fill text-blue-700 text-xl"></i>
                                <i class="ri-mastercard-fill text-red-500 text-xl"></i>
                                <i class="ri-paypal-fill text-blue-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <h3 class="font-medium mb-3">Ajouter une note</h3>
                        <textarea rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Instructions spéciales pour la commande..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('components.footer')

    @endsection
@section('scripts')


    <script src="{{ asset('js/cart.js') }}"></script>

 

    @endsection
