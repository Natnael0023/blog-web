<div>
    <h1>Search results</h1>
    @foreach ($posts as $post )
        <x-feed.post-item :post="$searchResults"/>
    @endforeach
</div>