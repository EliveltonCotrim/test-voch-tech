@extends('layouts.master')
@section('title', 'Relatórios')
@section('active-relatorios', 'bg-gray-100 dark:bg-gray-800')
@section('content')
    <div class="p-4 rounded-sm dark:border-gray-700 mt-14">
        <livewire:colaborador-relatorio/>
        <livewire:colaborador-unidade-relatorio/>
        <livewire:ranking-colaborador-relatorio/>
    </div>
@endsection
