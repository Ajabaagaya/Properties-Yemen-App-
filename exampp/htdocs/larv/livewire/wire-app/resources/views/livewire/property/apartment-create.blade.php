<div >
    <form wire:submit="create" class="bg-black">
        {{ $this->form }}

        <button type="submit">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
