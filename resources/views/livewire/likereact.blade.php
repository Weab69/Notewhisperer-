<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public Note $note;
    public $likeCount;

    public function mount(Note $note)
    {
        $this -> note = $note;
        $this -> likeCount = $note -> like_count;
    }

    public function increaseLikeCount()
    {
        $this->note->like_count++;
        $this->note->save();
        $this->likeCount= $this->note->like_count;
    }

}; ?>

<div>
    <x-button xs wire:click='increaseLikeCount' rose icon="heart" spinner>{{ $likeCount }}</x-button>
</div>
