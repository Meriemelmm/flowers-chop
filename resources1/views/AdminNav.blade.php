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
                    <li >
                        <a href="/categories">
                            <i class="fas fa-store"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li >
                        <a href="/TypeFleur">
                            <i class="fas fa-store"></i>
                            <span>TypeFleur</span>
                        </a>
                    </li>
                    <li >
                        <a href="/Product">
                            <i class="fas fa-store"></i>
                            <span>Produits</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Users">
                            <i class="fas fa-shopping-basket"></i>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-users"></i>
                            <span>Commandes</span>
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
                <form method="POST" action="{{ route('logout') }}">
    @csrf
     <button class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
</form>

              
            </div>
        </aside>