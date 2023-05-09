<div class="text-center mt-4 mb-4">
    <a href="https://programandoconcabeza.com"
       target="_blank"
       class="btn btn-primary"
       style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;font-size:1em;color:white">
        {{ __('email/welcome.access-to-platform') }}
    </a>
    <p style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;margin-top:30px;line-height:21px;color:#455A64;font-size:16px">
        {{ __('email/welcome.problem-to-access') }}
    </p>
    <a href="{{ $url }}"
       target="_blank"
       style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;font-size:16px">
        {{ $url }}
    </a>
</div>
