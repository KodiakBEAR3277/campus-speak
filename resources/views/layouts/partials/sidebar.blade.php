<x-mazer-sidebar :href="route('dashboard')" :logo="asset('assets/static/images/logo/logo.svg')">
    <x-mazer-sidebar-item icon="bi bi-grid-fill" :link="route('dashboard')" name="Dashboard" />
    <x-mazer-sidebar-item icon="bi bi-people-fill" :link="route('usermanagement')" name="User Management" />
</x-mazer-sidebar>
