<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use App\Models\User;
use App\Http\Requests\CrudRequest;
use Illuminate\Support\Facades\Auth;

class CrudController extends Controller
{
    
    public function index()
    {
        
        $user = auth()->user();
        
        if(!empty($user) && $user->id < 0){
            return redirect('/logout');
        }
        $cruds = [];
        //check for user query
        
        if(!empty($user) && $user->role == 0){
            $cruds = Crud::select('cruds.*','users.username')->leftJoin('users', function($join) {
                $join->on('cruds.user_id', '=', 'users.id');
              })->where('user_id',$user->id)->paginate(5);

             
        }

        return view('crud.index', compact('cruds'));
    }

    public function create()
    {
        $desingers = User::all()->where('role',1);
        return view('crud.create', compact('desingers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'post' => 'required',
            'due_date' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg',
            ]);

            $name = "";
        if($request->hasfile('img'))
        {
           $path = "upload/project/";
           $name = $request->file('img')->getClientOriginalName();
           $request->file('img')->move($path, $name); 
        } 

        $id = auth()->user()->id;
        $crud = new Crud();
        $crud->user_id = $id;
        $crud->title = $request->title;
        $crud->post = $request->post;
        $crud->img =  $name;
        $crud->due_date =  $request->due_date;
        $crud->designer_id =  $request->designer_id;
        $crud->status =  0;
        $crud->note =  "";
        $crud->save();
        return redirect('/')->with('success','Created successfully!');
    }

    public function show(Crud $crud)
    {
        return view('crud.show', compact('crud'));
    }

    public function edit(Crud $crud)
    {
        return view('crud.edit', compact('crud'));
    }

    public function update(Crud $crud, Request $request)
    {

        $request->validate([
            'note' => 'required',
            ]);
        $crud->note =  $request->note;

        $crud->save();
        return redirect('/')->with('success','Updated successfully!');
    }

    public function destroy(Crud $crud)
    {
        $crud->status =  1;

        $crud->save();
        return redirect('/')->with('success','Submit successfully!');
    }
}
