<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteContent;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteTitle' => ['required', 'string', 'min:3'],
            'noteContent' => ['required', 'string', 'min:10'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);

        auth()->user()->notes()->create([
            'title' => $this->noteTitle,
            'content' => $this->noteContent,
            'recipient' => $this->noteRecipient,
            'send_date' => $this->noteSendDate,
            'is_published' => $this->noteIsPublished,
        ]);

        redirect(route('notes.index'));

    }
}; ?>

<div>
    <form wire:submit="submit" class="space-y-4">
        <x-input wire:model="noteTitle" label="Note Title" placeholder="Its been a great day!" />
        <x-textarea wire:model="noteContent" label="Your Note" placeholder="I just want to say..." />
        <x-input icon="user" wire:model="noteRecipient" label="Recipient" placeholder="john@doe.com" type="email" />
        <x-input icon="calendar" wire:model="noteSendDate" label="Send Date" type="date" />
        <div class="pt-4">
        <x-button type="submit" primary icon="calendar" spinner>Schedule Note</x-button>
        </div>
    </form>
</div>
