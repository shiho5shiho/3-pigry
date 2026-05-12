<header class="bg-blue-500 px-8 py-4">
    <div class="max-w-4xl mx-auto flex justify-between items-center">
        <a href="/weights" class="text-white text-2xl font-bold">ピグリー</a>
        <nav class="flex gap-3 items-center">
            <span class="text-white text-sm">{{ auth()->user()->name }}</span>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="text-white text-sm hover:underline">
                    ログアウト
                </button>
            </form>
        </nav>
    </div>
</header>