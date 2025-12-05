<x-app-layout>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- 🔥 flex-col + h-[75vh] --}}
            <div class="h-[75vh] bg-white shadow-sm sm:rounded-lg p-6 flex flex-col">

                {{-- 2. 목록으로 돌아가기 버튼 bold + 약간 꾸미기 --}}
                <a href="{{ route('posts.index') }}"
                   class="mb-2 text-gray-600 font-semibold hover:underline">
                    ← 목록으로 돌아가기
                </a>

                <h2 class="mt-4 font-semibold text-xl text-gray-800 leading-tight">
                    {{ $post->title }}
                </h2>

                <div class="mt-1 text-sm text-gray-500">
                    작성일: {{ $post->created_at->format('Y-m-d H:i') }}
                </div>

                <div class="mt-4 whitespace-pre-line">
                    {{ $post->content }}
                </div>

                {{-- 🔥 맨 아래 오른쪽 정렬 (mt-auto) --}}
                <div class="mt-auto pt-4 flex justify-end">
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
                            {{-- 3. 댓글 영역 (내용 아래, 버튼 위) --}}
            <div class="mt-6 border-t pt-4">
                <h3 class="font-semibold mb-3 text-gray-800">댓글</h3>

                @forelse ($post->comments as $comment)
                    <div class="mb-4 border-b pb-3" x-data="{ editing: false }">
                        {{-- 댓글 내용/작성자 + 수정폼 토글 --}}
                        <div x-show="!editing">
                            <div class="text-md text-gray-800">
                                {{ $comment->content }}
                            </div>
                            <div class="mt-1 text-xs font-bold text-gray-500 flex items-center justify-between">
                                <span>  
                                    {{ $comment->user?->name ?? '알 수 없음' }}
                                    · {{ $comment->created_at->format('Y-m-d H:i') }}
                                </span>

                                {{-- 작성자만 수정/삭제 버튼 보이기 --}}
                                @auth
                                    @if(auth()->id() === $comment->user_id)
                                        <span class="space-x-2">
                                            <button
                                                type="button"
                                                class="text-xs text-indigo-600 hover:underline"
                                                @click="editing = true"
                                            >
                                                수정
                                            </button>

                                            <form action="{{ route('comments.destroy', $comment) }}"
                                                method="POST"
                                                class="inline"
                                                onsubmit="return confirm('댓글을 삭제하시겠습니까?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-xs text-red-600 hover:underline">
                                                    삭제
                                                </button>
                                            </form>
                                        </span>
                                    @endif
                                @endauth
                            </div>
                        </div>

                        {{-- 인라인 수정 폼 --}}
                        @auth
                            @if(auth()->id() === $comment->user_id)
                                <div x-show="editing">
                                    <form action="{{ route('comments.update', $comment) }}"
                                        method="POST"
                                        class="mt-2 space-y-2">
                                        @csrf
                                        @method('PUT')

                                        <textarea name="content" rows="2"
                                                class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('content', $comment->content) }}</textarea>

                                        <div class="flex justify-end space-x-2">
                                            <button type="button"
                                                    class="px-3 py-1 text-xs text-gray-600 border rounded hover:bg-gray-100"
                                                    @click="editing = false">
                                                취소
                                            </button>
                                            <button type="submit"
                                                    class="px-3 py-1 text-xs bg-blue-500 text-white rounded hover:bg-blue-600">
                                                저장
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                @empty
                    <p class="text-sm text-gray-500">
                        아직 댓글이 없습니다. 첫 댓글을 남겨보세요.
                    </p>
                @endforelse

                @auth
                    <form action="{{ route('posts.comments.store', $post) }}" method="POST" class="mt-4 flex gap-2">
                        @csrf
                        <textarea name="content" rows="2"
                                class="flex-1 border rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                                placeholder="댓글을 입력하세요."></textarea>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
                            등록
                        </button>
                    </form>
                @else
                    <p class="mt-3 text-xs text-gray-500">
                        댓글을 작성하려면 로그인 해주세요.
                    </p>
                @endauth
            </div>

            </div>
        </div>
    </div>
</x-app-layout>
