<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Kandidat') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user') }}">Data User</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="candidate" :model="$candidate" />
    </div>
</x-app-layout>
