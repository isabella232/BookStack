@extends('base')

@section('head')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@stop

@section('body-class', 'flexbox')

@section('content')

    <div class="flex-fill flex">
        <form action="{{ $page->getUrl() }}" autocomplete="off" data-page-id="{{ $page->id }}" method="POST" class="flex flex-fill">
            {{ csrf_field() }}

            @if(!isset($isDraft))
                <input type="hidden" name="_method" value="PUT">
            @endif
            @include('pages.form', ['model' => $page])
            @include('pages.form-toolbox')
        </form>
    </div>
    
    @include('components.image-manager', ['imageType' => 'gallery', 'uploaded_to' => $page->id])
    @include('components.code-editor')
    @include('components.entity-selector-popup')

@stop