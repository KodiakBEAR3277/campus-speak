<x-mazer-sidebar :href="route('dashboard')" :logo="asset('assets/static/images/logo/logo.png')">
    <x-mazer-sidebar-item icon="bi bi-grid-fill" :link="route('dashboard')" name="Dashboard" />
    <x-mazer-sidebar-item icon="bi bi-people-fill" :link="route('usermanagement')" name="User Management" />
    <x-mazer-sidebar-item icon="bi bi-stack" name="Components">
        <x-mazer-sidebar-subitem :link="route('component.accordion')" name="Accordion" :active="false"/>
    </x-mazer-sidebar-item>
</x-mazer-sidebar>
