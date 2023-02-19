<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>在庫管理画面</title>
</head>
<body>
  {{-- ヘッダーここから --}}
  <header>
    <h1>在庫管理画面</h1>
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
      <form action="{{ route('stocks.store') }}" method="POST">
        @csrf
        <input type="text" name="tool_name">
        <input type="number" name="quantity">
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

      {{-- 備品表示テーブル --}}
      <table border="1">
        <tr>
          <th>備品名</th>
          <th>備品の数</th>
          <th>削除</th>
        </tr>
        @foreach ($tools as $tool)
          <tr>
            <td>{{ $tool['tool_name'] }}</td>
            <td>
              {{-- カウントアップ用のフォーム --}}
              <form action="{{ route('stocks.update', $tool->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" name="plus">+</button>
                <span>{{ $tool['quantity'] }}個</span>
                <input type="hidden" name="id" value="{{ $tool['id'] }}">
                <button type="submit" name="minus">-</button>
              </form>
            </td>
            <td>
              {{-- 削除用のフォーム --}}
              <form action="{{ route('stocks.destroy', $tool->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" name="delete">削除</button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </main>
  {{-- メインここまで --}}
</body>
</html>
