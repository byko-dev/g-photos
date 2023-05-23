<x-layout>
    <form method="post" action="/user/update" class="simple_form" enctype="multipart/form-data">
        @csrf
        <h1> Edit your profile </h1>

        <x-user-photo :photo="$user->user_photo" :size="'medium'" />

        <div>
            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">Change your profile photo:</label>
            <input type="file" name="photo" />

            @error('photo')
                <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
            @enderror
        </div>

        <div>
            <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900">Your name:</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                    @
                </span>
                <input type="text" id="website-admin" value="{{$user->name}}" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" disabled />
            </div>
        </div>

        <div>
            <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900">Your email:</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                </div>
                <input type="text" value="{{$user->email}}" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" disabled />
            </div>
        </div>

        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Leave a description...">{{$user->description}}</textarea>

            @error('description')
                <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
            @enderror
        </div>

        <button type="submit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Save!</button>
    </form>
</x-layout>
