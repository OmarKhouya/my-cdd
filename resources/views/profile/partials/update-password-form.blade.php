<section>
    <header>
        <h2 class="text-dark">
            Update Password
        </h2>

        <p class="mt-1 text-muted">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post"
        action="{{ Auth::guard('partner')->check() ? route('partner.update.password') : route('password.update') }}"
        class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <label for="update_password_current_password" class="input-label">Current Password</label>
            <input type="password" class="form-control" name="current_password" required autocomplete="current-password">
            @if ($errors->updatePassword->has('current_password'))
                <ul class="bg-danger mt-3">
                    @foreach ($errors->updatePassword->get('current_password') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div>
            <label for="update_password_password" class="input-label">New Password</label>
            <input type="password" class="form-control" name="password" required autocomplete="new-password">
            @if ($errors->updatePassword->has('password'))
                <ul class="bg-danger mt-3">
                    @foreach ($errors->updatePassword->get('password') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div>
            <label for="update_password_password_confirmation" class="input-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
            @if ($errors->updatePassword->has('password_confirmation'))
                <ul class="bg-danger mt-3">
                    @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div>
            <button class="btn btn-primary mt-3" type="submit">Save</button>
            @isset($status)
                @if (session('status') === 'password-updated' || $status === 'password-updated')
                    <p class="text-muted">
                        Saved
                    </p>
                @endif
            @endisset
        </div>
    </form>
</section>
