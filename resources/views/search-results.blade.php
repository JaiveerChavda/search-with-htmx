@if ($articles->count() == null)
    <h1>No articles found</h1>
@else
    @foreach ($articles as $article)
        <div class="article-info mt-3 mb-4" id="article-data">
            <h3 class="text-xl">{{ $article->title }}</h3>
            <p class="mt-2 text-gray-400"> {!! $article->content !!}</p>
        </div>
        <hr>
    @endforeach
    <div class="mt-8">
        {{ $articles->links('vendor.pagination.search-pagination') }}
    </div>
@endif
