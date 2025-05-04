@extends('layouts.dashboard')

@section('title', 'Gestion des categories')

@section('content')
        <!-- Main Content -->
  
            <div class="main-header">
                <h1>Gestion des types</h1>
                <div class="header-actions">
                   
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
                                    
                                    <td style="display:flex">

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
         
               
        @endsection
        @section('scripts')

        

        <script src="{{ asset('js/type-fleure-modal.js') }}"></script>
        
@endsection



        
        
