<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySportsTypeRequest;
use App\Http\Requests\StoreSportsTypeRequest;
use App\Http\Requests\UpdateSportsTypeRequest;
use App\Models\SportsType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SportsTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sports_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sportsTypes = SportsType::all();

        return view('frontend.sportsTypes.index', compact('sportsTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('sports_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.sportsTypes.create');
    }

    public function store(StoreSportsTypeRequest $request)
    {
        $sportsType = SportsType::create($request->all());

        return redirect()->route('frontend.sports-types.index');
    }

    public function edit(SportsType $sportsType)
    {
        abort_if(Gate::denies('sports_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.sportsTypes.edit', compact('sportsType'));
    }

    public function update(UpdateSportsTypeRequest $request, SportsType $sportsType)
    {
        $sportsType->update($request->all());

        return redirect()->route('frontend.sports-types.index');
    }

    public function show(SportsType $sportsType)
    {
        abort_if(Gate::denies('sports_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.sportsTypes.show', compact('sportsType'));
    }

    public function destroy(SportsType $sportsType)
    {
        abort_if(Gate::denies('sports_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sportsType->delete();

        return back();
    }

    public function massDestroy(MassDestroySportsTypeRequest $request)
    {
        SportsType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
