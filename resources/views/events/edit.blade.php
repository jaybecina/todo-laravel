<x-app-layout>
    <h2 class="font-bold text-2xl">Edit {{ ucwords($event->name) }}</h2>
    <span class="flex my-6">
        <a href="{{ route('events.show', ['event' => $event->id]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a>
    </span>
    <div class="mt-4">
        <form method="POST" action="{{ route('events.update', ['event' => $event->id]) }}">
            @method('PUT')
            @csrf
            <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
                <div class="relative rounded-xl overflow-auto">
                    <div class=" overflow-hidden my-8">
                        <div class="flex flex-col space-y-6 px-4 py-2">
                            <label class="block">
                                <input type="text" id="name" name="name" value="{{ $event->name }}"
                                    class=" rounded-lg mt-1 block w-full" placeholder="Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </label>
                            <div class="flex gap-4">
                                <label class="block w-full">
                                    <input id="start_date" type="date" name="start_date"
                                        value="{{ $event->start_date }}" class="rounded-lg mt-1 block w-full"
                                        placeholder="Start Date">
                                    @error('start_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </label>
                                <label class="block w-full">
                                    <input id="end_date" type="date" name="end_date" value="{{ $event->end_date }}"
                                        class="rounded-lg mt-1 block w-full" placeholder="End Date">
                                    @error('end_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 px-2 flex">
                <button class="ml-auto" type="submit"> Save Event </button>
            </div>
        </form>
    </div>
</x-app-layout>
