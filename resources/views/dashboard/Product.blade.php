@extends('layouts.dashboard')

@section('title', 'Gestion des Produits')

@section('content')
    <header class="main-header">
        <h1>Gestion des Produits</h1>
        <div class="header-actions">
            <button class="btn btn-primary" id="addProductBtn">
                <i class="fas fa-plus"></i> Ajouter un produit
            </button>
            <div class="search-box">
                <input type="text" placeholder="Rechercher un produit...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>

    <div class="content-wrapper">
        <!-- Product Table -->
        <div class="card">
            <div class="card-header">
                <h2>Liste des produits</h2>
                <div class="card-actions">
                    <select class="filter-select">
                        <option>Tous les catégories</option>
                        <option>Bouquets</option>
                        <option>Plantes</option>
                        <option>Fleurs coupées</option>
                        <option>Compositions</option>
                    </select>
                    <button class="btn btn-secondary">
                        <i class="fas fa-filter"></i> Filtrer
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>types</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>collection</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>#FL00{{$product->id}}</td>
                                <td>
                                    <div class="product-img">
                                        <img src="{{ asset('storage/' . $product->product_image) }}" alt="Rose bouquet">
                                    </div>
                                </td>
                                <td>{{$product->product_name}}</td>
                                <td>{{ $product->category?->category_name ?? 'Non définie' }}</td>
                                <td>
                                    <div id="carouselTypes{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($product->types as $key => $type)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <div class="d-flex justify-content-center">
                                                        <span class="badge bg-info text-dark p-2">
                                                            {{ $type->type_name }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        @if($product->types->count() > 1)
                                            <button class="carousel-control-prev" type="button"style="color:black" data-bs-target="#carouselTypes{{ $product->id }}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselTypes{{ $product->id }}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                <td>€{{$product->product_prix}}</td>
                                <td>{{$product->product_stock}}</td>
                                <td>
                                    <div id="carouselImages{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($product->pectures as $key => $image)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img src="{{ asset('storage/' . $image->image) }}"
                                                         class="d-block rounded mx-auto"
                                                         style="width: 150px; height: 150px; object-fit: cover;"
                                                         alt="Image du produit">
                                                </div>
                                            @endforeach
                                        </div>

                                        @if($product->pectures->count() > 1)
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages{{ $product->id }}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselImages{{ $product->id }}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                <td style="display:flex">
                                    <button class="btn-action btn-delete" id="btnUpdate" onclick='update(this)' 
                                        data-id="{{$product->id}}"
                                        data-name="{{$product->product_name}}" 
                                        data-description="{{$product->product_description}}" 
                                        data-prix="{{$product->product_prix}}"
                                        data-stock="{{$product->product_stock}}"
                                        data-categoryId="{{$product->category->id}}"
                                        data-image="{{$product->product_image}}"
                                        data-categoryName="{{$product->category->category_name}}" 
                                        data-typeids='@json($product->types->pluck("id"))'
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{route('Product.destroy',['Product'=>$product->id] )}}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette categorie ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div>{{$products->links()}}</div> --}}
                </div>
             
                <div class="table-footer">
                    <div class="table-info">
                       
                        Affichage de {{ $products->firstItem() }} à {{ $products->lastItem() }} sur {{ $products->total() }} produits
                    </div>
                    <div class="pagination">
                      
                        @if ($products->onFirstPage())
                            <button class="pagination-btn disabled">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @else
                            <a href="{{ $products->previousPageUrl() }}" class="pagination-btn">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif
                
                        <!-- Pagination Links -->
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                                <button class="pagination-btn active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="pagination-btn">{{ $page }}</a>
                            @endif
                        @endforeach
                
                        <!-- Next Page Button -->
                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" class="pagination-btn">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <button class="pagination-btn disabled">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <!-- Add Product Modal -->
    <div class="modal" id="addProductModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Ajouter un nouveau produit</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" method="POST" action="{{route('Product.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="productName">Nom du produit</label>
                            <input type="text" id="product_name" name="product_name" placeholder="entrer le nom de produit " required>
                        </div>
                        <div class="form-group">
                            <label for="productCategory">Catégorie</label>
                            <select id="productCategory" name="category_id" required>
                                <option value="">Sélectionner une catégorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" name="category_id">{{$category->category_name}}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="productPrice">Prix (€)</label>
                            <input type="number" name="product_prix" id="productPrice" step="0.01" min="0" placeholder="Ex: 45.00" required>
                        </div>
                        <div class="form-group">
                            <label for="productStock">Quantité en stock</label>
                            <input type="number" name="product_stock" id="productStock" min="0" placeholder="Ex: 12" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productCategory">type des fleurs </label>
                        <select name="type_ids[]" multiple required>
                            <option value="">Sélectionner une type</option>
                            @foreach( $types as $type)
                                <option value="{{$type->id}}">{{$type->type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea id="productDescription" rows="3" name="product_description" placeholder="Description du produit..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Image du produit</label>
                        <div class="file-upload">
                            <input type="file" id="productImage" name="product_image" accept="image/*">
                            <label for="productImage" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Choisir une image</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productImage">collection des images </label>
                        <div class="file-upload">
                            <input type="file" id="productImage" name="images[]" multiple accept="image/*">
                            <label for="productImage" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Choisir des images</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary close-modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Product Modal -->
    <div class="modal" id="updateProductModal">
        <div class="modal-content">
            <div class="modal-header">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3>modifier produit</h3>
                <button class="close-modal" onClick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="updateProductForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <input type="hidden" name="product_id">
                        <div class="form-group">
                            <label for="productName">Nom du produit</label>
                            <input type="text" id="product_name" name="product_name" placeholder="entrer le nom de produit " required>
                        </div>
                        <div class="form-group">
                            <label for="productCategory">Catégorie</label>
                            <select id="Category" name="category_id" required>
                                <option value="">Sélectionner une catégorie</option>
                            </select> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="productPrice">Prix (€)</label>
                            <input type="number" name="product_prix" id="productPrice" step="0.01" min="0" placeholder="Ex: 45.00" required>
                        </div>
                        <div class="form-group">
                            <label for="productStock">Quantité en stock</label>
                            <input type="number" name="product_stock" id="productStock" min="0" placeholder="Ex: 12" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productCategory">type des fleurs </label>
                        <select name="types[]" id="Types" multiple required>
                            <option value="">Sélectionner une type</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea id="productDescription" rows="3" name="product_description" placeholder="Description du produit..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Image du produit</label>
                        <div class="file-upload">
                            <input type="file" id="productImage" name="product_image" accept="image/*">
                            <label for="productImage" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Choisir une image</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productImage">collection des images </label>
                        <div class="file-upload">
                            <input type="file" id="productImage" name="images[]" multiple accept="image/*">
                            <label for="productImage" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Choisir des images</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary close-modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    const categories = @json($categories);
const types = @json($types);

</script>
<script src="{{ asset('js/product-modals.js') }}"></script>
@endsection