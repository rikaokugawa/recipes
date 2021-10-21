{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.common')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'レシピの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>レシピの新規作成</h2>
        <form action="{{ action('User\RecipeController@create') }}" method="post" enctype="multipart/form-data">

          @if (count($errors) > 0)
          　<ul>
          　　@foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif

      　　<h1>セレクトボックスの値を送信</h1>
          <select name ="material_category_id" id="select1" onChange="changeSelect2()">
            @foreach( $materialCategories as $category)
　　　　　　　<option value="{{ $category->id }}">{{ $category->name }}</option>
　　　　　　@endforeach
          </select>
          <select name ="material_id" id="select2">
            @foreach( $materials as $material)
              <option value="{{ $material->id }}">{{ $material->name }}</option>
            @endforeach
          </select>

              
      　　<h1>献立名を送信</h1>
          <select name ="recipe_category_id" id="select3" onChange="changeSelect4()">
            @foreach( $recipeCategories as $category)
　　　　　　　<option value="{{ $category->id }}">{{ $category->name }}</option>
　　　　　　@endforeach
          </select>
          <select name ="menu_id" id="select4">
            @foreach( $menus as $menu)
              <option value="{{ $menu->id }}">{{ $menu->name }}</option>
            @endforeach
          </select>
          
          <div class="row">
            <div class="col-md-4">
              <input type="text" name="seasoning_name[]" placeholder="調味料名">  
            </div>
            <div class="col-md-8">
              <input type="text" name="seasoning[]" placeholder="調味料" size="60">
            </div>
          </div>
          
          {{ csrf_field() }}
          <input type="submit" name="submit" value ="送信">          
        </form>
      </div>
    </div>
  </div>  
@endsection

/*@section('js')
<script type = "text/javascript">
function changeSelect2()
{
  var arr01 = [
    {val:"1", txt:"枝豆"},
    {val:"2", txt:"みそ"},
    {val:"3", txt:"調製豆乳"},
    {val:"4", txt:"無調整豆乳"}
    ]; 
  var arr02 = [
    {val:"1", txt:"こめ"},
    {val:"2", txt:"強力粉"},
    {val:"3", txt:"薄力粉"},
    {val:"4", txt:"天ぷら粉"}
    
    ];
  var arr03 = [
    {val:"1", txt:"白ねぎ"},
    {val:"2", txt:"水菜"},
    {val:"3", txt:"きゅうり"}
    ];
    
  var arrs = [
    {id:"1", arr:arr01},
    {id:"2", arr:arr02},
    {id:"3", arr:arr03}
  ];
  
  var select1 = document.getElementById("select1");//変数select1を宣言
  var select2 = document.getElementById("select2"); //変数select2を宣言
   
  select2.options.length = 0; // 選択肢の数がそれぞれに異なる場合、これが重要
  var arr = [];
  var tmp = [];
  for (var i = 0; i < arrs.length; i++) {
    tmp  = arrs[i];
    if (tmp.id == select1.options[select1.selectedIndex].value) {
      arr = tmp.arr;
      break;
    }
  }
  for( let i = 0; i <　arr.length; i++ ) {
    select2.options[i] = new Option(arr[i].txt, arr[i].val);
  }
}
</script>
@endsection*/
