@extends('layouts.app')

@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ $user['avatar'] }}" alt="avatar" class="rounded-circle" style="width:56px;height:56px;object-fit:cover;">
            <div>
                <h3 class="mb-0">{{ $user['name'] }}</h3>
                <small class="text-muted">Role: {{ $user['role'] }}</small>
            </div>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
    </div>

    <section class="section">
        <div class="row g-3">

            <!-- Personal Information -->
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h5 class="mb-0">Personal Information</h5></div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="text-muted small">Student ID</div>
                                <div class="fw-semibold">{{ $user['student_id'] }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted small">Full Name</div>
                                <div class="fw-semibold">{{ $user['name'] }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted small">Course</div>
                                <div class="fw-semibold">{{ $user['course'] }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted small">Year Level</div>
                                <div class="fw-semibold">{{ $user['year_level'] }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted small">Email</div>
                                <div class="fw-semibold">{{ $user['email'] }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted small">Phone</div>
                                <div class="fw-semibold">{{ $user['phone'] ?: '—' }}</div>
                            </div>
                            <div class="col-12">
                                <a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Complaint Summary -->
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h5 class="mb-0">Complaint Summary</h5></div>
                    <div class="card-body">
                        <div class="row g-3 text-center">
                            <div class="col-4">
                                <div class="border rounded p-3 h-100">
                                    <div class="text-muted small">Total</div>
                                    <div class="fs-4 fw-bold">{{ $user['complaints']['total'] }}</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded p-3 h-100">
                                    <div class="text-muted small">Open</div>
                                    <div class="fs-4 fw-bold text-danger">{{ $user['complaints']['open'] }}</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded p-3 h-100">
                                    <div class="text-muted small">In Review</div>
                                    <div class="fs-4 fw-bold text-warning">{{ $user['complaints']['in_review'] }}</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded p-3 h-100">
                                    <div class="text-muted small">Resolved</div>
                                    <div class="fs-4 fw-bold text-success">{{ $user['complaints']['resolved'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('mycomplaints') }}" class="btn btn-outline-primary">View My Complaints</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Privacy & Settings -->
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h5 class="mb-0">Privacy & Settings</h5></div>
                    <div class="card-body">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="toggleAnonymous" {{ $user['allow_anonymous'] ? 'checked' : '' }}>
                            <label class="form-check-label" for="toggleAnonymous">Allow Anonymous Complaints</label>
                        </div>
                        <div class="mb-2 fw-semibold">Notifications</div>
                        <div class="vstack gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notifEmail" {{ $user['notifications']['email'] ? 'checked' : '' }}>
                                <label class="form-check-label" for="notifEmail">Email</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notifSms" {{ $user['notifications']['sms'] ? 'checked' : '' }}>
                                <label class="form-check-label" for="notifSms">SMS</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notifInApp" {{ $user['notifications']['in_app'] ? 'checked' : '' }}>
                                <label class="form-check-label" for="notifInApp">In-App</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="language" class="form-label">Language</label>
                            <select id="language" class="form-select" style="max-width:260px;">
                                <option {{ $user['language']==='English' ? 'selected' : '' }}>English</option>
                                <option {{ $user['language']==='Filipino' ? 'selected' : '' }}>Filipino</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emergency Contacts -->
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h5 class="mb-0">Emergency Contacts</h5></div>
                    <div class="card-body">
                        <ul class="list-unstyled m-0">
                            @foreach ($user['emergency'] as $c)
                                <li class="d-flex justify-content-between align-items-center border rounded p-3 mb-2">
                                    <div>
                                        <div class="fw-semibold">{{ $c['label'] }}</div>
                                        <small class="text-muted">Hotline</small>
                                    </div>
                                    <a class="btn btn-outline-secondary btn-sm" href="tel:{{ $c['number'] }}">{{ $c['number'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-flex flex-wrap gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                        <a href="{{ route('mycomplaints') }}" class="btn btn-outline-primary">View My Complaints</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="mb-3 text-center">
                            <img src="{{ $user['avatar'] }}" alt="avatar" class="rounded-circle mb-2" style="width:72px;height:72px;object-fit:cover;">
                            <div>
                                <button type="button" class="btn btn-outline-secondary btn-sm">Change Avatar</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editName" class="form-label">Full Name</label>
                            <input type="text" id="editName" class="form-control" value="{{ $user['name'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" id="editEmail" class="form-control" value="{{ $user['email'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="editPassword" class="form-label">New Password</label>
                            <input type="password" id="editPassword" class="form-control" placeholder="••••••••">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


