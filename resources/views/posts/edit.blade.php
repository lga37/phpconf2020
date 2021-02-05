@extends('layouts.bs5')
@section('content')
<h1>Editar Post</h1>

<form method="POST" action="{{ route('posts.update',$post ) }}">
    @csrf
    @method('PUT')
    <div class="col-md-8">
        <label class="form-label">Title</label>
        <input type="text"
        value="{{ $post->title }}"
        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title">
        @if ($errors->has('title'))
        <div class="invalid-feedback">
            {{ $errors->first('title') }}
        </div>
        @endif
    </div>

    <div class="col-md-8">
        <label class="form-label">Body</label>
        <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" >{{ $post->body }}</textarea>

        @if ($errors->has('body'))
        <div class="invalid-feedback">
            {{ $errors->first('body') }}
        </div>
        @endif
    </div>

    <td>
        <button class="btn btn-lg btn-block btn-outline-success">{{ __('Save')}}</button>
    </td>
</form>


@endsection
