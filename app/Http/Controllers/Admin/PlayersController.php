<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPlayerRequest;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PlayersController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('player_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Player::with(['name', 'childparent'])->select(sprintf('%s.*', (new Player())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'player_show';
                $editGate = 'player_edit';
                $deleteGate = 'player_delete';
                $crudRoutePart = 'players';

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
            $table->addColumn('name_name', function ($row) {
                return $row->name ? $row->name->name : '';
            });

            $table->addColumn('childparent_name', function ($row) {
                return $row->childparent ? $row->childparent->name : '';
            });

            $table->editColumn('childparent.email', function ($row) {
                return $row->childparent ? (is_string($row->childparent) ? $row->childparent : $row->childparent->email) : '';
            });
            $table->editColumn('childparent.phone_number', function ($row) {
                return $row->childparent ? (is_string($row->childparent) ? $row->childparent : $row->childparent->phone_number) : '';
            });
            $table->editColumn('profilephoto', function ($row) {
                if ($photo = $row->profilephoto) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->editColumn('adress_line_1', function ($row) {
                return $row->adress_line_1 ? $row->adress_line_1 : '';
            });
            $table->editColumn('address_line_2', function ($row) {
                return $row->address_line_2 ? $row->address_line_2 : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('disable_partner', function ($row) {
                return $row->disable_partner ? Player::DISABLE_PARTNER_RADIO[$row->disable_partner] : '';
            });
            $table->editColumn('disability_type', function ($row) {
                return $row->disability_type ? $row->disability_type : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'name', 'childparent', 'profilephoto']);

            return $table->make(true);
        }

        $users = User::get();

        return view('admin.players.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('player_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $childparents = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.players.create', compact('childparents', 'names'));
    }

    public function store(StorePlayerRequest $request)
    {
        $player = Player::create($request->all());

        if ($request->input('profilephoto', false)) {
            $player->addMedia(storage_path('tmp/uploads/' . basename($request->input('profilephoto'))))->toMediaCollection('profilephoto');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $player->id]);
        }

        return redirect()->route('admin.players.index');
    }

    public function edit(Player $player)
    {
        abort_if(Gate::denies('player_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $childparents = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $player->load('name', 'childparent');

        return view('admin.players.edit', compact('childparents', 'names', 'player'));
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $player->update($request->all());

        if ($request->input('profilephoto', false)) {
            if (!$player->profilephoto || $request->input('profilephoto') !== $player->profilephoto->file_name) {
                if ($player->profilephoto) {
                    $player->profilephoto->delete();
                }
                $player->addMedia(storage_path('tmp/uploads/' . basename($request->input('profilephoto'))))->toMediaCollection('profilephoto');
            }
        } elseif ($player->profilephoto) {
            $player->profilephoto->delete();
        }

        return redirect()->route('admin.players.index');
    }

    public function show(Player $player)
    {
        abort_if(Gate::denies('player_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $player->load('name', 'childparent');

        return view('admin.players.show', compact('player'));
    }

    public function destroy(Player $player)
    {
        abort_if(Gate::denies('player_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $player->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlayerRequest $request)
    {
        Player::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('player_create') && Gate::denies('player_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Player();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
