<x-layout>
    <div class="double_form_container">
    <form method="post" action="/post/store" class="simple_form" enctype="multipart/form-data">
        @csrf
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl"> Add new photo! </h1>

        <div>
            <div class="flex items-center justify-center w-full">
                <label for="photo-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input name="photo" id="photo-file" value="{{old('photo')}}" type="file" class="hidden" />
                </label>
            </div>

            @error('photo')
            <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
            @enderror
        </div>

        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
            <textarea id="description" name="description" value="{{old('description')}}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Leave a comment..."></textarea>

            @error('description')
            <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
            @enderror
        </div>

        <div>

            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900">Tags (Comma Separated):</label>
            <input type="text" name="tags" id="tags" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Leave a tags..." />

            @error('tags')
            <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
            @enderror
        </div>

        <button type="submit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Add!</button>
    </form>

    <form method="post" class="simple_form" action="/ai/create">
        @csrf
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl"> Generate post by AI </h1>
        <div>

            <label for="content" class="block mb-2 text-sm font-medium text-gray-900">What you want to generate:</label>
            <input type="text" name="content" value="{{old('content')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Type phrase to generate..." />

            @error('content')
            <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
            @enderror
        </div>
        <button type="submit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Generate!</button>
    </form>
    </div>

</x-layout>
