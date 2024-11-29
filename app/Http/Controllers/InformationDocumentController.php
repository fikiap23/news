<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInformationDocumentRequest;
use App\Http\Requests\UpdateInformationDocumentRequest;
use App\Models\InformationDocument;
use App\Repositories\InformationDocumentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class InformationDocumentController extends AppBaseController
{
    /** @var InformationDocumentRepository */
    public $informationDocumentRepository;

    /**
     * @param  InformationDocumentRepository  $repository
     */
    public function __construct(InformationDocumentRepository $repository)
    {
        $this->informationDocumentRepository = $repository;
    }

    /**
     * Display a listing of information documents.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $documents = $this->informationDocumentRepository->all();
        return view('information_document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new information document.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('information_document.create');
    }

    /**
     * Store a newly created information document in storage.
     *
     * @param  CreateInformationDocumentRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateInformationDocumentRequest $request)
    {
        $input = $request->all();
        $input['author'] = Auth::user()->first_name . ' ' . Auth::user()->last_name;

        $this->informationDocumentRepository->store($input); // Call the store method from InformationDocumentRepository

        Flash::success(__('Berhasil membuat dokumen informasi'));

        return redirect(route('information-document.index')); // Redirect to the information document index page
    }

    /**
     * Show the form for editing the specified information document.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $document = InformationDocument::whereId($id)->firstOrFail(); // Fetch the information document by ID

        return view('information_document.edit', compact('document'));
    }

    /**
     * Update the specified information document in storage.
     *
     * @param  UpdateInformationDocumentRequest  $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateInformationDocumentRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->name; // Assuming the user has a `name` field

        $this->informationDocumentRepository->updateInformationDocument($input, $id); // Call the update method from InformationDocumentRepository

        Flash::success(__('Berhasil diperbarui'));

        return redirect(route('information_document.index')); // Redirect to the information document index page
    }

    /**
     * Remove the specified information document from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $informationDocument = InformationDocument::whereId($id)->delete(); // Delete the information document by ID

        return $this->sendSuccess(__('messages.placeholder.information_document_deleted_successfully')); // Return a success message
    }
}
