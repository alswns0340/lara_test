<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            글쓰기
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('posts.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- 제목 --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">제목</label>
                        <input type="text" name="title"
                               class="mt-1 block w-full border rounded px-3 py-2"
                               value="{{ old('title') }}">
                        @error('title')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 내용 --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">내용</label>
                        <textarea name="content" rows="6"
                                  class="mt-1 block w-full border rounded px-3 py-2">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">파일 첨부</label>
                        <input type="file" name="attachment"
                               class="mt-1 block w-full text-sm">
                        @error('attachment')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            등록
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
