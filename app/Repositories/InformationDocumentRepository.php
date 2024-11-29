<?php

namespace App\Repositories;

use App\Models\InformationDocument;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class InformationDocumentRepository
 */
class InformationDocumentRepository extends BaseRepository
{
    public $fieldSearchable = [
        'title',       // Kolom yang bisa dicari, sesuaikan dengan kebutuhan
        'author',
        'type',
        'published_at',
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
        return InformationDocument::class; // Disesuaikan dengan model InformationDocument
    }

    /**
     * Store a newly created InformationDocument in storage.
     *
     * @param array $input
     * @return bool
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            // Create a new InformationDocument entry
            $document = InformationDocument::create($input);

            // Check if there is an uploaded document
            if (isset($input['document']) && $input['document']->isValid()) {
                // Save the uploaded document to a specific directory
                $path = $input['document']->store('documents'); // Save document in 'documents' directory

                // Update the document entry with the document path
                $document->update(['document' => 'uploads/' . $path]);
            }

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * Update the specified InformationDocument in storage.
     *
     * @param array $input
     * @param int $id
     * @return bool
     */
    public function updateInformationDocument($input, $id)
    {
        try {
            DB::beginTransaction();

            // Find the InformationDocument entry by ID
            $document = InformationDocument::findOrFail($id);

            // Update the InformationDocument entry
            $document->update($input);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
