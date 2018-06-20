<b>2 by 2</b> Visit tracker

Click here to reset your password: <a href="{{ $link = secure_url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
