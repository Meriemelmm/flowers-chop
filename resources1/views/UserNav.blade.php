<header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a class="text-3xl font-['Pacifico'] text-primary">logo</a>
            
            <nav class="hidden md:flex space-x-8">
                <a href="/Home" class="text-gray-800 hover:text-primary font-medium transition">Accueil</a>
                <a href="/Shop" class="text-gray-600 hover:text-primary font-medium transition">Boutique</a>
                <a href="#" class="text-gray-600 hover:text-primary font-medium transition">Catégories</a>
                <a href="#" class="text-gray-600 hover:text-primary font-medium transition">À propos</a>
                <a href="#" class="text-gray-600 hover:text-primary font-medium transition">Contact</a>
            </nav>
            
            <div class="flex items-center space-x-4">
                @guest
            <a href="/login" class="text-gray-600 hover:text-primary font-medium transition">login</a>
            <a href="/register" class="text-gray-600 hover:text-primary font-medium transition">register</a>
               @endguest      
            
                <div class="relative w-10 h-10 flex items-center justify-center">
                    <i class="ri-search-line text-gray-600 hover:text-primary transition cursor-pointer"></i>
                </div>
                @auth
                <div class="relative w-10 h-10 flex items-center justify-center">
                <form method="POST" action="{{ route('logout') }}">
    @csrf
     <button class="logout-btn" style="color:black">
     <i class="fas fa-sign-out-alt ri-user-line text-gray-600 hover:text-primary transition cursor-pointer "></i>
                </button>
</form>
                    
                </div>
               
                <div class="relative w-10 h-10 flex items-center justify-center">
                    <i class="ri-heart-line text-gray-600 hover:text-primary transition cursor-pointer"></i>
                    <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                </div>
                
                <a href="/Panier" class="relative w-10 h-10 flex items-center justify-center">
                    <i class="ri-shopping-cart-line text-gray-600 hover:text-primary transition cursor-pointer"></i>
                    <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
</a>
                <button class="md:hidden w-10 h-10 flex items-center justify-center">
                    <i class="ri-menu-line text-gray-600 text-xl"></i>
                </button>
                @endauth
            </div>
        </div>
    </header>