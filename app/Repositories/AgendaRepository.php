<?php

namespace App\Repositories;

use App\Models\Agenda; // Changed to Agenda model
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class AgendaRepository
 */
class AgendaRepository extends BaseRepository
{
    public $fieldSearchable = [
        'theme',  // Assuming we search by theme, you can add more fields as needed
        'place',
        'start_date',
        'end_date',
        'activity',
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
        return Agenda::class; // Changed to Agenda model
    }

    /**
     * @param $input
     * @return bool
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            // Create a new Agenda entry
            $agenda = Agenda::create($input);

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
    public function updateAgenda($input, $id)
    {
        try {
            DB::beginTransaction();

            // Find the agenda entry by ID
            $agenda = Agenda::findOrFail($id);

            // Update the agenda entry
            $agenda->update($input);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
