@extends('layouts.admin')
@section('styles')


<link href="{{ asset('css/table-fixed-header.css') }}" rel="stylesheet">



@endsection

@section('content')

        {{-- @asyncWidget('entregas_recientes') --}}
        <div>
        @livewire('entregas-show')
        </div>
    </table>
@endsection


