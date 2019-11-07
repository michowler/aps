<div class="form-group row">

    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">

    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

    <div class="col-md-6">
        <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="" required autocomplete="gender" autofocus>

        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">

    <label for="working_level" class="col-md-4 col-form-label text-md-right">{{ __('Working Level') }}</label>

    <div class="col-md-6">
        <input id="working_level" type="text" class="form-control @error('working_level') is-invalid @enderror" name="working_level" value="" required autocomplete="working_level" autofocus>

        @error('working_level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">

    <label for="education_level" class="col-md-4 col-form-label text-md-right">{{ __('Education Level') }}</label>

    <div class="col-md-6">
        <input id="education_level" type="text" class="form-control @error('education_level') is-invalid @enderror" name="education_level" value="" required autocomplete="education_level" autofocus>

        @error('education_level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">

    <label for="marital_status" class="col-md-4 col-form-label text-md-right">{{ __('Marital Status') }}</label>

    <div class="col-md-6">
        <input id="marital_status" type="text" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" value="" required autocomplete="marital_status" autofocus>

        @error('marital_status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
    </div>
</div>