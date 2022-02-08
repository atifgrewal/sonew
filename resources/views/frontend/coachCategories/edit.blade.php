@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.coachCategory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.coach-categories.update", [$coachCategory->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="coach_category">{{ trans('cruds.coachCategory.fields.coach_category') }}</label>
                            <input class="form-control" type="text" name="coach_category" id="coach_category" value="{{ old('coach_category', $coachCategory->coach_category) }}">
                            @if($errors->has('coach_category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('coach_category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coachCategory.fields.coach_category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="coachtype">{{ trans('cruds.coachCategory.fields.coachtype') }}</label>
                            <input class="form-control" type="text" name="coachtype" id="coachtype" value="{{ old('coachtype', $coachCategory->coachtype) }}">
                            @if($errors->has('coachtype'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('coachtype') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.coachCategory.fields.coachtype_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="info">{{ trans('cruds.coachCategory.fields.info') }}</label>
                            <textarea class="form-control ckeditor" name="info" id="info">{!! old('info', $coachCategory->info) !!}</textarea>
                            @if($errors->has('info'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('info') }}
                                </div>
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

        </div>
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
                xhr.open('POST', '{{ route('frontend.coach-categories.storeCKEditorImages') }}', true);
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