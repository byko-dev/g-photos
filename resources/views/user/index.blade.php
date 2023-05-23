<x-layout>
    <div class="user_container border-gray-200 border-b">
        <x-user-photo :photo="$user->user_photo" :size="'big'"/>
        <div style="max-width: 350px">
            <div class="format_inline">
                <p> @<span>{{$user->name}}</span> </p>
                <button type="button" onclick="window.location = '/user/edit'" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Edit profile</button>
            </div>
            <p> <span class="span_bold"> Email => </span> {{$user->email}} </p>
            <p> <span class="span_bold"> Member from => </span> {{$user->created_at}}</p>
            <p> <span class="span_bold">Your description => </span>  {{$user->description}}</p>
        </div>
    </div>
    </div>

    <div class="post_container_view" >
        <div class="post_card post_card_button" onclick="window.location = '/post/create'">
            <img src="{{asset("/assets/add.png")}}" alt="create new post!">
        </div>

        @unless(count($posts) == 0)
            @foreach($posts as $post)
                <div class="post_card" onclick="window.location = '/post/edit/{{$post->id}}'" style="{{'background-image: url(' . asset('storage/' . $post->photo) . ');'}}">
                </div>
            @endforeach
        @endunless
    </div>
</x-layout>
