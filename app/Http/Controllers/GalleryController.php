<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Models\Slider;
use App\Repositories\GalleryRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class GalleryController extends AppBaseController
{
    /** @var GalleryRepository */
    public $galleryRepository;

    /**
     * @param  GalleryRepository  $galleryRepo
     */
    public function __construct(GalleryRepository $galleryRepo)
    {
        $this->galleryRepository = $galleryRepo;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('gallery.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {

        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateGalleryRequest $request)
    {
        $input = $request->all();
        $input['description'] = $input['article_content'];
        unset($input['article_content']);
        $this->galleryRepository->store($input);

        Flash::success(__('messages.placeholder.gallery_image_created_successfully'));

        return redirect(route('gallery-images.index'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $gallery = Slider::whereId($id)->firstorFail();

        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGalleryRequest  $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateGalleryRequest $request, $id)
    {
        $input = $request->all();
        $input['description'] = $input['article_content'];
        unset($input['article_content']);
        $this->galleryRepository->updateGallery($input, $id);

        Flash::success(__('messages.placeholder.gallery_image_updated_successfully'));

        return redirect(route('gallery-images.index'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $image = Gallery::whereId($id)->delete();

        return $this->sendSuccess(__('messages.placeholder.gallery_image_deleted_successfully'));
    }
}
