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
      <form action="{{ route('reports.update', $report->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label name="user_name">登録者名</label>
        <input type="text" value="{{ $authUser->name }}">
        <br>
        <label name="site_name">現場名</label>
        <input type="text" name="site_name" value="{{ $report->site_name }}">
        <input type="hidden" name="user_id" value="{{ $authUser->id }}">
        <br>
        <p>メンバー</p>
        @foreach ($users as $user)
        {{ $user->name }}<input type="checkbox" name="member_id[]" value="{{ $user->id }}">
        @endforeach
        <br>
        <label name="content">業務内容</label>
        <textarea name="content" cols="50" rows="4">{{ $report->content }}</textarea>
        <br>
        <button type="submit">更新</button>
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
