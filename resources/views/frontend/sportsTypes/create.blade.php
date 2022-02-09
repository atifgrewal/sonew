@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.sportsType.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sports-types.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="sports_type">{{ trans('cruds.sportsType.fields.sports_type') }}</label>
                            <input class="form-control" type="text" name="sports_type" id="sports_type" value="{{ old('sports_type', '') }}">
                            @if($errors->has('sports_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sports_type') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection