@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sportsType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sports-types.update", [$sportsType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="sports_type">{{ trans('cruds.sportsType.fields.sports_type') }}</label>
                <input class="form-control {{ $errors->has('sports_type') ? 'is-invalid' : '' }}" type="text" name="sports_type" id="sports_type" value="{{ old('sports_type', $sportsType->sports_type) }}">
                @if($errors->has('sports_type'))
                    <span class="text-danger">{{ $errors->first('sports_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sportsType.fields.sports_type_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection