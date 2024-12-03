<x-livewire-tables::bs5.table.cell>
    @if (!empty($row->image))
        @if (preg_match('/\.(mp4|avi|mov|wmv)$/i', $row->image))
            <!-- Video Preview -->
            <a href="{{ asset($row->image) }}" data-lightbox="slider-video-{{ $row->id }}"
                class="text-decoration-none">
                <video width="50px" height="50px" class="p-2 custom-object-fit" controls>
                    <source src="{{ asset($row->image) }}" type="video/{{ pathinfo($row->image, PATHINFO_EXTENSION) }}">
                    Your browser does not support the video tag.
                </video>
            </a>
        @else
            <!-- Image Preview -->
            <a href="{{ asset($row->image) }}" data-lightbox="slider-image-{{ $row->id }}"
                class="text-decoration-none">
                <img src="{{ asset($row->image) }}" width="50px" height="50px" class="p-2 custom-object-fit">
            </a>
        @endif
    @else
        <span class="text-muted">No media available</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! $row->title !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! $row->description !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-min-with']">
    <div class="d-flex align-items-start">
        <!-- Tombol Edit -->
        <a href="{{ route('gallery-images.edit', $row['id']) }}" class="btn px-1 text-primary fs-3 slider-edit-btn"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
            data-bs-original-title="{{ __('messages.common.edit') }}" data-id="{{ $row->id }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <!-- Tombol Delete -->
        <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.delete') }}"
            data-bs-toggle="tooltip" data-bs-original-title="{{ __('messages.common.delete') }}"
            class="btn px-1 text-danger fs-3 delete-slider-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Edit Button: Opens the edit page
        const editBtns = document.querySelectorAll('.slider-edit-btn');
        editBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default action (if necessary)
                const id = this.dataset.id;
                window.location.href = "{{ url('admin/gallery-images/edit') }}/" + id;
            });
        });

        // Delete Button: Triggers the delete action
        const deleteBtns = document.querySelectorAll('.delete-slider-btn');
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.id;

                // You can use a confirmation modal here
                if (confirm("Are you sure you want to delete this media?")) {
                    // Perform the delete operation (this will trigger the Livewire action)
                    Livewire.emit('deleteSlider', id);
                }
            });
        });
    });
</script>
