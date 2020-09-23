<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function showCreateForm() {
        return view('folders/create');
    }

    // CreateFolder $request = $_REQUEST(validated)
    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();

        // フォルダテーブルのタイトルカラムに入力された値を代入する
        $folder->title = $request->title;

        // インスタンスの状態をデータベースに書き込む(insert)
        $folder->save();

        return redirect()->route('tasks.index' , [
            'id' => $folder->id,
        ]);
    }
}
