<?php

namespace App\Repositories;

use App\Models\Complaint; // Changed from Slider to Complaint model
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class ComplaintRepository
 */
class ComplaintRepository extends BaseRepository
{
    public $fieldSearchable = [
        'name', // Assuming we search by name, you can add more fields as needed
        'message',
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
        return Complaint::class; // Changed to Complaint model
    }

    /**
     * @param $input
     * @return bool
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            // Create a new Complaint entry
            $complaint = Complaint::create($input);

            // Check if there is an uploaded image
            if (isset($input['image']) && $input['image']->isValid()) {
                // Save the uploaded image to a specific directory
                $path = $input['image']->store('complaints'); // Save image in 'complaints' directory

                // Update the complaint entry with the image path
                $complaint->update(['image' => 'uploads/' . $path]);
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
    public function updateComplaint($input, $id)
    {
        try {
            DB::beginTransaction();

            // Find the complaint entry by ID
            $complaint = Complaint::findOrFail($id);

            // Check if there is a new uploaded image
            if (isset($input['image']) && $input['image']->isValid()) {
                // Delete the old image if it exists
                if ($complaint->image && file_exists(public_path($complaint->image))) {
                    unlink(public_path($complaint->image));
                }

                // Save the new uploaded image
                $path = $input['image']->store('complaints');

                // Update the image path in the database
                $input['image'] = 'uploads/' . $path;
            } else {
                // If there is no new image, remove the 'image' field from input to avoid overwriting
                unset($input['image']);
            }

            // Update the complaint entry
            $complaint->update($input);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
