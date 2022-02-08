<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCoachCategoryRequest;
use App\Http\Requests\UpdateCoachCategoryRequest;
use App\Http\Resources\Admin\CoachCategoryResource;
use App\Models\CoachCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoachCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('coach_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CoachCategoryResource(CoachCategory::all());
    }

    public function store(StoreCoachCategoryRequest $request)
    {
        $coachCategory = CoachCategory::create($request->all());

        return (new CoachCategoryResource($coachCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CoachCategory $coachCategory)
    {
        abort_if(Gate::denies('coach_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CoachCategoryResource($coachCategory);
    }

    public function update(UpdateCoachCategoryRequest $request, CoachCategory $coachCategory)
    {
        $coachCategory->update($request->all());

        return (new CoachCategoryResource($coachCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CoachCategory $coachCategory)
    {
        abort_if(Gate::denies('coach_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coachCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
