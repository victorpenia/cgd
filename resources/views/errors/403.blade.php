@extends('layouts.master')
@section('title', 'Lista roles')

@section('content-wrapper')

<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>Error 403, No tiene permisos de Administraci&oacute;n
            </div>
        </div>
    </div>
</div>

@endsection