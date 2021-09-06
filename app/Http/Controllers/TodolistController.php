<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;

class TodolistController extends Controller
{
    public function index(Request $request){
        // todolist.php のモデルから取り出す
        $items = Todolist::all();
        // views\todo\indexに$itemsを渡す
        return view('todolist.index',['items' => $items]);
    }
}
