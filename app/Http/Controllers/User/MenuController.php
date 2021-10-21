<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;

class MenuController extends Controller
{
    //
    public function add()
    {
        return view ('user.menu.create');
    }
    //
    public function create(Request $request)
    {
      $this->validate($request, Menu::$rules);
        
      $menu = new Menu;
      $form = $request->all();
      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $menu->image_path = basename($path);
      } else {
        $menu->image_path = null;
      }
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // データベースに保存する
      $menu->fill($form);
      $menu->save();        
      //user/menu/createにリダイレクトする
      return redirect ('user/menu/create');
        
    }
  // 以下を追記
  public function index(Request $request)
  {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $posts = Menu::where('name', $cond_name)->get();
      } else {
          // それ以外はすべてのニュースを取得する

          $posts = Menu::all()->sortBy('name');
      }
      return view('user.menu.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $menu = Menu::find($request->id);
      if (empty($menu)) {
        abort(404);    
      }
      return view('user.menu.edit', ['menu_form' => $menu]);
  }


  public function update(Request $request)
  { 
      // Validationをかける
      $this->validate($request, Menu::$rules);
      // News Modelからデータを取得する
      $menu = Menu::find($request->id);
      // 送信されてきたフォームデータを格納する
      $menu_form = $request->all();
      if ($request->remove == 'true') {
          $menu_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $menu_form['image_path'] = basename($path);
      } else {
          $menu_form['image_path'] = $menu->image_path;
      }

      unset($menu_form['image']);
      unset($menu_form['remove']);
      unset($menu_form['_token']);
      // 該当するデータを上書きして保存する
      $menu->fill($menu_form)->save();
      return redirect('user/menu');
  }
  
    // 以下を追記　　
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $menu = Menu::find($request->id);
      // 削除する
      $menu->delete();
      return redirect('User/menu/');
  }

}    

    

