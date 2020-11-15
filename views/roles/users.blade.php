@extends(Config::get('entrust-gui.layout'))

@section('heading', "Users of role '$roleDisplayName'")

@section('content')
<div class="models--actions">
    <a class="btn btn-labeled btn-primary" href="{{ route('entrust-gui::roles.create') }}"><span class="btn-label"><i class="fa fa-plus"></i></span>{{ trans('entrust-gui::button.create-role') }}</a>
</div>
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department Id</th>
    </tr>
    @foreach($roleUsersModel as $model)
        <tr>
            <td>{{ $model->id }}</th>
            <td>{{ $model->name }}</th>
            <td class="col-xs-3">
                {{ $model->email }}
                {{--<form action="{{ route('entrust-gui::roles.destroy', $model->id) }}" method="post">--}}
                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    {{--<a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::roles.edit', $model->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span>{{ trans('entrust-gui::button.edit') }}</a>--}}
                    {{--<a class="btn btn-default" href="{{ route('entrust-gui::roles.users', $model->id) }}"><span><i class="fa fa-male"></i></span>--}}{{-- trans('entrust-gui::button.users') --}}{{--</a>--}}
                    {{--<button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>{{ trans('entrust-gui::button.delete') }}</button>--}}
                {{--</form>--}}
            </td>
            <td>{{ $model->department_name }}</th>
        </tr>
    @endforeach
</table>
{{--<div class="text-center">--}}
    {{--{!! $models->render() !!}--}}
{{--</div>--}}
@endsection
