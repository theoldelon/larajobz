@props(['listing'])

<x-card class="bg-gray-100 border border-gray-200 p-6">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="flex flex-col sm:flex-row">
            <div class="sm:w-1/2 sm:pr-4 flex justify-center items-center"> 
                <div class="relative h-48 sm:h-48">
                    <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/preview.png') }}" alt="{{ $listing->title }}" class="w-64 h-48 object-cover rounded-lg">
                </div>
            </div>
            
            <div class="sm:w-1/2 p-4 flex flex-col justify-between">
                <h2 class="text-xl sm:text-2xl font-bold mb-2">
                    <a href="/listings/{{ $listing->id }}" class="text-blue-600 hover:text-blue-700 font-semibold transition duration-300">
                        {{ $listing->title }}
                    </a>
                </h2>
                <x-listing-tags :tagCsv="$listing->tags" class="mb-2" />
            
                <div class="flex items-center text-gray-600 mb-2">
                    <i class="fas fa-map-marker-alt mr-2"></i> 
                    <strong>{{ $listing->location }}</strong>
                </div>
            
                <div class="flex items-center mt-auto">
                    <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/preview.png') }}" alt="{{ $listing->title }}" class="w-8 h-8 rounded-full mr-2">
                    <a href="{{ route('user.listings', ['user' => $listing->user->id]) }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">
                        {{ $listing->user->name }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-card>
