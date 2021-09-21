<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

use Illuminate\Support\Facades\DB;

class FolderController extends Controller
{
    // 一覧表示
    // public function index(Request $request){
        // folder.php のモデルから取り出す
        // $folderitems = Folder::all();
        // views\folder\indexに$itemsを渡す
        // return view('folder.index',['folderitems' => $folderitems]);
    // }

    // ページネーション
    public function index(Request $request){
    $page = DB::table('folders')->Paginate(2);
    return view ('folder.index',['page' => $page]);
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

    // 検索(GET)
    public function find(Request $request){
        $folderitems = Folder::all();
        return view('folder.find', ['input' => '', 'folderitems' =>$folderitems]);
    }

    // 検索(POST)
    public function search(Request $request){
        $folderitems = Folder::all();
        $search = Folder::where('folder_name' , $request->input)->first();
        $param = ['input' => $request->input,
                  'search' => $search ,
                  'folderitems' => $folderitems];
        return view('folder.find' , $param);
    }

}
