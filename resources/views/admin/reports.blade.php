@extends('layouts.admin')

@section('content')
<div id="main">
    <div class="page-heading d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-0">Reports & Analytics</h3>
            <small class="text-muted">Monitor complaint trends, response efficiency, and overall system usage.</small>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary">Download CSV</button>
            <button class="btn btn-outline-secondary">Download PDF</button>
        </div>
    </div>
    <section class="section">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label" for="repRange">Date Range</label>
                        <select id="repRange" class="form-select">
                            <option>Today</option>
                            <option>Last 7 days</option>
                            <option selected>Last 30 days</option>
                            <option>Custom</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="repCategory">Category</label>
                        <select id="repCategory" class="form-select">
                            <option>All</option>
                            <option>Academic</option>
                            <option>Facility</option>
                            <option>Bullying</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="repStatus">Status</label>
                        <select id="repStatus" class="form-select">
                            <option>All</option>
                            <option>Open</option>
                            <option>In Review</option>
                            <option>Resolved</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-grid">
                        <button id="btnRunReport" class="btn btn-primary">Run Report</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Metrics -->
        <div class="row g-3 mb-3">
            <div class="col-6 col-lg-3">
                <div class="card border-primary"><div class="card-body text-center">
                    <div class="text-muted small">Total Complaints</div>
                    <div class="fs-3 fw-bold">{{ $metrics['total'] }}</div>
                </div></div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card border-success"><div class="card-body text-center">
                    <div class="text-muted small">Resolved</div>
                    <div class="fs-3 fw-bold text-success">{{ $metrics['resolved'] }}</div>
                </div></div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card border-warning"><div class="card-body text-center">
                    <div class="text-muted small">Avg Resolution Time</div>
                    <div class="fs-3 fw-bold">{{ $metrics['avg_resolution_days'] }} days</div>
                </div></div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card border-secondary"><div class="card-body text-center">
                    <div class="text-muted small">Anonymous</div>
                    <div class="fs-3 fw-bold">{{ $metrics['anonymous'] }}</div>
                </div></div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h6 class="m-0">Trend Over Time</h6></div>
                    <div class="card-body"><div id="repTrend" style="height:300px;"></div></div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h6 class="m-0">Complaints by Category</h6></div>
                    <div class="card-body"><div id="repCategoryChart" style="height:300px;"></div></div>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h6 class="m-0">Status Breakdown</h6></div>
                    <div class="card-body"><div id="repStatusChart" style="height:300px;"></div></div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h6 class="m-0">Submission Heatmap (Hourly)</h6></div>
                    <div class="card-body"><div id="repHeatmap" class="text-muted small">Optional heatmap placeholder</div></div>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h6 class="m-0">Staff Performance</h6></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Staff/Admin</th>
                                        <th>Handled</th>
                                        <th>Avg Resolution Time</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $s)
                                    <tr>
                                        <td>{{ $s['name'] }}</td>
                                        <td>{{ $s['handled'] }}</td>
                                        <td>{{ $s['avg_days'] }} days</td>
                                        <td>{{ $s['rating'] }}/5</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h6 class="m-0">Complaint Distribution (Category)</h6></div>
                    <div class="card-body"><div id="repDistCategory" style="height:260px;"></div></div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-header"><h6 class="m-0">By Anonymity</h6></div>
                    <div class="card-body"><div id="repAnonymity" style="height:260px;"></div></div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body d-flex flex-wrap gap-2">
                <button class="btn btn-outline-secondary">Download CSV</button>
                <button class="btn btn-outline-secondary">Download PDF</button>
                <button class="btn btn-outline-secondary">Download Excel</button>
                <button class="btn btn-primary">Generate Monthly Report</button>
                <button class="btn btn-outline-primary">Email Report</button>
            </div>
        </div>

    </section>
    <div id="reportsData" data-trend='@json($trend)' data-bycategory='@json($byCategory)' data-bystatus='@json($byStatus)' data-distribution='@json($distribution)'></div>
    <script src="{{ asset('assets/static/js/pages/admin-reports.js') }}"></script>
</div>
@endsection


