<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Kandidat Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kandidate</a></div>
            <div class="breadcrumb-item"><a href="#">Buat Kandidat Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-candidate action="createCandidate" />
    </div>
</x-app-layout>
