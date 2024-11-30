<?php

namespace App\Http\Livewire;

use App\Models\PermitRequirements; // Model PermitRequirements
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PermitRequirementsTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc'; // Default sorting order

    protected $listeners = ['refresh' => '$refresh', 'resetPage', 'deletePermitRequirements']; // Updated listener

    public string $tableName = 'permit_requirements'; // Nama tabel yang benar
    public string $pageName = 'Permit Requirements'; // Nama halaman

    /**
     * @var \null[][]
     */
    protected $queryString = []; // URL query string

    public function columns(): array
    {
        return [
            // Display permit type name
            Column::make('Jenis Izin', 'permit_type_name') // Translated to Jenis Izin
                ->sortable()->searchable(),

            // Display duration in days
            Column::make('Durasi (Hari)', 'duration_days') // Translated to Durasi (Hari)
                ->sortable()->searchable(),

            // Display permit field
            Column::make('Bidang Izin', 'permit_field') // Translated to Bidang Izin
                ->sortable()->searchable(),

            // Display requirement link
            Column::make('Tautan Persyaratan', 'requirement_link') // Translated to Tautan Persyaratan
                ->sortable()->searchable(),

            // Action column for Edit/Delete
            Column::make('Aksi', 'id'), // Translated to Aksi
        ];
    }

    public function query(): Builder
    {
        return PermitRequirements::query(); // Query untuk PermitRequirements
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.permit_requirements_table'; // View untuk baris permit_requirements
    }

    public function deletePermitRequirements($id)
    {
        $requirement = PermitRequirements::findOrFail($id);
        $requirement->delete();

        // Menampilkan pesan sukses atau refresh tabel
        session()->flash('message', 'Persyaratan izin berhasil dihapus.'); // Pesan sukses
        $this->emit('permitRequirementDeleted');
    }

    public function render()
    {
        return view('livewire-tables::' . config('livewire-tables.theme') . '.datatable')
            ->with([
                'columns' => $this->columns(),
                'rowView' => $this->rowView(),
                'filtersView' => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows' => $this->rows,
                'modalsView' => $this->modalsView(),
                'bulkActions' => $this->bulkActions,
                'componentName' => 'permit-requirements.add-button',
            ]);
    }
}
