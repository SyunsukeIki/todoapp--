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

    //フォルダの追加
    public function add(Request $request){
        return view('folder.add');
    }

    public function create(Request $request){
        $this->validate($request, Folder::$rules);
        $folder = new Folder;
        $form = $request->all();
        unset($form['_token']);
        $folder->fill($form)->save();
        return redirect('folder');

    }

    // フォルダの編集
    public function edit(Request $request){
        $folder = Folder::find($request->id);
        return view('folder.edit');
    }

    public function update(Request $request){
        $this->validate($request, Folder::$rules);
        $folder = Folder::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $folder->fill($form)->save();
        return redirect('folder');

    }

}
