@extends('layouts.app')

@section('content')
    <v-navbar
        welcome="{{route('welcome')}}"
        alunos="{{route('entrar')}}"
        cadastrar="{{route('cadastrar')}}">
    </v-navbar>
    <first-component></first-component>
    <second-component></second-component>
    <v-numeros></v-numeros>
    <last-component></last-component>
    <v-footer></v-footer>
@endsection
