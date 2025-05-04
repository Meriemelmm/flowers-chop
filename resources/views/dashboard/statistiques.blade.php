@extends('layouts.dashboard')

@section('title', 'statistques')

@section('content')
<div class="main-content">
           
        
            <div class="welcome-message">
                <div class="welcome-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <div class="welcome-text">
                    <h2>{{ Auth::user()->name}}!</h2>
                    <p>Voici un aperçu de vos statistiques et activités récentes.</p>
                </div>
            </div>

           
            <div class="stats-cards">
              
                <div class="stat-card primary">
                    <div class="stat-card-header">
                        <span class="stat-card-title">Produits en stock</span>
                        <div class="stat-card-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                    </div>
                    <span class="stat-card-value">{{$produitsEnStock}}</span>
                  
                </div>
             
                <div class="stat-card success">
                    <div class="stat-card-header">
                        <span class="stat-card-title">Commandes </span>
                        <div class="stat-card-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                    </div>
                    <span class="stat-card-value">{{$commandes}}</span>
                   
                </div>
              
                <div class="stat-card warning">
                    <div class="stat-card-header">
                        <span class="stat-card-title">actif  clients</span>
                        <div class="stat-card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <span class="stat-card-value">{{$actifs}}</span>
                
                </div>
             
                <div class="stat-card danger">
                    <div class="stat-card-header">
                        <span class="stat-card-title">nombres de  produits</span>
                        <div class="stat-card-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                    </div>
                    <span class="stat-card-value">{{$products}} </span>
                   
                </div>
            </div>
        </div>

@endsection