<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1"> Modifica un articolo</h1>
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

                <form class="card p-5 shadow" action="" method="" enctype="Multipart/form-data">
                    @csrf
                  

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{$article->title}}">
                      </div>

                      <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input name="subtitle" type="text" class="form-control" id="subtitle" value="{{$article->subtitle}}">
                      </div>

                      <div class="mb-3">
                        <label for="image" class="form-label">Immagine:</label>
                        <input name="image" type="file" class="form-control" id="image" >
                      </div>

                      <div class="mb-3">
                        <label for="category" class="form-label">Categoria:</label>
                        <select name="category"  class="form-control text-capitalize" id="category" >
                            @foreach ( $categories as $category )
                            <option value="{{$category->id}}"> @if($article->category && $category->id == $article->category->id) selected @endif {{$category->name}} </option>
                            @endforeach
                        </select>
                      </div>


                      <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea name="body" class="form-control" id="body" cols="30" rows="7">{{$article->body}}</textarea>
                      </div>

                      <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input name="tags" id="tags" class="form-control" value="{{$article->tags->implode('name', ', ')}}" >
                        <span class="small fst-italic"> Dividi ogni tagcon una virgola</span>

                      </div>


                          
                  <div class="mt-2">
                    <button class="btn bg-info text-white">Inserisci Un Articolo</button>
                    <a class="btn btn-outline-info" href="{{route('homepage')}}">Torna alla Home</a></p>
                  </div>

                </form>
            </div>
       </div>
   </div>


</x-layout>