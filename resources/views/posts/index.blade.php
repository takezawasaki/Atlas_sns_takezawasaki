<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!-- bootstamp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
  <title>Document</title>
</head>
<body class="container">
  <header>
    <a href="/index"></a>
  </header>

  <div class="post-container">
    <img  class="post-icon" src="images/icon1.png">
    <div class="new-post">
     {!! Form::open(['url' => '/post/create']) !!}
        <div class="post-group">
            {{ Form::input('text' , 'new-post',null, ['required', 'class' => 'post', 'placeholder' => '投稿内容を記述してください']) }}
        </div>
        <input type="image" class="post-image" src="images/post.png" ></input>
     {!! Form::close() !!}
     </div>
    <table class="table-hover">
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->user->user_id }}</td>
                <td>{{ $post->images }}</td>
                <td>{{ $post->user->username }}</td>
                <td>{{ $post->post}}</td>
                <small><td>{{ $post->created_at }}</td></small>
                <small><td>{{ $post->updated_at }}</td></small>
                <!--編集 -->
                @if(($post->user_id ==Auth::user()->id))
                <td><div class="new-contents"><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{$post->id }}"><img src="./images/edit.png" alt="編集"></a></div></td>
                <!-- 消去 -->
                <td><a  class="btn-delete" href="/post/{{$post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいですか？')"><img src="./images/trash.png" alt="消去"></a></td>
                @endif
            </tr>
            @endforeach
    </table>

    <!-- モーダル機能 -->
    <div class="modal js-modal">
      <div class="modal_bg js-modal-close"></div>
      <div class="modal_content">
        <form action="/post/update" method="post">
          <textarea name="upPost" class="modal_post"></textarea>
          <input type="hidden" name="id" class="modal_id" value="">
          <input type="submit" value="更新">
          {{ csrf_field() }}
        </form>
        <a calass="js-modal-close" href="閉じる"></a>
      </div>
    </div>
  </div>
</body>
</html>
@extends('layouts.login')

@section('content')

@endsection
