@extends('layouts.app')

@section('title', 'Instanzen')

@section('actions')
    <button class="btn btn-primary" data-toggle="modal" data-target="#instanceCreation">
        Erstellen
    </button>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xl-12">

                <!-- Goals -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Instanzübersicht
                                </h4>

                            </div>
                            <div class="col-auto">
                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="table-responsive">
                        <div style="margin: 2em">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-row">#</a>
                                    </th>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-first">Name</a>
                                    </th>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-last">Benutzer</a>
                                    </th>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-handle">Auslastung</a>
                                    </th>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-handle">Erstelldatum</a>
                                    </th>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-handle">Aktionen</a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach(\App\Models\Instance::all() as $instance)
                                        <tr>
                                            @php($configuration = json_decode($instance->configuration))
                                            @php($bots=$instance->bots()->count())
                                            <th scope="row" class="tables-row">{{ $instance->id }}</th>
                                            <td class="tables-first">{{ $instance->name }}</td>
                                            <td class="tables-last">{{ $instance->user->name }}</td>
                                            <td>
                                                <div class="row align-items-center no-gutters">
                                                    @php($botsUsagePercent = ($bots == 0 ? 0 : (100 / ( ($bots * $configuration->bots)) ) ))
                                                    <div class="col-auto">
                                                        <span class="mr-2">{{ $botsUsagePercent }}%</span>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $botsUsagePercent }}%" aria-valuenow="{{ $botsUsagePercent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $instance->created_at->format('d.m.Y H:i:s') }}
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-white" type="button">Details</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
{{--                                {{ json_decode('{"bots":"550","storage-size":"250","storage-hash":"0jmJHipWiza5MrV2bl2Wl5FPBMsXsnud","api":"false"}')->bots }}--}}
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
    </div>

    <script>
        $(document).ready( function () {
            $("#myTable").DataTable();
        } );
    </script>

    <div class="modal fade" id="instanceCreation" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-card card" data-toggle="lists">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-header-title" id="exampleModalCenterTitle">
                                    Instanz erstellen
                                </h4>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="margin: 1em">
                        <form method="POST" action="{{ route('admin.instance.creation') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Instanz-Name</label>
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="INST-001" value="{{ old('name', 'INST-001') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="user_id">Kunde</label>
                                <select name="user_id" id="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}">
                                    @foreach(\App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}" @if($user->id == old('user_id')) selected @endif>{{ $user->name.' #'.$user->id }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('user_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="configuration[bots]">Bots</label>
                                <input id="configuration[bots]" type="text" class="js-range-slider{{ $errors->has('configuration.bots') ? ' is-invalid' : '' }}" name="configuration[bots]" value="{{ old('configuration.bots', 25) }}" data-min="5" data-max="10000" data-grid="true"/>
                                @if ($errors->has('configuration.bots'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('configuration.bots') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="configuration[storage-size]">Speicher</label>
                                <input id="configuration[storage-size]" type="text" class="js-range-slider{{ $errors->has('configuration.storage-size') ? ' is-invalid' : '' }}" name="configuration[storage-size]" value="{{ old('configuration.storage-size', 1) }}" data-min="1" data-max="1000" data-grid="true"/>
                                @if ($errors->has('configuration.storage-size'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('configuration.storage-size') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="configuration[storage-hash]">Speicher-Hash</label>
                                <input id="configuration[storage-hash]" name="configuration[storage-hash]" class="form-control{{ $errors->has('configuration.storage-hash') ? ' is-invalid' : '' }}" type="text" value="{{ old('configuration.storage-hash', \Illuminate\Support\Str::random(32)) }}">
                                @if ($errors->has('configuration.storage-hash'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('configuration.storage-hash') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <label for="api"></label>
                                    <input type="checkbox" onchange="document.getElementById('configuration[api]').innerText = document.getElementById('api').checked;" class="custom-control-input{{ $errors->has('configuration.api') ? ' is-invalid' : '' }}" value="{{ old('configuration.api', false) }}" id="api">
                                    <input id="configuration[api]" name="configuration[api]" hidden value=false>
                                    <label class="custom-control-label" for="api">API</label>
                                    @if ($errors->has('configuration.api'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('configuration.api') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                                    Erstellen
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".js-range-slider").ionRangeSlider();
        // $("#my_range").ionRangeSlider({
        //     skin: "flat"
        // });
    </script>

@endsection
