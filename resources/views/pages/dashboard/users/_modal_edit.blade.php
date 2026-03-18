<div id="editUserModal" class="modal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.8); backdrop-filter: blur(10px); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: var(--bg-card); border: 1px solid var(--glass-border); border-radius: 20px; width: 100%; max-width: 500px; padding: 40px; position: relative;">
        <button onclick="document.getElementById('editUserModal').style.display='none'" style="position: absolute; top: 20px; right: 20px; background: none; border: none; color: var(--text-dim); font-size: 24px; cursor: pointer;">×</button>
        
        <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 25px;">Modifier Collaborateur</h2>

        <form id="editUserForm" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf
            @method('PUT')

            <div>
                <label style="display: block; font-size: 14px; color: var(--text-dim); margin-bottom: 8px;">Nom & Prénom</label>
                <input type="text" name="name" id="edit_name" required style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
            </div>

            <div>
                <label style="display: block; font-size: 14px; color: var(--text-dim); margin-bottom: 8px;">Adresse Email</label>
                <input type="email" name="email" id="edit_email" required style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
            </div>

            <div>
                <label style="display: block; font-size: 14px; color: var(--text-dim); margin-bottom: 8px;">Nouveau mot de passe (Laisser vide pour ne pas changer)</label>
                <input type="password" name="password" minlength="8" style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
            </div>

            <div>
                <label style="display: block; font-size: 14px; color: var(--text-dim); margin-bottom: 8px;">Rôle (Permissions)</label>
                <select name="role" id="edit_role" required style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
                    <option value="" disabled>Sélectionner un rôle</option>
                    @foreach($roles as $role)
                        @php $roleName = is_object($role) ? $role->name : $role; @endphp
                        <option value="{{ $roleName }}">{{ ucfirst($roleName) }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn-gold" style="width: 100%;">Enregistrer les modifications</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditUserModal(user) {
    document.getElementById('editUserForm').action = "/dashboard/utilisateurs/" + user.id;
    document.getElementById('edit_name').value = user.name || '';
    document.getElementById('edit_email').value = user.email || '';
    
    let roleSelect = document.getElementById('edit_role');
    for (let i = 0; i < roleSelect.options.length; i++) {
        if (roleSelect.options[i].value === user.role) {
            roleSelect.selectedIndex = i;
            break;
        }
    }
    document.getElementById('editUserModal').style.display = 'flex';
}
</script>
