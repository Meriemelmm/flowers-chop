<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <a href="#" class="text-3xl font-['Pacifico'] text-primary">Merylowers</a>
        <nav class="hidden md:flex space-x-6">
            <a href="/" class="hover:text-primary transition-colors">Accueil</a>
            <a href="{{ route('shop.index') }}" class="text-primary font-medium">Boutique</a>
            @auth
            <a href="{{ route('commande.user') }}" class="text-primary font-medium">mes commandes </a>
            @endauth
            <a href="{{route('about')}}" class="hover:text-primary transition-colors">À propos</a>
            <a href="{{route('contact')}}" class="hover:text-primary transition-colors">Contact</a>
        </nav>
        <div class="flex items-center space-x-4">
            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 cursor-pointer transition-colors">
                <i class="ri-search-line text-lg"></i>
            </div>
             <a href="{{ route('Panier.index') }}">
            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 cursor-pointer transition-colors relative">
                <i class="ri-shopping-cart-2-line text-lg"></i>
                <span class="absolute -top-1 -right-1 bg-primary text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">{{$count}}</span>
            </div>
             </a>
            <!-- Authentication links -->
            <div class="flex space-x-4">
                @auth
                    <!-- User is authenticated, show Logout link -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-primary font-medium hover:text-primary transition-colors">
                            Logout
                        </button>
                    </form>
                    
                @else
                    <!-- User is not authenticated, show Login and Register links -->
                    <a href="{{ route('login') }}" class="text-primary font-medium hover:text-primary transition-colors">Login</a>
                    <a href="{{ route('register') }}" class="text-primary font-medium hover:text-primary transition-colors">Register</a>
                @endauth
            </div>

            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 cursor-pointer transition-colors md:hidden">
                <i class="ri-menu-line text-lg"></i>
            </div>
        </div>
    </div>
</header>
