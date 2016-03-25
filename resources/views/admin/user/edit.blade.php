UserID : {{ $user->id }}
<br>
Email : {{ $user->email }}
<br>
Username: {{ $user->username }}
<br>
Email Verified:
@if($user->verified)
Yes
@else
Not yet
@endif
<br>
Status:
@if($user->banned)
Banned
@else
OK
@endif
<br>
Account Type :
@if(Bouncer::is($user)->an('admin'))
Admin
@else
User
@endif
