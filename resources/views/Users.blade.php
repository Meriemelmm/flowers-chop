<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleurissima - Gestion des Clients</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        /* Client Status Styles */
        .client-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-active {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-inactive {
            background-color: #ffebee;
            color: #c62828;
        }

        .status-premium {
            background-color: #fff8e1;
            color: #ff8f00;
        }

        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
        }

        .clients-table {
            width: 100%;
            border-collapse: collapse;
        }

        .clients-table th, 
        .clients-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .clients-table th {
            background-color: #f8f9fa;
            color: #555;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        .clients-table tr:hover {
            background-color: #f8f9fa;
        }

        .client-info {
            display: flex;
            align-items: center;
        }

        .client-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .client-name {
            font-weight: 500;
        }

        .client-email {
            font-size: 0.8rem;
            color: #888;
        }

        .client-phone {
            font-size: 0.9rem;
            color: #555;
        }

        .client-orders {
            font-weight: 600;
            color: #2c3e50;
        }

        .client-last-order {
            font-size: 0.9rem;
            color: #666;
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

        .btn-view {
            color: #4a8b7e;
            background-color: rgba(74, 139, 126, 0.1);
        }

        .btn-view:hover {
            background-color: rgba(74, 139, 126, 0.2);
        }

        .btn-edit {
            color:rgba(209, 19, 38, 0.81);
            background-color: rgba(33, 150, 243, 0.1);
            margin-left: 5px;
        }

        .btn-edit:hover {
            background-color: rgba(33, 150, 243, 0.2);
        }

        .btn-message {
            color: #9c27b0;
            background-color: rgba(156, 39, 176, 0.1);
            margin-left: 5px;
        }

        .btn-message:hover {
            background-color: rgba(156, 39, 176, 0.2);
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

        /* Client Detail Modal */
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
            max-width: 800px;
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

        /* Client Detail Styles */
        .client-detail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .client-section {
            margin-bottom: 20px;
        }

        .client-section h4 {
            margin-bottom: 15px;
            color: #2c3e50;
            font-size: 1.1rem;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }

        .client-info-detail {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 10px;
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: 500;
            color: #666;
        }

        .info-value {
            color: #333;
        }

        .client-orders-list {
            width: 100%;
            border-collapse: collapse;
        }

        .client-orders-list th {
            text-align: left;
            padding: 10px;
            background-color: #f8f9fa;
            font-size: 0.8rem;
            text-transform: uppercase;
            color: #555;
        }

        .client-orders-list td {
            padding: 12px 10px;
            border-bottom: 1px solid #eee;
        }

        .order-id {
            font-weight: 500;
        }

        .order-date {
            font-size: 0.9rem;
            color: #666;
        }

        .order-amount {
            font-weight: 600;
            color: #2c3e50;
        }

        .order-status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-completed {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-pending {
            background-color: #fff3e0;
            color: #ff8f00;
        }

        .client-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .stat-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: #4a8b7e;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
        }

        .client-actions {
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

            .client-detail {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
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

            .client-stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .clients-table {
                display: block;
            }

            .clients-table thead {
                display: none;
            }

            .clients-table tr {
                display: block;
                margin-bottom: 15px;
                border: 1px solid #eee;
                border-radius: 8px;
                padding: 10px;
            }

            .clients-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 8px 10px;
                border-bottom: 1px solid #f5f5f5;
            }

            .clients-table td::before {
                content: attr(data-label);
                font-weight: 500;
                color: #666;
                margin-right: 15px;
            }

            .clients-table td:last-child {
                border-bottom: none;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
               
                <span>Merylowers</span>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li>
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
                    <li class="active">
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
                <h1>Gestion des Clients</h1>
                <div class="header-actions">
                    
                    <div class="search-box">
                        <input type="text" placeholder="Rechercher un client...">
                        <i class="fas fa-search"></i>
                    </div>
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
                                            <form method="POST" method="{{route('Users.ban',['id'=>$user->id])}}">
                                            @csrf
                                            <button class="btn-action btn-message">
                                                <i class="fas fa-user-check" style="color:green;"></i>
                                            </button> actif 
                                            </form>
                                            @else
                                            <form method="POST" method="{{route('Users.ban',['id'=>$user->id])}}">
                                            @csrf
                                            <button class="btn-action btn-message">
                                                <i class="fas fa-user-slash"style="color:red;"></i>
                                            </button> banni
                                            </form>
                                            @endif
                                        </td>
                                        <td data-label="Actions" style="display:flex">
                                            <button class="btn-action btn-view" onclick='openClientDetail({{$user->id}})' data-id="{{$user->id}}" id="client"
                                        data-name="{{$user->name}}" 
                                        data-email="{{$user->email}}" 
                                        data-phone="{{$user->phone}}"
                                        data-address="{{$user->address}}"
                                        data-city="{{$user->city}}"
                                        data-postal_code="{{$user->postal_code}}"
                                        data-created_at="{{$user->created_at}}"
                                        data-status="{{$user->is_ban}}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <form action="{{route('Users.delete',['userId'=>$user->id])}}" onsubmit="return confirm('Voulez-vous vraiment SUPPRIMER ce Client ?');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-action btn-edit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            </form>
                                            <button class="btn-action btn-message">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
                                    
                                    @endforeach
                                  
                                </tbody>
                            </table>

                        </div>
                      

                        <div class="table-footer">
                            
                            <div class="table-info">
                                Affichage de 1 à 5 sur 42 clients
                            </div>
                            <div class="pagination">
                                <button class="pagination-btn disabled">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="pagination-btn active">1</button>
                                <button class="pagination-btn">1</button>
                                <button class="pagination-btn">3</button>
                                <button class="pagination-btn">4</button>
                                <button class="pagination-btn">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Client Detail Modal -->
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
                            <div class="client-info-detail">
                                <div class="info-label">Statut:</div>
                                <div class="info-value">
                                    <span class="client-status status-premium">Premium</span>
                                </div>
                            </div>
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

                    <div>
                        <div class="client-section">
                            <h4>Historique des commandes</h4>
                            <table class="client-orders-list">
                                <thead>
                                    <tr>
                                        <th>N° Commande</th>
                                        <th>Date</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody id="clientOrders">
                                    <!-- Orders will be added by JavaScript -->
                                </tbody>
                            </table>
                        </div>

                        <div class="client-section">
                            <h4>Statistiques</h4>
                            <div class="client-stats">
                                <div class="stat-card">
                                    <div class="stat-value">12</div>
                                    <div class="stat-label">Commandes</div>
                                </div>
                                <div class="stat-card">
                                    <div class="stat-value">€1,245.50</div>
                                    <div class="stat-label">Dépenses totales</div>
                                </div>
                                <div class="stat-card">
                                    <div class="stat-value">€103.79</div>
                                    <div class="stat-label">Moyenne/commande</div>
                                </div>
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

    <script>
        let users=@json($users);
   
      
        function openClientDetail(id) {

            console.log(id);
               let clients=users.filter(user=>user.role=id);
      console.log(clients); 
            //   const client = clients[clientId];
            // if (!client) return;

        //    console.log(button.getAttribute('name'));
            
        //      document.getElementById('clientNameTitle').textContent = button.getAttribute('name');
        //     document.getElementById('clientFullName').textContent = button.getAttribute('name');
        //     document.getElementById('clientEmail').textContent = button.getAttribute('email');
        //     document.getElementById('clientPhone').textContent = button.getAttribute('phone');
        //     document.getElementById('clientJoinDate').textContent = button.getAttribute('created_at');
        //     document.getElementById('clientAddress').textContent = button.getAttribute('address');
        //     document.getElementById('clientZipCode').textContent = button.getAttribute('postal_code');
        //     document.getElementById('clientCity').textContent = button.getAttribute('city');
        //     document.getElementById('clientCountry').textContent = button.getAttribute('country');
           
            document.getElementById('clientDetailModal').style.display = 'flex';
        }

       
        function closeClientDetail() {
            document.getElementById('clientDetailModal').style.display = 'none';
        }

       
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('clientDetailModal');
            if (event.target === modal) {
                closeClientDetail();
            }
        });

        
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        if (hamburger) {
            hamburger.addEventListener('click', function() {
                this.classList.toggle('active');
                navLinks.classList.toggle('active');
            });
        }

        
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            }
        });
    </script>
</body>
</html>