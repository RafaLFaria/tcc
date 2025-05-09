<div class="main-panel">
    <div class="content">
        <div class="profile-header text-center">
            <h1>{{ auth()->user()->name }}</h1>
        </div>

        <div class="form-section text-center">
            @livewire('profile.update-profile-information-form')

            <div class="section-border"></div>

            @livewire('profile.update-password-form')
        </div>
    </div>
</div>
