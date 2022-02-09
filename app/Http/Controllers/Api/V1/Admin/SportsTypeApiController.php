<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSportsTypeRequest;
use App\Http\Requests\UpdateSportsTypeRequest;
use App\Http\Resources\Admin\SportsTypeResource;
use App\Models\SportsType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SportsTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sports_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SportsTypeResource(SportsType::all());
    }

    public function store(StoreSportsTypeRequest $request)
    {
        $sportsType = SportsType::create($request->all());

        return (new SportsTypeResource($sportsType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SportsType $sportsType)
    {
        abort_if(Gate::denies('sports_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SportsTypeResource($sportsType);
    }

    public function update(UpdateSportsTypeRequest $request, SportsType $sportsType)
    {
        $sportsType->update($request->all());

        return (new SportsTypeResource($sportsType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SportsType $sportsType)
    {
        abort_if(Gate::denies('sports_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sportsType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
