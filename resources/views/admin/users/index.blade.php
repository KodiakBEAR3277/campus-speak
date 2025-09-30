@extends('layouts.admin')

@section('content')
<div id="main">
    <div class="page-heading">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mb-0">User Management</h3>
                <small class="text-muted">Manage student and staff accounts, roles, and access.</small>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">+ Add New User</button>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <!-- Filters & Search -->
                <div class="row g-3 align-items-end mb-3">
                    <div class="col-md-4">
                        <label for="userSearch" class="form-label">Search</label>
                        <input id="userSearch" class="form-control" placeholder="Search by name, email, or ID">
                    </div>
                    <div class="col-md-3">
                        <label for="filterRole" class="form-label">Role</label>
                        <select id="filterRole" class="form-select">
                            <option value="">All</option>
                            <option>Student</option>
                            <option>Admin</option>
                            <option>Staff</option>
                            <option>Guidance</option>
                            <option>IT</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="filterStatus" class="form-label">Status</label>
                        <select id="filterStatus" class="form-select">
                            <option value="">All</option>
                            <option>Active</option>
                            <option>Inactive</option>
                            <option>Suspended</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="sortUsers" class="form-label">Sort by</label>
                        <select id="sortUsers" class="form-select">
                            <option>Newest</option>
                            <option>Oldest</option>
                            <option>A–Z</option>
                        </select>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="table-responsive">
                    <table class="table table-bordered align-middle" id="adminUsersTable">
                        <thead class="table-light">
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // enrich mock data
                                $rows = array_map(function($u){
                                    return $u + [
                                        'status' => 'Active',
                                        'last_login' => '2025-09-20 10:15',
                                    ];
                                }, $users);
                            @endphp
                            @foreach($rows as $u)
                                <tr>
                                    <td>{{ $u['id'] }}</td>
                                    <td>{{ $u['name'] }}</td>
                                    <td>{{ $u['email'] }}</td>
                                    <td>{{ $u['role'] }}</td>
                                    <td><span class="badge {{ strtolower($u['status'])==='active' ? 'bg-success' : 'bg-secondary' }}">{{ $u['status'] }}</span></td>
                                    <td>{{ $u['last_login'] }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary btn-view" data-user='@json($u)'>View</button>
                                        <button class="btn btn-sm btn-outline-secondary btn-edit" data-user='@json($u)'>Edit</button>
                                        <button class="btn btn-sm btn-outline-danger btn-deactivate" data-id='{{ $u['id'] }}'>Deactivate</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted small">Page 1 of 1</div>
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                            <li class="page-item active"><span class="page-link">1</span></li>
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- View/Edit User Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input id="umName" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input id="umEmail" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Role</label>
                            <select id="umRole" class="form-select">
                                <option>Student</option>
                                <option>Admin</option>
                                <option>Staff</option>
                                <option>Guidance</option>
                                <option>IT</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select id="umStatus" class="form-select">
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Suspended</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Last Login</label>
                            <input id="umLastLogin" class="form-control" disabled>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Assigned Complaints / History</label>
                            <div class="border rounded p-3 text-muted small">Placeholder for complaint history or assigned tickets.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary">Reset Password</button>
                    <button class="btn btn-outline-danger">Deactivate</button>
                    <button class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="vstack gap-3">
                        <div>
                            <label class="form-label">Full Name</label>
                            <input id="newName" class="form-control" placeholder="Juan Dela Cruz">
                        </div>
                        <div>
                            <label class="form-label">Email / Username</label>
                            <input id="newEmail" class="form-control" placeholder="user@example.com">
                        </div>
                        <div>
                            <label class="form-label">Role</label>
                            <select id="newRole" class="form-select">
                                <option>Student</option>
                                <option>Admin</option>
                                <option>Staff</option>
                                <option>Guidance</option>
                                <option>IT</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input id="newPassword" class="form-control" placeholder="Auto-generated" type="text">
                                <button id="btnGenPass" class="btn btn-outline-secondary" type="button">Generate</button>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Status</label>
                            <select id="newStatus" class="form-select">
                                <option selected>Active</option>
                                <option>Inactive</option>
                                <option>Suspended</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button id="btnCreateUser" class="btn btn-primary" data-bs-dismiss="modal">Create User</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/static/js/pages/admin-users.js') }}"></script>
</div>
@endsection


