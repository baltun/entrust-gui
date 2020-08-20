@extends(Config::get('entrust-gui.layout'))

@section('heading', 'Departments')

@section('content')
<div class="models--actions">
    <a class="btn btn-labeled btn-primary" href="{{ route('entrust-gui::departments.create') }}"><span class="btn-label"><i class="fa fa-plus"></i></span>{{ trans('entrust-gui::button.create-department') }}</a>
</div>
<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Actions</th>

  </tr>
  @foreach($departments as $department)
    <tr>
      <td>{{ $department->name }}</th>
      <td class="col-xs-3">
        <form action="{{ route('entrust-gui::departments.destroy', $department->id) }}" method="post">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::departments.edit', $department->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span>{{ trans('entrust-gui::button.edit') }}</a>
          <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>{{ trans('entrust-gui::button.delete') }}</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>
{{--<div class="text-center">--}}
  {{--{!! $departments->render() !!}--}}
{{--</div>--}}
@endsection
