
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>日報一覧画面</title>
</head>

<body>
  {{-- ヘッダーここから --}}
  <header>
    <h1>日報一覧画面</h1>
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
      @foreach ($reports as $report)
        <div>
          <p>{{ $report->created_at }}</p>
          <p><a href="{{ route('reports.show', $report->id) }}">{{ $report->user->name }}</a></p>
          <p>{{ $report->content }}</p>
        </div>
        <hr>
      @endforeach
    </div>
  </main>
  {{-- メインここまで --}}
</body>

</html>
