<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->title !!} <!-- Menampilkan Judul Dokumen -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->author !!} <!-- Menampilkan Penulis Dokumen -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div>
        {{ \Carbon\Carbon::parse($row->published_at)->format('d M Y') }} <!-- Tanggal Terbit -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div>
        {{ $row->type }} <!-- Menampilkan Tipe Dokumen -->
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->document)
        <a href="{{ asset('storage/' . $document) }}" target="_blank" class="text-blue-500 underline">
            Lihat File
        </a>
    @else
        <span class="text-gray-500">Tidak ada document</span>
    @endif

</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-min-with']">
    <div class="d-flex align-items-start">
        <!-- Tombol Edit -->
        <a href="{{ route('information_document.edit', $row['id']) }}" class="btn px-1 text-primary fs-3 slider-edit-btn"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
            data-bs-original-title="{{ __('messages.common.edit') }}" data-id="{{ $row->id }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <!-- Tombol Delete -->
        <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.delete') }}"
            data-bs-toggle="tooltip" data-bs-original-title="{{ __('messages.common.delete') }}"
            class="btn px-1 text-danger fs-3 delete-document-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Delete Button: Triggers the delete action
        const deleteBtns = document.querySelectorAll('.delete-document-btn');
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;

                // You can use a confirmation modal here
                if (confirm("Are you sure you want to delete this document?")) {
                    // Perform the delete operation (this will trigger the Livewire action)
                    Livewire.emit('deleteDocument', id);
                }
            });
        });
    });
</script>
