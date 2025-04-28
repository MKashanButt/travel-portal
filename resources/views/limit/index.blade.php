<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Limits') }}
            </h2>
            <a href="{{ route('limit.create') }}"
                class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent rounded-sm text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                {{ __('Add New Account Limit') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <table class="min-w-full divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                        <thead class="bg-[#FDFDFC] dark:bg-[#161615]">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    Agent</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    Limit</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-[#161615] divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->limit }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                        <a href="{{ route('limit.show', $item) }}"
                                            class="text-blue dark:text-[#FF4433] hover:underline underline-offset-4">View</a>
                                        <a href="{{ route('limit.edit', $item) }}"
                                            class="text-green-700 dark:text-[#FF4433] hover:underline underline-offset-4">Edit</a>
                                        <form action="{{ route('limit.destroy', $item) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-[#f53003] dark:text-[#FF4433] hover:underline underline-offset-4"
                                                onclick="return confirm('Are you sure you want to delete this PCC?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
