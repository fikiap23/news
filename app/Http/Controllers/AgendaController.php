<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgendaRequest; // Assuming the request classes will be created for agenda
use App\Http\Requests\UpdateAgendaRequest;
use App\Models\Agenda; // Changed from Complaint to Agenda
use App\Repositories\AgendaRepository; // Use AgendaRepository
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class AgendaController extends AppBaseController
{
    /** @var AgendaRepository */
    public $agendaRepository;

    /**
     * @param  AgendaRepository  $agendaRepo
     */
    public function __construct(AgendaRepository $agendaRepo)
    {
        $this->agendaRepository = $agendaRepo;
    }

    /**
     * Display a listing of agendas.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('agenda.index');
    }

    /**
     * Show the form for creating a new agenda.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created agenda in storage.
     *
     * @param  CreateAgendaRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateAgendaRequest $request)
    {
        $input = $request->all();

        $this->agendaRepository->store($input); // Call the store method from AgendaRepository

        Flash::success(__('Berhasil membuat agenda'));

        return redirect(route('agenda.index')); // Redirect to the agenda index page
    }

    /**
     * Show the form for editing the specified agenda.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $agenda = Agenda::whereId($id)->firstOrFail(); // Fetch the agenda by ID

        return view('agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified agenda in storage.
     *
     * @param  UpdateAgendaRequest  $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateAgendaRequest $request, $id)
    {
        $input = $request->all();
        $input['name_admin'] = Auth::user()->first_name . ' ' . Auth::user()->last_name;

        $this->agendaRepository->updateAgenda($input, $id); // Call the update method from AgendaRepository

        Flash::success(__('Berhasil diperbarui'));

        return redirect(route('agenda.index')); // Redirect to the agenda index page
    }

    /**
     * Remove the specified agenda from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $agenda = Agenda::whereId($id)->delete(); // Delete the agenda by ID

        return $this->sendSuccess(__('messages.placeholder.agenda_deleted_successfully')); // Return a success message
    }
}
