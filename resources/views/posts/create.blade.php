@extends('layouts.bs5')
@section('content')
<h1>Add Post</h1>
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <p><strong>Opps Something went wrong</strong></p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="col-md-8">
        <label class="form-label">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title">
        @if ($errors->has('title'))
        <div class="invalid-feedback">
            {{ $errors->first('title') }}
        </div>
        @endif
    </div>

    <div class="col-md-8">
        <label class="form-label">Body</label>
        <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">
        </textarea>

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
