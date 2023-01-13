@extends('layout.layout')

@section('title')
    管理ユーザー詳細
@endsection

@section('content')
    <div class="d-flex justify-content-center" style="margin-top: 100px">
        <div class="card" style="width: 48rem;">
            <form action="{{ route('inquiries.store') }}" method="post">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            名前：<input type="name" value="{{ old('name', $user->name) }}">
                        </li>
                        <li class="list-group-item">
                            メールアドレス：<input type="name" value="{{ old('name', $user->email) }}">
                        </li>
                        <li class="list-group-item" value="{{ old('created_at') }}">作成日：{{$user->created_at}}</li>
                    </ul>
                    <a href="{{ route('') }}" class="btn btn-primary d-flex justify-content-center mt-3">更新</a>
                </div>
            </form>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary d-flex justify-content-center mt-3">管理ユーザー一覧に戻る</a>
        </div>
    </div>
@endsection
