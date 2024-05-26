@extends('layouts.layout')
@section('error')
    <div class="conteiner mt-2">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (sesseion()->has('success'))
                    <div class="alert alert-success">
                        {{ sesseion('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
