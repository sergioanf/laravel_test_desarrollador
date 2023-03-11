@extends("layouts.plantilla")

@section("title", "show | " . $character->name )


@section("content")
<div class="container is-max-desktop has-background-white p-5">


    <div class="columns is-multiline">

        <div class="column is-one-fifth">
            <figure class="image  my-auto mx-0 character-avatar">
                <img src="{{ $character->image }}" class="" width="100%" alt="{{$character->name}}">
            </figure>
        </div>

        <div class="column is-two-fifths is-flex">
            <h1 class="my-auto">{{ $character->name }}</h1>
        </div>

        <div class="column content is-two-fifths">
            <p>Character details:</p>
            <ul class="pl-5">
                <li>Gneder: {{ $character->gender }}</li>
                <li>Status:  {{ $character->status }}</li>
                <li>Specie:  {{ $character->species }}</li>

                @if ($character->location)
                    <li>Location name:  {{ $character->location->name }}</li>
                    <li>Location type:  {{ $character->location->type }}</li>
                @endif
            </ul>
        </div>

        
    </div>



        <div>
            <div class="is-flex mt-5">
               
                <a class="button is-info is-flex" 
                href="{{ route('characters.edit', $character->id) }}">Edit</a>
                
                
                <form class="is-inline-block ml-4 show_confirm" action="{{ route('characters.destroy', $character) }}" method="POST">
                    @csrf
                    @method('delete')

                    <a class="button is-danger is-flex" 
                        href="{{ route('characters.destroy', $character->id) }}">
                        Delete
                    </a>

                </form>

            </div>
    </div>
 


</div>
@endsection()