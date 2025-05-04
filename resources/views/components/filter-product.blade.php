
<form method="GET" action="{{ route('shop.index') }}" class="w-full md:w-72 shrink-0">
    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-4">
        <h2 class="text-xl font-semibold mb-6">Filtres</h2>

        <!-- Filtre par prix -->
        <div class="mb-6">
            <h3 class="font-medium mb-4">Prix</h3>
            <div class="mb-4">
                <input type="range" id="priceRange" min="0" max="200" value="{{ request('max_price', 100) }}" class="w-full h-2 bg-gray-200 rounded-full appearance-none"
                       oninput="document.getElementById('maxPrice').value = this.value">
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                    <span class="px-3 bg-gray-100 text-gray-500">€</span>
                    <input type="number" name="min_price" id="minPrice" value="{{ request('min_price', 0) }}" min="0" max="200" class="w-16 py-2 px-2 border-none text-center">
                </div>
                <span class="text-gray-400">-</span>
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                    <span class="px-3 bg-gray-100 text-gray-500">€</span>
                    <input type="number" name="max_price" id="maxPrice" value="{{ request('max_price', 100) }}" min="0" max="200" class="w-16 py-2 px-2 border-none text-center"
                           oninput="document.getElementById('priceRange').value = this.value">
                </div>
            </div>
        </div>

        <!-- Filtre par occasion -->
       

        <!-- Filtre par type de fleurs -->
        <div class="mb-6">
            <h3 class="font-medium mb-4">Type de Fleurs</h3>
            <div class="space-y-3 ">
                @foreach($types as $type)
                    <label class="custom-checkbox flex items-center ">
                        <input type="checkbox" name="types[]" value="{{ $type->id }}" {{ collect(request('types'))->contains($type->id) ? 'checked' : '' }}>
                        <span class="checkmark mr-3"></span>
                        <span>{{ $type->type_name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Filtre par catégorie -->
        <div class="mb-6">
            <h3 class="font-medium mb-4">Catégorie</h3>
            <div class="custom-select">
                <select name="category" class="w-full border rounded px-2 py-2">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="w-full py-3 bg-primary text-white font-medium rounded-button hover:bg-opacity-90 transition-colors whitespace-nowrap">
            Appliquer les filtres
        </button>
    </div>
</form>
