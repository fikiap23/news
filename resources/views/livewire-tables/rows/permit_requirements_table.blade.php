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

                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform the delete operation (this will trigger the Livewire action)
                        Livewire.emit('deletePermitRequirements', id);

                        Swal.fire(
                            'Deleted!',
                            'The permit requirement has been deleted.',
                            'success'
                        );
                    }
                });
            });
        });
    });
</script>
