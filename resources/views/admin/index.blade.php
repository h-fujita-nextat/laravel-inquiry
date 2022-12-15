
@extends('layout.layout')

@section('title')
    管理者ダッシュボード
@endsection

@section('content')

    <h1>管理者ダッシュボード</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>

@endsection
