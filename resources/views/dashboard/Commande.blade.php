@extends('layouts.dashboard')

@section('title', 'Gestion des categories')

@section('content')
<header class="main-header">
                <h1>Gestion des Commandes</h1>
                <div class="header-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Rechercher une commande...">
                        <i class="fas fa-search"></i>
                    </div>
                    <button class="btn btn-secondary">
                        <i class="fas fa-filter"></i> Filtres
                    </button>
                </div>
            </header>
            <div class="content-wrapper">
                <!-- Orders Table -->
                <div class="card">
                    <div class="card-header">
                        <h2>Liste des commandes récentes</h2>
                        <div class="card-actions">
                            <select class="filter-select">
                                <option>Tous les statuts</option>
                                <option>En attente</option>
                                <option>En traitement</option>
                                <option>Complétée</option>
                                <option>Annulée</option>
                            </select>
                            <select class="filter-select">
                                <option>Derniers 7 jours</option>
                                <option>Aujourd'hui</option>
                                <option>Ce mois</option>
                                <option>Toutes les dates</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="orders-table">
                                <thead>
                                    <tr>
                                        <th>N° Commande</th>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($commandes as $commande)
                                    <tr>
                                        <td data-label="N° Commande">#ORD{{$commande->id}} </td>
                                        <td data-label="Client">
                                            <div class="customer-info">
                                                
                                                <div>
                                                    <div class="customer-name">{{$commande->client->name}}</div>
                                                    <div class="customer-email">{{$commande->client->email}}</div>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Date">
                                            <div class="order-date">{{ $commande->created_at->translatedFormat('d F Y') }}
                                            </div>
                                        </td>
                                        <td data-label="Montant">
                                            <div class="order-amount">{{ number_format((float) $commande->total_prix, 0, ',', ' ') }} DH
                                            </div>
                                            <div class="order-items"></div>
                                        </td>
                                        <td data-label="Statut">
    @if($commande->status === 'completed')
        <span class="order-status status-completed">{{ $commande->status }}</span>
    @elseif($commande->status === 'pending')
        <span class="status-option option-pending">{{ $commande->status }}</span>
    @else
        <span class="status-option option-cancelled">{{ $commande->status }}</span>
    @endif
</td>

                                        <td data-label="Actions">
                                        
                                     

    @if($commande->status !== 'cancelled' && $commande->status==="pending")
    <form action="{{route('commande.cancel',['id'=>$commande->id])}}" method="POST" style="display:inline;">
        @csrf
        @method('PUT')
        <button type="submit" class="btn-action btn-delete" onclick="return confirm('Annuler cette commande ?')">
            <i class="fas fa-times-circle"></i>
        </button>
    </form>
    @endif
</td>

                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                  
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="table-footer">
                    <div class="table-info">
                       
                        Affichage de {{ $commandes->firstItem() }} à {{ $commandes->lastItem() }} sur {{ $commandes->total() }} commandes
                    </div>
                    <div class="pagination">
                      
                        @if ($commandes->onFirstPage())
                            <button class="pagination-btn disabled">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @else
                            <a href="{{ $commandes->previousPageUrl() }}" class="pagination-btn">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif
                
                        <!-- Pagination Links -->
                        @foreach ($commandes->getUrlRange(1, $commandes->lastPage()) as $page => $url)
                            @if ($page == $commandes->currentPage())
                                <button class="pagination-btn active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="pagination-btn">{{ $page }}</a>
                            @endif
                        @endforeach
                
                        <!-- Next Page Button -->
                        @if ($commandes->hasMorePages())
                            <a href="{{ $commandes->nextPageUrl() }}" class="pagination-btn">
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