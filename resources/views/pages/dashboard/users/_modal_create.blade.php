<div id="addUserModal" class="modal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.8); backdrop-filter: blur(10px); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: var(--bg-card); border: 1px solid var(--glass-border); border-radius: 20px; width: 100%; max-width: 500px; padding: 40px; position: relative;">
        <button onclick="document.getElementById('addUserModal').style.display='none'" style="position: absolute; top: 20px; right: 20px; background: none; border: none; color: var(--text-dim); font-size: 24px; cursor: pointer;">×</button>
        
        <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 25px;">Nouveau Collaborateur</h2>

        <form action="{{ route('dashboard.users.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            <div>
                <label style="display: block; font-size: 14px; color: var(--text-dim); margin-bottom: 8px;">Nom & Prénom</label>
                <input type="text" name="name" required style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
            </div>

            <div>
                <label style="display: block; font-size: 14px; color: var(--text-dim); margin-bottom: 8px;">Adresse Email</label>
                <input type="email" name="email" required style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
            </div>

            <div>
                <label style="display: block; font-size: 14px; color: var(--text-dim); margin-bottom: 8px;">Mot de passe initial</label>
                <input type="password" name="password" required minlength="8" style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
            </div>

            <div>
                <label style="display: block; font-size: 14px; color: var(--text-dim); margin-bottom: 8px;">Rôle (Permissions)</label>
                <select name="role" required style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
                    <option value="" disabled selected>Sélectionner un rôle</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ ucfirst((string) $role->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn-gold" style="width: 100%;">Créer l'utilisateur</button>
            </div>
        </form>
    </div>
</div>
