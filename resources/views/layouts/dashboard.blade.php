<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merylowers - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Commande.css') }}">
    <link rel="stylesheet" href="{{ asset('css/static.css') }}">
    
    <style>
        a {
    color: inherit; 
    text-decoration: none; 
}
    </style>
</head>
<body>
    <div class="dashboard-container">
        @include('components.sidebar')
        
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    @yield('modals')
    @yield('scripts')
   
    <link rel="stylesheet" href="{{ asset('css/Commandes.css') }}">

</body>
</html>