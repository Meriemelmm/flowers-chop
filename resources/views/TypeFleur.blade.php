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
                <h1>Gestion des types</h1>
                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher un type...">
                    </div>
                    <button class="btn btn-primary" onclick="opentypeModal()">
                        <i class="fas fa-plus"></i> Nouvelle type de fleur
                    </button>
                </div>
            </div>
        
            <div class="card">
                <div class="card-header">
                    <h2>Liste des types de fleur</h2>
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
                           
                            @foreach ($types as $type)
                                <tr>
                                 
                                    <td>{{$type->type_name}}</td>
                                    
                                    <td>

                                        <button class="btn-action btn-edit"  title="Modifier"   
                                         onclick="editTypes({{ $type->id }}, '{{ $type->type_name }}')">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{route('TypeFleur.destroy',['TypeFleur'=>$type->id])}}" method="POST"onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce type ?');">
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
        <div class="modal" id="typeModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>  ajouter type</h3>
                    <button class="close-modal" onclick="closetypeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST"id="type-form" action="{{route('TypeFleur.store')}}">
                    @csrf
                  
                   

               
                 
                        <div class="form-group">
                            <label for="category-name">Nom de la catégorie</label>
                            <input type="text" id="category-name" placeholder="Entrez le nom" name="type_name">
                        </div>
                       
                        <div class="form-actions">
                            <button class="btn btn-secondary" type="button" onclick="closetypeModal()">Annuler</button>
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- update modal -->
        <div class="modal" id="typeUpdateModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3> modifier Type</h3>
                    <button class="close-modal" onclick="closetypeUpdateModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST"id="type_form" action="">
                    @csrf
                    @method('PATCH')
                  
                   

                    <input type="hidden" name="id" id="type_id" >
                 
                        <div class="form-group">
                            <label for="type-name">Nom de type</label>
                            <input type="text" id="type_name" placeholder="Entrez le nom" name="type_name">
                        </div>
                       
                        <div class="form-actions">
                            <button class="btn btn-secondary" type="button" onclick="closetypeUpdateModal()">Annuler</button>
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         
        </div>
        
        <script>
            function opentypeModal() {
                document.getElementById("typeModal").style.display = "flex";
            }
        
            function closeCategoryModal() {
                document.getElementById("typeModal").style.display = "none";
            }

            // update:
            function opentypeUpdateModal() {
                document.getElementById("typeUpdateModal").style.display = "flex";
            }
        
            function closetypeUpdateModal() {
                document.getElementById("typeUpdateModal").style.display = "none";
            }
          
function editTypes(TypeFleur, name) {
    document.getElementById('type_id').value = TypeFleur;
    document.getElementById('type_name').value = name;
     form = document.getElementById('type_form');
    form.action = `/TypeFleur/${TypeFleur}`; 
    

    opentypeUpdateModal(); 
}
</script>

        
        
   
</body>
</html>