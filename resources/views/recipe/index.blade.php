{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.common')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '登録済み料理の一覧')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <h2>料理の一覧</h2>
    </div>
    <div class="row">
      <div class="col-md-4">
        <a href="{{ action('RecipeController@add') }}" role="button" class="btn btn-primary">新規作成</a>
      </div>
      <div class="col-md-8">
        <form action="{{ action('RecipeController@index') }}" method="get">
          <div class="form-group row">
              <label class="col-md-2">タイトル</label>
              <div class="col-md-8">
                  <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
              </div>
          <div class="form-group row">
              <label class="col-md-2">本文</label>
              <div class="col-md-10">
                <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-md-2">画像</label>
              <div class="col-md-10">
                <input type="file" class="form-control-file" name="image">
              </div>
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="検索">
              </form>
          </div>
      </div>
  </div>
  </div>
@endsection