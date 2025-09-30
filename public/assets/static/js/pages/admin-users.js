(function(){
  function q(s,c){return (c||document).querySelector(s);} 
  function qa(s,c){return Array.prototype.slice.call((c||document).querySelectorAll(s));}

  function applyFilters(){
    var term = (q('#userSearch').value||'').toLowerCase();
    var role = q('#filterRole').value.toLowerCase();
    var status = q('#filterStatus').value.toLowerCase();
    qa('#adminUsersTable tbody tr').forEach(function(tr){
      var text = tr.textContent.toLowerCase();
      var okTerm = !term || text.indexOf(term)!==-1;
      var okRole = !role || text.indexOf(role)!==-1;
      var okStatus = !status || text.indexOf(status)!==-1;
      tr.style.display = (okTerm && okRole && okStatus) ? '' : 'none';
    });
  }

  function generatePassword(){
    var chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789!@#$%';
    var out='';
    for (var i=0;i<12;i++){ out += chars[Math.floor(Math.random()*chars.length)]; }
    return out;
  }

  document.addEventListener('DOMContentLoaded', function(){
    qa('#userSearch,#filterRole,#filterStatus').forEach(function(el){
      el.addEventListener('input', applyFilters);
      el.addEventListener('change', applyFilters);
    });

    // View/Edit
    var modalEl = q('#userModal');
    var modal;
    qa('.btn-view, .btn-edit').forEach(function(btn){
      btn.addEventListener('click', function(){
        var data = {};
        try { data = JSON.parse(btn.getAttribute('data-user')); } catch(e) {}
        q('#umName').value = data.name||'';
        q('#umEmail').value = data.email||'';
        q('#umRole').value = data.role||'Student';
        q('#umStatus').value = data.status||'Active';
        q('#umLastLogin').value = data.last_login||'';
        if (window.bootstrap) { modal = bootstrap.Modal.getOrCreateInstance(modalEl); modal.show(); }
      });
    });

    // Add user
    var genBtn = q('#btnGenPass');
    genBtn && genBtn.addEventListener('click', function(){ q('#newPassword').value = generatePassword(); });

    var createBtn = q('#btnCreateUser');
    createBtn && createBtn.addEventListener('click', function(){
      // Mock row insert
      var tbody = q('#adminUsersTable tbody');
      var tr = document.createElement('tr');
      tr.innerHTML = '<td>—</td><td>'+q('#newName').value+'</td><td>'+q('#newEmail').value+'</td><td>'+q('#newRole').value+'</td><td><span class="badge bg-success">'+(q('#newStatus').value||'Active')+'</span></td><td>—</td><td><button class="btn btn-sm btn-primary" disabled>View</button></td>';
      tbody && tbody.prepend(tr);
    });
  });
})();



