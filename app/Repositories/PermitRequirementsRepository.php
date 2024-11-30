<?php

namespace App\Repositories;

use App\Models\PermitRequirements; // Changed to PermitRequirements model
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class PermitRequirementsRepository
 */
class PermitRequirementsRepository extends BaseRepository
{
    public $fieldSearchable = [
        'permit_type_name', // Adjusted for permit requirements
        'duration_days',
        'permit_field',
        'requirement_link',
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
        return PermitRequirements::class; // Changed to PermitRequirements model
    }

    /**
     * Store a new permit requirement.
     *
     * @param $input
     * @return bool
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            // Create a new PermitRequirements entry
            $permitRequirement = PermitRequirements::create($input);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * Update an existing permit requirement.
     *
     * @param $input
     * @param $id
     * @return bool
     */
    public function updatePermitRequirements($input, $id)
    {
        try {
            DB::beginTransaction();

            // Find the permit requirement entry by ID
            $permitRequirement = PermitRequirements::findOrFail($id);

            // Update the permit requirement entry
            $permitRequirement->update($input);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
