@extends('layouts.dashboard')

@section('content')
    <header>
        <h1>Collaborateurs & Utilisateurs</h1>
        <div class="user-info">
            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>
    </header>

    @if (session('success'))
        <div style="background: rgba(46, 204, 113, 0.1); color: #2ecc71; padding: 15px; border-radius: 12px; margin-bottom: 20px; border: 1px solid rgba(46, 204, 113, 0.2);">
            {{ session('success') }}
        </div>
    @endif
    
    @if (session('error'))
        <div style="background: rgba(231, 76, 60, 0.1); color: #e74c3c; padding: 15px; border-radius: 12px; margin-bottom: 20px; border: 1px solid rgba(231, 76, 60, 0.2);">
            {{ session('error') }}
        </div>
    @endif

    <div class="premium-card" style="padding: 0; overflow: hidden; margin-top: 40px;">
        <div style="padding: 30px; border-bottom: 1px solid var(--glass-border); display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 15px;">
                <h2 style="font-size: 20px; font-weight: 600;">Gérer les accès du système</h2>
                <button onclick="document.getElementById('addUserModal').style.display='flex'" class="btn-gold" style="padding: 5px 15px; font-size: 12px; height: auto;">
                    + Nouveau collaborateur
                </button>
            </div>
        </div>
        <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
            <table>
                <thead>
                    <tr>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Rôle assigné</th>
                        <th>Date d'ajout</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td style="font-weight: 600;">{{ $user->name }}</td>
                            <td style="color: var(--text-dim);">{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge" style="background: var(--gold-gradient); color: var(--bg-main); text-transform: capitalize; font-weight: 700;">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                                @if($user->roles->isEmpty())
                                    <span class="badge" style="background: var(--glass-strong); color: var(--text-dim);">Aucun rôle</span>
                                @endif
                            </td>
                            <td style="color: var(--text-dim);">{{ $user->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div style="display: flex; gap: 8px;">
                                    <button onclick="openEditUserModal({
                                                        id: {{ $user->id }},
                                                        name: '{{ addslashes($user->name) }}',
                                                        email: '{{ addslashes($user->email) }}',
                                                        role: '{{ $user->roles->first() ? $user->roles->first()->name : '' }}'
                                                    })" 
                                            class="btn-small"
                                            style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); color: var(--text-main);">✏️</button>

                                    @if(auth()->id() !== $user->id)
                                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-small" style="background: rgba(231, 76, 60, 0.1); padding: 8px; border-radius: 8px; border: 1px solid rgba(231, 76, 60, 0.2); color: #e74c3c;">🗑️</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun utilisateur trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @include('pages.dashboard.users._modal_create')
    @include('pages.dashboard.users._modal_edit')

@endsection
