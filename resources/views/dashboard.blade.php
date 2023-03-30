<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-blue-400 dark:text-blue-200 leading-tight">
            {{ __('Twitter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full">
                        <form action="{{ route('tweets.store') }}" method="POST">
                            @csrf
                            <textarea name="content" class="input input-bordered" id="" cols="130" rows="10" placeholder="Type Something..."></textarea>
                            <input type="submit" class="btn btn-primary" value="Tweet">
                        </form>
                    </div>
                    @foreach ($tweets as $t)
                    <div class="card card-side shadow-xl bg-primary mt-10">
                        <div class="card-body">
                          <h2 class="card-title">{{ $t->user->name }}</h2>
                          <p>{{ $t->content }}</p>
                          <div class="text-end">
                            <a href="{{ route('tweets.show', $t) }}" class="link link-hover text-blue-400">
                                Comment ({{ $t->comments->count() }})
                            </a>
                            @can('edit', $t)
                            <br>
                                <a href="{{ route('tweets.edit', $t) }}" class="link link-hover text-blue-400">
                                    Edit
                                </a>
                                <br>
                            @endcan

                            @can('delete', $t)
                                <form action="{{ route('tweets.destroy', $t->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger link link-hover text-red-400">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                          </div>
                          <span class="text-end">{{ $t->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
