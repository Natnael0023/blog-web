@if (session('error'))
    <div x-data="{ open: {{ session()->has('erorr') ? 'true' : 'false' }} }" x-show="open" class="fixed inset-0 flex z-50 items-center justify-end">
        <div class="bg-white rounded-lg p-6 shadow-xl">
            <h2 class="text-lg text-red-400 font-medium">Unauthorized</h2>
            <p>{{ session('unauthorized') }}</p>
            <button @click="open = false" class="mt-4 px-4 py-2 bg-blue-300 text-white rounded hover:bg-blue-600">Close</button>
        </div>
    </div>
    @php
    session()->forget('unauthorized');
    @endphp
@endif

@if (session('success'))
    <div x-data="{ open: {{ session()->has('success') ? 'true' : 'false' }} }" x-show="open" class="fixed inset-0 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 shadow-xl">
            <h2 class="text-lg text-blue-400 font-medium">Success</h2>
            <p>{{ session('success') }}</p>
            <button @click="open = false" class="mt-4 px-4 py-2 bg-blue-300 text-white rounded hover:bg-blue-600">Close</button>
        </div>
    </div>
    @php
    session()->forget('deleteSuccess');
    @endphp
@endif