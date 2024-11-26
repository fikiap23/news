<x-livewire-tables::bs5.table.cell>
    @if (!empty($row->image))
        <a href="{{ asset($row->image) }}" data-lightbox="slider-image-{{ $row->id }}" class="text-decoration-none">
            <img src="{{ asset($row->image) }}" width="50px" height="50px" class="p-2 custom-object-fit">
        </a>
    @else
        <span class="text-muted">No image available</span>
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
        <a href="{{ route('gallery-images.edit', $row->id) }}" class="btn px-1 text-primary fs-3 slider-edit-btn"
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
