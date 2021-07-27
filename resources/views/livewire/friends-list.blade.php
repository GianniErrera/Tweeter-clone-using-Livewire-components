<div class="bg-blue-100 p-4">
    <h3 class="font-bold text-xl mb-4">Followers</h3>

    <ul>
        @forelse($users as $user)
            <li class="{{ $loop->last ? '' : 'mb-4' }}">
                <a href="#" class="flex items-center text-sm">
                    <img
                        src="https://i.pravatar.cc/150?u={{$user->email}} }}"
                        alt=""
                        class="rounded-full mr-4 text-sm"
                        width="40"
                        height="40"
                    >
                    {{ $user->name }}
                </a>
            </li>
        @empty
            <li>No friends yet</li>
        @endforelse
    </ul>
</div>
