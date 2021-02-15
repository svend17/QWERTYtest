@extends('layouts.app')

@section('content')
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Group</th>
                    <th scope="col">Image</th>
                    @guest
                    @else
                        <th scope="col">Delete</th>
                    @endguest
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        @csrf
                        <th>{{$user->id}}</th>
                        <td>
                            @guest
                            @else
                                <a class="nav-link" href="{{route('slctUs',['userName'=>$user->name_user])}}">@endguest{{$user->name_user}}</a></td>
                        <td>{{$user->group->nameOfGroup}}</td>
                        <td>
                            @if($user->image)
                                <img src="{{$user->image->img_path}}" width="45px">
                            @endif
                        </td>
                        @guest
                        @else
                            <form action="{{ route('delUs') }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <td><button type="submit" class="btn btn-primary" name="userID" value="{{$user->id}}">Delete</button></td>
                            </form>
                        @endguest
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
