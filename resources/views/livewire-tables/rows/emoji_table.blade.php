<x-livewire-tables::bs5.table.cell>
    {{ __('messages.reaction.' . $row->name) }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! $row->emoji !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <label
        class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
        <input type="checkbox" name="status" class="form-check-input emoji-active cursor-pointer"
            data-id="{{ $row->id }}" {{ $row->status == '1' ? 'checked' : '' }}>
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>
