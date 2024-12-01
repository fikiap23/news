<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegulationRequest; // Assuming the request classes will be created for regulation
use App\Http\Requests\UpdateRegulationRequest;
use App\Models\Regulation; // Changed from Agenda to Regulation
use App\Repositories\RegulationRepository; // Use RegulationRepository
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class RegulationController extends AppBaseController
{
    /** @var RegulationRepository */
    public $regulationRepository;

    /**
     * @param  RegulationRepository  $regulationRepo
     */
    public function __construct(RegulationRepository $regulationRepo)
    {
        $this->regulationRepository = $regulationRepo;
    }

    /**
     * Display a listing of regulations.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('regulation.index');
    }

    /**
     * Show the form for creating a new regulation.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('regulation.create');
    }

    /**
     * Store a newly created regulation in storage.
     *
     * @param  CreateRegulationRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateRegulationRequest $request)
    {
        // Ambil data deskripsi dari request
        $descriptions = $request->input('descriptions');

        // Menyimpan semua deskripsi secara bulk menggunakan create (atau insert)
        $regulations = [];
        foreach ($descriptions as $description) {
            $regulations[] = [
                'description' => $description,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Simpan ke database
        Regulation::insert($regulations);

        // Redirect atau memberikan feedback
        return redirect()->route('regulation.index')->with('success', 'Regulasi berhasil disimpan!');
    }

    /**
     * Show the form for editing the specified regulation.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $regulation = Regulation::whereId($id)->firstOrFail(); // Fetch the regulation by ID

        return view('regulation.edit', compact('regulation'));
    }

    /**
     * Update the specified regulation in storage.
     *
     * @param  UpdateRegulationRequest  $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateRegulationRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->name;

        $this->regulationRepository->updateRegulation($input, $id); // Call the update method from RegulationRepository

        Flash::success(__('Berhasil diperbarui'));

        return redirect(route('regulation.index')); // Redirect to the regulation index page
    }

    /**
     * Remove the specified regulation from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        Regulation::whereId($id)->delete(); // Delete the regulation by ID

        return $this->sendSuccess(__('Peraturan berhasil dihapus')); // Return a success message
    }
}
