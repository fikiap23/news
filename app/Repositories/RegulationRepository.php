<?php

namespace App\Repositories;

use App\Models\Regulation; // Changed to Regulation model
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class RegulationRepository
 */
class RegulationRepository extends BaseRepository
{
    public $fieldSearchable = [
        'description', // Assuming we search by description, you can add more fields as needed
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
        return Regulation::class; // Changed to Regulation model
    }

    /**
     * Store a new regulation.
     *
     * @param  array  $input
     * @return bool
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            // Create a new Regulation entry
            $regulation = Regulation::create($input);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * Update the specified regulation.
     *
     * @param  array  $input
     * @param  int  $id
     * @return bool
     */
    public function updateRegulation($input, $id)
    {
        try {
            DB::beginTransaction();

            // Find the regulation entry by ID
            $regulation = Regulation::findOrFail($id);

            // Update the regulation entry
            $regulation->update($input);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
