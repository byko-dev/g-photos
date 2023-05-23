@props(['post'])

<div>
    <div class="post_owner">
        <div class="flex items-center space-x-4">
            <img class="w-10 h-10 rounded-full" src="{{$post->user->user_photo? asset('storage/' . $post->user->user_photo): asset('assets/user.png')}}" alt="">
            <div class="font-medium ">
                <div>{{$post->user->name}}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">{{$post->created_at}}</div>
            </div>
        </div>
    </div>
    <div class="post_container border-gray-200 border-b">
        <img onclick="window.location = '/post/edit/{{$post->id}}'" src="{{asset('storage/' . $post->photo)}}">
        <div class="post_description">
            <div class="gap-7px">
                @csrf
                <img onclick="incrementLikes({{$post->id}}, this)" src="{{asset("assets/like1.svg")}}">
                <p id="likes{{$post->id}}"> {{$post->likes}} </p>
            </div>
            <p> <span class="span_bold"> {{$post->user->name}}: </span>{{$post->description}} </p>
            <a href="{{asset(asset('storage/' . $post->photo))}}" download>
                <img src="{{asset('assets/download.svg')}}">
            </a>
        </div>
        <div class="gap-7px">
            @foreach(explode(',', $post->tags) as $tag)
                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">#{{ltrim($tag)}}</span>
            @endforeach
            @if($post->ai)
                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">#generated_by_ai</span>
            @endif

        </div>
    </div>
</div>
