@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Danh sách User</span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->role == 0)
                                                <span class="text text-success">Người dùng</span>
                                            @else
                                                <span class="text text-danger">Admin</span>
                                            @endif
                                        </td>
                                        <td class="d-flex flex-row p-1">
                                            <div class="p-1">
                                                <form method="post" action="{{route('user.destroy',$user->id)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('bạn muốn xóa user này?');" class="btn btn-danger">xóa</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                {{$users->links("pagination::bootstrap-4")}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

