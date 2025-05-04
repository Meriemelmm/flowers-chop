@extends('layouts.app')

@section('title', 'All Product Page')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar filtres -->
            @include('components.filter-product')
            
            <!-- Zone d'affichage des produits -->
            <div class="flex-1">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h1 class="text-2xl font-semibold mb-4 md:mb-0">Nos Fleurs </h1>
                   
                </div>
                
                <!-- Grille de produits -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Produit 1 -->
                     @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <a href="{{route('produit.afiche',$product->id)}}" rel="noopener noreferrer">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('storage/' . $product->product_image) }}" >
                           
                        </div>
                    </a>
                        <div class="p-4">
                            <h3 class="font-medium text-lg mb-2">{{$product->product_name}}</h3>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-primary font-semibold">{{$product->prix}}</span>
                               
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
                <!-- Pagination -->
<div class="mt-10 flex justify-center">
    <div class="flex items-center space-x-2">
        <!-- Previous Button -->
        @if ($products->onFirstPage())
            <button class="custom-pagination-button border border-gray-200" disabled>
                <i class="ri-arrow-left-s-line"></i>
            </button>
        @else
            <a href="{{ $products->previousPageUrl() }}" class="custom-pagination-button border border-gray-200">
                <i class="ri-arrow-left-s-line"></i>
            </a>
        @endif

        <!-- Pagination Links -->
        @foreach ($products->links()->elements[0] as $page => $url)
            @if ($page == $products->currentPage())
                <button class="custom-pagination-button active">{{ $page }}</button>
            @else
                <a href="{{ $url }}" class="custom-pagination-button">{{ $page }}</a>
            @endif
        @endforeach

        <!-- Next Button -->
        @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" class="custom-pagination-button border border-gray-200">
                <i class="ri-arrow-right-s-line"></i>
            </a>
        @else
            <button class="custom-pagination-button border border-gray-200" disabled>
                <i class="ri-arrow-right-s-line"></i>
            </button>
        @endif
    </div>
</div>

            </div>
        </div>
    </div>


    @endsection

@section('scripts')
<script src="{{ asset('js/cart.js') }}"></script>
@endsection