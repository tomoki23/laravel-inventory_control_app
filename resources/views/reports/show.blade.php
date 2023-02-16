
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>日報詳細画面</title>
</head>

<body>
  {{-- ヘッダーここから --}}
  <header>
    <h1>日報詳細画面</h1>
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
        <div>
          <p>{{ $report->user_name }}</p>
          <p>{{ $report->content }}</p>
          <p>{{ $report->created_at }}</p>
        </div>
        <a href="{{ route('reports.edit', $report->id) }}">更新</a>
        <a href="{{ route('reports.index') }}">戻る</a>
        <hr>
    </div>
  </main>
  {{-- メインここまで --}}
</body>

</html>
