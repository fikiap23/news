<?php

namespace App\Repositories;

use App\Models\Gallery;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class UserRepository
 */
class GalleryRepository extends BaseRepository
{
    public $fieldSearchable = [
        'title',
    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return Slider::class;
    }

    /**
     * @param $input
     * @return bool
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            // Membuat entri Slider baru tanpa gambar terlebih dahulu
            $slider = Slider::create($input);

            // Mengecek apakah ada gambar yang di-upload
            if (isset($input['image']) && $input['image']->isValid()) {
                // Menyimpan file gambar ke direktori tertentu
                $path = $input['image']->store('slider');

                // Menyimpan path gambar ke kolom 'image' di tabel slider
                $slider->update(['image' => 'uploads/' . $path]);
            }

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }



    /**
     * @param $input
     * @param $id
     * @return bool
     */
    public function updateGallery($input, $id)
    {
        try {
            DB::beginTransaction();
            $gallery = Gallery::whereId($id)->firstorFail();
            $gallery->update($input);
            if (isset($input['images']) && ! empty($input['images'])) {
                $gallery->clearMediaCollection(Gallery::GALLERY_IMAGE);
                foreach ($input['images'] as $image) {
                    $gallery->addMedia($image)->toMediaCollection(
                        Gallery::GALLERY_IMAGE,
                        config('app.media_disc')
                    );
                }
            }
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
