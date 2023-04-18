@extends('./email.structure')

@section('content')
       @include('./email/welcomeComponents.welcomeText')
       @include('./email/welcomeComponents.passwordAccess')
       @include('./email/welcomeComponents.buttonAccess')
@endsection
