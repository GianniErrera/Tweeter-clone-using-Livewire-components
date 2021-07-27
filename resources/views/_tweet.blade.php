<div class="mr-2 flex-shrink-0">
    <a href="{{ $tweet->user->path() }}">
        <img
            src="{{ $tweet->user->profile_photo_path }}"
            alt=""
            class="rounded-full mr-2"
            width="50"
            height="50"
        >
    </a>
</div>
<div>
    <div class="flex flex-row justify-between">
        <div>
            <h5 class="font-bold mb-4">
                <a href="{{ $tweet->user->path() }}">
                    {{ $tweet->user->name }}
                </a>
            </h5>
        </div>

        @can('delete', $tweet)
            <div class="icon-container col-xs-12 col-sm-4">
                <button wire:click.prevent="delete" class="svg-icon">
                    <svg class="w-4 text-gray-500" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g class="fill-current">
                            <path d="M2,2 L18,2 L18,4 L2,4 L2,2 Z M8,0 L12,0 L14,2 L6,2 L8,0 Z M3,6 L17,6 L16,20 L4,20 L3,6 Z M8,8 L9,8 L9,18 L8,18 L8,8 Z M11,8 L12,8 L12,18 L11,18 L11,8 Z" id="Combined-Shape"></path>

                        </g>
                    </g>
                    </svg>
                </button>
            </div>
        @endcan
    </div>

    <div>
    <p class="text-sm mb-3"> {{ $tweet->body }} </p>
    </div>

    @if($tweet->attached_image)
        <img
            src={{asset('storage/' .  $tweet->attached_image) }}
            class = "my-2"
        />
    @endif

    <div class="flex">
        {{-- @php dd($tweet);@endphp --}}
        <livewire:like-dislike-buttons :tweet="$tweet" />

    </div>
</div>
