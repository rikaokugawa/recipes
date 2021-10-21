<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Recipe;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Recipe::all();

        return view('recipe.index');
    }
    
      public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $recipe = Recipe::find($request->id);
      // 削除する
      $recipe->delete();
      return redirect('User/recipe/');
  }
    
}    
    /*public function add()
    {
        return view ('user.recipe.create');
    }
    //
    public function create(Request $request)
    {
      $this->validate($request, Recipe::$rules);
        
      $recipe = new Recipe;
      $form = $request->all(); 
        if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $recipe->image_path = basename($path);
      } else {
        $recipe->image_path = null;
      }
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // データベースに保存する
      $recipe->fill($form);
      $recipe>save();        
      //user/menu/createにリダイレクトする
      return redirect ('recipe/create');
        
    }
  // 以下を追記
  public function index(Request $request)
  {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $posts = Recipe::where('name', $cond_name)->get();
      } else {
          // それ以外はすべてのニュースを取得する

          $posts = Recipe::all();
      }
      return view('user.recipe.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $recipe = Recipe::find($request->id);
      if (empty($recipe)) {
        abort(404);    
      }
      return view('user.recipe.edit', ['recipe_form' => $recipe]);
  }


  public function update(Request $request)
  { 
      // Validationをかける
      $this->validate($request, Recipe::$rules);
      // News Modelからデータを取得する
      $recipe = Recipe::find($request->id);
      // 送信されてきたフォームデータを格納する
      $recipe_form = $request->all();
      if ($request->remove == 'true') {
          $menu_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $recipe_form['image_path'] = basename($path);
      } else {
          $recipe_form['image_path'] = $recipe->image_path;
      }

      unset($menu_form['image']);
      unset($menu_form['remove']);
      unset($menu_form['_token']);
      // 該当するデータを上書きして保存する
      $recipe->fill($recipe_form)->save();
      return redirect('user/recipe');
  }
  
    // 以下を追記　　
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $recipe = Recipe::find($request->id);
      // 削除する
      $recipe->delete();
      return redirect('User/recipe');
  }

}  */

