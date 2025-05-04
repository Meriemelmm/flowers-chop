@extends('layouts.dashboard')

@section('title', 'Gestion des Produits')

@section('content')
<main class="main-content">
            <header class="main-header">
                <h1>Gestion des Clients</h1>
                <div class="header-actions">
                    
                </div>
            </header>

            <div class="content-wrapper">
                <!-- Clients Table -->
                <div class="card">
                    <div class="card-header">
                        <h2>Liste des clients</h2>
                      
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="clients-table">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Contact</th>
                                        <th>Commandes</th>
                                       
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
 @foreach($users as $user)
 @if($user->role==='client')
                                    <tr>
                                        <td data-label="Client">
                                            <div class="client-info">
                                               
                                                <div>
                                                    <div class="client-name">{{$user->name}}</div>
                                                    <div class="client-email">{{$user->email}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Contact">
                                            <div class="client-phone">{{$user->phone}}</div>
                                        </td>
                                        <td data-label="Commandes">
                                            <div class="client-orders">8</div>
                                        </td>
                                       
                                        <td data-label="Statut">
                                            @if($user->is_ban ==false)
                                            <form method="POST" action="{{route('Users.ban',['id'=>$user->id])}}">
                                            @csrf
                                            <button class="btn-action btn-message">
                                                <i class="fas fa-user-check" style="color:green;"></i>
                                            </button> actif 
                                            </form>
                                            @else
                                            <form method="POST" action="{{route('Users.ban',['id'=>$user->id])}}">
                                            @csrf
                                            <button class="btn-action btn-message">
                                                <i class="fas fa-user-slash"style="color:red;"></i>
                                            </button> banni
                                            </form>
                                            @endif
                                        </td>
                                        <td data-label="Actions" style="display:flex">
                                        <button class="btn-action btn-view" onclick="openClientDetail(this)" 
    data-id="{{$user->id}}"
    data-name="{{$user->name}}" 
    data-email="{{$user->email}}" 
    data-phone="{{$user->phone}}"
    data-address="{{$user->address}}"
    data-city="{{$user->city}}"
    data-postal_code="{{$user->postal_code}}"
    data-created_at="{{$user->created_at}}"
    data-status="{{$user->is_ban}}"
    data-country="{{$user->country}}"
    data-inscription="{{$user->created_at}}">
    <i class="fas fa-eye"></i>
</button>

                                            <form action="{{route('Users.delete',['userId'=>$user->id])}}" onsubmit="return confirm('Voulez-vous vraiment SUPPRIMER ce Client ?');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-action btn-edit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            </form>
                                            <!-- <button class="btn-action btn-message">
                                                <i class="fas fa-ban"></i>
                                            </button> -->
                                        </td>
                                    </tr>
                                    @endif
                                    
                                    @endforeach
                                  
                                </tbody>
                            </table>

                        </div>
                      

                        <div class="table-footer">
                    <div class="table-info">
                       
                        Affichage de {{ $users->firstItem() }} à {{ $users->lastItem() }} sur {{ $users->total() }} clients
                    </div>
                    <div class="pagination">
                      
                        @if ($users->onFirstPage())
                            <button class="pagination-btn disabled">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @else
                            <a href="{{ $products->previousPageUrl() }}" class="pagination-btn">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif
                
                        <!-- Pagination Links -->
                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                            @if ($page == $users->currentPage())
                                <button class="pagination-btn active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="pagination-btn">{{ $page }}</a>
                            @endif
                        @endforeach
                
                        <!-- Next Page Button -->
                        @if ($users->hasMorePages())
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
        </main>
    </div>

@endsection
@section('modals')
<div class="modal" id="clientDetailModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Détails du client <span id="clientNameTitle"></span></h3>
                <button class="close-modal" onclick="closeClientDetail()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="client-detail">
                    <div>
                        <div class="client-section">
                            <h4>Informations personnelles</h4>
                            <div class="client-info-detail">
                                <div class="info-label">Nom complet:</div>
                                <div class="info-value" id="clientFullName">Marie Dupont</div>
                            </div>
                            <div class="client-info-detail">
                                <div class="info-label">Email:</div>
                                <div class="info-value" id="clientEmail">marie.dupont@example.com</div>
                            </div>
                            <div class="client-info-detail">
                                <div class="info-label">Téléphone:</div>
                                <div class="info-value" id="clientPhone">+33 6 12 34 56 78</div>
                            </div>
                            <div class="client-info-detail">
                                <div class="info-label">Date d'inscription:</div>
                                <div class="info-value" id="clientJoinDate">15 janvier 2022</div>
                            </div>
                            <!-- <div class="client-info-detail">
                                <div class="info-label">Statut:</div>
                                <div class="info-value">
                                    <span class="client-status status-premium">Premium</span>
                                </div>
                            </div> -->
                        </div>

                        <div class="client-section">
                            <h4>Adresse</h4>
                            <div class="client-info-detail">
                                <div class="info-label">Adresse:</div>
                                <div class="info-value" id="clientAddress">15 Rue des Fleurs, 75001 Paris</div>
                            </div>
                            <div class="client-info-detail">
                                <div class="info-label">Code postal:</div>
                                <div class="info-value" id="clientZipCode">75001</div>
                            </div>
                            <div class="client-info-detail">
                                <div class="info-label">Ville:</div>
                                <div class="info-value" id="clientCity">Paris</div>
                            </div>
                            <div class="client-info-detail">
                                <div class="info-label">Pays:</div>
                                <div class="info-value" id="clientCountry">France</div>
                            </div>
                        </div>
                    </div>

            
                </div>

                <div class="client-actions">
                    <button class="btn btn-secondary" onclick="closeClientDetail()">Fermer</button>
                    <button class="btn btn-primary">
                        <i class="fas fa-edit"></i> Modifier
                    </button>
                    <button class="btn btn-primary">
                        <i class="fas fa-envelope"></i> Envoyer un message
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

<script src="{{ asset('js/user-modals.js') }}"></script>

@endsection

