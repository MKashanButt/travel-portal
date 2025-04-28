<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>
            <a href="/register"
                class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent rounded-sm text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                {{ __('Add New User') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <table class="table">
                        <thead class="table-head">
                            <tr>
                                <th class="table-head-cell">
                                    Name</th>
                                <th class="table-head-cell">
                                    Email</th>
                                <th class="table-head-cell">
                                    Role</th>
                                <th class="table-head-cell">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="table-cell">{{ $user->name }}</td>
                                    <td class="table-cell">{{ $user->email }}</td>
                                    <td class="table-cell">{{ ucwords($user->role->name) }}</td>
                                    <td class="table-cell font-medium space-x-3">
                                        <a href="{{ route('users.show', $user) }}"
                                            class="text-blue dark:text-[#FF4433] hover:underline underline-offset-4">View</a>
                                        <a href="{{ route('users.edit', $user) }}"
                                            class="text-green-700 dark:text-[#FF4433] hover:underline underline-offset-4">Edit</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-[#f53003] dark:text-[#FF4433] hover:underline underline-offset-4"
                                                onclick="return confirm('Are you sure you want to delete this User?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
