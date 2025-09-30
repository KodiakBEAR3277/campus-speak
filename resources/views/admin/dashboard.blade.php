@extends('layouts.admin')

@section('content')
<div id="main">
    <header class="mb-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="CampusSpeak" style="height:28px;">
            <h4 class="m-0">Good morning, Admin!</h4>
        </div>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                Admin Name <span class="text-muted">(Super Admin)</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
            </ul>
        </div>
    </header>

    <section class="section">
        <!-- Key Metrics -->
        <div class="row g-3">
            <div class="col-6 col-lg-3">
                <a class="text-decoration-none" href="#">
                    <div class="card border-primary">
                        <div class="card-body text-center">
                            <div class="text-muted">Total Complaints</div>
                            <div class="fs-3 fw-bold">{{ $stats['total'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="text-decoration-none" href="#">
                    <div class="card border-danger">
                        <div class="card-body text-center">
                            <div class="text-muted">Open</div>
                            <div class="fs-3 fw-bold text-danger">{{ $stats['open'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="text-decoration-none" href="#">
                    <div class="card border-warning">
                        <div class="card-body text-center">
                            <div class="text-muted">In Review</div>
                            <div class="fs-3 fw-bold text-warning">{{ $stats['in_review'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="text-decoration-none" href="#">
                    <div class="card border-success">
                        <div class="card-body text-center">
                            <div class="text-muted">Resolved</div>
                            <div class="fs-3 fw-bold text-success">{{ $stats['resolved'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-lg-3">
                <a class="text-decoration-none" href="#">
                    <div class="card border-secondary">
                        <div class="card-body text-center">
                            <div class="text-muted">Anonymous</div>
                            <div class="fs-3 fw-bold">{{ $stats['anonymous'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <!-- Complaints by Category Chart -->
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h6 class="m-0">Complaints by Category</h6></div>
                    <div class="card-body">
                        <div id="chartCategories" style="height:300px;"></div>
                    </div>
                </div>
            </div>
            <!-- Trends -->
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h6 class="m-0">Trends (Complaints per Week)</h6></div>
                    <div class="card-body">
                        <div id="chartTrend" style="height:300px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <!-- Priority / Urgent -->
            <div class="col-12">
                <div class="card border-danger">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Priority / Urgent:</strong> Bullying report – High Urgency
                        </div>
                        <a href="{{ route('complaints.show', 1045) }}" class="btn btn-danger">View</a>
                    </div>
                </div>
            </div>

            <!-- Recent Complaints Table -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0">Recent Complaints</h6>
                        <div>
                            <button class="btn btn-outline-secondary btn-sm">Download CSV</button>
                            <button class="btn btn-outline-secondary btn-sm">Download PDF</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Complaint ID</th>
                                        <th>Student</th>
                                        <th>Category</th>
                                        <th>Date Submitted</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recent as $r)
                                        @php
                                            $s = strtolower($r['status']);
                                            $badge = $s === 'resolved' ? 'bg-success' : ($s === 'in review' ? 'bg-warning' : 'bg-danger');
                                        @endphp
                                        <tr>
                                            <td>#{{ $r['id'] }}</td>
                                            <td>{{ $r['student'] }}</td>
                                            <td>{{ $r['category'] }}</td>
                                            <td>{{ $r['date'] }}</td>
                                            <td><span class="badge {{ $badge }}">{{ $r['status'] }}</span></td>
                                            <td><a class="btn btn-sm btn-primary" href="{{ route('complaints.show', $r['id']) }}">View Details</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-3 mt-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-flex flex-wrap gap-2">
                        <a href="{{ route('mycomplaints') }}" class="btn btn-outline-primary">View All Complaints</a>
                        <button class="btn btn-outline-secondary">Assign Complaint to Staff</button>
                        <button class="btn btn-outline-secondary">Generate Report</button>
                        <button class="btn btn-outline-secondary">Manage Categories / Settings</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page data source for external JS -->
    <div id="adminDashData"
         data-categories='@json($byCategory)'
         data-trend='@json($trend)'></div>
    <script src="{{ asset('assets/static/js/pages/admin-dashboard.js') }}"></script>
@endsection


