<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique de Fleurs - Panier</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#e84c93',secondary:'#4a8b3b'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type="number"] {
            -moz-appearance: textfield;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .quantity-selector button {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f3f4f6;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .quantity-selector button:hover {
            background-color: #e5e7eb;
        }
        
        .quantity-selector input {
            width: 50px;
            height: 36px;
            text-align: center;
            border: none;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            font-size: 14px;
        }
        
        .cart-item {
            transition: all 0.3s ease;
        }
        
        .cart-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        .remove-btn:hover {
            color: #e84c93;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="#" class="text-3xl font-['Pacifico'] text-primary">Merylowers</a>
            <nav class="hidden md:flex space-x-6">
                <a href="#" class="hover:text-primary transition-colors">Accueil</a>
                <a href="#" class="hover:text-primary transition-colors">Boutique</a>
                <a href="#" class="hover:text-primary transition-colors">À propos</a>
                <a href="#" class="hover:text-primary transition-colors">Contact</a>
            </nav>
            <div class="flex items-center space-x-4">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 cursor-pointer transition-colors">
                    <i class="ri-search-line text-lg"></i>
                </div>
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 cursor-pointer transition-colors relative">
                    <i class="ri-shopping-cart-2-line text-lg"></i>
                    <span class="absolute -top-1 -right-1 bg-primary text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">3</span>
                </div>
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 cursor-pointer transition-colors md:hidden">
                    <i class="ri-menu-line text-lg"></i>
                </div>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-semibold mb-2">Votre Panier</h1>
            <div class="flex items-center text-gray-500">
                <a href="#" class="text-primary hover:underline">Accueil</a>
                <i class="ri-arrow-right-s-line mx-2"></i>
                <a href="#" class="text-primary hover:underline">Boutique</a>
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
                                        <p class="text-gray-500 text-sm">Couleur: Rose</p>
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
                            <span class="font-medium">158,70 €</span>
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
                            <span class="text-primary">158,70 €</span>
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
    
    <footer class="bg-white mt-16 pt-12 pb-8 border-t border-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <a href="#" class="text-3xl font-['Pacifico'] text-primary mb-4 inline-block">Merylowers</a>
                    <p class="text-gray-600 mb-4">Votre fleuriste en ligne depuis 2010. Livraison rapide et fleurs fraîches garanties.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
                            <i class="ri-facebook-fill text-gray-600"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
                            <i class="ri-instagram-line text-gray-600"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
                            <i class="ri-pinterest-line text-gray-600"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-medium text-lg mb-4">Liens Rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">Accueil</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">Boutique</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">À propos</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">Contact</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-medium text-lg mb-4">Informations</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">Livraison</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">Paiement</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">Conditions générales</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition-colors">Politique de confidentialité</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-medium text-lg mb-4">Newsletter</h4>
                    <p class="text-gray-600 mb-4">Inscrivez-vous pour recevoir nos offres spéciales</p>
                    <div class="flex mb-4">
                        <input type="email" placeholder="Votre email" class="flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <button class="bg-primary text-white px-4 py-2 rounded-r-lg hover:bg-opacity-90 transition-colors whitespace-nowrap">S'inscrire</button>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-600">Paiement sécurisé</span>
                        <div class="flex space-x-2">
                            <i class="ri-visa-fill text-blue-700 text-xl"></i>
                            <i class="ri-mastercard-fill text-red-500 text-xl"></i>
                            <i class="ri-paypal-fill text-blue-500 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-100 mt-8 pt-8 text-center text-gray-500">
                <p>© 2025 Boutique de Fleurs. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
          
            document.querySelectorAll('.quantity-selector').forEach(selector => {
                const decrement = selector.querySelector('.decrement');
                const increment = selector.querySelector('.increment');
                const input = selector.querySelector('.quantity');
                const productId=input.getAttribute('data-id'); 
                console.log(productId);
                
                decrement.addEventListener('click', () => {
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                        updateQuantity(productId,input.value );
                    }
                });
                
                increment.addEventListener('click', () => {
                    input.value = parseInt(input.value) + 1;
                    updateQuantity(productId,input.value );
                });
                
                input.addEventListener('change', () => {
                    if (parseInt(input.value) < 1 || isNaN(parseInt(input.value))) {
                        input.value = 1;
                        updateQuantity(productId,input.value );
                    }
                });
            });
            
            // Suppression d'articles
            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.cart-item').style.opacity = '0';
                    setTimeout(() => {
                        this.closest('.cart-item').remove();
                    }, 300);
                });
            });
        });
        function updateQuantity(Panier,quantity) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/Panier/${Panier}`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ quantity: quantity })
    })
    .then(res => {
        if (!res.ok) {
            console.log("Problème lors de la modification de la quantité.");
            return;
        }
        return res.json();
    })
    .then(data => {
        console.log("Quantité mise à jour avec succès :", data);
    })
    .catch(error => {
        console.error("Erreur réseau :", error);
    });
}


    </script>
</body>
</html>