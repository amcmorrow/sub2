<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<!-- Google Search Bar -->
<div class="search-bar">
    <form action="https://www.google.com/search" method="GET" target="_blank">
        <input type="text" name="q" placeholder="Search Google..." required>
        <button type="submit">Search</button>
    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
