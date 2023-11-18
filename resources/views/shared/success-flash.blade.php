@if (session()->has('success'))
    <div class=" absolute top-0 bg-black p-5">
        <h2 class=" text-green-500">{{session('success')}}</h2>
    </div>
@endif