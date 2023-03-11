@extends("layouts.plantilla")

@section("title", "show | " . $episode->name )
@section('entity_name', 'episodes')


@section("content")
<div class="container is-max-desktop has-background-white p-5">

    <h1>Episode #{{ $episode->id }}</h1>
    <div class="">

        <ul class="pl-5">
            <li class="mb-3">
                <h4 class="my-auto">Name: {{ $episode->name }}</h4>
            </li>

            <li class="M-3">
                <h4 class="my-auto">Episode: {{ $episode->episode }}</h4>
            </li>

            <li class="">
                <h4 class="my-auto">Air date:{{ $episode->air_date }}</h4>
            </li>
        </ul>

    </div>

        <div>
            <div class="is-flex mt-5">
               
                <a class="button is-info is-flex" 
                href="{{ route('episodes.edit', $episode->id) }}">Edit</a>
                
                
                <form class="is-inline-block ml-4 show_confirm" action="{{ route('episodes.destroy', $episode) }}" method="POST">
                    @csrf
                    @method('delete')

                    <a class="button is-danger is-flex" 
                        href="{{ route('episodes.destroy', $episode->id) }}">
                        Delete
                    </a>

                </form>

            </div>
     </div>
 


</div>
@endsection()