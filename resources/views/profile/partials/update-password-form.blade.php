<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="row mb-3">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="col-md-4 col-lg-3 col-form-label"  />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="invalid-feedback" />
        </div>

        <div class="row mb-3">
            <x-input-label for="update_password_password" :value="__('New Password')" class="col-md-4 col-lg-3 col-form-label" />
            <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="invalid-feedback" />
        </div>

        <div class="row mb-3">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="invalid-feedback" />
        </div>

        <div class="text-start mt-2">
            <x-primary-button class="btn btn-primary ">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>


{{-- <div class="tab-pane fade pt-3" id="profile-change-password">
    <!-- Change Password Form -->
    <form>

      <div class="row mb-3">
        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
        <div class="col-md-8 col-lg-9">
          <input name="password" type="password" class="form-control" id="currentPassword">
        </div>
      </div>

      <div class="row mb-3">
        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
        <div class="col-md-8 col-lg-9">
          <input name="newpassword" type="password" class="form-control" id="newPassword">
        </div>
      </div>

      <div class="row mb-3">
        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
        <div class="col-md-8 col-lg-9">
          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Change Password</button>
      </div>
    </form><!-- End Change Password Form -->

</div> --}}
