<x-layout>
    <div class="container mx-auto py-8 mb-24">
      <h1 class="text-4xl font-extrabold text-center mb-12 text-gray-800">{{ $user->name }}'s Listings</h1>
  
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($listings as $listing)
          <a href="/listings/{{ $listing->id }}" class="bg-gradient-to-b from-purple-200 to-indigo-200 shadow-md block p-6 bg-white border border-gray-200 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $listing->title }}</h2>
            <div class="flex items-center text-gray-600 pt-2">
                <i class="fas fa-map-marker-alt mr-2"></i> 
                <strong>{{ $listing->location }}</strong>
            </div>
          </a>
        @endforeach
      </div>
  
      <div class="mt-12 text-center text-gray-600">
        @if ($listings->isEmpty())
          Showing 0 listings.
        @else
          Showing {{ $listings->count() }} {{ Str::plural('listing', $listings->count()) }}..
        @endif
      </div>
    </div>
  </x-layout>
  