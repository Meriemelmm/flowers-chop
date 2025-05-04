@extends('layouts.app')

@section('title', "product")

@section('content')


  <!-- Product Detail Section -->
  <section class="container mx-auto px-4 py-12">
    <div class="flex flex-col md:flex-row gap-10">
      
      <!-- Product Images -->
      <div class="flex-1">
        <!-- Main Image -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm mb-4">
          <img id="mainImage" src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="w-full h-96 object-cover">
        </div>
        
        <!-- Thumbnails -->
        <div class="flex flex-wrap gap-4">
          <!-- Main product image thumbnail -->
          <div class="thumbnail w-20 h-20 object-cover rounded-lg border-2 border-primary cursor-pointer active" 
               onclick="changeMainImage('{{ asset('storage/' . $product->product_image) }}')">
            <img src="{{ asset('storage/' . $product->product_image) }}" class="w-full h-full object-cover rounded" alt="{{ $product->product_name }}">
          </div>
          
          
          @foreach($pictures as $picture)
          <div class="thumbnail w-20 h-20 object-cover rounded-lg border-2 border-gray-200 cursor-pointer hover:border-primary" 
               onclick="changeMainImage('{{ asset('storage/' . $picture->image) }}')">
            <img src="{{ asset('storage/' . $picture->image) }}" class="w-full h-full object-cover rounded" alt="{{ $product->product_name }}">
          </div>
          @endforeach
        </div>
      </div>

      <!-- Product Details -->
      <div class="flex-1 space-y-6">
        <div>
          <h1 class="text-3xl font-semibold mb-2">{{ $product->product_name }}</h1>
          <p class="text-primary font-medium text-lg">{{ number_format($product->product_prix, 2, ',', ' ') }} €</p>
          <div class="flex items-center mt-2">
        
           
          </div>
          <p class="mt-4 text-gray-600">{{ $product->product_description ?? 'Un magnifique bouquet de fleurs parfait pour toutes les occasions spéciales.' }}</p>
        </div>

      
          
          
        <div class="flex items-center gap-4 mt-6">
 
  <span class="text-sm text-gray-500">{{ $product->product_stock }} disponible(s)</span>
</div>


<form action="{{ route('Panier.store') }}" method="POST">
  @csrf
  <div class="flex flex-col gap-4 mt-6">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="bg-primary text-white py-3 rounded-button text-lg font-medium hover:bg-pink-600 transition flex items-center justify-center gap-2">
      <i class="ri-shopping-cart-2-line"></i>
      Ajouter au Panier
    </button>
  </div>
</form>

           
          </div>
       

        <div class="pt-6 border-t border-gray-200">
          <h2 class="text-lg font-semibold mb-2">Détails du produit</h2>
          <div class="grid grid-cols-2 gap-4 text-gray-600">
            <div>
              <p class="font-medium">Catégorie:</p>
              <p>{{ $product->category->category_name ?? 'Non spécifiée' }}</p>
            </div>
            <div>
              <p class="font-medium">Référence:</p>
              <p>PROD-{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</p>
            </div>
            <div>
              <p class="font-medium">Disponibilité:</p>
              <p class="{{ $product->product_stock > 0 ? 'text-green-500' : 'text-red-500' }}">
                {{ $product->product_stock > 0 ? 'En stock' : 'Rupture de stock' }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Product Tabs Section -->
  <section class="container mx-auto px-4 pb-12">
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="border-b border-gray-200">
        <nav class="flex -mb-px">
          <button class="tab-button active py-4 px-6 text-center border-b-2 font-medium text-primary border-primary">
            Description
          </button>
          
      </div>
      <div class="p-6">
        <div class="tab-content active">
          <p class="text-gray-600 leading-relaxed">
            {{ $product->product_description ?? 'Ce produit combine élégance et fraîcheur, avec des fleurs soigneusement sélectionnées pour offrir un éclat exceptionnel. Offrez un moment magique avec ce bouquet sophistiqué et intemporel.' }}
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white mt-12 py-8 border-t">
    <div class="container mx-auto px-4 text-center text-gray-500 text-sm">
      © 2025 Merylowers. Tous droits réservés.
    </div>
  </footer>
@endsection
@section('scripts')



<script>
    // Change main image when clicking thumbnails
    function changeMainImage(src) {
      document.getElementById('mainImage').src = src;
      
      // Update active thumbnail
      document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('active', 'border-primary');
        thumb.classList.add('border-gray-200');
      });
      event.currentTarget.classList.add('active', 'border-primary');
      event.currentTarget.classList.remove('border-gray-200');
    }

    // Quantity controls
   

    

    // Tab functionality
    document.querySelectorAll('.tab-button').forEach(button => {
      button.addEventListener('click', function() {
        document.querySelectorAll('.tab-button').forEach(btn => {
          btn.classList.remove('active', 'text-primary', 'border-primary');
          btn.classList.add('text-gray-500', 'border-transparent');
        });
        this.classList.add('active', 'text-primary', 'border-primary');
        this.classList.remove('text-gray-500', 'border-transparent');
      });
    });



  </script>


@endsection
  
