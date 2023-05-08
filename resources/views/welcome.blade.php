<x-layout>
   
    <div class="container-fluid p-5 bg-info text-center text-white" style="background-color:var(--bs-green-300)  !important ">
        <div class="row justify-content-center">
            <h1 class="display-1">
                 HOME PAGE
            </h1>
        </div>
    </div>
    <div class="container my-5 ">
        <div class="row justify-content-around ">
            @foreach ($articles as $article )
            <div class="col-12 col-md-4 my-1">
                <div class="card border-secondary mb-4 text-center  " style="width: 22rem;">
                    <img src="{{Storage::url($article->image)}}" class="card-imag-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"> {{$article->title}} </h5>
                        <p class="card-text"> {{$article->subtitle}} </p>
                        @if ($article->category)
                            <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize"> {{$article->category->name}}></a>
                        @else
                            <p class="small text-muted fst-italic text-capitalize"> Non categorizato</p>
                        
                        @endif
                        <span class="text-muted small fst-italic">- tempo di lettura {{$article->readDuration()}} min</span>
                        <hr>
                        <p class="samll fst-italic text-capitalize">
                          @foreach ($article->tags as $tag )
                             #{{$tag->name}}
                              
                          @endforeach
                        </p>
                      
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        <a class="" href="{{route('article.byUser', ['user' => $article->user->id])}}">redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}</a>
                       <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white"> Leggi </a>
                    </div>
                </div>
            </div>    
            @endforeach
        </div>
    </div>
    
</x-layout>