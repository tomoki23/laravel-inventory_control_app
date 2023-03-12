
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
          <strong>投稿者</strong>
          <p>{{ $report->user->name }}</p>
          <strong>メンバー</strong>
          @foreach ($members as $member)
            <p>{{ $member->name }}</p>
          @endforeach
          <strong>作業内容</strong>
          <p>{{ $report->content }}</p>
          <strong>作業日時</strong>
          <p>{{ $report->created_at }}</p>
        </div>
        <a href="{{ route('reports.edit', $report->id) }}">更新</a>
        <form action="{{ route('reports.destroy', $report->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit">削除</button>
        </form>
        <a href="{{ route('reports.index') }}">戻る</a>
        <hr>
    </div>
  </main>
  {{-- メインここまで --}}
</body>

</html>
