<div>
<x-data-table :data="$data" :model="$candidates">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('program_study')" role="button" href="#">
                    Program Studi
                    @include('components.sort-icon', ['field' => 'program_study'])
                </a></th>
                <th><a wire:click.prevent="sortBy('year')" role="button" href="#">
                    Angkatan
                    @include('components.sort-icon', ['field' => 'year'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($candidates as $candidate)
                <tr x-data="window.__controller.dataTableController({{ $candidate->id }})">
                    <td>{{ $candidate->id }}</td>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->program_study }}</td>
                    <td>{{ $candidate->year }}</td>
                    <td>{{ $candidate->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="candidate/edit/{{ $candidate->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
