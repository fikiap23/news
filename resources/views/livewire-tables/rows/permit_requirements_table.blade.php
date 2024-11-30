<x-livewire-tables::bs5.table.cell>
    <div>
        {!! $row->permit_type_name !!} <!-- Menampilkan Jenis Izin -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div>
        {{ $row->duration_days }} <!-- Menampilkan Durasi (Hari) -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div>
        {!! $row->permit_field !!} <!-- Menampilkan Bidang Izin -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div>
        <a href="{{ $row->requirement_link }}" target="_blank">Tautan Persyaratan</a>
        <!-- Menampilkan Tautan Persyaratan -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-min-with']">
    <div class="d-flex align-items-start">
        <!-- Tombol Edit -->
        <a href="{{ route('permit-requirements.edit', $row['id']) }}" class="btn px-1 text-primary fs-3 slider-edit-btn"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
            data-bs-original-title="{{ __('messages.common.edit') }}" data-id="{{ $row->id }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <!-- Tombol Delete -->
        <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.delete') }}"
            data-bs-toggle="tooltip" data-bs-original-title="{{ __('messages.common.delete') }}"
            class="btn px-1 text-danger fs-3 delete-permit-requirements-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Delete Button: Triggers the delete action
        const deleteBtns = document.querySelectorAll('.delete-permit-requirements-btn');
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;

                // You can use a confirmation modal here
                if (confirm("Are you sure you want to delete this permit requirement?")) {
                    // Perform the delete operation (this will trigger the Livewire action)
                    Livewire.emit('deletePermitRequirements', id);
                }
            });
        });
    });
</script>
