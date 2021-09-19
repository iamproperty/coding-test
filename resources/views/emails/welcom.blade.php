@component('mail::message')
# Introduction

Welcome To Samaa test code :) it is lovely to have you among us !

@component('mail::button', ['url' => 'https://www.linkedin.com/in/samaa-sameh/'])
Visit
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
