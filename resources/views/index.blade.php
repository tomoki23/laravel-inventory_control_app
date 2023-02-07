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
        <li><a href="#">管理画面</a></li>
        <li><a href="#">日報登録画面</a></li>
        <li><a href="#">日報一覧画面</a></li>
      </ul>
    </nav>
  </header>
  {{-- ヘッダーここまで --}}

  {{-- メインここから --}}
  <main>
    <div>
      {{-- 追加フォーム --}}
      <form action="#" method="POST">
        <input type="text" name="tool">
        <button type="submit">追加</button>
      </form>
      {{-- 備品表示テーブル --}}
      <table border="1">
        <tr>
          <th>備品名</th>
          <th>備品の数</th>
          <th>削除</th>
        </tr>
        <tr>
          <td>刷毛</td>
          <td>
            <button type="submit" name="plus">+</button>
            <input type="number" name="count" value="1">
            <button type="submit" name="minus">-</button>
          </td>
          <td>
            <button type="submit">削除</button>
          </td>
        </tr>
        <tr>
          <td>ローラー</td>
          <td>
            <button type="submit" name="plus">+</button>
            <input type="number" name="count" value="2">
            <button type="submit" name="minus">-</button>
          </td>
          <td>
            <button type="submit">削除</button>
          </td>
        </tr>
        <tr>
          <td>シンナー</td>
          <td>
            <button type="submit" name="plus">+</button>
            <input type="number" name="count" value="3">
            <button type="submit" name="minus">-</button>
          </td>
          <td>
            <button type="submit">削除</button>
          </td>
        </tr>
      </table>
    </div>
  </main>
  {{-- メインここまで --}}
</body>
</html>
