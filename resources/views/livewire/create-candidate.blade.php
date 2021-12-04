<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Kandidat') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data kandidat baru') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="candidate.name" />
                <x-jet-input-error for="candidate.name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="program_study" value="{{ __('Program Studi') }}" />
                <select name="program_study" id="program_study" wire:model.defer="candidate.program_study" class="form-control">
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Informatika">Informatika</option>
                </select>
                <x-jet-input-error for="candidate.program_study" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="year" value="{{ __('Angkatan') }}" />
                <x-jet-input id="year" type="number" class="mt-1 block w-full form-control shadow-none" wire:model.defer="candidate.year" />
                <x-jet-input-error for="candidate.year" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="visi" value="{{ __('Visi') }}" />
                <textarea class="mt-1 block w-full form-control shadow-none" id="visi" name="visi" wire:model.defer="candidate.visi"></textarea>
                <x-jet-input-error for="candidate.visi" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="misi" value="{{ __('Misi') }}" />
                <textarea class="mt-1 block w-full form-control shadow-none" id="misi" name="misi" wire:model.defer="candidate.misi"></textarea>
                <x-jet-input-error for="candidate.misi" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="file" value="{{ __('Foto kandidat') }}" />
                <x-jet-input type="file" class="mt-1 block w-full form-control shadow-none p-2" name="file" id="file" wire:model.defer="candidate.file"/>
                <x-jet-input-error for="candidate.file" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
