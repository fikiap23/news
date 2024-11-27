<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->theme !!} <!-- Menampilkan Tema Agenda -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->place !!} <!-- Menampilkan Lokasi Agenda -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div>
        {{ \Carbon\Carbon::parse($row->start_date)->format('d M Y') }} <!-- Tanggal Mulai -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div>
        {{ \Carbon\Carbon::parse($row->end_date)->format('d M Y') }} <!-- Tanggal Selesai -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->activity !!} <!-- Menampilkan Kegiatan -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-min-with']">
    <div class="d-flex align-items-start">
        <!-- Tombol Edit -->
        <a href="{{ route('agenda.edit', $row['id']) }}" class="btn px-1 text-primary fs-3 slider-edit-btn"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
            data-bs-original-title="{{ __('messages.common.edit') }}" data-id="{{ $row->id }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <!-- Tombol Delete -->
        <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.delete') }}"
            data-bs-toggle="tooltip" data-bs-original-title="{{ __('messages.common.delete') }}"
            class="btn px-1 text-danger fs-3 delete-agenda-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Delete Button: Triggers the delete action
        const deleteBtns = document.querySelectorAll('.delete-agenda-btn');
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;

                // You can use a confirmation modal here
                if (confirm("Are you sure you want to delete this image?")) {
                    // Perform the delete operation (this will trigger the Livewire action)
                    Livewire.emit('deleteAgenda', id);
                }
            });
        });
    });
</script>
