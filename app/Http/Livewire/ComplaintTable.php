<?php

namespace App\Http\Livewire;

use App\Models\Complaint; // Change model from Slider to Complaint
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Facades\File;

class ComplaintTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage', 'deleteComplaint']; // Updated listener

    public string $tableName = 'Complaint'; // Update table name
    public string $pageName = 'Complaint'; // Update page name

    /**
     * @var \null[][] 
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            // Display complainter's name
            Column::make('Nama', 'name') // Translated to Nama
                ->sortable()->searchable(),

            // Display complainant's email
            Column::make('Email', 'email') // Kept as Email
                ->sortable()->searchable(),

            // Display complainant's phone number
            Column::make('Telepon', 'phone') // Translated to Telepon
                ->sortable()->searchable(),

            // Display complaint address
            Column::make('Alamat', 'address') // Translated to Pesan
                ->sortable()->searchable(),

            // Display complaint address
            Column::make('Jenis Laporan', 'type') // Translated to Pesan
                ->sortable()->searchable(),

            // Display complaint message
            Column::make('Pesan', 'message') // Translated to Pesan
                ->sortable()->searchable(),

            // Display image, if exists
            Column::make('Gambar', 'image')->addAttributes(['style' => 'width:150px !important;']), // Translated to Gambar

            // Display complaint message
            Column::make('Jawaban', 'response_details') // Translated to Pesan
                ->sortable()->searchable(),

            // Action column for Edit/Delete
            Column::make('Aksi', 'id'), // Translated to Aksi
        ];
    }

    public function query(): Builder
    {
        return Complaint::query(); // Changed model from Slider to Complaint
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.complaint_table'; // Update view for complaints
    }

    public function deleteComplaint($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();

        // Check if the image exists in the public path
        $imagePath = public_path('uploads/complaints/' . basename($complaint->image)); // Change to 'complaints'

        // Delete the image from the server if it exists
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Optionally, you can notify the user or refresh the table
        session()->flash('message', 'Keluhan berhasil dihapus.'); // Translated success message
        $this->emit('complaintDeleted');
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
                'componentName' => 'complaint.add-button', // Updated component name for complaint
            ]);
    }
}
