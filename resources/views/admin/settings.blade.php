@extends('layouts.admin')

@section('content')
<div id="main">
    <div class="page-heading">
        <h3>Settings</h3>
        <small class="text-muted">Manage system preferences, complaint categories, and user permissions.</small>
    </div>
    <section class="section">
        <div class="row g-3">
            <!-- General Settings -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h6 class="m-0">General Settings</h6></div>
                    <div class="card-body">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label">School Name</label>
                                <input class="form-control" id="schName" value="CampusSpeak University">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Contact Email</label>
                                <input class="form-control" id="schEmail" value="support@campusspeak.edu">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Phone</label>
                                <input class="form-control" id="schPhone" value="(02) 1234-5678">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control" id="schLogo">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Default Complaint Status</label>
                                <select class="form-select" id="defaultStatus">
                                    <option>Open</option>
                                    <option selected>Pending</option>
                                    <option>In Review</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Language</label>
                                <select id="defaultLang" class="form-select">
                                    <option>English</option>
                                    <option>Filipino</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notifEmail" checked>
                                        <label class="form-check-label" for="notifEmail">Email Notifications</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notifSms">
                                        <label class="form-check-label" for="notifSms">SMS Notifications</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notifInApp" checked>
                                        <label class="form-check-label" for="notifInApp">In-App Notifications</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="enableAnon" checked>
                                        <label class="form-check-label" for="enableAnon">Allow Anonymous Submissions</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Complaint Categories -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0">Complaint Categories</h6>
                        <button id="btnAddCategory" class="btn btn-sm btn-primary">+ Add Category</button>
                    </div>
                    <div class="card-body">
                        <ul id="categoryList" class="list-group" style="max-width:560px;">
                            <li class="list-group-item d-flex justify-content-between align-items-center">Academic <span><button class="btn btn-sm btn-outline-secondary me-1 btn-edit-cat">Edit</button><button class="btn btn-sm btn-outline-danger btn-del-cat">Delete</button></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Facility <span><button class="btn btn-sm btn-outline-secondary me-1 btn-edit-cat">Edit</button><button class="btn btn-sm btn-outline-danger btn-del-cat">Delete</button></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Bullying <span><button class="btn btn-sm btn-outline-secondary me-1 btn-edit-cat">Edit</button><button class="btn btn-sm btn-outline-danger btn-del-cat">Delete</button></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Other <span><button class="btn btn-sm btn-outline-secondary me-1 btn-edit-cat">Edit</button><button class="btn btn-sm btn-outline-danger btn-del-cat">Delete</button></span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- User Roles & Permissions -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h6 class="m-0">User Roles & Permissions</h6></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="max-width:960px;">
                                <thead class="table-light">
                                    <tr>
                                        <th>Role</th>
                                        <th>View Complaints</th>
                                        <th>Respond</th>
                                        <th>Manage Users</th>
                                        <th>Access Reports</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $roles=['Admin','Staff','Guidance Counselor','Student']; @endphp
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role }}</td>
                                        <td><input class="form-check-input" type="checkbox" {{ $role!=='Student' ? 'checked' : '' }}></td>
                                        <td><input class="form-check-input" type="checkbox" {{ in_array($role,['Admin','Staff','Guidance Counselor']) ? 'checked' : '' }}></td>
                                        <td><input class="form-check-input" type="checkbox" {{ $role==='Admin' ? 'checked' : '' }}></td>
                                        <td><input class="form-check-input" type="checkbox" {{ in_array($role,['Admin','Guidance Counselor']) ? 'checked' : '' }}></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h6 class="m-0">Notification Settings</h6></div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="notifEmailAdmin" checked>
                                <label class="form-check-label" for="notifEmailAdmin">Email Notifications</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="notifPushAdmin">
                                <label class="form-check-label" for="notifPushAdmin">Push Notifications</label>
                            </div>
                            <div>
                                <label class="form-label" for="digestFreq">Summary Frequency</label>
                                <select id="digestFreq" class="form-select">
                                    <option>Daily</option>
                                    <option selected>Weekly</option>
                                    <option>Monthly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emergency Contacts -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0">Emergency Contacts</h6>
                        <button id="btnAddContact" class="btn btn-sm btn-primary">+ Add Contact</button>
                    </div>
                    <div class="card-body">
                        <ul id="contactList" class="list-group" style="max-width:560px;">
                            <li class="list-group-item d-flex justify-content-between align-items-center">Police - 911 <span><button class="btn btn-sm btn-outline-secondary me-1 btn-edit-contact">Edit</button><button class="btn btn-sm btn-outline-danger btn-del-contact">Delete</button></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Fire Department - 911 <span><button class="btn btn-sm btn-outline-secondary me-1 btn-edit-contact">Edit</button><button class="btn btn-sm btn-outline-danger btn-del-contact">Delete</button></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Counseling Hotline - (02) 9876-5432 <span><button class="btn btn-sm btn-outline-secondary me-1 btn-edit-contact">Edit</button><button class="btn btn-sm btn-outline-danger btn-del-contact">Delete</button></span></li>
                        </ul>
                        <div class="form-check form-switch mt-3">
                            <input class="form-check-input" type="checkbox" id="showContacts" checked>
                            <label class="form-check-label" for="showContacts">Show on Student Help/FAQ page</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Maintenance -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h6 class="m-0">System Maintenance</h6></div>
                    <div class="card-body d-flex flex-wrap gap-2">
                        <button class="btn btn-outline-primary">Backup Database</button>
                        <button class="btn btn-outline-secondary">Restore Backup</button>
                        <button class="btn btn-outline-danger">Clear Old Complaints</button>
                    </div>
                </div>
            </div>

            <!-- Security -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h6 class="m-0">Security</h6></div>
                    <div class="card-body">
                        <div class="row g-3" style="max-width:560px;">
                            <div class="col-12">
                                <label class="form-label" for="adminPassword">Change Admin Password</label>
                                <input id="adminPassword" type="password" class="form-control" placeholder="••••••••">
                            </div>
                            <div class="col-6 form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enable2fa">
                                <label class="form-check-label" for="enable2fa">Enable Two-Factor Authentication (2FA)</label>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="sessionTimeout">Session Timeout (minutes)</label>
                                <input id="sessionTimeout" type="number" class="form-control" value="30">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer / Version -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="text-muted">CampusSpeak v1.0</div>
                        <div class="text-muted">Contact IT Support: support@campusspeak.edu</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/static/js/pages/admin-settings.js') }}"></script>
</div>
@endsection


