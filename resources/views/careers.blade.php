<x-layout>
    
    <div class="container my-5" style="background-color:var( --bs-green-300) !important ">
        <div class="row justify-content-center align-items-center border-rounded p-2 shadow">
            <h1 class="display-1 text-capitalize row justify-content-center">
                LAVORA CON NOI
           </h1>
           <div class="col-12 col-md-6">
               <h2>Lavora come amministratore</h2>
               <p>Cosa farai:ha funzioni di dirigenza ed organizzazione, rendendosi responsabile delle proprie scelte verso la società od organizzazione. Si parla di amministratore unico quando un solo soggetto ricopre tale incarico. </p>   
               <h2>Lavora come revisore</h2>
               <p>Cosa farai : Il revisore si occupera di revisionare gli articoli che verrano inseriti nel sistema se rispetteranno tutti i criteri saranno accettati  </p>   
               <h2>Lavora come redattore</h2>
               <p>Cosa farai: 
                Il redattore coordina tutte le figure professionali coinvolte nella realizzazione di un progetto editoriale: autori, grafici, correttori di bozze, traduttori, fotografi.</p>   
            </div> 
            <div class="col-12 col-md-6">
                @if ($errors->any())
                   <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error )
                             <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                   </div>
                @endif
                <form class="p-5" action="{{route('careers.submit')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Scegli qui</option>
                            <option value="admin">Aministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Redattore</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email') ?? Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Parlaci di te</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-controll">{{old('message')}}</textarea>
                    </div>
                    <div class="mt-2">
                        <button  class="btn btn-info text-white">Invia canditatura</button>

                    </div>

                </form>
                
            
            </div>
        </div>
    </div>
</x-layout>