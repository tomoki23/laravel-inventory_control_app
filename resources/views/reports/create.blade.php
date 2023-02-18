<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>日報登録画面</title>
</head>

<body>
  {{-- ヘッダーここから --}}
  <header>
    <h1>日報登録画面</h1>
    <nav>
      <ul>
        <li><a href="{{ route('stocks.index') }}">管理画面</a></li>
        <li><a href="{{ route('reports.create') }}">日報登録画面</a></li>
        <li><a href="{{ route('reports.index') }}">日報一覧画面</a></li>
      </ul>
    </nav>
  </header>
  {{-- ヘッダーここまで --}}

  {{-- メインここから --}}
  <main>
    <div>
      {{-- 追加フォーム --}}
      <form action="{{ route('reports.store') }}" method="POST">
        @csrf
        <label name="user_name">登録者名</label>
        <input type="text" name="user_name">
        <br>
        <label name="site_name">現場名</label>
        <input type="text" name="site_name">
        <br>
        <p>メンバー</p>
        ユーザー1<input type="checkbox" name="member[]" value="佐藤">
        ユーザー2<input type="checkbox" name="member[]" value="鈴木">
        ユーザー3<input type="checkbox" name="member[]" value="高橋">
        <br>
        <label name="content">業務内容</label>
        <textarea name="content" cols="50" rows="4" placeholder="業務内容を入力してください"></textarea>
        <br>
        <button type="submit">追加</button>
      </form>

      {{-- エラー表示 --}}
      {{-- エラーがあるか判定 --}}
      @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
      </ul>
      @endif
  </main>
  {{-- メインここまで --}}
</body>

</html>
