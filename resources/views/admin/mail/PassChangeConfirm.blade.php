@component('mail::message')
# Password Change verify

If You are not this person than click here

@component('mail::button', ['url' => 'http://127.0.0.1:8000/password/reset'])
Reset Password
@endcomponent

Thanks,<br>
Md.Atikur Rahman
@endcomponent
