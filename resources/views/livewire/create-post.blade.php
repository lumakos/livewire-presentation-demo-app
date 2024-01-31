<div class="w-full">
    <h1>{{ $componentTitle }}</h1>
    @if($success)
        <span class="block mb-4 text-green-500">Post saved successfully.</span>
    @endif
    <form method="POST" wire:submit="save">
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" wire:model="title" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" style="width: 100%;border:1px solid black;" />
            @error('title')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="body" class="block font-medium text-sm text-gray-700">Body</label>
            <textarea id="body" wire:model="body" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" style="width: 100%;border:1px solid black;"></textarea>
            @error('body')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
            Save
        </button>
    </form>
    <div class="seacrh">
        <input wire:model.live="searchQuery" type="search" id="search" placeholder="Search...">
    </div>

    <div class="min-w-full align-middle">
        <table class="min-w-full divide-y divide-gray-200 border">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Body</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            @forelse($posts as $post)
                <tr class="bg-white">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ $post->title }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ $post->body }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-6 py-4 text-sm" colspan="3">
                        No posts were found.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

