<div>
    <x-data-table :data="$data" :model="$verifications">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th>Username</th>
                <th><a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
                        Diperbarui pada
                        @include('components.sort-icon', ['field' => 'updated_at'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status
                    @include('components.sort-icon', ['field' => 'status'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($verifications as $verification)
                <tr x-data="window.__controller.dataTableController({{ $verification->id }})">
                    <td>{{ $verification->id }}</td>
                    <td>{{ $verification->full_name }}</td>
                    <td>{{ $verification->user->name }}</td>
                    <td>{{ $verification->statusVerification->title }}</td>
                    <td>{{ $verification->updated_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon center">
                        <a role="button" href="{{ route('admin.verification.edit',$verification->id) }}" class="col-12"><i class="fa fa-16px fa-eye"></i></a>
{{--                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>--}}
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

