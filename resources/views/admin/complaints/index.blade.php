@extends('layouts.admin')

@section('content')
<div id="main">
    <div class="page-heading">
        <h3>Complaints Management</h3>
        <p class="text-muted">View, filter, and respond to all student complaints.</p>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row g-3 align-items-end mb-3">
                    <div class="col-md-3">
                        <label class="form-label" for="search">Search</label>
                        <input id="search" type="text" class="form-control" placeholder="Search by ID, student, keyword">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="filterCategory">Category</label>
                        <select id="filterCategory" class="form-select">
                            <option value="">All</option>
                            <option>Academic</option>
                            <option>Facility</option>
                            <option>Bullying</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="filterStatus">Status</label>
                        <select id="filterStatus" class="form-select">
                            <option value="">All</option>
                            <option>Pending</option>
                            <option>In Review</option>
                            <option>Resolved</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="filterRange">Date Range</label>
                        <select id="filterRange" class="form-select">
                            <option>Today</option>
                            <option>This Week</option>
                            <option>Custom</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="sortBy">Sort by</label>
                        <select id="sortBy" class="form-select">
                            <option>Newest</option>
                            <option>Oldest</option>
                            <option>Urgency</option>
                        </select>
                    </div>
                    <div class="col-md-1 d-grid">
                        <button id="btnFilter" class="btn btn-primary">Apply</button>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex gap-2">
                        <button id="bulkAssign" class="btn btn-outline-secondary btn-sm" disabled>Assign to staff</button>
                        <button id="bulkResolve" class="btn btn-outline-success btn-sm" disabled>Mark as resolved</button>
                        <button id="bulkExport" class="btn btn-outline-dark btn-sm">Export</button>
                    </div>
                    <div class="small text-muted">Showing 1–{{ min(count($complaints), 10) }} of {{ count($complaints) }} complaints</div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle" id="adminComplaintsTable">
                        <thead class="table-light">
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>ID</th>
                                <th>Student</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Assigned</th>
                                <th>Urgency</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $c)
                                @php
                                    $s = strtolower($c['status']);
                                    $badge = $s === 'resolved' ? 'bg-success' : ($s === 'in review' ? 'bg-warning' : 'bg-danger');
                                @endphp
                                <tr>
                                    <td><input type="checkbox" class="row-check" data-id="{{ $c['id'] }}"></td>
                                    <td>#{{ $c['id'] }}</td>
                                    <td>{{ $c['student'] }}</td>
                                    <td>{{ $c['category'] }}</td>
                                    <td>{{ $c['date'] }}</td>
                                    <td><span class="badge {{ $badge }}">{{ $c['status'] }}</span></td>
                                    <td>{{ $c['assigned'] ?? 'Unassigned' }}</td>
                                    <td>{{ $c['urgency'] }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.complaints.show', $c['id']) }}">View Details</a>
                                        <button class="btn btn-sm btn-outline-secondary btn-respond" data-id="{{ $c['id'] }}">Respond</button>
                                        <button class="btn btn-sm btn-outline-success btn-resolve" data-id="{{ $c['id'] }}">Close / Resolve</button>
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

                <div class="modal fade" id="respondModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Respond to Complaint</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label" for="responseText">Message</label>
                                    <textarea id="responseText" class="form-control" rows="4" placeholder="Type your response..."></textarea>
                                </div>
                                <div>
                                    <label class="form-label" for="assignTo">Assign to staff (optional)</label>
                                    <select id="assignTo" class="form-select">
                                        <option value="">-- None --</option>
                                        <option>Guidance Counselor</option>
                                        <option>Maintenance</option>
                                        <option>Dean's Office</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button id="btnSendResponse" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/static/js/pages/admin-complaints.js') }}"></script>
</div>
@endsection


