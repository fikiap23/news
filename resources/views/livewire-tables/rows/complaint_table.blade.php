<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->name !!}
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->email !!}
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->phone !!}
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->address !!}
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->type == 'complaint')
        <span class="badge bg-danger">Pengaduan</span>
    @elseif($row->type == 'appreciation')
        <span class="badge bg-success">Apresiasi</span>
    @else
        <span class="badge bg-secondary">{{ $row->type }}</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->message !!}
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if (!empty($row->image))
        <a href="{{ asset($row->image) }}" data-lightbox="complaint-image-{{ $row->id }}"
            class="text-decoration-none">
            <img src="{{ asset($row->image) }}" width="50px" height="50px" class="p-2 custom-object-fit">
        </a>
    @else
        <span class="text-muted">No image available</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div
        style="max-height: 4.8em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
        {!! $row->response_details !!}
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-min-with']">
    <div class="d-flex align-items-start">
        <!-- Tombol Edit -->
        <a href="{{ route('complaint.edit', $row['id']) }}" class="btn px-1 text-primary fs-3 slider-edit-btn"
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
