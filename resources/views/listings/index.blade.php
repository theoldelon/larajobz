
<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="container mx-auto p-2 mt-6">
        @if ($listings->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">
                @foreach ($listings as $listing)
                    <x-listing-card :listing="$listing" />
                @endforeach
            </div>
        @else
            <p class="text-red-500 text-xl">No listings available.</p>
        @endif
    </div>

    <div class="mt-2 p-4 mb-24">
        {{ $listings->links() }}
    </div>
</x-layout>
