<!DOCTYPE html>
<html>
<head>
    <title>Laravel Localization Example</title>
</head>
<body>

    <p>{{ __('messages.welcome') }}

    </p>
    <p>{{ trans('messages.welcome') }}</p>
    <p>{{ trans('messages.greeting', ['name' => 'John']) }}</p>

    <div>
        <a href="{{ url('/change-language/en') }}">English</a> |
        <a href="{{ url('/change-language/ar') }}">العربية</a>
    </div>
</body>
</html>
