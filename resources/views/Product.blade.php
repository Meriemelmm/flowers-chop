<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleurissima - Gestion des Produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
       /* Reset and Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: #f5f7fa;
    color: #333;
}

/* Dashboard Layout */
.dashboard-container {
    display: flex;
    min-height: 100vh;
}

/* Sidebar Styles */
.sidebar {
    width: 250px;
    background: linear-gradient(135deg, #4a8b7e 0%, #2c5e50 100%);
    color: white;
    display: flex;
    flex-direction: column;
    transition: all 0.3s;
}

.logo {
    padding: 20px;
    display: flex;
    align-items: center;
    font-size: 1.5rem;
    font-weight: bold;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.logo i {
    margin-right: 10px;
    font-size: 1.8rem;
}

.sidebar-nav {
    flex: 1;
    padding: 20px 0;
}

.sidebar-nav ul {
    list-style: none;
}

.sidebar-nav li a {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: all 0.3s;
}

.sidebar-nav li a i {
    margin-right: 10px;
    font-size: 1.1rem;
}

.sidebar-nav li a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    color: white;
}

.sidebar-nav li.active a {
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
    border-left: 4px solid #ffb74d;
}

.sidebar-footer {
    padding: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.user-profile {
    display: flex;
    align-items: center;
}

.user-profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
    object-fit: cover;
}

.user-info {
    display: flex;
    flex-direction: column;
}

.user-name {
    font-size: 0.9rem;
    font-weight: 600;
}

.user-role {
    font-size: 0.8rem;
    opacity: 0.8;
}

.logout-btn {
    background: none;
    border: none;
    color: white;
    font-size: 1.2rem;
    cursor: pointer;
    opacity: 0.8;
    transition: opacity 0.3s;
}

.logout-btn:hover {
    opacity: 1;
}

/* Main Content Styles */
.main-content {
    flex: 1;
    padding: 20px;
    background-color: #f5f7fa;
}

.main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.main-header h1 {
    font-size: 1.8rem;
    color: #2c3e50;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 15px;
}

.search-box {
    position: relative;
}

.search-box input {
    padding: 10px 15px 10px 35px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 250px;
    transition: all 0.3s;
}

.search-box input:focus {
    outline: none;
    border-color: #4a8b7e;
    box-shadow: 0 0 0 2px rgba(74, 139, 126, 0.2);
}

.search-box i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
}

/* Card Styles */
.card {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
}

