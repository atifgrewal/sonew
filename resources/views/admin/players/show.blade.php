@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.player.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.players.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.id') }}
                        </th>
                        <td>
                            {{ $player->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.name') }}
                        </th>
                        <td>
                            {{ $player->name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.childparent') }}
                        </th>
                        <td>
                            {{ $player->childparent->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.profilephoto') }}
                        </th>
                        <td>
                            @if($player->profilephoto)
                                <a href="{{ $player->profilephoto->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $player->profilephoto->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.dob') }}
                        </th>
                        <td>
                            {{ $player->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.adress_line_1') }}
                        </th>
                        <td>
                            {{ $player->adress_line_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.address_line_2') }}
                        </th>
                        <td>
                            {{ $player->address_line_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.city') }}
                        </th>
                        <td>
                            {{ $player->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.disable_partner') }}
                        </th>
                        <td>
                            {{ App\Models\Player::DISABLE_PARTNER_RADIO[$player->disable_partner] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.disability_type') }}
                        </th>
                        <td>
                            {{ $player->disability_type }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.players.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection