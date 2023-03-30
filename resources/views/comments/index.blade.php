<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            Komentari <div class="text-blue-400">{{ $tweets->user->name }}</div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card my-4 bg-white">
                <div class="card-body">
                    <h2 class="text-xl font-bold">{{ $tweets->user->name }}</h2>
                    <p>{{ $tweets->content }}</p>
                    <div class="text-end">
                        @can('update', $tweets)
                            <a href="{{ route('tweets.edit', $tweets->id) }}" class="link link-hover text-blue-400"> Edit
                            </a>
                        @endcan
                        @can('delete', $tweets)
                            <form action="{{ route('tweets.destroy', $tweets->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Hapus">
                            </form>
                        @endcan
                        <span class="text-sm">{{ $tweets->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>


            <div class="card my-4 bg-white">
                <div class="card-body">
                    <div class="card-title">Komentar</div>
                    <form action="{{ route('comments.store', $tweets->id) }}" method="post">
                        @csrf
                        <textarea name="message" class="textarea textarea-bordered w-full" placeholder="tinggalkan komentar" rows="3"></textarea>
                        <input type="submit" value="Komentar" class="btn btn-primary">
                    </form>
                </div>
            </div>

            <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight mt-10">
                Komentar
            </h2>

            @foreach ($tweets->comments as $comments)
                <div class="card card-side shadow-xl bg-primary mt-10">
                    <div class="card-body">
                        <h2 class="card-title">{{ $comments->user->name }}</h2>
                        <p>{{ $comments->message }}</p>
                        <div class="text-end">
                        @can('edit', $comments)
                        <br>
                            <a href="{{ route('comments.edit', [$tweets->id, $comments->id]) }}" class="link link-hover text-blue-400">
                                Edit
                            </a>
                            <br>
                        @endcan
                        {{-- @can('delete', $comments)
                            <form action="{{ route('tweets.destroy', $comments->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger link link-hover text-red-400">
                                    Delete
                                </button>
                            </form>
                        @endcan --}}
                        </div>
                        <span class="text-end">{{ $comments->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
