<x-app-layout>
    <h2 class="font-bold text-2xl"> {{ ucwords($event->name) }}</h2>
    <span class="flex my-6">
        <a href="{{ route('events.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a>
    </span>
    <div class="mt-4 -mb-3">
        <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
            <div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]"
                style="background-position: 10px 10px;"></div>
            <div class="relative rounded-xl overflow-auto">
                <div class="shadow-sm overflow-hidden my-8">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th
                                    class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                    Name</th>
                                <th
                                    class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                    Start Date</th>
                                <th
                                    class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                    End Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-slate-800">
                            <tr>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ ucwords($event->name) }}
                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                    {{ $event->start_date }}
                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                    {{ $event->end_date }}
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5">
            </div>
        </div>

        <div class="mt-3 px-2 flex justify-end space-x-4">
            <a href="{{ route('events.edit', $event->id) }}" class="hover:underline"> Edit Event </a>
            <form target="" action="{{ route('events.destroy', ['event' => $event->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <button type="submit" class="js-alertOnSubmit text-red-400 hover:underline" title="">
                    Delete
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
