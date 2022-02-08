<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySportRequest;
use App\Http\Requests\StoreSportRequest;
use App\Http\Requests\UpdateSportRequest;
use App\Models\Sport;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SportsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sport_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sports = Sport::all();

        return view('admin.sports.index', compact('sports'));
    }

    public function create()
    {
        abort_if(Gate::denies('sport_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sports.create');
    }

    public function store(StoreSportRequest $request)
    {
        $sport = Sport::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $sport->id]);
        }

        return redirect()->route('admin.sports.index');
    }

    public function edit(Sport $sport)
    {
        abort_if(Gate::denies('sport_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sports.edit', compact('sport'));
    }

    public function update(UpdateSportRequest $request, Sport $sport)
    {
        $sport->update($request->all());

        return redirect()->route('admin.sports.index');
    }

    public function show(Sport $sport)
    {
        abort_if(Gate::denies('sport_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sports.show', compact('sport'));
    }

    public function destroy(Sport $sport)
    {
        abort_if(Gate::denies('sport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport->delete();

        return back();
    }

    public function massDestroy(MassDestroySportRequest $request)
    {
        Sport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sport_create') && Gate::denies('sport_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Sport();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
