<form method="POST" action="{{ route('register') }}" class="col-10 m-auto">
    @csrf

    <!-- Name -->
    <div class="row d-flex justify-content-between">
        <div class="col-md-6">
            <label for="name" class="input-label text-muted">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required
                autofocus autocomplete="name">
            @if ($errors->has('name'))
                <ul class="">
                    @foreach ($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <!-- category Address -->
        <div class="col-md-6">
            <label for="category" class="input-label text-muted">category</label>
            <input type="text" class="form-control" name="category" value="{{ old('category') }}" required
                autofocus autocomplete="category">
            @if ($errors->has('category'))
                <ul class="bg-danger">
                    @foreach ($errors->get('category') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="row d-flex justify-content-between">
        <!-- Email Address -->
        <div class="col-md-6">
            <label for="Email" class="input-label text-muted">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required
                autofocus autocomplete="username">
            @if ($errors->has('email'))
                <ul class="bg-danger">
                    @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- size Address -->
        <div class="col-md-6">
            <label for="size" class="input-label text-muted">size</label>
            <input type="text" class="form-control" name="size" value="{{ old('size') }}" required
                autofocus autocomplete="size">
            @if ($errors->has('size'))
                <ul class="bg-danger">
                    @foreach ($errors->get('size') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>
    <div class="d-flex justify-content-center flex-column">
        <label for="plan" class="form-label text-center mt-3 text-muted">Plan</label>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            @foreach (App\Enums\Subscriptions::cases() as $plan)
                <input type="radio" class="btn-check" name="plan" id="btnradio{{$plan}}" autocomplete="off" value="{{$plan}}">
                <label class="btn btn-outline-secondary mb-3" style="border: 1px solid grey!important" for="btnradio{{$plan}}">{{$plan}}</label>
            @endforeach
        </div>
    </div>
    <!-- Password -->
    <div>
        <label for="Password" class="input-label  text-muted">Password</label>
        <input type="password" class="form-control" name="password" required autocomplete="password">
        @if ($errors->has('password'))
            <ul class="bg-danger mt-3">
                @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <!-- Confirm Password -->
    <div>
        <label for="password_confirmation" class="input-label text-muted">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" required
            autocomplete="new-password">
        @if ($errors->has('password'))
            <ul class="bg-danger">
                @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('login') }}" class="ms-3">Already registered?</a>
        <button class="btn btn-primary ms-3">Register</button>
    </div>
</form>
