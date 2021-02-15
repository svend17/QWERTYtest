<?php

namespace App\Http\Controllers;
use App\Models\BookOfUser;
use App\Models\Group;
use App\Models\Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function fillBook($request, $book){
        if ($request->File()) {
            $image = new Image;
            $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
            $filePath = $request->file('img')->storeAs('uploads', $fileName, 'public');
            $image->img_name = $fileName;
            $image->img_path = '/storage/' . $filePath;
            $image->save();
            $book->image_id = $image->id;
        }
        $book->name_user = $request->userName;
        $id_gr = Group::where('nameOfGroup', $request->groupName)->select('id')->first();
        $book->group_id = $id_gr->id;
        $book->save();
    }

    public function addUser(Request $request){
        $request->validate([
            'img' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'userName'=>'required',
            'groupName'=>'required',
        ]);
        $book = new BookOfUser;
        $this->fillBook($request,$book);
        return redirect()->route('list');
    }

    public function slctUser($userName){
        $user = BookOfUser::where('name_user',$userName)->first();
        $groups = Group::select('nameOfGroup')->orderBy('id')->get();
        return view('updateUser', ['user' => $user,'groups' => $groups]);
    }

    public function updUs(Request $request){
        $book = BookOfUser::find($request->userID);
        $this->fillBook($request, $book);
        return redirect()->route('list');
    }

    public function delUs(Request $request){
        BookOfUser::where('id', $request->userID)->delete();
        return redirect()->route('list');
    }
}
