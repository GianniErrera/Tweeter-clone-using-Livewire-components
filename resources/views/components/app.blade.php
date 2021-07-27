<x-master>
    <section class="px-6">
        <main class="container mx-auto">
            <div class="flex lg:justify-between">
                @if(auth()->check())
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                @endif

                <div class="lg:flex-1 lg:mx-10" @if(auth()->check())style="max-width: 700px;"@else style="max-width: 1400px;"@endif>
                    {{ $slot }}
                </div>

                @if(auth()->check())
                    <div class="lg:w-1/6">
                         @livewire('friends-list')
                    </div>
                @endif
            </div>

        </main>
    </section>
</x-master>
