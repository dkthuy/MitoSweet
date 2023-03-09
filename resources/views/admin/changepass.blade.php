@extends('admin.layout.main')

@section('header-body')
    <a href="#" class="breadcrumb-admin">
        <i class="far fa-id-card"></i>
        @lang('modules.admin.profile')
    </a> &#124;
    @lang('modules.admin.changepass')

@endsection

@section('content-body')
    <form action="" class="change-form">
        <label for="" class="control-label">@lang('modules.changepass.oldpass')</label>
        <input class="form-control" required>
        <label for="" class="control-label">@lang('modules.changepass.newpass')</label>
        <input class="form-control" required>
        <label for="" class="control-label">@lang('modules.changepass.confirm')</label>
        <input class="form-control" required>
        <button class="btn-change">@lang('modules.admin.changepass')</button>
        <button class="btn-back">@lang('modules.back')</button>
    </form>
@endsection
