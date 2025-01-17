<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto space-y-4 sm:px-6 lg:px-8">
            <x-button icon="arrow-left" class="mb-8" href="{{ route('notes.index') }}" wire:click="reset">Back to Notes</x-button>
            <livewire:notes.create-note />
        </div>
    </div>
</x-app-layout>
