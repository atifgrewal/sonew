@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.coachCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.coach-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.coachCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $coachCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coachCategory.fields.coach_category') }}
                        </th>
                        <td>
                            {{ $coachCategory->coach_category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coachCategory.fields.coachtype') }}
                        </th>
                        <td>
                            {{ $coachCategory->coachtype }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coachCategory.fields.info') }}
                        </th>
                        <td>
                            {!! $coachCategory->info !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.coach-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection