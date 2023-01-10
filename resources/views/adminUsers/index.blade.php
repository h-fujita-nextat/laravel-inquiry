@extends('layout.layout')

@section('title')
    管理ユーザー一覧
@endsection

@section('content')
    <p class="h1 d-flex justify-content-center mt-3">管理ユーザー</p>

    @if( count($errors) )
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div style="margin: 24px 48px">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">名前</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">作成日</th>
                <th scope="col">詳細</th>
                <th scope="col">削除</th>
            </tr>
            </thead>
            <tbody>
            @php
                /** @var Illuminate\Support\Collection<App\Models\User> $users */
            @endphp
            @foreach ($users as $user)
                <tr>
                    <!-- TODO routeは詳細実装時に -->
                    <th scope="row"><a href=aaa>{{$user->id}}</a></th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->email_verified_at}}</td>
                    <td>
                        <!-- TODO 詳細実装時に -->
                        <button type="button" class="btn btn-secondary">詳細</button>
                    </td>
                    <td>
                        <!-- TODO 削除実装時に -->
                        <button type="button" class="btn btn-secondary">削除</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
@endsection
