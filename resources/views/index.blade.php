<x-app-layout>
  <div class="w-3/4 mt-8 mx-auto">
    {{-- 追加フォーム --}}
    <form action="{{ route('stocks.store') }}" method="POST">
      @csrf
      <input type="text" name="tool_name" value="{{ old('tool_name') }}">
      <input type="number" name="quantity" value="{{ old('quantity') }}">
      <select name="category">
        <option value="tool">備品</option>
        <option value="material">材料</option>
      </select>
      <x-primary-button type="submit">追加</x-primary-button>
    </form>

    {{-- エラー表示 --}}
    {{-- エラーがあるか判定 --}}
    @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $message)
      <li class="text-red-600">{{ $message }}</li>
      @endforeach
    </ul>
    @endif

    @foreach ($categories as $category)
      <x-secondary-button type="submit"><a href="{{ route('stocks.show', $category->id) }}">{{ $category->name }}</a></x-secondary-button>
    @endforeach

    <div class="relative overflow-x-auto mt-8">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              備品名
            </th>
            <th scope="col" class="px-6 py-3">
              備品の数
            </th>
            <th scope="col" class="px-6 py-3">
              ボタン
            </th>
          </tr>
        </thead>
        @foreach ($tools as $tool)
          <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $tool['tool_name'] }}
              </td>
              <td class="px-6 py-4">
                {{-- カウントアップ用のフォーム --}}
                <form action="{{ route('stocks.update', $tool->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <x-primary-button type="submit" name="plus">+</x-primary-button>
                  <span>{{ $tool['quantity'] }}個</span>
                  <input type="hidden" name="id" value="{{ $tool['id'] }}">
                  <x-primary-button type="submit" name="minus">-</x-primary-button>
                </form>
              </td>
              <td class="px-6 py-4">
                {{-- 削除用のフォーム --}}
                <form action="{{ route('stocks.destroy', $tool->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <x-danger-button type="submit" name="delete">削除</x-danger-button>
                </form>
              </td>
            </tr>
          </tbody>
        @endforeach
      </table>
    </div>
  </div>
</x-app-layout>
