@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard Admin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>List Blog</h3>
                    <br>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status Publish</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    @forelse($blog as $key => $value)
                        <tbody>
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->content}}</td>
                                <td>{{$value->status}}</td>
                                <td>{{$value->user->name}}</td>
                                <td>
                                @if($value->status == '0') 
                                <form action="{{ route('admin.verif',['id' => $value->id]) }}" method="POST">
                                @csrf
                                <input type="submit" value="Verifikasi" class="btn btn-primary btn-sm">
                                || Tolak
                                </form>
                                @else 
                                <h6 class="p-1 mb-1 bg-success text-dark">Telah Diverifikasi</h6>
                                @endif
                                </td>
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
