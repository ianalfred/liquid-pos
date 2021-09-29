@extends('errors::illustrated-layout')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Sorry! Too Many Requests'))
