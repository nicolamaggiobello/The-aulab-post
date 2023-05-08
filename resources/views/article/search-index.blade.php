<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white" style="background-color:var(--bs-green-300)  !important "
    >
        <div class="row justify-content-center">
            <h1 class="display-1">
                tutti gli articoli per: {{$query}}
    
            </h1>
        </div>
    </div>

    <div class="container m-5"> 
        <div class="row justify-content-around">
            @foreach ($articles as $article )
            <div class="col-12 col-md-3 my-2">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>ù
                        <p class="card-text">{{$article->subtitle}}</p>
                        <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize"> {{$article->category->name}}</a>
                        <p class="samll fst-italic text-capitalize">
                            @foreach ($article->tags as $tag )
                               #{{$tag->name}}
                                
                            @endforeach
                        </p>
                        @if ($article->category)
                         <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic  text-capitalize">{{$article->category->name}}</a>
                      @else
                          <p class="small text-muted fst-italic text-capitalize">
                            non categorizato

                          </p>   
                          
                      @endif
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                       <a href="{{route('article.byUser', ['user' => $article->user->id])}}">Redatto il {{$article->created_at->format('d/m/y')}} da {{$article->user->name}}</a>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-infop text-white">Leggi</a>
                    </div>
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
</x-layout>