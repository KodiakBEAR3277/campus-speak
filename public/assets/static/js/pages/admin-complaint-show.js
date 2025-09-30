(function(){
  function q(s, c){ return (c||document).querySelector(s); }

  function setStatus(newStatus){
    var badge = document.querySelector('.badge.bg-danger, .badge.bg-warning, .badge.bg-success');
    if (badge) {
      var s = String(newStatus).toLowerCase();
      badge.className = 'badge ' + (s==='resolved' ? 'bg-success' : (s==='in review' ? 'bg-warning' : 'bg-danger'));
      badge.textContent = newStatus;
    }
  }

  document.addEventListener('DOMContentLoaded', function(){
    var holder = document.getElementById('adminComplaintData');
    var data = {};
    try { data = JSON.parse(holder ? holder.getAttribute('data-complaint') : '{}'); } catch(e) { data = {}; }
    var replyBtn = q('#btnSendReply');
    var statusBtn = q('#btnUpdateStatus');
    var markInProg = q('#btnMarkInProgress');
    var markResolved = q('#btnMarkResolved');

    replyBtn && replyBtn.addEventListener('click', function(){
      var msg = (q('#adminReply').value||'').trim();
      if (!msg) return;
      // mock append to thread
      var container = document.createElement('div');
      container.className = 'border rounded p-3 mt-2';
      container.innerHTML = '<div class="d-flex justify-content-between"><strong>Admin (You)</strong><small class="text-muted">Just now</small></div><div class="mt-2"></div>';
      container.querySelector('div.mt-2').textContent = msg;
      var list = document.querySelector('.vstack.gap-3');
      if (list) list.appendChild(container);
      q('#adminReply').value = '';
    });

    statusBtn && statusBtn.addEventListener('click', function(){
      var newStatus = q('#statusSelect').value;
      setStatus(newStatus);
    });
    markInProg && markInProg.addEventListener('click', function(){ setStatus('In Review'); });
    markResolved && markResolved.addEventListener('click', function(){ setStatus('Resolved'); });
  });
})();


