@if (session()->has('messageGreen'))
    <div x-data="{show:true}" x-init="setTimeout(()=> show =false , 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-48 py-3">
        <p>{{ session('messageGreen') }}</p>
    </div>
@endif

@if (session()->has('messageRed'))
    <div x-data="{show:true}" x-init="setTimeout(()=> show =false , 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-48 py-3">
        <p>{{ session('messageRed') }}</p>
    </div>
@endif