@auth
<link rel="stylesheet" href="navbar.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light border-radius " style="background-color:var(--bs-green-500)  !important ">
    <div class="container-fluid ">
      <a class="nav-link text-dark " href="#" id="navbarDropdown" role="botton" data-bs-toggle="" aria-expanded="false"> BENVENUTO {{Auth::user()->name}}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          
            <li class="nav-item">
              <li><a class="nav-link active" href="{{route('homepage')}}">HOME PAGE</a></li>
            </li>
          
          
          
            <li class="nav-item">
              <li><a class="nav-link active" href="{{route('article.index')}}">ARTICOLI</a></li>
            </li>
      

          
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('article.create')}}">INSERISCI UN ARTICOLO</a>
            </li>
          

          
                
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="{{route('careers')}}">LAVORA CON NOI</a>
            </li>
                
         


          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle styled text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:var(--bs-green-300)    !important " >
              area lavoro
            </button>
            <ul class="dropdown-menu dropdown-menu-white">
              
          <li class="nav-item">
            @if (Auth::user()->is_admin)
               <li><a class="nav-link active" href="{{route('admin.dashboard')}}">AREA ADMIN</a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
            </li>
            @if (Auth::user()->is_revisor)
            <li><a class="nav-link active" href="{{route('revisor.dashboard')}}">AREA  REVISORE </a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
            @if (Auth::user()->is_writer)
            <li><a class="nav-link active" href="{{route('writer.dashboard')}}">AREA  REDDATTORE </a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
  
            </ul>
          </div>
          


          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:var(--bs-green-300)  !important " >
              CATEGORIE
            </button>
            <ul class="dropdown-menu dropdown-menu-white">
              <li><a class="dropdown-item" href="{{route('article.byCategory','1')}}">POLITICA</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('article.byCategory','4')}}">SPORT</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('article.byCategory','2')}}">ECONOMIA</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('article.byCategory','3')}}">Food&Drink</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('article.byCategory','5')}}">INTRATTENIMENTO</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('article.byCategory','6')}}">TECH</a></li>
            </ul>
          </div>
          

             
          
          <li><a class="nav-link active" href="#" onclick=" event.preventDefault(); document.querySelector('#form-logout').submit();">LOGOUT</a></li>
         
          <form method="POST" action="{{route('logout')}}" id="form-logout" class="d-none">
               @csrf 
          </form>
       </ul>
     </li>
          
        </ul>
        <form  class="d-flex" method="GET" action="{{route('article.search')}}">
          <input class="form-control me-2" type="search" nome="query" placeholder="Cosa stai cercando?" aria-label="Search">
          <button class="btn btn-outline-info" type="submit">Cerca</button>
        </form>
      </div>
    </div>
  </nav>
@endauth


@guest 
<nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color:var(--bs-green-500) !important ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">The Aulab Post</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     
        
    
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
       
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            BENVENUTO OSPITE
        </a>
        <ul class="dropdown-menu  " aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('register')}}" >REGISTRATI</a></li>
            <li><a class="dropdown-item" href="{{route('login')}}" >ACCEDI</a></li>
            
        </ul>
      </div>
    </div>
  </nav>

@endguest   




