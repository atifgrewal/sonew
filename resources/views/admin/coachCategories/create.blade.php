@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.coachCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.coach-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="coach_category">{{ trans('cruds.coachCategory.fields.coach_category') }}</label>
                <input class="form-control {{ $errors->has('coach_category') ? 'is-invalid' : '' }}" type="text" name="coach_category" id="coach_category" value="{{ old('coach_category', '') }}">
                @if($errors->has('coach_category'))
                    <span class="text-danger">{{ $errors->first('coach_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coachCategory.fields.coach_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coachtype">{{ trans('cruds.coachCategory.fields.coachtype') }}</label>
                <input class="form-control {{ $errors->has('coachtype') ? 'is-invalid' : '' }}" type="text" name="coachtype" id="coachtype" value="{{ old('coachtype', '') }}">
                @if($errors->has('coachtype'))
                    <span class="text-danger">{{ $errors->first('coachtype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coachCategory.fields.coachtype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="info">{{ trans('cruds.coachCategory.fields.info') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('info') ? 'is-invalid' : '' }}" name="info" id="info">{!! old('info') !!}</textarea>
                @if($errors->has('info'))
                    <span class="text-danger">{{ $errors->first('info') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.coachCategory.fields.info_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.coach-categories.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $coachCategory->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection