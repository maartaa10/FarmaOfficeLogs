{{-- filepath: /home/martarodrigo/Escritorio/FarmaOfficeLogs/resources/views/filament/pages/logs-dashboard.blade.php --}}
<x-filament::page>
    <x-filament::card>
        <x-filament::form>
            <x-filament::form-section>
                <x-slot name="title">
                    {{ __('Evolución de precios por producto') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Filtra por farmacia y producto para ver la evolución de precios.') }}
                </x-slot>

                <x-filament::select name="pharmacy_id" label="Farmacia" :options="$pharmacies" wire:model="pharmacy_id" />
                <x-filament::select name="product_id" label="Producto" :options="$products" wire:model="product_id" />

                <x-filament::button wire:click="filter">
                    {{ __('Filtrar') }}
                </x-filament::button>
            </x-filament::form-section>
        </x-filament::form>
    </x-filament::card>

    <x-filament::widget :widget="App\Filament\Resources\PriceLogResource\Widgets\PriceLogChart::class" />
</x-filament::page>