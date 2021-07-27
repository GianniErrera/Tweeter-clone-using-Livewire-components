<x-app>
    <div>


        <header class="mb-6 relative">
            <div class="relative">
                <img
                src="{{ $user->banner }}"
                alt=""
                class="mb-2"
                >

                <img
                    src="{{ $user->profile_photo_path }}"
                    alt=""
                    class="rounded-full mr-2 absolute bottom-0 transform -translate-x-2/4 translate-y-2/4"
                    style="left: 50%"
                    width="150px"
                    height="150px"
                >
            </div>

            <div class="flex justify-between items-center mb-6">
                <div style="max-width: 270px">
                    <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                    <p class="text-sm"> Joined {{ $user->created_at->diffForHumans() }}</p>
                </div>
                <div class="flex">
                    @can('edit', $user)
                        <a href="{{ $user->path('edit') }}"
                        class="rounded-full shadow py-2 px-4 border border-gray-300 text-black text-xs mr-2"
                        >
                            Edit profile
                        </a>
                    @endcan
                    <livewire:follow-unfollow-button :user="$user" />
                </div>
            </div>

            <p class="text-sm">
                {{ $user->bio }}
            </p>

        </header>

        <hr>


        @if (Session::has('follow'))
            <div class="flex items-center rounded-lg bg-blue-500 text-white text-sm font-bold px-4 py-3 fixed bottom-1 right-0 role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p> {{ session('follow') }}</p>
            </div>
        @elseif (Session::has('unfollow'))
            <div role="alert">
                <div class="bg-red-400 text-white font-bold rounded-lg px-4 py-3 fixed bottom-1 right-0">
                    {{ session('unfollow') }}
                </div>
            </div>
        @endif

        @livewire('tweets-collection', ["user" => $user])

    </div>

</x-app>
