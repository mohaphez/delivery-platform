<x-layouts.app>

    <x-layouts.dashboard>
        <orderlist-component :orders="{{ json_encode($orders) }}"></orderlist-component>
    </x-layouts.dashboard>

</x-layouts.app>