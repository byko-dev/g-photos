<x-layout>

    <div style="display: flex; flex-direction: row; gap: 50px;">
        <x-post :post="$post" />

        @auth
            @if(auth()->user()->id == $post->user->id)
                <div class="simple_form">
                    <form class="w-320px-flex-column" method="post" action="/post/update/{{$post->id}}">
                        @csrf
                        <h1> Edit post! </h1>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-900">Your message</label>
                            <textarea id="description" name="description" value="{{old('description')}}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Leave a comment...">{{$post->description}}</textarea>

                            @error('description')
                                <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
                            @enderror
                        </div>
                        <div>
                            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900">Tags (Comma Separated):</label>
                            <input type="text" name="tags" value="{{$post->tags}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Leave a tags..." />

                            @error('tags')
                                <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
                            @enderror
                        </div>
                        <button type="submit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Update!</button>
                    </form>

                    <form class="w-320px-flex-column" method="post" action="/post/delete/{{$post->id}}">
                        @csrf
                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete this post!</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

</x-layout>
