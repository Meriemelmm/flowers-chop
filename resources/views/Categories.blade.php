<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleurissima - Gestion des Produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
  
   

    
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
                    <li>
                        <a href="#">
                            <i class="fas fa-folder-tree"></i>
                            <span>categories</span>
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
        <div class="main-content">
            <div class="main-header">
                <h1>Gestion des Catégories</h1>
                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher une catégorie...">
                    </div>
                    <button class="btn btn-primary" onclick="openCategoryModal()">
                        <i class="fas fa-plus"></i> Nouvelle Catégorie
                    </button>
                </div>
            </div>
        
            <div class="card">
                <div class="card-header">
                    <h2>Liste des Catégories</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="products-table">
                            <thead>
                                <tr>
                                  
                                    <th>Nom</th>
                                   
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            @foreach ($categories as $category)
                                <tr>
                                 
                                    <td>{{$category->category_name}}</td>
                                    
                                    <td>

                                        <button class="btn-action btn-edit"  title="Modifier"   
                                         onclick="editCategory({{ $category->id }}, '{{ $category->category_name }}', '{{ $category->description }}')">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{route('categories.destroy',['category'=>$category->id])}}" method="POST"onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette categorie ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action btn-delete" title="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                        </button></form>
                                    </td>
                                </tr>
                                @endforeach
                              
                                  
                               
                               
                            </tbody>
                        </table>
                    </div>
        
                 
                </div>
            </div>
        </div>
        
        <!-- Modal Ajout Catégorie -->
        <div class="modal" id="categoryModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3> categorie</h3>
                    <button class="close-modal" onclick="closeCategoryModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST"id="category-form" action="{{route('categories.store')}}">
                    @csrf
                  
                   

               
                 
                        <div class="form-group">
                            <label for="category-name">Nom de la catégorie</label>
                            <input type="text" id="category-name" placeholder="Entrez le nom" name="category_name">
                        </div>
                       
                        <div class="form-actions">
                            <button class="btn btn-secondary" type="button" onclick="closeCategoryModal()">Annuler</button>
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- update modal -->
        <div class="modal" id="categoryUpdateModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3> categorie</h3>
                    <button class="close-modal" onclick="closeCategoryUpdateModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST"id="category_form" action="">
                    @csrf
                    @method('PATCH')
                  
                   

                    <input type="hidden" name="id" id="category_id" >
                 
                        <div class="form-group">
                            <label for="category-name">Nom de la catégorie</label>
                            <input type="text" id="category_name" placeholder="Entrez le nom" name="category_name">
                        </div>
                       
                        <div class="form-actions">
                            <button class="btn btn-secondary" type="button" onclick="closeCategoryUpdateModal()">Annuler</button>
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         
        </div>
        
        <script>
            function openCategoryModal() {
                document.getElementById("categoryModal").style.display = "flex";
            }
        
            function closeCategoryModal() {
                document.getElementById("categoryModal").style.display = "none";
            }

            // update:
            function openCategoryUpdateModal() {
                document.getElementById("categoryUpdateModal").style.display = "flex";
            }
        
            function closeCategoryUpdateModal() {
                document.getElementById("categoryUpdateModal").style.display = "none";
            }
          
function editCategory(id, name) {
    document.getElementById('category_id').value = id;
    document.getElementById('category_name').value = name;
     form = document.getElementById('category_form');
    form.action = `/categories/${id}`; 
    

    openCategoryUpdateModal(); 
}
</script>

        
        
   
</body>
</html>