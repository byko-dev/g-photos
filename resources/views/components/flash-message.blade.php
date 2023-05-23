@if(session()->has('message'))

    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed mt-6 top-0 left-1/2 transform -translate-x-1/2 p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
        <span class="font-medium">{{session('message')}}</span>
    </div>
@endif
