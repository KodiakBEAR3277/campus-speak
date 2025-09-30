@extends('layouts.plain')

@section('content')
<div id="auth" class="py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="text-center mb-4">
                <div class="d-inline-flex align-items-center gap-1 text-primary">
                    <i class="bi bi-chat-dots-fill fs-5"></i>
                    <span style="font-size: 54px;" class="fw-semibold">CampusSpeak</span>
                </div>
                <h2 class="mt-2 mb-1">Admin Login</h2>
                <p class="text-muted">Authorized personnel only</p>
            </div>

            <div class="card">
                <div class="card-body">
                    <form id="adminLoginForm">
                        <div class="mb-3">
                            <label for="adminEmail" class="form-label">Email / Username</label>
                            <input type="text" id="adminEmail" class="form-control" placeholder="Enter admin email">
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="adminPassword" class="form-label">Password</label>
                            <input type="password" id="adminPassword" class="form-control" placeholder="Enter password">
                            <button type="button" id="togglePwd" class="btn btn-sm btn-link position-absolute" style="right:6px; top:32px;">Show</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div>
                            <a href="#" class="small">Forgot Password?</a>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" class="form-select">
                                <option>Super Admin</option>
                                <option>Guidance Counselor</option>
                                <option>Teacher</option>
                                <option>IT Staff</option>
                                <option>Principal</option>
                            </select>
                        </div>

                        <button id="btnSignIn" class="btn btn-primary w-100" type="button" disabled>Sign In</button>

                        <div id="loginError" class="alert alert-danger mt-3 d-none" role="alert"></div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('dashboard') }}" class="small">Back to CampusSpeak homepage</a>
                <div class="small text-muted mt-1">Having issues? Contact IT support</div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        const email = document.getElementById('adminEmail');
        const pwd = document.getElementById('adminPassword');
        const toggle = document.getElementById('togglePwd');
        const btn = document.getElementById('btnSignIn');
        const err = document.getElementById('loginError');

        function updateState() {
            btn.disabled = !(email.value.trim() && pwd.value.trim());
        }

        email.addEventListener('input', updateState);
        pwd.addEventListener('input', updateState);

        toggle.addEventListener('click', function() {
            const isPwd = pwd.getAttribute('type') === 'password';
            pwd.setAttribute('type', isPwd ? 'text' : 'password');
            toggle.textContent = isPwd ? 'Hide' : 'Show';
        });

        btn.addEventListener('click', function() {
            // Mock validation
            const ok = email.value.includes('@') && pwd.value.length >= 4;
            if (!ok) {
                err.textContent = 'Invalid email or password.';
                err.classList.remove('d-none');
                return;
            }
            err.classList.add('d-none');
            // On success, redirect to admin dashboard (replace with real auth later)
            window.location.href = '{{ route('admin.dashboard') }}';
        });
    })();
</script>
@endsection


