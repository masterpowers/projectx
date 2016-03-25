List of All Users:
<br>
<hr>
{{ $users }}
<hr>
@foreach($users as $user)
{{ $user->email }}
@endforeach