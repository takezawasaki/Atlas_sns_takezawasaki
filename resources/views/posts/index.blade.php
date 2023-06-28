<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body class="container">
  <header>
    <a href="/index"></a>
  </header>
  
  <div class="container">
    <h2 class="page-header">投稿内容</h2>
    <table class="table-hover">
      <tr>
                <th>No</th>
                <th>name</th>
                <th>投稿内容</th>
                <th>登録日</th>
                <th>更新日</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->user_id}}</td>
                <td>{{ $post->post}}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
            @endforeach
    </table>
  </div>
</body>
</html>@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->

@endsection