<form action="{{ route('posts.update', $post) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')


    @if ($post->attachment)
        <div class="mb-2 text-sm">
            <span class="text-gray-700">현재 파일:</span>
            <a href="{{ asset('storage/'.$post->attachment) }}"
               class="text-blue-600 hover:underline"
               target="_blank">
                다운로드
            </a>
        </div>
    @endif

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">파일 첨부 (교체하려면 선택)</label>
        <input type="file" name="attachment"
               class="mt-1 block w-full text-sm">
        @error('attachment')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

</form>
