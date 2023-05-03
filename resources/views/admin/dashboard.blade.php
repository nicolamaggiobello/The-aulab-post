<x-layout>
<div class="container-fluid p-5 bg-infop text-center text-white">
    <div class="row justify-content-center">
        <h1 class="display-1">
            Bentornato, Amministratore
        </h1>
    </div>
</div>

     @if (session('message'))
       <div class="alert alert-succes text-center">
         {{session('message')}}
       </div>
     @endif
      
     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo amministratore</h2>
                <x-requests-table :roleRequest="$adminRequest" role="amministratore"/>
            </div>
        </div>
     </div>

     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo  revisore</h2>
                <x-requests-table :roleRequest="$revisorRequest" role="revisore"/>
            </div>
        </div>
     </div>

     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo redattore</h2>
                <x-requests-table :roleRequest="$writherRequest" role="redattore"/>
            </div>
        </div>
     </div>
     <hr>
     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>I tags della piattaforma </h2>
                <x-metaInfo-table :metainfos="$tags" metaType="tags"/>
            </div>
        </div>
     </div>
     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Le categorie della piattaforma </h2>
                <x-metaInfo-table :metainfos="$categories" metaType="categorie"/>
                    
                    <form  class="d-flex" action="{{route('admin.storeCategory')}}" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                        <button type="submit" class="btn btn-success text-white">Aggiungi</button>
                    </form>
                
            </div>
        </div>
     </div>
     
</x-layout>

