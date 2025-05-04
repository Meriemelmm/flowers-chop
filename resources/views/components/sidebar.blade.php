<!-- Sidebar -->
<aside class="sidebar">
    <div class="logo">
        <i class="fas fa-spa"></i>
        <span>Merylowers</span>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li>
                <a href="{{route('static')}}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li>
                <a href="{{route('categories.index')}}">
                    <i class="fas fa-folder-tree"></i>
                    <span>categories</span>
                </a>
            </li>
            <li>
                <a href="{{route('TypeFleur.index')}}">
                    <i class="fas fa-chart-line"></i>
                    <span>Type Fleure</span>
                </a>
            </li>
            <li >
                <a href="{{route('Product.index')}}">
                    <i class="fas fa-store"></i>
                    <span>Produits</span>
                </a>
            </li>
            <li>
                <a href="{{route('commande.total')}}">
                    <i class="fas fa-shopping-basket"></i>
                    <span>Commandes</span>
                </a>
            </li>
            <li>
                <a href="{{route('Users.index')}}">
                    <i class="fas fa-users"></i>
                    <span>Clients</span>
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
                <span class="user-name">{{auth()->user()->name}}</span>
                <span class="user-role">{{auth()->user()->role}}</span>
            </div>
        </div>
       
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('.sidebar-nav a');
        const currentUrl = window.location.href;
    
        links.forEach(link => {
            if (currentUrl.includes(link.href)) {
                link.parentElement.classList.add('active');
            } else {
                link.parentElement.classList.remove('active');
            }
        });
    });
    </script>
    