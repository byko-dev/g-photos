<x-layout>
    @foreach($posts as $post)
        <x-post :post="$post" />
    @endforeach
    <div class="pagination_container"> {{$posts->links()}} </div>
</x-layout>
