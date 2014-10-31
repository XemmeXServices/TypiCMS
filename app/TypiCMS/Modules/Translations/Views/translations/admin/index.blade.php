@section('js')
    {{ HTML::script(asset('js/admin/editable-translations-list.js')) }}
@stop

@section('main')

    <h1>
        <a href="{{ route('admin.translations.create') }}" class=""><span class="fa fa-plus-circle"></span><span class="sr-only">{{ ucfirst(trans('translations::global.New')) }}</span></a>
        <span id="nb_elements">{{ $models->count() }}</span> @choice('translations::global.translations', $models->count())
    </h1>

    <div class="list-form" lang="{{ Config::get('app.locale') }}">

        @section('btn-locales') @stop

        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>
                        {{ Html::th('key', 'asc') }}
                        @foreach (Config::get('app.locales') as $locale)
                            <th>@lang('global.languages.' . $locale)</th>
                        @endforeach
                    </tr>

                </thead>

                <tbody>

                    @foreach ($models as $item)

                    <tr id="item_{{ $item['id'] }}">
                        <td contenteditable data-name="key">{{ $item['key'] }}</td>
                        @foreach (Config::get('app.locales') as $locale)
                            <td contenteditable data-name="{{ $locale }}[translation]">{{ $item[$locale] or '' }}</td>
                        @endforeach
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

@stop
