<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCoachCategoryRequest;
use App\Http\Requests\StoreCoachCategoryRequest;
use App\Http\Requests\UpdateCoachCategoryRequest;
use App\Models\CoachCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CoachCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('coach_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coachCategories = CoachCategory::all();

        return view('admin.coachCategories.index', compact('coachCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('coach_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.coachCategories.create');
    }

    public function store(StoreCoachCategoryRequest $request)
    {
        $coachCategory = CoachCategory::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $coachCategory->id]);
        }

        return redirect()->route('admin.coach-categories.index');
    }

    public function edit(CoachCategory $coachCategory)
    {
        abort_if(Gate::denies('coach_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.coachCategories.edit', compact('coachCategory'));
    }

    public function update(UpdateCoachCategoryRequest $request, CoachCategory $coachCategory)
    {
        $coachCategory->update($request->all());

        return redirect()->route('admin.coach-categories.index');
    }

    public function show(CoachCategory $coachCategory)
    {
        abort_if(Gate::denies('coach_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.coachCategories.show', compact('coachCategory'));
    }

    public function destroy(CoachCategory $coachCategory)
    {
        abort_if(Gate::denies('coach_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coachCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyCoachCategoryRequest $request)
    {
        CoachCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('coach_category_create') && Gate::denies('coach_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CoachCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
