<?php

namespace App\Http\Livewire;

use App\Models\Regulation; // Model Regulation
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RegulationTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // Default sorting order

    protected $listeners = ['refresh' => '$refresh', 'resetPage', 'deleteRegulation']; // Updated listener

    public string $tableName = 'Regulation'; // Table name
    public string $pageName = 'Regulation'; // Page name

    /**
     * @var \null[][]
     */
    protected $queryString = []; // URL query string

    public function columns(): array
    {
        return [
            // Display regulation description
            Column::make('Deskripsi', 'description') // Translated to Deskripsi
                ->sortable()->searchable(),

            // Display regulation created at
            Column::make('Tanggal Dibuat', 'created_at') // Translated to Tanggal Dibuat
                ->sortable()->searchable(),

            // Action column for Edit/Delete
            Column::make('Aksi', 'id'), // Translated to Aksi
        ];
    }

    public function query(): Builder
    {
        return Regulation::query(); // Query for Regulation model
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.regulation_table'; // View for regulation table rows
    }

    public function deleteRegulation($id)
    {
        $regulation = Regulation::findOrFail($id);
        $regulation->delete();

        // Optionally, you can notify the user or refresh the table
        session()->flash('message', 'Regulasi berhasil dihapus.'); // Translated success message
        $this->emit('regulationDeleted');
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
                'componentName' => 'regulation.add-button',
            ]);
    }
}
