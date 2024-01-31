<div class="py-12">
    <div class="w-full">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
{{--                <livewire:create-post />--}}

                <div class="min-w-full align-middle">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</span>
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
                                <td>
                                    <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                        Edit
                                    </a>
                                    <a href="#" class="inline-flex items-center px-4 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                        Delete
                                    </a>
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
        </div>
    </div>
</div>
