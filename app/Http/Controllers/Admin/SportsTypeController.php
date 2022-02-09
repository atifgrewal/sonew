<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySportsTypeRequest;
use App\Http\Requests\StoreSportsTypeRequest;
use App\Http\Requests\UpdateSportsTypeRequest;
use App\Models\SportsType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SportsTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('sports_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SportsType::query()->select(sprintf('%s.*', (new SportsType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sports_type_show';
                $editGate = 'sports_type_edit';
                $deleteGate = 'sports_type_delete';
                $crudRoutePart = 'sports-types';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('sports_type', function ($row) {
                return $row->sports_type ? $row->sports_type : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.sportsTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sports_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sportsTypes.create');
    }

    public function store(StoreSportsTypeRequest $request)
    {
        $sportsType = SportsType::create($request->all());

        return redirect()->route('admin.sports-types.index');
    }

    public function edit(SportsType $sportsType)
    {
        abort_if(Gate::denies('sports_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sportsTypes.edit', compact('sportsType'));
    }

    public function update(UpdateSportsTypeRequest $request, SportsType $sportsType)
    {
        $sportsType->update($request->all());

        return redirect()->route('admin.sports-types.index');
    }

    public function show(SportsType $sportsType)
    {
        abort_if(Gate::denies('sports_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sportsTypes.show', compact('sportsType'));
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
