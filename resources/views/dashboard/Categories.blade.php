@extends('layouts.dashboard')

@section('title', 'Gestion des categories')

@section('content')
        <!-- Main Content -->
  
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
                                    
                                    <td style="display:flex">

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
        @endsection
        @section('modals')
        <!-- Modal Ajout Catégorie -->
        <div class="modal" id="categoryModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3> categorie</h3>
                    <button type="button" class="close-modal" onclick="closeCategoryModal()">&times;</button>
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
                    <button type="button" class="close-modal" onclick="closeCategoryModal()">&times;</button>
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
         
        @endsection
        @section('scripts')

        <script src="{{ asset('js/category-modals.js') }}"></script>
        
@endsection
