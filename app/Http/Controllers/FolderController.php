<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    // 一覧表示
    public function index(Request $request){
        // folder.php のモデルから取り出す
        $folderitems = Folder::all();
        // views\folder\indexに$itemsを渡す
        return view('folder.index',['folderitems' => $folderitems]);
    }

    //フォルダの追加(GET)
    public function add(Request $request){
        return view('folder.add');
    }
    
    //フォルダの追加(POST)
    public function create(Request $request){
        $this->validate($request, Folder::$rules);
        $folder = new Folder;
        $form = $request->all();
        unset($form['_token']);
        $folder->fill($form)->save();
        return redirect('folder');
    }

    // フォルダの編集(GET)
    public function edit(Request $request){
        $folder = Folder::find($request->id);
        return view('folder.edit',['form' => $folder]);
    }

    // フォルダの編集(POST)
    public function update(Request $request){
        $this->validate($request, Folder::$rules);
        $folder = Folder::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $folder->fill($form)->save();
        return redirect('folder');
    }

    // フォルダの削除(GET)
    public function delete(Request $request){
        $folder = Folder::find($request->id);
        return view('folder.del',['form' => $folder]);
    }

    // フォルダの削除(POST)
    public function remove(Request $request){
        Folder::find($request->id)->delete();
        return redirect('/folder');
    }


}
