@extends('layout.layout')

@section('title')
    登録完了
@endsection

@section('content')
    <div style="margin-top: 50px;">
        <div class="alert alert-primary" role="alert" style="text-align: center;">
            ご登録ありがとうございます。
        </div>

        <a href="{{ route('adminUser.index') }}">
            <button type="button" class="btn btn-primary btn-sm">管理者一覧へ</button>
        </a>
    </div>
@endsection
