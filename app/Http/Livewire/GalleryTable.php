<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Facades\File;


class GalleryTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage', 'deleteSlider'];

    public string $tableName = 'Slider';
    public string $pageName = 'Slider';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.post.image'), 'image')->addAttributes(['style' => 'width:600px !important;']),
            Column::make(__('messages.common.title'), 'title')
                ->sortable()->searchable(),
            Column::make(__('deskripsi'), 'description')
                ->sortable()->searchable(),
            Column::make(__('messages.common.action'), 'id'),
        ];
    }

    public function query(): Builder
    {
        return Slider::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.gallery_table';
    }

    public function deleteSlider($id)
    {
        $slider = Slider::findOrFail($id);

        // Delete image file if it exists
        $imagePath = public_path('uploads/slider/' . basename($slider->image));
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Delete the slider
        $slider->delete();

        // Emit event back to frontend
        $this->emit('sliderDeleted');

        session()->flash('message', 'Slider deleted successfully.');
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
                'componentName' => 'gallery.add-button',
            ]);
    }
}
