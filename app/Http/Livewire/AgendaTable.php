<?php

namespace App\Http\Livewire;

use App\Models\Agenda; // Model Agenda
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Facades\File;

class AgendaTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default sorting order

    protected $listeners = ['refresh' => '$refresh', 'resetPage', 'deleteAgenda']; // Updated listener

    public string $tableName = 'Agenda'; // Table name
    public string $pageName = 'Agenda'; // Page name

    /**
     * @var \null[][]
     */
    protected $queryString = []; // URL query string

    public function columns(): array
    {
        return [
            // Display agenda theme
            Column::make('Tema', 'theme') // Translated to Tema
                ->sortable()->searchable(),

            // Display agenda place
            Column::make('Tempat', 'place') // Translated to Tempat
                ->sortable()->searchable(),

            // Display start date
            Column::make('Tanggal Mulai', 'start_date') // Translated to Tanggal Mulai
                ->sortable()->searchable(),

            // Display end date
            Column::make('Tanggal Selesai', 'end_date') // Translated to Tanggal Selesai
                ->sortable()->searchable(),

            // Display agenda activity
            Column::make('Aktivitas', 'activity') // Translated to Aktivitas
                ->sortable()->searchable(),

            // Action column for Edit/Delete
            Column::make('Aksi', 'id'), // Translated to Aksi
        ];
    }

    public function query(): Builder
    {
        return Agenda::query(); // Query for Agenda model
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.agenda_table'; // View for agenda table rows
    }

    public function deleteAgenda($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        // Optionally, you can notify the user or refresh the table
        session()->flash('message', 'Agenda berhasil dihapus.'); // Translated success message
        $this->emit('agendaDeleted');
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
                'componentName' => 'agenda.add-button',
            ]);
    }
}
