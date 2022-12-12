<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>お問い合わせフォーム</title>
</head>
<body style="margin: 100px;">
{{--名前--}}
    <form action="/inquiries" method="post">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">名前</label>
            @if($errors->has('name'))
                @foreach($errors->get('name') as $message)
                    <span class="text-danger">{{ $message }}</span>
                @endforeach
            @endif
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="テスト 太郎" name="name" value="{{ old('name') }}">
        </div>
    {{--メアド--}}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">メールアドレス</label>
            @if($errors->has('email'))
                @foreach($errors->get('email') as $message)
                    <span class="text-danger">{{ $message }}</span>
                @endforeach
            @endif
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="test@example.com" name="email" value="{{ old('email') }}">
        </div>
    {{--詳細--}}
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">お問い合わせ内容</label>
            @if($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
            @endif
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="お問い合わせ内容を記入してください。" name="content">{{ old('content') }}</textarea>
        </div>
    {{--セレクトボックス--}}
        @if($errors->has('type'))
            @foreach($errors->get('type') as $message)
                <span class="text-danger">{{ $message }}</span>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">お問い合わせ項目</label>
            <select class="form-select" aria-label="Default select example" name="type">
                <option value="">選択してください</option>
                <option value="estimate" @if(old('type')==='estimate')selected @endif>お見積もり</option>
                <option value="recruit" @if(old('type')==='recruit')selected @endif>採用</option>
                <option value="other" @if(old('type')==='other')selected @endif>その他</option>
            </select>
        </div>
{{--    送信ボタン--}}
        <div class="col text-center">
            <button type="submit" class="btn btn-secondary" style="margin: 50px 0;">送信</button>
        </div>
    </form>
</body>
</html>
