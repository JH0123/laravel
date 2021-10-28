<div class="container dark:text-black">
    <div class="card" style="width: 80%;  margin:10px">
        @if ($post->image)
    <img src="{{ '/storage/images/'. $post->image }}" class="card-img-top" alt="post image">
    @else
    <span>첨부 이미지 없음</span>
    @endif
    {{-- <div class="card-body">
        <h5 class="card-title">제목 : {{ $post->title }}</h5>
        <p class="card-text">내용 : {{ $post->content }}</p>
    </div> --}}

    <ul class="list-group list-group-flush">
        <li class="list-group-item">제조회사 : {{ $post->company }}</li>
        <li class="list-group-item">자동차명 : {{ $post->car_name }}</li>
        <li class="list-group-item">제조년도 : {{ $post->year }}</li>
        <li class="list-group-item">가격 : {{ $post->pay }}</li>
        <li class="list-group-item">차종 : {{ $post->kinds }}</li>
        <li class="list-group-item">외형 : {{ $post->view }}</li>
    </ul>
    <div class="card-body flex">
        <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="card-link">수정하기</a>
        
        <div class="ml-4">
        <form class="row g-3" action="{{ route('posts.destroy',['post'=>$post->id]) }}"
        method="post" enctype="multipart/form-data">
        @method('delete')
        @csrf

        <button type="submit">삭제하기</button>
        </form>
        </div>
    </div>
</div>