@extends('layouts.application')

@section('content')
    <h1>Among Tusk</h1>
    <p>「Among us」の縛りプレイのお題を選べるサイトです。</p>
    <p>現在 {{ $taskCount }} 種類の縛りが登録されています。</p>
    <a href="{{ route('task') }}">自分の縛りを抽選する</a>
    <p>バグが有りましたら<a href="https://forms.gle/YcecXwXhA76zBqfW7">こちら</a>からご連絡いただけると嬉しいです。</p>
    <p><a href="{{ route('release') }}">リリースノート</a></p>
@endsection
