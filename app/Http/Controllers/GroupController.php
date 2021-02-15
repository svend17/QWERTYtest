<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function addGroup(Request $request){
        $validator = Validator::make($request->all(),[
            'groupName'=>'required|unique:groups,nameOfGroup',
        ]);
        if ($validator->fails())
            return back()->withErrors($validator);
        $group = new Group;
        $group->nameOfGroup = $request->groupName;
        $group->save();
        return back()->with('successAdd', 'Group added');
    }

    public function updGroup(Request $request){
        $request->validate([
            'groupName'=>'required',
        ]);
        Group::where('nameOfGroup', $request->groupName)->update(['nameOfGroup' => $request->newName]);
        return back()->with('successUpd', 'Group Updated');
    }
}
