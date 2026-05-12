<x-app-layout title="体重記録">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- 左カラム：登録フォーム + 一覧 --}}
        <div>
            {{-- 登録フォーム --}}
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">体重を記録する</h2>

                <form method="POST" action="/weights">
                    @csrf

                    {{-- 記録日 --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">記録日</label>
                        <input type="date" name="recorded_date"
                            value="{{ old('recorded_date', date('Y-m-d')) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('recorded_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 体重 --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">体重（kg）</label>
                        <input type="number" name="weight" step="0.1"
                            value="{{ old('weight') }}"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="例：65.5">
                        @error('weight')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 rounded font-semibold hover:bg-blue-600 transition">
                        記録する
                    </button>
                </form>
            </div>

            {{-- 体重一覧 --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-4">記録一覧</h2>

                @if(session('success'))
                <p class="text-green-600 bg-green-100 px-4 py-2 rounded mb-4">{{ session('success') }}</p>
                @endif

                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">記録日</th>
                            <th class="text-left py-2">体重（kg）</th>
                            <th class="text-left py-2">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- ダミーデータ --}}
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2">2026-05-01</td>
                            <td class="py-2">65.5</td>
                            <td class="py-2">
                                <form method="POST" action="/weights/1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline text-xs">削除</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 右カラム：グラフ --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">体重推移グラフ</h2>
            <canvas id="weightChart"></canvas>
        </div>

    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('weightChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['5/1', '5/2', '5/3'],
                datasets: [{
                    label: '体重（kg）',
                    data: [65.5, 65.0, 64.8],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.3,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false,
                    }
                }
            }
        });
    </script>

</x-app-layout>