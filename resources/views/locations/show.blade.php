@extends("layouts.plantilla")

@section("title", "show | " . $location->name )
@section('entity_name', 'locations')


@section("content")
<div class="container is-max-desktop has-background-white p-5">

    <h1>Location</h1>
    <div class="">


        <div class="">
            <h4 class="my-auto">{{ $location->name }}</h4>
        </div>

        <div class="">
            <h4 class="my-auto">{{ $location->type }}</h4>
        </div>

    </div>

        <div>
            <div class="is-flex mt-5">
               
                <a class="button is-info is-flex" 
                href="{{ route('locations.edit', $location->id) }}">Edit</a>
                
                
                <form class="is-inline-block ml-4 show_confirm" action="{{ route('locations.destroy', $location) }}" method="POST">
                    @csrf
                    @method('delete')

                    <a class="button is-danger is-flex" 
                        href="{{ route('locations.destroy', $location->id) }}">
                        Delete
                    </a>

                </form>

            </div>
     </div>
 


</div>
@endsection()