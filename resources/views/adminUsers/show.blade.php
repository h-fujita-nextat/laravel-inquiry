@extends('layout.layout')

@section('title')
    管理ユーザー詳細
@endsection

@section('content')
    <div class="d-flex justify-content-center" style="margin-top: 100px">
        <div class="card" style="width: 48rem;">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item" value="{{ old('name') }}">名前：{{$user->name}}</li>
                    <li class="list-group-item" value="{{ old('email') }}">メールアドレス：{{$user->email}}</li>
                    <li class="list-group-item" value="{{ old('created_at') }}">作成日：{{$user->created_at}}</li>
                </ul>
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary d-flex justify-content-center mt-3">管理ユーザー一覧に戻る</a>
            </div>
        </div>
    </div>
@endsection
