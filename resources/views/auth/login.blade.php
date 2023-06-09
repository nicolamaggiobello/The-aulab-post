<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white" style="background-color:var(--bs-green-300)  !important ">
        <div class="row justify-content-center">
            <h1 class="display-1"> Accedi Alla Tua Area</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                
                @if ($errors->any())
                    <div class="alert allert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                                
                            @endforeach
                        </ul>
                    </div>
                    
                @endif

                <form class="card p-5 shadow" action="{{route('login')}}" method="POST" style="background-color:var(--bs-green-300)  !important ">
                  @csrf

                  <div class="mb-3">
                    <label for="email" class="form-label">EMAIL:</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">PASSWORD:</label>
                    <input name="password" type="password" class="form-control" id="password">
                  </div>
                  
                  <div class="mt-2">
                    <button class="btn bg-info text-white">ACCEDI</button>
                    <p class="small mt-2">Non sei registrato? <a href="{{route('register')}}">Clicca Qui</a></p>
                  </div>
                </form>
             </div>
        </div>
    </div>
</x-layout>