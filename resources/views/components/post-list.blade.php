<div class="m-4 p-4">
  <table class="table dark:text-gray-300">
    <thead>
      <tr>
        <th scope="col">제조회사</th>
        <th scope="col">자동차명</th>
        <th scope="col">제조년도</th>
      </tr>
    </thead>
    <tbody>
      {{-- 게시글 표시 --}}
      @foreach ($posts as $post)
        <tr>
          <td><a href="{{ route('posts.show', ['post'=>$post->id]) }}">{{ $post->company }}</a></td>
          <td>{{ $post->car_name }}</td>
          <td>{{ $post->year }}</td>
        </tr>
    @endforeach
      </tbody>
      </table>
    {{-- pagination --}}
    {{ $posts->links() }}
</div>