<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Http\Requests\CreateFolder;
use App\Models\User;
use App\Models\Task;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
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
        // $folder->save();
        // ユーザーに紐付けて保存
        Auth::user()->folders()->save($folder);
        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }

    public function delete(Folder $folder)
    {
        // ログインユーザーの情報を取得
        $user = Auth::user();
 
        // user_idとフォルダのuser_idが一致する場合、フォルダとフォルダ内のタスクをすべて削除する。
        if ($user->id === $folder->user_id) {
            // フォルダ内のタスクを削除する
            Task::where('folder_id', $folder->id)->delete();
            // 選択されたフォルダidと一致するものを削除する
            $folders = Folder::findOrFail($folder->id);
            $folders->delete();
        }
        return redirect()->route('home');
    }
}
