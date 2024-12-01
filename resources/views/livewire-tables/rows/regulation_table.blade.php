<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->description !!} <!-- Menampilkan Deskripsi Regulasi -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div>
        {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }} <!-- Tanggal Dibuat -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-min-with']">
    <div class="d-flex align-items-start">
        <!-- Tombol Edit -->
        <a href="{{ route('regulation.edit', $row['id']) }}" class="btn px-1 text-primary fs-3 slider-edit-btn"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
            data-bs-original-title="{{ __('messages.common.edit') }}" data-id="{{ $row->id }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <!-- Tombol Delete -->
        <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.delete') }}"
            data-bs-toggle="tooltip" data-bs-original-title="{{ __('messages.common.delete') }}"
            class="btn px-1 text-danger fs-3 delete-regulation-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Delete Button: Triggers the delete action
        const deleteBtns = document.querySelectorAll('.delete-regulation-btn');
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;

                // Confirmation modal or alert
                if (confirm("Apakah Anda yakin ingin menghapus regulasi ini?")) {
                    // Trigger Livewire action to delete
                    Livewire.emit('deleteRegulation', id);
                }
            });
        });
    });
</script>
