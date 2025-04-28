<div class="w-full md:w-72 shrink-0">
    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-4">
        <h2 class="text-xl font-semibold mb-6">Filtres</h2>
        
        <!-- Filtre par prix -->
        <div class="mb-6">
            <h3 class="font-medium mb-4">Prix</h3>
            <div class="mb-4">
                <input type="range" id="priceRange" min="0" max="200" value="100" class="w-full h-2 bg-gray-200 rounded-full appearance-none">
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                    <span class="px-3 bg-gray-100 text-gray-500">€</span>
                    <input type="number" id="minPrice" value="0" min="0" max="200" class="w-16 py-2 px-2 border-none text-center">
                </div>
                <span class="text-gray-400">-</span>
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                    <span class="px-3 bg-gray-100 text-gray-500">€</span>
                    <input type="number" id="maxPrice" value="100" min="0" max="200" class="w-16 py-2 px-2 border-none text-center">
                </div>
            </div>
        </div>
        
        <!-- Filtre par occasion -->
        <div class="mb-6">
            <h3 class="font-medium mb-4">Occasion</h3>
            <div class="space-y-3">
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox" checked>
                    <span class="checkmark mr-3"></span>
                    <span>Anniversaire</span>
                </label>
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox">
                    <span class="checkmark mr-3"></span>
                    <span>Mariage</span>
                </label>
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox">
                    <span class="checkmark mr-3"></span>
                    <span>Saint-Valentin</span>
                </label>
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox">
                    <span class="checkmark mr-3"></span>
                    <span>Remerciement</span>
                </label>
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox">
                    <span class="checkmark mr-3"></span>
                    <span>Deuil</span>
                </label>
            </div>
        </div>
        
        <!-- Filtre par type -->
        <div class="mb-6">
            <h3 class="font-medium mb-4">Type de Fleurs</h3>
            <div class="space-y-3">
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox">
                    <span class="checkmark mr-3"></span>
                    <span>Roses</span>
                </label>
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox" checked>
                    <span class="checkmark mr-3"></span>
                    <span>Tulipes</span>
                </label>
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox">
                    <span class="checkmark mr-3"></span>
                    <span>Lys</span>
                </label>
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox">
                    <span class="checkmark mr-3"></span>
                    <span>Orchidées</span>
                </label>
                <label class="custom-checkbox flex items-center">
                    <input type="checkbox">
                    <span class="checkmark mr-3"></span>
                    <span>Pivoines</span>
                </label>
            </div>
        </div>
        
        <!-- Filtre par catégorie -->
        <div class="mb-6">
            <h3 class="font-medium mb-4">Catégorie</h3>
            <div class="custom-select">
                <div class="custom-select-selected" id="categorySelect">
                    <span>Toutes les catégories</span>
                    <i class="ri-arrow-down-s-line"></i>
                </div>
                <div class="custom-select-options" id="categoryOptions">
                    <div class="custom-select-option" data-value="all">Toutes les catégories</div>
                    <div class="custom-select-option" data-value="bouquets">Bouquets</div>
                    <div class="custom-select-option" data-value="plants">Plantes</div>
                    <div class="custom-select-option" data-value="arrangements">Arrangements</div>
                    <div class="custom-select-option" data-value="gift-baskets">Paniers cadeaux</div>
                </div>
            </div>
        </div>
        
        <button class="w-full py-3 bg-primary text-white font-medium rounded-button hover:bg-opacity-90 transition-colors whitespace-nowrap">Appliquer les filtres</button>
    </div>
</div>