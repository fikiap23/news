<?php

namespace App\Http\Livewire;

use App\Models\InformationDocument; // Model InformationDocument
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Facades\File;

class InformationDocumentTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default sorting order

    protected $listeners = ['refresh' => '$refresh', 'resetPage', 'deleteDocument']; // Updated listener

    public string $tableName = 'InformationDocument'; // Table name
    public string $pageName = 'Information Document'; // Page name

    /**
     * @var \null[][] 
     */
    protected $queryString = []; // URL query string

    public function columns(): array
    {
        return [
            Column::make('Judul', 'title')->sortable()->searchable(),
            Column::make('Penulis', 'author')->sortable()->searchable(),
            Column::make('Tipe', 'type')->sortable()->searchable(),
            Column::make('Tanggal Terbit', 'published_at')->sortable()->searchable(),
            Column::make('Dokumen', 'document')
                ->format(function ($value, $column, $row) {
                    return view('components.file-link', ['file' => $value]);
                }),
            Column::make('Aksi', 'id'),
        ];
    }


    public function query(): Builder
    {
        return InformationDocument::query(); // Query for InformationDocument model
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.information_document_table'; // View for information document table rows
    }

    public function deleteDocument($id)
    {
        $document = InformationDocument::findOrFail($id);
        $document->delete();

        // Check if the document exists in the public path
        $documentPath = public_path('uploads/documents/' . basename($document->document)); // Change to 'complaints'

        // Delete the document from the server if it exists
        if (File::exists($documentPath)) {
            File::delete($documentPath);
        }

        // Optionally, you can notify the user or refresh the table
        session()->flash('message', 'Dokumen berhasil dihapus.'); // Translated success message
        $this->emit('documentDeleted');
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
                'componentName' => 'information_document.add-button',
            ]);
    }
}
