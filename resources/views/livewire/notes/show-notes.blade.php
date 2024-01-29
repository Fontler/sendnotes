<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with()
    {
        return [
            "notes" => Auth::user()
                ->notes()
                ->orderBy("send_date", "asc")
                ->get(),
        ];
    }
}; ?>

<div>
	<div class="space-y-2">
        @if ($notes->isEmpty())
            <div class="text-center">
                <p class="text-xl font-bold">No notes found.</p>
                <p class="text-sm">Create a new note by clicking the button below.</p>
                <x-button primary icon-right="plus" class="mt-6" href="{{ route('notes.create') }}" wire:navigate>Create note</x-button>
            </div>
        @else
        <x-button primary icon-right="plus" class="mb-6" href="{{ route('notes.create') }}" wire:navigate>Create note</x-button>
		<div class="grid grid-cols-2 gap-4">
			@foreach ($notes as $note)
				<x-card wire:key='{{ $note->id }}'>
					<div class="flex justify-between">
						<a href="#"
							class="text-xl font-bold transition hover:text-blue-500 hover:underline">
							{{ $note->title }}
						</a>
						<div class="text-xs text-gray-500">
							{{ \Carbon\Carbon::parse($note->send_date)->format("M-d-Y") }}
						</div>
					</div>
                    <div class="flex items-end justify-between mt-4 space-x-1">
                        <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                        <div>
                            <x-button.circle icon="eye"></x-button.circle>
                            <x-button.circle icon="trash"></x-button.circle>
                        </div>
                    </div>
				</x-card>
			@endforeach
		</div>
        @endif
	</div>
</div>
