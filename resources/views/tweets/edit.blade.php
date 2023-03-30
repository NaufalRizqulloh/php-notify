<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5">EDIT</div>
                    <div class="w-full">
                        <form action="{{ route('tweets.update', $tweets->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <textarea name="content" class="input input-bordered" id="" cols="130" rows="10" placeholder="Type Something..." value="{{ $tweets->content }}"></textarea>
                            <input type="submit" class="btn btn-primary" value="Tweet">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
