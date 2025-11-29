<x-layout>
    <x-form :model="$model">
        <x-card>
            <x-action form="form" />

            <div class="row">
                @bind($model)

                <x-form-input col="4" type="date" value="{{ $model->jadwal_tanggal ?? date('Y-m-d') }}" name="jadwal_tanggal" />
                <x-form-textarea col="8" name="jadwal_keterangan" />

                <x-form-select col="12" multiple class="search" :default="$selected" label="List Absen Input disini" name="user[]" :options="$user" />

                @endbind
            </div>

        </x-card>
    </x-form>
</x-layout>
