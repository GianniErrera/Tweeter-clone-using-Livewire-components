<div>
    @unless(auth()->user()->is($user))
        @unless (current_user()->following($user)) <!--if user is not currently following profile a follow form is displayed -->
            <button wire:click="follow" class="bg-blue-500 hover:bg-blue-600 rounded-full shadow py-2 px-4 text-white text-xs">
                {{ 'Follow' }}
            </button>
        @else <!-- if user is currently following profile a follow form is displayed -->
            <button wire:click="unfollow" class="bg-red-500 hover:bg-red-600 rounded-full shadow py-2 px-4 text-white text-xs">
                {{ 'Unfollow' }}
            </button>
        @endif
    @endunless
</div>

