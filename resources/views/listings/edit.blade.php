@section('title', 'Edit Listing | ' . config('app.name'))
<x-layout>
    <div class="font-semibold text-3xl text-center mb-24 mt-12">
      <h2>Edit Job</h2>
    </div>
  
    <div class="px-8 mx-auto max-w-screen-xl">
      <form action="/listings/{{ $listing->id }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6 mb-24">
        @csrf
        @method('PUT')

        <div class="flex flex-col">
          <label for="company" class="text-sm font-medium">Company Name</label>
          <input type="text" name="company" value="{{ old('company', $listing->company) }}" required class="w-full px-4 py-2 mt-1 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500">
          @error('company')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex flex-col">
          <label for="title" class="text-sm font-medium">Job Title</label>
          <input type="text" name="title" value="{{ old('title', $listing->title) }}" required class="w-full px-4 py-2 mt-1 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500">
          @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex flex-col">
          <label for="location" class="text-sm font-medium">Job Location</label>
          <input type="text" name="location" value="{{ old('location', $listing->location) }}" required class="w-full px-4 py-2 mt-1 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500">
          @error('location')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
  
        <div class="flex flex-col">
          <label for="website" class="text-sm font-medium">Website/Application URL</label>
          <input type="url" name="website" value="{{ old('website', $listing->website) }}" required class="w-full px-4 py-2 mt-1 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500">
          @error('website')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex flex-col">
          <label for="tags" class="text-sm font-medium">Tags (comma separated)</label>
          <input type="text" name="tags" value="{{ old('tags', $listing->tags) }}" required class="w-full px-4 py-2 mt-1 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500">
          @error('tags')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
  
        <!-- Contact Email -->
        <div class="flex flex-col">
          <label for="email" class="text-sm font-medium">Contact Email</label>
          <input type="email" name="email" value="{{ old('email', $listing->email) }}" required class="w-full px-4 py-2 mt-1 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500">
          @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
  
        <!-- Company Logo -->
        <div class="grid grid-cols-1 gap-2">
          <label for="logo" class="text-sm font-medium">Company Logo</label>
          <input type="file" id="logo" name="logo" accept="image/*" class="block w-full p-2 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500">
          @if($listing->logo)
            <img src="{{ asset('storage/' . $listing->logo) }}" alt="Current Company Logo" class="mt-2 h-16">
          @endif
        </div>
  
        <!-- Job Description -->
        <div class="flex flex-col">
          <label for="description" class="text-sm font-medium">Job Description</label>
          <textarea id="description" name="description" rows="6" required class="w-full px-4 py-2 mt-1 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500">{{ old('description', $listing->description) }}</textarea>
          @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
  
        <!-- Buttons -->
        <div class="flex justify-between mt-6">
          <a href="/" class="inline-block px-6 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">← Back</a>
          <button type="submit" class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  mb-12">Update</button>
        </div>
      </form>
    </div>
  </x-layout>
  