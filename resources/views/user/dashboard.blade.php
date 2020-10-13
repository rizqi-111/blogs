@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>List Blog</h3>
                    <br>
                    <a class="btn btn-primary mb-2" href="{{ route('user.makeblog') }}">Buat Blog</a>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status Publish</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    @forelse($blog as $key => $value)
                        <tbody>
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->content}}</td>
                                <td>1</td>
                                <td>Edit || Delete</td>
                            </tr>
                        </tbody>
                        @empty
                            <p>Belum Ada Blog</p>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
