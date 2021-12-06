<div id="sign-up">

    <form action="{{ route('register') }}" class="form" id="form-signup" autocomplete="off" method="POST">
        @csrf
        <a href="#" class="close">&times;</a>
        <h2>SignUp</h2>
        <input type="text" name="roleId" hidden value="{{ $roleId }}">
        @error('name')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        @enderror

        <div class="input-group">
            <input autocomplete="new-password" type="text" name="name" id="Name" value="{{ old('name') }}" }}
                required>
            <label for="loginUser">Name*</label>
        </div>

        @error('email')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        @enderror

        <div class="input-group">
            <input autocomplete="new-password" type="email" name="email" id="Email"
                value="{{ old('email') }}" required>
            <label for="Email">Email*</label>
        </div>

        @error('password')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        @enderror

        <div class="input-group">
            <input autocomplete="new-password" type="password" name="password" id="password" required>
            <label for="password">Password*</label>
        </div>
        <div class="input-group">
            <input type="password" name="password_confirmation " id="password_confirmation"
                required>
            <label for="password_confirmation">Confirm Password*</label>
        </div>

        @error('countrySelected')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('city')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        @enderror

        <div class="country-city-wrapper">
            <div class="input-group">
                <select onselect="update()" name="countrySelected" id="countrySelected">
                    @foreach ($countries as $cou)
                        @if (old('countrySelected') == $cou->nicename)
                            <option value="{{ $cou->nicename }}" selected>{{ $cou->nicename }}</option>
                        @else
                            <option value="{{ $cou->nicename }}">{{ $cou->nicename }}</option>
                        @endif
                    @endforeach
                </select>
                <label for="countrySelected">Country*</label>
            </div>
            <div class="input-group">
                <input autocomplete="new-password" type="text" name="city" id="city" required
                    value="{{ old('city') }}">
                <label for="city">City*</label>
            </div>
        </div>

        @error('phoneNumber')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        @enderror
        @error('gender')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        @enderror

        <div class="country-city-wrapper">
            <div class="input-group">
                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="ratherNotToSay">Rather Not To Say</option>
                </select>
                <label for="gender">Gender*</label>
            </div>
            <div class="input-group">
                <input autocomplete="new-password" type="text" name="phoneNumber" id="phoneNumber" required
                    value="{{ old('phoneNumber') }}">
                <label for="phoneNumber">Phone Number*</label>
            </div>
        </div>


        @error('zipcode')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('address')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
        @enderror

        <div class="country-city-wrapper">
            <div class="input-group">
                <input autocomplete="new-password" type="text" name="zipcode" id="zipcode" maxlength="5"
                    value="{{ old('zipcode') }}">
                <label for="zipcode">ZipCode</label>
            </div>
            <div class="input-group">
                <input autocomplete="new-password" type="text" name="address" id="address"
                    value="{{ old('address') }}">
                <label for="address">Address</label>
            </div>
        </div>
        <button type="submit" form="form-signup" class="submit-btn">Create</button>
    </form>

</div>