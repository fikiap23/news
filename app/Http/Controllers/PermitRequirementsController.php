<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermitRequirementsRequest; // Assuming request classes for PermitRequirements will be created
use App\Http\Requests\UpdatePermitRequirementsRequest;
use App\Models\PermitRequirements; // Changed to PermitRequirements model
use App\Repositories\PermitRequirementsRepository; // Use PermitRequirementsRepository
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class PermitRequirementsController extends AppBaseController
{
    /** @var PermitRequirementsRepository */
    public $permitRequirementRepository;

    /**
     * @param  PermitRequirementsRepository  $permitRequirementRepo
     */
    public function __construct(PermitRequirementsRepository $permitRequirementRepo)
    {
        $this->permitRequirementRepository = $permitRequirementRepo;
    }

    /**
     * Display a listing of permit requirements.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('permit-requirements.index');
    }

    /**
     * Show the form for creating a new permit requirement.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('permit-requirements.create');
    }

    /**
     * Store a newly created permit requirement in storage.
     *
     * @param  CreatePermitRequirementsRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreatePermitRequirementsRequest $request)
    {
        $input = $request->all();

        $this->permitRequirementRepository->store($input); // Store data using PermitRequirementsRepository

        Flash::success(__('Berhasil membuat persyaratan izin.'));

        return redirect(route('permit-requirements.index')); // Redirect to the index page
    }

    /**
     * Show the form for editing the specified permit requirement.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $permitRequirement = PermitRequirements::whereId($id)->firstOrFail(); // Fetch the permit requirement by ID

        return view('permit-requirements.edit', compact('permitRequirement'));
    }

    /**
     * Update the specified permit requirement in storage.
     *
     * @param  UpdatePermitRequirementsRequest  $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdatePermitRequirementsRequest $request, $id)
    {
        $input = $request->all();

        $this->permitRequirementRepository->updatePermitRequirements($input, $id); // Update data using PermitRequirementsRepository

        Flash::success(__('Berhasil diperbarui.'));

        return redirect(route('permit-requirements.index')); // Redirect to the index page
    }

    /**
     * Remove the specified permit requirement from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $permitRequirement = PermitRequirements::whereId($id)->delete(); // Delete the permit requirement by ID

        return $this->sendSuccess(__('Persyaratan izin berhasil dihapus.'));
    }
}
