<!-- Navbar Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="z-index: 9999">
    <div class="container">
        <!-- Logo -->
        <a href="{{ route('home', ['lang' => app()->getLocale()]) }}">
            <img src="{{ asset('assets/logo/logon.png') }}"
                 alt="{{ __('header.logo_alt') }}" 
                 width="70" 
                 height="auto">
        </a>
        
        <!-- Bouton mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 {{ request()->routeIs('home') ? 'active bg-white bg-opacity-10' : '' }}" 
                       href="{{ route('home', ['lang' => app()->getLocale()]) }}">
                        {{ __('menu.home_link') }}
                    </a>
                </li>

                <!-- Chiots à vendre -->
               <style>
  /* Style pour chaque élément de menu avec dropdown */
  .nav-item {
    position: relative;
  }
  
  /* Menu déroulant caché par défaut */
  .nav-item .dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    min-width: 200px;
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    margin-top: 0;
    z-index: 1000;
    padding: 0.5rem 0;
  }
  
  /* Ajouter une zone de transition invisible entre le lien et le menu */
  .nav-item .dropdown-menu::before {
    content: '';
    position: absolute;
    top: -10px;
    left: 0;
    right: 0;
    height: 10px;
  }
  
  /* Affichage du menu au survol de l'élément parent */
  .nav-item:hover .dropdown-menu {
    display: block;
  }
  
  /* Style des liens dans le menu déroulant */
  .dropdown-menu .dropdown-item {
    display: block;
    padding: 0.5rem 1rem;
    color: #333;
    text-decoration: none;
    transition: all 0.2s;
    font-size: 0.9rem;
    white-space: nowrap;
  }
  
  .dropdown-menu .dropdown-item:hover {
    background-color: #f3f4f6;
    padding-left: 1.2rem;
  }
  
  /* Flèche indicatrice sur l'élément parent */
  .nav-link.has-dropdown::after {
    content: " ▼";
    font-size: 0.7em;
    margin-left: 0.3rem;
  }
</style>

<!-- Chiens à vendre avec ses races -->
<li class="nav-item">
  <a class="nav-link px-3 py-2 rounded-3 has-dropdown {{ request()->routeIs('races.multiples') && request()->route('slugs') && in_array(request()->route('slugs'), ['husky-siberien', 'pomsky-et-golden-retriever', 'spitz-nain-pomeranien-et-yorkshire-terrier', 'ckc-et-jack-russel']) ? 'active bg-white bg-opacity-10' : '' }}" 
     href="#">
    {{ __('menu.puppies_sale_link') }}
  </a>
  <div class="dropdown-menu">
    <a class="dropdown-item {{ request()->route('slugs') == 'husky-siberien' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'husky-siberien']) }}">
      CHIOT HUSKY SIBERIEN
    </a>
    <a class="dropdown-item {{ request()->route('slugs') == 'pomsky-et-golden-retriever' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'pomsky-et-golden-retriever']) }}">
      CHIOT POMSKY ET GOLDEN RETRIEVER
    </a>
    <a class="dropdown-item {{ request()->route('slugs') == 'spitz-nain-pomeranien-et-yorkshire-terrier' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'spitz-nain-pomeranien-et-yorkshire-terrier']) }}">
      CHIOT SPITZ NAIN POMÉRANIER ET YORKSHIRE
    </a>
    <a class="dropdown-item {{ request()->route('slugs') == 'ckc-et-jack-russel' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'ckc-et-jack-russel']) }}">
      CHIOTS CKC ET JACK RUSSEL
    </a>
  </div>
</li>

<!-- Chats à vendre avec ses races -->
<li class="nav-item">
  <button class="nav-link px-3 py-2 rounded-3 has-dropdown {{ request()->routeIs('races.multiples') && request()->route('slugs') && in_array(request()->route('slugs'), ['bengale', 'savannah', 'sphynx', 'bleu-russe-et-chartreux', 'ragdoll-et-siberien', 'main-coon', 'british-shorthair-et-british-longhair-et-scottish-fold', 'sacre-de-birmanie-et-siamois']) ? 'active bg-white bg-opacity-10' : '' }}">
    {{ __('menu.cats_sale_link') }}
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item {{ request()->route('slugs') == 'bengale-et-savannah-et-sphynx' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'bengale-et-savannah-et-sphynx']) }}">
      CHATON BENGALE,SAVANNAH,SPHYNX
    </a>

    <a class="dropdown-item {{ request()->route('slugs') == 'bleu-russe-et-chartreux' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'bleu-russe-et-chartreux']) }}">
      CHATONS BLEU RUSSE ET CHARTREUX
    </a>
    <a class="dropdown-item {{ request()->route('slugs') == 'ragdoll-et-siberien' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'ragdoll-et-siberien']) }}">
      CHATONS RAGDOLL ET SIBERIEN
    </a>
    <a class="dropdown-item {{ request()->route('slugs') == 'main-coon' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'main-coon']) }}">
      CHATON MAIN COON
    </a>
    <a class="dropdown-item {{ request()->route('slugs') == 'british-shorthair-et-british-longhair-et-scottish-fold' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'british-shorthair-et-british-longhair-et-scottish-fold']) }}">
      CHATONS BRITISH SHORTHAIR, LONGHAIR, SCOTTISH FOLD
    </a>
    <a class="dropdown-item {{ request()->route('slugs') == 'sacre-de-birmanie-et-siamois' ? 'active' : '' }}" 
       href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'sacre-de-birmanie-et-siamois']) }}">
      CHATON SACRE DE BIRMANIE ET SIAMOIS
    </a>
  </div>
</li>

<!-- Perroquets Disponibles avec ses races -->
   <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 {{ request()->routeIs('perroquets.vente') ? 'active bg-white bg-opacity-10' : '' }}" 
                       href="{{ route('perroquets.vente', ['lang' => app()->getLocale(), 'categorie' => 'perroquets']) }}">
                        {{ __('menu.parrots_sale_link') }}
                    </a>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 {{ request()->routeIs('qui-sommes-nous') ? 'active bg-white bg-opacity-10' : '' }}"
                       href="{{ route('qui-sommes-nous', ['lang' => app()->getLocale()]) }}">
                        {{ __('menu.about_link') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 {{ request()->routeIs('contact') ? 'active bg-white bg-opacity-10' : '' }}" 
                       href="{{ route('contact', ['lang' => app()->getLocale()]) }}">
                        {{ __('menu.contact_link') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>