@extends('layouts.bs5')
@section('content')
<h1>Posts Index</h1>
<a class="m-4 btn btn-outline-success btn-lg" href="{{ route('posts.create') }}">Add</a>

<div class="row row-cols-md-4 g-4">
    @forelse($posts as $post)
    <div class="col">
        <div class="card border-success h-100">
            <div class="card-header">
                <small class="text-muted">{{ $post->created_at }}</small>
            </div>
            <div class="card-body">
                <h5 class="card-title text-success text-truncate">
                    <a class="link-success" href="{{ route('posts.show',$post) }}">{{ $post->title }}</a>
                </h5>
                <h6>
                    {{ $post->body }}
                </h6>

                <form method="POST" action="{{ route('posts.destroy',$post ) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">{{ __('Del')}}</button>
                    <a class="btn btn-outline-info" href="{{ route('posts.edit',$post) }}">Edit</a>


                    <a class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                            id="dropdown-{{ $post->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-share-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                            </svg> </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdown-{{ $post->id }}">
                            <li><a class="dropdown-item" href="#">Facebook</a></li>
                            <li><a class="dropdown-item" href="#">Whatsapp</a></li>
                            <li><a class="dropdown-item" href="#">Instagram</a></li>
                        </ul>
                    </a>
                </form>


            </div>
            <div class="card-footer">
                <small class="text-muted">link</small>
            </div>
        </div>
    </div>

    @empty
    No records
    @endforelse
</div>

<br>
{{ $posts->links() }}

@endsection
