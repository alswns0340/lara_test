<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            게시판
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4 flex justify-end">
                <a href="{{ route('posts.create') }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded">
                    글쓰기
                </a>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <table class="min-w-full text-left">
                    <thead class="border-b">
                        <tr>
                            <th class="px-4 py-2 w-16">ID</th>
                            <th class="px-4 py-2">제목</th>
                            <th class="px-4 py-2 w-48">작성일</th>
                            <th class="px-4 py-2 w-32">액션</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $post->id }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('posts.show', $post) }}"
                                       class="text-blue-600 hover:underline">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td class="px-4 py-2">
                                    {{ $post->created_at->format('Y-m-d H:i') }}
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('posts.edit', $post) }}"
                                       class="text-sm text-indigo-600 mr-2">
                                        수정
                                    </a>
                                    <form action="{{ route('posts.destroy', $post) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('삭제하시겠습니까?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-sm text-red-600">
                                            삭제
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-4 py-4 text-center" colspan="4">
                                    게시글이 없습니다.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
