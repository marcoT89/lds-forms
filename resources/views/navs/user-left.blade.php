@can('manage', \App\Models\Speech::class)
    <li class="site-menu-header">Discursos</li>

    <li class="site-menu-item {{ active('speeches.index') }}">
        <a href="{{ route('speeches.index') }}">
            <i class="fa fa-fw icon-left fa-book-reader"></i>
            {{ __('Discursantes') }}
        </a>
    </li>

    <li class="site-menu-item {{ active('speeches.list') }}">
        <a href="{{ route('speeches.list') }}">
            <i class="fa fa-fw icon-left fa-list"></i>
            {{ __('Lista') }}
        </a>
    </li>
@endcan

<li class="site-menu-header">Configurações</li>

<li class="site-menu-item {{ active('settings.account') }}">
    <a href="{{ route('settings.account') }}">
        <i class="fa fa-fw icon-left fa-user-circle"></i>
        {{ __('Conta') }}
    </a>
</li>

@can('manage', team())
    <li class="site-menu-item {{ active('settings.team') }}">
        <a href="{{ route('settings.team') }}">
            <i class="fas fa-fw icon-left fa-users"></i>
            {{ __('Ala') }}
        </a>
    </li>
@endcan

@role('admin', 'superadmin')
    <li class="site-menu-header">Administração</li>

    <li class="site-menu-item {{ active('users.index') }}">
        <a href="{{ route('users.index') }}">
            <i class="fas fa-fw icon-left fa-users"></i>
            {{ __('Usuários') }}
        </a>
    </li>
@endrole
