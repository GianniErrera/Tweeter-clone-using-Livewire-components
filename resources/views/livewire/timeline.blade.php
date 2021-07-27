<div class="border border-b-gray-300 rounded-lg">
    @forelse ($tweets as $tweet)
    <div class="p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400 rounded-xl' }}">
        @include('_tweet')
    </div>
@empty
    <p class="p-4">No tweets yet</p>
@endforelse

</div>
