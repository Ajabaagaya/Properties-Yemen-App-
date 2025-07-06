<div class="bg-slate-200">

    <form wire:submit="create">
        <div class="flex-1 flex-row w-3/12 justify-around bg-slate-300">
              {{ $this->form }}
        </div>
        <button type="submit">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
