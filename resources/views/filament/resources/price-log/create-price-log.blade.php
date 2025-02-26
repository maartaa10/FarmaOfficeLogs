{{-- filepath: /home/martarodrigo/Escritorio/FarmaOfficeLogs/resources/views/filament/resources/price-log/create-price-log.blade.php --}}

<x-filament::page>
    <form wire:submit.prevent="submit">
        <x-filament::card>
            <x-filament::form>
                <x-filament::form-section>
                    <x-slot name="title">
                        {{ __('Create Price Log') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Fill in the details to create a new price log.') }}
                    </x-slot>

                    {{ $this->form }}

                    <x-filament::button type="submit">
                        {{ __('Save') }}
                    </x-filament::button>
                </x-filament::form-section>
            </x-filament::form>
        </x-filament::card>
    </form>
</x-filament::page>