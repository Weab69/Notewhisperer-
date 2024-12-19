<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;


new #[Layout('layouts.app')] class extends Component {
    public Note $note;

    public $noteTitle;
    public $noteContent;
    public $noteRecipient;
    public $noteSendDate;
    public $noteIsPublished;

    public function mount(Note $note)
    {
        $this -> authorize('update', $note);
        $this -> fill($note);
        $this -> noteTitle = $note -> title;
        $this -> noteContent = $note -> content;
        $this -> noteRecipient = $note -> recipient;
        $this -> noteSendDate = $note -> send_date;
        $this -> noteIsPublished = $note -> is_published;
    }

    public function saveNote()
    {
        $validated = $this -> validate([
            'noteTitle' => 'required',
            'noteContent' => 'required',
            'noteRecipient' => 'required',
            'noteSendDate' => 'required',
        ]);
        $this -> note -> update([
            'title' => $this -> noteTitle,
            'content' => $this -> noteContent,
            'recipient' => $this -> noteRecipient,
            'send_date' => $this -> noteSendDate,
            'is_published' => $this -> noteIsPublished,
        ]);
        $this->dispatch('note-saved');
    }
}; ?>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto space-y-4 sm:px-6 lg:px-8">
            <form wire:submit="saveNote" class="space-y-4">
                <x-input wire:model="noteTitle" label="Note Title" placeholder="Its been a great day!" />
                <x-textarea wire:model="noteContent" label="Your Note" placeholder="I just want to say..." />
                <x-input icon="user" wire:model="noteRecipient" label="Recipient" placeholder="john@doe.com" type="email" />
                <x-input icon="calendar" wire:model="noteSendDate" label="Send Date" type="date" />
                <x-checkbox label="Note is Published" wire:model="noteIsPublished" />

                <div class="flex justify-between pt-4 ">
                    <x-button type="submit" secondary spinner="saveNote">Save Note</x-button>
                    <x-button href="{{ route('notes.index') }}" flat negative >Back to Notes</x-button>
                </div>
                <x-action-message on="note-saved" class="text-green-500" />
            </form>
        </div>
    </div>

