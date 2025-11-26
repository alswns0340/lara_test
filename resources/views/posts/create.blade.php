<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            글쓰기
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">제목</label>
                        <input type="text" name="title"
                               value="{{ old('title') }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">내용</label>
                        <textarea name="content" rows="8"
                                  class="w-full border rounded px-3 py-2">{{ old('content') }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('posts.index') }}"
                           class="px-4 py-2 mr-2 border rounded">
                            취소
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded">
                            등록
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