.card-header {
    padding: 15px 20px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h2 {
    font-size: 1.3rem;
    color: #2c3e50;
}

.card-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.filter-select {
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: white;
    cursor: pointer;
}

.card-body {
    padding: 20px;
}

/* Table Styles */
.table-responsive {
    overflow-x: auto;
}

.products-table {
    width: 100%;
    border-collapse: collapse;
}

.products-table th, 
.products-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.products-table th {
    background-color: #f8f9fa;
    color: #555;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.8rem;
}

.products-table tr:hover {
    background-color: #f8f9fa;
}

.product-img {
    width: 50px;
    height: 50px;
    border-radius: 4px;
    overflow: hidden;
}

.product-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.badge {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.badge-success {
    background-color: #e8f5e9;
    color: #2e7d32;
}

.badge-warning {
    background-color: #fff8e1;
    color: #ff8f00;
}

.badge-danger {
    background-color: #ffebee;
    color: #c62828;
}

.btn-action {
    background: none;
    border: none;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-edit {
    color: #4a8b7e;
    background-color: rgba(74, 139, 126, 0.1);
}

.btn-edit:hover {
    background-color: rgba(74, 139, 126, 0.2);
}

.btn-delete {
    color: #e53935;
    background-color: rgba(229, 57, 53, 0.1);
    margin-left: 5px;
}

.btn-delete:hover {
    background-color: rgba(229, 57, 53, 0.2);
}

/* Table Footer */
.table-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.table-info {
    font-size: 0.9rem;
    color: #666;
}

.pagination {
    display: flex;
    gap: 5px;
}

.pagination-btn {
    width: 35px;
    height: 35px;
    border: 1px solid #ddd;
    background-color: white;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
}

.pagination-btn:hover {
    background-color: #f5f5f5;
}

.pagination-btn.active {
    background-color: #4a8b7e;
    color: white;
    border-color: #4a8b7e;
}

.pagination-btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Button Styles */
.btn {
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn i {
    font-size: 0.9rem;
}

.btn-primary {
    background-color: #4a8b7e;
    color: white;
}

.btn-primary:hover {
    background-color: #3a7a6d;
}

.btn-secondary {
    background-color: #f1f1f1;
    color: #555;
}

.btn-secondary:hover {
    background-color: #e0e0e0;
}

/* Modal Styles */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.modal-content {
    background-color: white;
    border-radius: 8px;
    width: 100%;
    max-width: 600px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.modal-header {
    padding: 15px 20px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    font-size: 1.3rem;
    color: #2c3e50;
}

.close-modal {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #888;
    transition: color 0.3s;
}

.close-modal:hover {
    color: #333;
}

.modal-body {
    padding: 20px;
}

/* Form Styles */
.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
}

.form-group {
    flex: 1;
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #555;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 0.9rem;
    transition: all 0.3s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #4a8b7e;
    box-shadow: 0 0 0 2px rgba(74, 139, 126, 0.2);
}

.form-group textarea {
    resize: vertical;
    min-height: 80px;
}

.file-upload {
    position: relative;
}

.file-upload input[type="file"] {
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
    background-color: #2c5e50;
}

.file-upload-label {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    border: 2px dashed #ddd;
    border-radius: 4px;
    background-color: #f9f9f9;
    cursor: pointer;
    transition: all 0.3s;
}

.file-upload-label i {
    font-size: 2rem;
    color: #4a8b7e;
    margin-bottom: 10px;
}

.file-upload-label span {
    color: #666;
}

.file-upload-label:hover {
    border-color: #4a8b7e;
    background-color: #f0f7f5;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 20px;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .sidebar {
        width: 70px;
        overflow: hidden;
    }
    
    .logo span,
    .sidebar-nav li a span,
    .user-info {
        display: none;
    }
    
    .logo {
        justify-content: center;
    }
    
    .sidebar-nav li a {
        justify-content: center;
    }
    
    .sidebar-nav li a i {
        margin-right: 0;
        font-size: 1.3rem;
    }
    
    .sidebar-footer {
        justify-content: center;
    }
    
    .logout-btn {
        display: none;
    }
}

@media (max-width: 768px) {
    .form-row {
        flex-direction: column;
        gap: 0;
    }
    
    .header-actions {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .search-box input {
        width: 200px;
    }
    
    .card-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .card-actions {
        width: 100%;
        justify-content: space-between;
    }
    
    .table-footer {
        flex-direction: column;
        gap: 15px;
    }
}
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-spa"></i>
                <span>Fleurissima</span>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="fas fa-store"></i>
                            <span>Produits</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-shopping-basket"></i>
                            <span>Commandes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-users"></i>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-chart-line"></i>
                            <span>Statistiques</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-cog"></i>
                            <span>Paramètres</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <div class="user-profile">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Profile">
                    <div class="user-info">
                        <span class="user-name">Sophie Martin</span>
                        <span class="user-role">Gérante</span>
                    </div>
                </div>
                <button class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
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
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>#FL001</td>
                                        <td>
                                            <div class="product-img">
                                                <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Rose bouquet">
                                            </div>
                                        </td>
                                        <td>{{$product->product_name}}</td>
                                        <td>Bouquets</td>
                                        <td>€{{$product->product_prix}}</td>
                                        <td>{{$product->product_stock}}</td>
                                        <td><span class="badge badge-success">En stock</span></td>
                                        <td>
                                        <button class="btn-action btn-delete" onclick='update()'>
                                        <i class="fas fa-edit"></i>
</button>
                                        <!-- <a href="{{route('Product.edit',['Product'=>$product->id])}}" class="btn-action btn-edit"><i class="fas fa-edit"></i></a> -->
                                             <form action="{{route('Product.destroy',['Product'=>$product->id] )}}"method="POST"onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette categorie ?');">
                                             @csrf
                                             @method('DELETE')
                                            <button class="btn-action btn-delete"><i class="fas fa-trash"></i></button></form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- <tr>
                                        <td>#FL002</td>
                                        <td>
                                            <div class="product-img">
                                                <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Orchid">
                                            </div>
                                        </td>
                                        <td>Orchidée blanche</td>
                                        <td>Plantes</td>
                                        <td>€32.50</td>
                                        <td>8</td>
                                        <td><span class="badge badge-success">En stock</span></td>
                                        <td>
                                            <button class="btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#FL003</td>
                                        <td>
                                            <div class="product-img">
                                                <img src="https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Tulips">
                                            </div>
                                        </td>
                                        <td>Tulipes multicolores</td>
                                        <td>Fleurs coupées</td>
                                        <td>€28.00</td>
                                        <td>0</td>
                                        <td><span class="badge badge-danger">Rupture</span></td>
                                        <td>
                                            <button class="btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#FL004</td>
                                        <td>
                                            <div class="product-img">
                                                <img src="https://images.unsplash.com/photo-1459156212016-c812468e2115?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Flower arrangement">
                                            </div>
                                        </td>
                                        <td>Composition printanière</td>
                                        <td>Compositions</td>
                                        <td>€65.00</td>
                                        <td>5</td>
                                        <td><span class="badge badge-warning">Stock limité</span></td>
                                        <td>
                                            <button class="btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#FL005</td>
                                        <td>
                                            <div class="product-img">
                                                <img src="https://images.unsplash.com/photo-1526397751294-331021109fbd?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Succulent">
                                            </div>
                                        </td>
                                        <td>Succulente en pot</td>
                                        <td>Plantes</td>
                                        <td>€18.00</td>
                                        <td>15</td>
                                        <td><span class="badge badge-success">En stock</span></td>
                                        <td>
                                            <button class="btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                            {{$products->links()}}
                        </div>
                        <div class="table-footer">
                            <div class="table-info">
                                Affichage de 1 à 5 sur 12 produits
                            </div>
                            <div class="pagination">
                                <button class="pagination-btn disabled">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="pagination-btn active">1</button>
                                <button class="pagination-btn">2</button>
                                <button class="pagination-btn">3</button>
                                <button class="pagination-btn">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Product Modal (hidden by default) -->
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
                                        <input type="text" id="product_name"name="product_name" placeholder="entrer le nom de produit " required>
                                    </div>
                                    <div class="form-group">
                                        <label for="productCategory">Catégorie</label>
                                        <select id="productCategory" name="category_id" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach ($categories as $category)
                                          
                                            <option value="{{$category->id}}"name="category_id">{{$category->category_name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="productPrice">Prix (€)</label>
                                        <input type="number"  name="product_prix"id="productPrice" step="0.01" min="0" placeholder="Ex: 45.00" required>
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
                                            <option value="{{$type->id}}" >{{$type->type_name}}</option>
                                       
                                            @endforeach
                                          
                                        </select>
                                    </div>
                                    <!-- hh -->
                                     
                                <div class="form-group">
                                    <label for="productDescription">Description</label>
                                    <textarea id="productDescription" rows="3" name="product_description"placeholder="Description du produit..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productImage">Image du produit</label>
                                    <div class="file-upload">
                                        <input type="file" id="productImage"  name="product_image"accept="image/*">
                                        <label for="productImage" class="file-upload-label">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <span>Choisir une image</span>
                                        </label>
                                    </div>
                                </div>
                               
                                 <div class="form-group">
                                    <label for="productImage">collection des images </label>
                                    <div class="file-upload">
                                        <input type="file" id="productImage" name="images[]"  multiple accept="image/*">
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
        



                <div class="modal" id="updateProductModal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>modifier  produit</h3>
                            <button class="close-modal"onClick=" closeModal() ">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="updateProductForm" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="productName">Nom du produit</label>
                                        <input type="text" id="product_name"name="product_name" placeholder="entrer le nom de produit " required>
                                    </div>
                                    <div class="form-group">
                                        <label for="productCategory">Catégorie</label>
                                        <select id="productCategory" name="category_id" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach ($categories as $category)
                                          
                                            <option value="{{$category->id}}"name="category_id">{{$category->category_name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="productPrice">Prix (€)</label>
                                        <input type="number"  name="product_prix"id="productPrice" step="0.01" min="0" placeholder="Ex: 45.00" required>
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
                                            <option value="{{$type->id}}" >{{$type->type_name}}</option>
                                       
                                            @endforeach
                                          
                                        </select>
                                    </div>
                                    <!-- hh -->
                                     
                                <div class="form-group">
                                    <label for="productDescription">Description</label>
                                    <textarea id="productDescription" rows="3" name="product_description"placeholder="Description du produit..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productImage">Image du produit</label>
                                    <div class="file-upload">
                                        <input type="file" id="productImage"  name="product_image"accept="image/*">
                                        <label for="productImage" class="file-upload-label">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <span>Choisir une image</span>
                                        </label>
                                    </div>
                                </div>
                               
                                 <div class="form-group">
                                    <label for="productImage">collection des images </label>
                                    <div class="file-upload">
                                        <input type="file" id="productImage" name="images[]"  multiple accept="image/*">
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

            </div>
        </main>
    </div>

    <script>
        const categories = @json($categories);
        
        const types = @json($types);

        const updateProductModal = document.getElementById('updateProductModal');
        const updateProductForm = document.getElementById('updateProductForm');

function update(){
    const updateProductForm = document.getElementById('updateProductForm');
    updateProductModal.style.display="flex";
   
    console.log(updateProductForm);
 }

















    
    const addProductBtn = document.getElementById('addProductBtn');
    const addProductModal = document.getElementById('addProductModal');
    const closeModalBtns = document.querySelectorAll('.close-modal');
    
    // Fonction pour ouvrir le modal
    function openModal() {
        addProductModal.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Empêche le défilement de la page
    }
    
    // Fonction pour fermer le modal
    function closeModal() {
        addProductModal.style.display = 'none';
         updateProductModal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Rétablit le défilement
    }
    
    // Événement click sur le bouton "Ajouter un produit"
    addProductBtn.addEventListener('click', openModal);
    
    // Événements click sur les boutons de fermeture
    closeModalBtns.forEach(btn => {
        btn.addEventListener('click', closeModal);
    });
    
    // Fermer le modal en cliquant à l'extérieur
    addProductModal.addEventListener('click', (e) => {
        if (e.target === addProductModal) {
            closeModal();
        }
    });
    
    // Gestion de la soumission du formulaire
    // const addProductForm = document.getElementById('addProductForm');
    // addProductForm.addEventListener('submit', (e) => {
    //     e.preventDefault();
        
    //     // Ici vous pouvez ajouter le code pour traiter les données du formulaire
    //     // Par exemple, envoyer les données à un serveur ou ajouter le produit à la liste
        
    //     // Afficher un message de confirmation
    //     // alert('Produit ajouté avec succès!');
        
    //     // // Réinitialiser le formulaire
    //     // addProductForm.reset();
        
    //     // Fermer le modal
    //     closeModal();
    // });
    function editProduct(Product) {

// Supposons que $products est déjà défini côté JS (par une API par exemple)
let products = $products || []; // Fallback si undefined
console.log(products);
    // document.getElementById('category_id').value = id;
    // document.getElementById('category_name').value = name;
    //  form = document.getElementById('category_form');
    // form.action = `/categories/${Product}`; 
    

    openCategoryUpdateModal(); 
}
 
</script>
    </script>
</body>
</html>