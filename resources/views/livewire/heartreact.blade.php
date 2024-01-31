<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public Note $note;
    public $heartCount;
    public $buttonClicked = false;


    public function mount(Note $note)
    {
        $this->note = $note;
        $this->heartCount = $note->heart_count;
    }

    public function increaseHeartCount()
    {
        if (!session()->has('increased_heart_count_' . $this->note->id)) {
            $this->note->heart_count++;
            $this->note->save();
            $this->heartCount = $this->note->heart_count;
            // Store a flag in the session so we don't increment more than once
            session()->put('increased_heart_count_' . $this->note->id, true);
        }
    }
}; ?>

<div>
    <x-button wire:click='increaseHeartCount' xs rose icon="heart" spinner>{{ $heartCount }}</x-button>
</div>
