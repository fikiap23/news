<div class="row">
    <div class="mb-5 col-lg-12">
        {{ Form::label('title', __('messages.gallery.title') . ' :', ['class' => 'form-label mb-3']) }}
        {{ Form::text('title', isset($gallery) ? $gallery->title : null, ['class' => 'form-control', 'id' => 'galleryTitleId', 'placeholder' => __('messages.gallery.title')]) }}
    </div>
    <div class="mb-5 col-lg-12">
        <label for="" class="mb-3">{{ __('messages.gallery.description') }} : </label>
        <textarea name="article_content" class="tox-target article-text-description form-control" id="articleContent"
            rows="30">
            {{ isset($gallery) ? $gallery->description : null }}
        </textarea>
    </div>
    <div class="mb-5 col-lg-12">
        {{ Form::label('image', __('messages.gallery.image') . ' :', ['class' => 'form-label required mb-3']) }}
        <input type="file" class="form-control" id="galleryNewImage" name="image"
            accept=".png, .jpg, .jpeg, .webp, .svg" {{ isset($gallery) ? null : 'required' }}>
    </div>
    <div class="mb-5 col-lg-12">
        <div id="preview" class="additional-images">
            @if (isset($gallery->image))
                <img src="{{ asset($gallery->image) }}" width="100px" height="60px" class="border-color">
            @endif
        </div>
    </div>
    <div class="col-lg-12 d-flex">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2']) }}
        <a href="{{ route('gallery-images.index') }}" type="reset"
            class="btn btn-secondary my-0 me-0">{{ __('messages.common.discard') }}</a>
    </div>
</div>
