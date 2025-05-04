@extends('layouts.app')

@section('title', "Mes commandes")

@section('content')
<main class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-semibold mb-2">Vos commandes</h1>
        <div class="flex items-center text-gray-500 text-sm">
            <a href="/" class="text-primary hover:underline">Accueil</a>
            <i class="ri-arrow-right-s-line mx-2"></i>
            <a href="{{ route('shop.index') }}" class="text-primary hover:underline">Boutique</a>
            <i class="ri-arrow-right-s-line mx-2"></i>
            <span>Commandes</span>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6 space-y-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Historique de commandes</h2>

        @foreach($commandes as $commande)
        <div class="border border-gray-200 rounded-lg overflow-hidden">
            <!-- Header commande -->
            <div class="bg-gray-50 px-6 py-4 flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-2 md:mb-0">
                    <div class="text-gray-500 text-sm">Date</div>
                    <div class="font-medium">{{ $commande->created_at->format('d F Y') }}</div>
                </div>
                <div class="mb-2 md:mb-0">
                    <div class="text-gray-500 text-sm">Total</div>
                    <div class="font-medium">{{ number_format($commande->total_prix, 2) }} DH</div>
                </div>
                <div class="mb-2 md:mb-0">
    @if($commande->status === "completed")
        <div class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
            <i class="ri-checkbox-circle-line mr-1"></i> {{ $commande->status }}
        </div>
    @elseif($commande->status === "cancelled")
        <div class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
            <i class="ri-close-circle-line mr-1"></i> Commande annulée
        </div>
    @else
        <div class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
            <i class="ri-close-circle-line mr-1"></i> {{ $commande->status }}
        </div>
    @endif
</div>

                <div>
                    <button onclick="toggleProducts('commande-{{ $commande->id }}')" 
                            class="text-primary hover:underline text-sm">
                        Voir les produits
                    </button>
                </div>
            </div>

            <!-- Produits (masqués par défaut) -->
            <div id="commande-{{ $commande->id }}" class="hidden p-4 bg-white border-t border-gray-200 space-y-4">
                @foreach($commande->products as $product)
                <div class="flex items-center gap-4 border-b pb-4">
                    <img src="{{ asset('storage/' . $product->product_image) }}" 
                         class="w-20 h-20 object-cover rounded" alt="{{ $product->product_name }}">
                    <div>
                        <div class="font-semibold">{{ $product->product_name }}</div>
                        <div class="text-gray-600 text-sm">Quantité : {{ $product->pivot->quantity }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-8">
            {{ $commandes->links() }}
        </div>
    </div>
</main>

<script>
    function toggleProducts(id) {
        const section = document.getElementById(id);
        section.classList.toggle('hidden');
    }
</script>
@endsection
