@section('title', 'Manage Listings | ' . config('app.name'))
<x-layout>
    <x-card class="p-10">
        <header class="mb-6">
            <h1 class="text-3xl text-center font-bold uppercase text-gray-800">
                Manage Listings
            </h1>
        </header>

        <table class="w-full table-auto rounded-lg shadow-lg overflow-hidden bg-white">
            <thead class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Edit</th>
                    <th class="px-4 py-3 text-left">Delete</th>
                </tr>
            </thead>
            <tbody>
                @if ($listings->isEmpty())
                    <tr>
                        <td class="px-4 py-4 text-center text-gray-500" colspan="3">
                            No Listings Found
                        </td>
                    </tr>
                @else
                    @foreach ($listings as $listing)
                        <tr class="border-b border-gray-300 hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-4">
                                <a href="/listings/{{$listing->id}}" class="text-blue-600 font-semibold hover:underline">
                                    {{$listing->title}}
                                </a>
                            </td>
                            <td class="px-4 py-4">
                                <a href="/listings/{{$listing->id}}/edit" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                            <td class="px-4 py-4">
                                <form method="POST" action="/listings/{{$listing->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700 flex items-center" type="submit">
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class="mt-4 text-center text-gray-600">
            @if ($listings->isEmpty())
                Showing 0 listings.
            @else
                Showing {{ $listings->count() }} {{ Str::plural('listing', $listings->count()) }}.
            @endif
        </div>
    </x-card>
</x-layout>
