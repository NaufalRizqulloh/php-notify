<x-app-layout>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-white leading-tight">
            Notifikasi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($notifications as $notification)
                <div class="card bg-white shadow-xl mb-5">
                    <div class="card-body">
                        <p>{{ $notification->data['user']['name'] }} mengomentari <a class="link text-blue" href="{{ route('tweets.show', $notification->data['tweet']['id']) }}">Tweet Kamu</a></p>
                    </div>
                </div>

            @empty
                <div class="alert shadow-lg bg-white">
                    <div>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
