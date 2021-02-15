@extends('layouts.app')

@section('content')
    <form action="{{ route('addUs') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <input class="form-control" type="text" placeholder="Name" name="userName" size="40" required>
            <select class="custom-select" name="groupName">
                @foreach($groups as $group)
                    <option>{{$group->nameOfGroup}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <input type="file" name="img" class="form-control-file" accept="image/*">
            </div>
            <input class="btn btn-primary" type="submit" value="Add User">
        </div>
    </form>
@endsection
