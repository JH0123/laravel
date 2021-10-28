<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
              {{ __('Form') }}
            </h2>
            <button onclick=location.href="{{ route('posts.index') }}" class="btn btn-info hover:bg-blue-700 font-bold text-white">목록보기</button>
        </div>
    </x-slot>

    <div class="m-4 p-4">
      {{-- 파일 업로드 --}}
      <form class="row g-3" action="{{ route('posts.store') }}"
      method="post" enctype="multipart/form-data">
      @csrf{{-- 없으면 비활성화로 인해 페이지가 만료되었다는 페이지를 표시한다 --}}

        <div class="col-12 m-2">
          <label for="company" class="form-label">제조회사</label>
          {{-- 오래된 데이터 표시? --}}
          <textarea class="form-control" name="company" id="company">{{ old('company') }}</textarea>
          
          {{-- 입력을 하지 않을 시 에러메시지 출력 --}}  
          @error('company')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="car_name" class="form-label">자동차명</label>
          <textarea class="form-control" name="car_name" id="car_name">{{ old('car_name') }}</textarea>

          @error('car_name')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="year" class="form-label">제조년도</label>
          <textarea class="form-control" name="year" id="year">{{ old('year') }}</textarea>

          @error('year')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="pay" class="form-label">가격</label>
          <textarea class="form-control" name="pay" id="pay">{{ old('pay') }}</textarea>

          @error('pay')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="view" class="form-label">외형</label>
          <textarea class="form-control" name="view" id="view">{{ old('view') }}</textarea>

          @error('view')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="kinds" class="form-label">차종</label>
          <textarea class="form-control" name="kinds" id="kinds">{{ old('kinds') }}</textarea>

          @error('kinds')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="image" class="form-label">자동차 이미지</label>
          <input type="file" name="image" id="image" value="{{ old('image') }}">
        </div>

        <div class="col-12 m-2">
          <button type="submit" class="btn btn-info hover:bg-blue-700 font-bold text-white">Submit</button>
        </div>
  
      </form>
    </div>
</x-app-layout>