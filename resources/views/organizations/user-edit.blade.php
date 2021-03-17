<x-app-layout>
    <x-slot name="header">
        <h1>
            {{ __('organization.edit_user_role_title', ['user' => $user->name]) }}
        </h1>
    </x-slot>

    <!-- Form Validation Errors -->
    @include('partials.validation-errors')

    <p>{{ __('organization.edit_user_role_intro', ['user' => $user->name, 'organization' => $organization->name]) }}</p>

    <form action="{{ localized_route('organization-user.update', ['organization' => $organization, 'user' => $user]) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <fieldset>
            <legend>{{ __('organization.label_user_role') }}</legend>
            @foreach($roles as $role => $label)
            <div class="field">
                <input type="radio" id="role-{{ $role }}" name="role" value="{{ $role }}" @if ($role === $user->getRoleFor($organization)) checked @endif />
                <label for="role-{{ $role }}">{{ $label }}</label>
            </div>
            @endforeach
        </fieldset>
        <a class="button" href="{{ localized_route('organizations.edit', $organization) }}">{{ __('organization.action_cancel_user_role_update') }}</a>
        <x-button>{{ __('organization.action_update_user_role') }}</x-button>
    </form>
</x-app-layout>
