
<ul>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            {{-- href="{{ route('home')}}" --}}
        >
            Home
        </a>
    </li>


    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/explore"
        >
            Explore
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/notifications"
        >
            Notifications
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/messages"
        >
            Messages
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/bookmarks"
        >
            Bookmarks
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/lists"
        >
            Lists
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            {{-- href="{{ route('profile', auth()->user()) }}" --}}
        >
            Profile
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/more"
        >
            More
        </a>
    </li>

    @auth
        <li>
            <form method="POST" action="/logout">
                @csrf

                <button class="font-bold text-lg">Logout</button>
            </form>
        </li>
    @endauth
</ul>
