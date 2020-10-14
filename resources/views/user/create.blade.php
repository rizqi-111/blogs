@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Make Blog</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ ('/user/makeBlog') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title" >{{ __('Judul Blog') }}</label>
                            <input id="title" type="text" placeholder="Judul Blog" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                        </div>  
                        <div class="form-group">                    
                            <label for="content">Content</label>
                            <textarea class="form-control" rows="3" id="content" name="content" placeholder="Content">{{ old('content','') }}</textarea>
                            @error('content')
                                <div class='alert alert-danger'>{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Buat</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
