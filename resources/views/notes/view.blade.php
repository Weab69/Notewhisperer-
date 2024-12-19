<x-guest-layout>
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$note->title}}
        </h2>
    </div>
    <p class="mt-4">{{ $note->content }}</p>
    <div class="flex items-center justify-end mt-12 space-x-4">
        <h3 class="text-sm text-gray-500 mr-4">Sent from {{$user->name}} </h3>
        <livewire:likereact :note="$note" />
    </div>
</x-guest-layout>
