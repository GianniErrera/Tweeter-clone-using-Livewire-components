<x-app>
    @forelse ($users as $user)
        <a href="{{ $user->path() }}" class="flex items-center mb-4">
            <img
            src="{{ $user->profile_photo_path }}"
            alt="{{ $user->username }}'s avatar"
            class="mr-4 rounded-lg"
            width="60">
            <div>
                <h4 class="font-bold">{{ '@' . $user->username }}</h4>
            </div>
        </a>
    @empty
        <p><h4> No users yet</h4></p>
    @endforelse

    {{ $users->links() }}
</x-app>
