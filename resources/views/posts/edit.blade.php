<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
              {{ __('Edit Form') }}
            </h2>
            <button onclick=location.href="{{ route('posts.show', ['post'=>$post->id]) }}" class="btn btn-info hover:bg-blue-700 font-bold text-white">상세보기</button>
        </div>
    </x-slot>

    <div class="m-4 p-4">
      <form id="editForm" class="row g-3" action="{{ route('posts.update',['post'=>$post->id]) }}"
      method="post" enctype="multipart/form-data">
      @method('patch')
      @csrf

        <div class="col-12 m-2">
          <label for="company" class="form-label">제조회사</label>
          <textarea class="form-control" name="company" id="company">{{ $post->company }}</textarea>
          
          @error('company')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="car_name" class="form-label">자동차명</label>
          <textarea class="form-control" name="car_name" id="car_name">{{ $post->car_name }}</textarea>

          @error('car_name')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="year" class="form-label">제조년도</label>
          <textarea class="form-control" name="year" id="year">{{ $post->year }}</textarea>

          @error('year')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="pay" class="form-label">가격</label>
          <textarea class="form-control" name="pay" id="pay">{{ $post->pay }}</textarea>

          @error('pay')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="view" class="form-label">외형</label>
          <textarea class="form-control" name="view" id="view">{{ $post->view }}</textarea>

          @error('view')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="kinds" class="form-label">차종</label>
          <textarea class="form-control" name="kinds" id="kinds">{{ $post->kinds }}</textarea>

          @error('kinds')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <div class="flex item-center">
          <label for="image" class="form-label">이미지 첨부</label>
          @if ($post->image)
          <img src="{{ '/storage/images/'. $post->image }}"  alt="post image" class="h-20 w-20 rounded-full">
          <button onclick="return deleteImage({{ $post->id }})" class="btn btn-danger h-10 mx-2 my-2">이미지 삭제</button>
          </div>
          @else
          <span>첨부 이미지 없음</span>
          @endif
          <input type="file" name="image" id="image">
        </div>

        <div class="col-12 m-2">
          <button type="submit" class="btn btn-info hover:bg-blue-700 font-bold text-white">Edit</button>
        </div>
  
      </form>
      <script>
      function deleteImage(id){
        editForm = document.getElementById('editForm');
        editForm._method.value = 'delete';
        editForm.action = '/posts/images/'+id;
        editForm.submit();
        return false;
      }
    </script>
    </div>
</x-app-layout>