<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            게시판
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-end">
                <a href="{{ route('posts.create') }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    글쓰기
                </a>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="h-[75vh] overflow-y-auto">
                    <table class="h-[100%] min-w-full table-fixed text-left text-sm">
                        <thead class="h-[10%] border-b bg-gray-50 text-gray-600">
                            <tr>
                                <th class="px-4 py-2 w-16">No.</th>
                                <th class="px-4 py-2">제목</th>
                                <th class="px-4 py-2 w-48">작성일</th>
                                <th class="px-4 py-2 w-32">작성자</th>
                            </tr>
                        </thead>

                        <tbody class="">
                            @forelse ($posts as $post)
                                <tr class="border-b hover:bg-gray-100 cursor-pointer"
                                    onclick="location.href='{{ route('posts.show', $post) }}'">

                                    <td class="px-4 py-2 text-center">
                                        {{ $posts->firstItem() + $loop->index }}
                                    </td>

                                    <td class="px-4 py-2 hover:underline">
                                        {{ $post->title }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ $post->created_at->format('Y-m-d H:i') }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ $post->user->name }}
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td class="px-4 py-4 text-center text-gray-500" colspan="4">
                                        게시글이 없습니다.
                                    </td>
                                </tr>
                            @endforelse
                            @php
                            $perPage = 15;
                            $currentCount = $posts->count();
                            if ($currentCount === 0) {
                                $remainRows = $perPage - 1;
                            } else {
                                $remainRows = $perPage - $currentCount;
                            }
                        @endphp

                        @if ($remainRows > 0)
                            @for ($i = 0; $i < $remainRows; $i++)
                                <tr class="bg-white">
                                    <td class="px-4 py-2">&nbsp;</td>
                                    <td class="px-4 py-2"></td>
                                    <td class="px-4 py-2"></td>
                                    <td class="px-4 py-2"></td>
                                </tr>
                            @endfor
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 페이징 --}}
            <div class="mt-4">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
