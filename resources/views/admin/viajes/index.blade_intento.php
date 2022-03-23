@extends('layouts.admin')
@section('content')
    <script src="//unpkg.com/alpinejs" defer></script>
@can('viaje_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.viajes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.viaje.title_singular') }}
            </a>
        </div>
    </div>
@endcan

    <div x-data="{ tab: 'description' }">
        <nav>
            <a :class="{ 'active': tab === 'description' }" x-on:click.prevent="tab = 'description'" href="#">Description</a>
            <a :class="{ 'active': tab === 'dimensions' }" x-on:click.prevent="tab = 'dimensions'" href="#">Dimensions</a>
            <a :class="{ 'active': tab === 'reviews' }" x-on:click.prevent="tab = 'reviews'" href="#">Reviews</a>
        </nav>
        <div x-show="tab === 'description'">
            @livewire('viajes',['tab' => 'activo'])

        </div>
        <div x-show="tab === 'dimensions'" x-cloak>
            @livewire('viajes-table', ['tab' => 'activo'])
        </div>
        <div x-show="tab === 'reviews'" x-cloak>
            @livewire('viajes-table', ['tab' => 'revision'])
        </div>
    </div>
@endsection

