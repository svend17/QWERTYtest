@extends('layouts.app')

@section('content')
    <div class="container d-flex">
        <form  method="post" action="{{ route('addGr') }}">
            @csrf
            <input class="form-control" type="text" placeholder="Group Name" name="groupName" size="40" required maxlength="20">
            <input class="btn btn-primary" type="submit" value="Save">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (\Session::has('successAdd'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('successAdd') !!}</li>
                    </ul>
                </div>
            @endif
        </form>
        <form method="post" action="{{ route('updGr') }}">
            @method('PUT')
            @csrf
            <select class="custom-select" name="groupName">
                @foreach($groups as $group)
                    <option>{{$group->nameOfGroup}}</option>
                @endforeach
            </select>
            <input class="form-control" type="text" placeholder="New Group Name" name="newName" size="40" required>
            <input class="btn btn-primary" type="submit" value="Update Group">
            @if (\Session::has('successUpd'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('successUpd') !!}</li>
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
