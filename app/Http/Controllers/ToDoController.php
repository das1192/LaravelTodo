<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    //


    public function index(){

        return view('pages.todo');
    }



    public function addCategory(Request $request){

        $category = new Category();

        $category->name = $request->name;

        if($category->save()){

            return view('pages.partial.categories');
        }


        return 0;

    }

    public function addTodo(Request $request){

        $todo = new Todo();

        $todo->category_id = $request->category_id;
        $todo->details = $request->details;
        $todo->status = 'pending';

        if($todo->save()){

            return 1;
        }


        return 2;

    }


    public function todos(){



        return view('pages.partial.todos');

    }



    public function deleteCategory($id){

        $category = Category::where('id',$id)->first();

        $category->update(['active'=>0]);

        return redirect('/');

    }
    public function deleteTodo($id){

        $todo = Todo::where('id',$id)->first();

        $todo->update(['active'=>0]);

        return redirect('/');

    }

    public function updateTodo(Request $request){

        $todo = Todo::where('id',$request->id)->first();

        if($todo->status=="pending"){
            $todo->update(['status'=>'done']);
        }else{
            $todo->update(['status'=>'pending']);
        }
       

        return 1;

    }





}
