<!-- resources/views/users/index.blade.php -->

<h1>Kullanıcılar</h1>

<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
</ul>
