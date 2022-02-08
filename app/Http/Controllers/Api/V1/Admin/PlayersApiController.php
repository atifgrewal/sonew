<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Http\Resources\Admin\PlayerResource;
use App\Models\Player;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('player_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlayerResource(Player::with(['name', 'childparent'])->get());
    }

    public function store(StorePlayerRequest $request)
    {
        $player = Player::create($request->all());

        if ($request->input('profilephoto', false)) {
            $player->addMedia(storage_path('tmp/uploads/' . basename($request->input('profilephoto'))))->toMediaCollection('profilephoto');
        }

        return (new PlayerResource($player))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Player $player)
    {
        abort_if(Gate::denies('player_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlayerResource($player->load(['name', 'childparent']));
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

        return (new PlayerResource($player))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Player $player)
    {
        abort_if(Gate::denies('player_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $player->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
