<x-layout>
    <form method="post" action="/user/register" class="simple_form">
        @csrf

        <h1> Sign in </h1>

        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                    @
                </span>
                <input type="text" name="name" value="{{old('name')}}" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" placeholder="Type your name..." />
            </div>

            @error('name')
                <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
            @enderror
        </div>

        <div>

            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email:</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                </div>
                <input type="text" name="email" value="{{old('email')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Type your email..." />
            </div>

            @error('email')
                <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
            @enderror
        </div>

        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password:</label>
            <input type="password" name="password" value="{{old('password')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Type your password..." />


            @error('password')
                <p class="mt-2 text-sm text-red-600"> {{$message}} </p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Retype password:</label>
            <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Retype your password..." />

            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Register!</button>
    </form>
</x-layout>
