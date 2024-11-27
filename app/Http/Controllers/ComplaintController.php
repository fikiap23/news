<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComplaintRequest; // Assuming the request classes will be created for complaints
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Complaint; // Changed from Gallery and Slider to Complaint
use App\Repositories\ComplaintRepository; // Use ComplaintRepository
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ComplaintController extends AppBaseController
{
    /** @var ComplaintRepository */
    public $complaintRepository;

    /**
     * @param  ComplaintRepository  $complaintRepo
     */
    public function __construct(ComplaintRepository $complaintRepo)
    {
        $this->complaintRepository = $complaintRepo;
    }

    /**
     * Display a listing of complaints.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('complaint.index');
    }

    /**
     * Show the form for creating a new complaint.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('complaint.create');
    }

    /**
     * Store a newly created complaint in storage.
     *
     * @param  CreateComplaintRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateComplaintRequest $request)
    {
        $input = $request->all();

        $this->complaintRepository->store($input); // Call the store method from ComplaintRepository

        Flash::success(__('messages.placeholder.complaint_created_successfully'));

        return redirect(route('complaints.index')); // Redirect to the complaints index page
    }

    /**
     * Show the form for editing the specified complaint.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $complaint = Complaint::whereId($id)->firstOrFail(); // Fetch the complaint by ID

        return view('complaint.edit', compact('complaint'));
    }

    /**
     * Update the specified complaint in storage.
     *
     * @param  UpdateComplaintRequest  $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateComplaintRequest $request, $id)
    {
        $input = $request->all();
        $input['name_admin'] = Auth::user()->first_name . ' ' . Auth::user()->last_name;

        $this->complaintRepository->updateComplaint($input, $id); // Call the update method from ComplaintRepository

        Flash::success(__('Berhasil diperbarui'));

        return redirect(route('complaint.index')); // Redirect to the complaints index page
    }

    /**
     * Remove the specified complaint from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $complaint = Complaint::whereId($id)->delete(); // Delete the complaint by ID

        return $this->sendSuccess(__('messages.placeholder.complaint_deleted_successfully')); // Return a success message
    }
}
