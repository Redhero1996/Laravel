Click Here to Reset your Password: <br>
<a href="{{ $link = route('password.reset').'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>