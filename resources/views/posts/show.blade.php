<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="mb-2 text-sm text-gray-500">
                    작성일: {{ $post->created_at->format('Y-m-d H:i') }}
                </div>

                <div class="mt-4 whitespace-pre-line">
                    {{ $post->content }}
                </div>

                <div class="mt-6 flex justify-between">
                    <a href="{{ route('posts.index') }}" class="text-gray-600">
                        ← 목록으로
                    </a>
                    <div>
                        <a href="{{ route('posts.edit', $post) }}" class="mr-3 text-indigo-600">
                            수정
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('삭제하시겠습니까?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">
                                삭제
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
