<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Articles
                </div>
                <div class="px-6">
                    <input type="text" name="search" placeholder="search articles" class="rounded">

                    <button class="ml-3 bg-gray-100 p-2 rounded"

                    {{-- On button click hx-get will send a get request to /search uri --}}
                        hx-get="/search"

                    {{-- The response from the /search url will be appended to the div with the id . #article-data --}}
                        hx-target="#article-data"

                    {{-- The name input  value will be sent within the get request --}}
                        hx-include="[name='search']"
                        >
                        search
                    </button>
                </div>
            </div>

            <div class="mt-6 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- This div's content will be replaced with article data when search button is clicked --}}
                    <div class="article-data" id="article-data">
                        @foreach ($articles as $article)
                        <div class="article-info mt-3 mb-4" id="article-data">
                            <h3 class="text-xl">{{$article->title}}</h3>
                            <p class="mt-2 text-gray-400"> {!! $article->content !!}</p>
                        </div>
                        <hr>
                        @endforeach
                        <div class="mt-8">
                            {{$articles->links('vendor.pagination.tailwind')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
