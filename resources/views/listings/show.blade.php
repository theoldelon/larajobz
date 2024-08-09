@section('title', $listing->title . ' | ' . config('app.name'))

<x-layout>
    @include('partials._search')
    
    <div class="flex justify-center items-center bg-gray-100 p-6 mb-24">
        <x-card class="p-10 w-full md:w-3/4 lg:w-1/2">
            <div class="flex flex-col items-center justify-center text-center space-y-6">
                <img class="w-48 h-48 rounded-md object-cover mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/preview.png') }}"
                    alt="{{ $listing->title }}" />
                    
                    <a href="{{ route('user.listings', ['user' => $listing->user->id]) }}" class="block text-xl font-semibold bg-gray-100 rounded-lg p-4 shadow-md text-center hover:bg-gray-200 transition duration-300">
                        <h2 class="text-indigo-600">{{ $listing->user->name }}</h2>
                    </a>
                    
                    <h3 class="text-3xl font-bold">{{ $listing->title }}</h3>
                    <div class="text-xl font-semibold">{{ $listing->company }}</div>

                    <x-listing-tags :tagCsv="$listing->tags" />

                    <div class="text-lg text-gray-700 my-4">
                        <i class="fas fa-map-marker-alt"></i> {{ $listing->location }}
                    </div>
                    <hr class="border-gray-200 w-full mb-6">
                    <div>
                        <h3 class="text-2xl font-bold mb-4">Job Description</h3>
                        <div class="text-lg leading-relaxed">
                            {{ $listing->description }}
                        </div>
                        
                        <div class="flex justify-center space-x-4 mt-6">
                            <a href="mailto:{{ $listing->email }}"
                                class="bg-gray-700 text-white py-2 px-4 rounded-xl hover:bg-gray-600 transition duration-200 flex items-center">
                                <i class="fas fa-envelope mr-2"></i> Email Contact
                            </a>

                            <a href="{{ $listing->website }}" target="_blank"
                                class="bg-blue-600 text-white py-2 px-4 rounded-xl hover:bg-blue-500 transition duration-200 flex items-center">
                                <i class="fas fa-globe mr-2"></i> Visit Website
                            </a>
                        </div>
                    </div>
            </div>
        </x-card>
    </div>
</x-layout>
