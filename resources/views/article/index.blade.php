<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white" style="background-color:var(--bs-green-300)  !important ">
        <div class="row justify-content-center">
            <h1 class="display-1">
                 Tutti Gli Articoli
            </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article )
            <div class="col-12 col-md-4 my-2">
                <div class="card border-secondary mb-4 text-center  " style="width: 22rem;">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="">
                    <div class="card mb-4">
                        
                        <div class="card-body">
                            
                            <h2 class="card-title h4">{{$article->title}}</h2>
                            <p class="card-text">{{$article->subtitle}}</p>
                            <p class="small text-muted fst-italic text-capitalize"> {{$article->category->name}} </p>
                            
                        </div>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}
                        {{-- <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text capitalize">{{ $article->category->name}}</a> --}}
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi</a>
                    </div>
                    @if ($article->category)
                         <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic  text-capitalize">{{$article->category->name}}</a>
                      @else
                          <p class="small text-muted fst-italic text-capitalize">
                            non categorizato

                          </p>   
                          
                      @endif
                    <p class="samll fst-italic text-capitalize">
                        @foreach ($article->tags as $tag )
                           #{{$tag->name}}
                            
                        @endforeach
                    </p>
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
</x-layout>

