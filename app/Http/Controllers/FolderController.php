<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    public function index(Request $request){
        // folder.php のモデルから取り出す
        $items = Folder::all();
        // views\folder\indexに$itemsを渡す
        return view('folder.index',['items' => $items]);
    }
}
