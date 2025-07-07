<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <table class="table-auto w-full border border-gray-300">
                <thead class="bg-gray-100 dark:bg-neutral-800">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Sno</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">

                                <div class="flex flex-row items-center gap-2">

                                    <a href="{{ route('chat', $user->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                    </svg>
                                </a>
                                    @if ($user->unread_messages_count > 0)

                                    <span
                                    class="flex items-center justify-center w-6 h-6 rounded-full bg-red-500 text-white text-xs font-bold">
                                    {{ $user->unread_messages_count }}
                                </span>
                                @endif
                                </div>
                            </td> {{-- or any dynamic message --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>

