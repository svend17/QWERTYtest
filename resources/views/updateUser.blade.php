@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('updUs') }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input class="form-control" type="text" value="{{$user->name_user}}" name="userName" size="40">
            <select class="custom-select" name="groupName">
                <option>{{$user->group->nameOfGroup}}</option>
                @foreach($groups as $group)
                    @if($group->nameOfGroup!=$user->group->nameOfGroup)
                        <option>{{$group->nameOfGroup}}</option>
                    @endif
                @endforeach
            </select>
            @if($user->image)
                Current image:
                <img src="{{$user->image->img_path}}" width="45px">
            @else
                User without image
            @endif
            <div class="form-group">
                <input type="file" name="img" class="form-control-file" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary" name="userID" value="{{$user->id}}">Update</button>
        </form>
    </div>
@endsection
