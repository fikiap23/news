<?php

namespace App\Repositories;

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

            // Mencari entri Slider berdasarkan ID
            $slider = Slider::findOrFail($id);

            // Mengecek apakah ada gambar baru yang di-upload
            if (isset($input['image']) && $input['image']->isValid()) {
                // Menghapus gambar lama jika ada
                if ($slider->image && file_exists(public_path($slider->image))) {
                    unlink(public_path($slider->image));
                }

                // Menyimpan file gambar baru ke direktori tertentu
                $path = $input['image']->store('slider');

                // Menyimpan path gambar baru ke kolom 'image' di tabel slider
                $input['image'] = 'uploads/' . $path;
            } else {
                // Jika tidak ada gambar baru, hapus dari input untuk menghindari overwrite
                unset($input['image']);
            }

            // Memperbarui data Slider
            $slider->update($input);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
