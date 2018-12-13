@component('mail::message')
# New comment by {{ $comment->author }}

Comment:
@component('mail::panel')
{{ $comment->content }}
@endcomponent

@component('mail::button', ['url' => route('post.show', [$post])])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
