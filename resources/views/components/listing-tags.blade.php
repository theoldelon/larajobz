@props(['tagCsv'])

<div class="flex flex-wrap mb-2">
    @foreach(explode(',', $tagCsv) as $tag)
        <a href="/?tag={{ trim($tag) }}" class="bg-gray-900 text-white px-3 py-1 rounded-full mr-2 mb-2 hover:bg-gray-700 transition duration-200 flex items-center">
            <i class="fas fa-tag text-sm mr-1"></i>
            <span class="text-sm">{{ trim($tag) }}</span>
        </a>
    @endforeach
</div>
