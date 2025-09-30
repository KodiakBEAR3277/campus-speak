(function(){
  function promptText(title, initial){
    var val = window.prompt(title, initial||'');
    return val && val.trim() ? val.trim() : null;
  }

  document.addEventListener('DOMContentLoaded', function(){
    // Categories add/edit/delete
    var list = document.getElementById('categoryList');
    var addBtn = document.getElementById('btnAddCategory');
    addBtn && addBtn.addEventListener('click', function(){
      var name = promptText('New category name');
      if (!name) return;
      var li = document.createElement('li');
      li.className = 'list-group-item d-flex justify-content-between align-items-center';
      li.innerHTML = name + ' <span><button class="btn btn-sm btn-outline-secondary me-1 btn-edit-cat">Edit</button><button class="btn btn-sm btn-outline-danger btn-del-cat">Delete</button></span>';
      list.appendChild(li);
    });
    list && list.addEventListener('click', function(e){
      var t = e.target;
      if (t.classList.contains('btn-edit-cat')){
        var li = t.closest('li');
        var current = li.firstChild.textContent.trim();
        var name = promptText('Edit category name', current);
        if (name) li.firstChild.textContent = name + ' ';
      }
      if (t.classList.contains('btn-del-cat')){
        var li = t.closest('li');
        li && li.remove();
      }
    });

    // Emergency contacts add/edit/delete
    var contactList = document.getElementById('contactList');
    var addContact = document.getElementById('btnAddContact');
    addContact && addContact.addEventListener('click', function(){
      var name = promptText('Contact name (e.g., Police)');
      if (!name) return;
      var num = promptText('Contact number (e.g., 911)');
      if (!num) return;
      var li = document.createElement('li');
      li.className = 'list-group-item d-flex justify-content-between align-items-center';
      li.innerHTML = name + ' - ' + num + ' <span><button class="btn btn-sm btn-outline-secondary me-1 btn-edit-contact">Edit</button><button class="btn btn-sm btn-outline-danger btn-del-contact">Delete</button></span>';
      contactList.appendChild(li);
    });
    contactList && contactList.addEventListener('click', function(e){
      var t = e.target;
      if (t.classList.contains('btn-edit-contact')){
        var li = t.closest('li');
        var parts = li.firstChild.textContent.split(' - ');
        var name = promptText('Edit contact name', parts[0].trim());
        if (!name) return;
        var num = promptText('Edit contact number', (parts[1]||'').trim());
        if (!num) return;
        li.firstChild.textContent = name + ' - ' + num + ' ';
      }
      if (t.classList.contains('btn-del-contact')){
        var li = t.closest('li');
        li && li.remove();
      }
    });
  });
})();



