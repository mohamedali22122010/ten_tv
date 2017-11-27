Click here to verify your account: <a href="{{ $link = url('register/verify', $user->confirmation_code) . '?email=' . urlencode($user->email) }}"> {{ $link }}</a>

