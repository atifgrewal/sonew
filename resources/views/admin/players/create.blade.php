@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.player.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.players.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name_id">{{ trans('cruds.player.fields.name') }}</label>
                <select class="form-control select2 {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name_id" id="name_id">
                    @foreach($names as $id => $entry)
                        <option value="{{ $id }}" {{ old('name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.player.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="childparent_id">{{ trans('cruds.player.fields.childparent') }}</label>
                <select class="form-control select2 {{ $errors->has('childparent') ? 'is-invalid' : '' }}" name="childparent_id" id="childparent_id">
                    @foreach($childparents as $id => $entry)
                        <option value="{{ $id }}" {{ old('childparent_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('childparent'))
                    <span class="text-danger">{{ $errors->first('childparent') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.player.fields.childparent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profilephoto">{{ trans('cruds.player.fields.profilephoto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('profilephoto') ? 'is-invalid' : '' }}" id="profilephoto-dropzone">
                </div>
                @if($errors->has('profilephoto'))
                    <span class="text-danger">{{ $errors->first('profilephoto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.player.fields.profilephoto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.player.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}">
                @if($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.player.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adress_line_1">{{ trans('cruds.player.fields.adress_line_1') }}</label>
                <input class="form-control {{ $errors->has('adress_line_1') ? 'is-invalid' : '' }}" type="text" name="adress_line_1" id="adress_line_1" value="{{ old('adress_line_1', '') }}">
                @if($errors->has('adress_line_1'))
                    <span class="text-danger">{{ $errors->first('adress_line_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.player.fields.adress_line_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_line_2">{{ trans('cruds.player.fields.address_line_2') }}</label>
                <input class="form-control {{ $errors->has('address_line_2') ? 'is-invalid' : '' }}" type="text" name="address_line_2" id="address_line_2" value="{{ old('address_line_2', '') }}">
                @if($errors->has('address_line_2'))
                    <span class="text-danger">{{ $errors->first('address_line_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.player.fields.address_line_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.player.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.player.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.player.fields.disable_partner') }}</label>
                @foreach(App\Models\Player::DISABLE_PARTNER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('disable_partner') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="disable_partner_{{ $key }}" name="disable_partner" value="{{ $key }}" {{ old('disable_partner', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="disable_partner_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('disable_partner'))
                    <span class="text-danger">{{ $errors->first('disable_partner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.player.fields.disable_partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disability_type">{{ trans('cruds.player.fields.disability_type') }}</label>
                <input class="form-control {{ $errors->has('disability_type') ? 'is-invalid' : '' }}" type="text" name="disability_type" id="disability_type" value="{{ old('disability_type', '') }}">
                @if($errors->has('disability_type'))
                    <span class="text-danger">{{ $errors->first('disability_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.player.fields.disability_type_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.profilephotoDropzone = {
    url: '{{ route('admin.players.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="profilephoto"]').remove()
      $('form').append('<input type="hidden" name="profilephoto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profilephoto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($player) && $player->profilephoto)
      var file = {!! json_encode($player->profilephoto) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profilephoto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection