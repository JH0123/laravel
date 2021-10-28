<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
        <button onclick=location.href="{{ route('posts.create') }}" class="btn btn-info hover:bg-blue-700 font-bold text-white">자동차 등록</button>
    </x-slot>
    <x-post-list :posts="$posts" />
</x-app-layout>