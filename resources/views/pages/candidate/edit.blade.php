<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Kandidat') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kandidat</a></div>
            <div class="breadcrumb-item"><a href="#">Edit Kandidat</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-candidate action="updateCandidate" :candidateId="request()->candidateId"/>
    </div>
</x-app-layout>
