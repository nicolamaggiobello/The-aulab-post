<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1"> REGISTRATI</h1>
        </div>
    </div>

    <div class="container mt-5">
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

                <form class="card p-5 shadow" action="{{route('register')}}" method="POST">
                  @csrf
                 <div class="row g-3">
                     
                  <div class="col-12 ">
                       <label for="username"class="form-label " >USRNAME:</label>
                       <input name="name" type="text"  class="form-control " id="username" value="{{old('name')}}">
                     </div>
                     
                     <div class="col-12">
                       <label for="email" class="form-label">EMAIL:</label>
                       <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}">
                     </div>
                     
                     <div class="col-12">
                       <label for=" password" class="form-label"> password:</label>
                       <input name="password" type="password" class="form-control" id="password">
                     </div>
                     
                     <div class="col-12">
                       <label for=" password_confirmation" class="form-label">conferma password:</label>
                       <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                     </div>
                     
                     <div class="col-12">
                       <button class="btn bg-info text-white">REGISTRATI</button>
                       <p class="small mt-2">Gia registrato? <a href="{{route('login')}}">Clicca Qui</a></p>
                    </div>
                 </div>
                </form>
             </div>
        </div>
    </div>
</x-layout>