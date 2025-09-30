    @extends('layouts.app')

    @section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3>My Complaints</h3>
                <h6>Track the status of your submitted complaints</h6>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="table-responsive datatable-minimal">
                        <div class="d-flex mb-3 gap-3">
                            <!-- Search -->
                            <div>
                                <label for="searchInput" class="form-label">Search</label>
                                <input type="text" id="searchInput" class="form-control" placeholder="Search complaints...">
                            </div>

                            <!-- Category Filter -->
                            <div class="d-flex mb-3 gap-3">
                                <div>
                                    <label for="filterCategory" class="form-label">Category</label>
                                    <select id="filterCategory" class="form-select">
                                        <option value="">All</option>
                                        <option value="Academic">Academic</option>
                                        <option value="Facility">Facility</option>
                                        <option value="Bullying">Bullying</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <!-- Status Filter -->
                                <div>
                                    <label for="filterStatus" class="form-label">Status</label>
                                    <select id="filterStatus" class="form-select">
                                        <option value="">All</option>
                                        <option value="Pending">Pending</option>
                                        <option value="In Review">In Review</option>
                                        <option value="Resolved">Resolved</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <!-- Complaints Table -->
                        <table class="table table-bordered" id="table22">
                            <thead class="table-light">
                                <tr>
                                    <th>Complaint ID</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Date Filed</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Complaint 1 -->
                                <tr>
                                    <td>#1045</td>
                                    <td>Bullying</td>
                                    <td>Bullying incident in library</td>
                                    <td>2025-09-20</td>
                                    <td><span class="badge bg-danger">Pending</span></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('complaints.show', 1045) }}">View Details</a>
                                    </td>
                                </tr>

                                <!-- Complaint 2 -->
                                <tr>
                                    <td>#1046</td>
                                    <td>Facility</td>
                                    <td>Broken air conditioner in Room 304</td>
                                    <td>2025-09-18</td>
                                    <td><span class="badge bg-warning">In Review</span></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('complaints.show', 1046) }}">View Details</a>
                                    </td>
                                </tr>

                                <!-- Complaint 3 -->
                                <tr>
                                    <td>#1047</td>
                                    <td>Academic</td>
                                    <td>Unfair grading system in Math 101</td>
                                    <td>2025-09-15</td>
                                    <td><span class="badge bg-success">Resolved</span></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('complaints.show', 1047) }}">View Details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>



                        <!-- Complaint Details Modal -->
                        <div class="modal fade" id="complaintModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            Complaint #<span id="modal-id"></span> – <span id="modal-title"></span>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row g-3">

                                                <!-- Complaint Summary -->
                                                <div class="col-12">
                                                    <div class="border rounded p-3">
                                                        <h6>Complaint Summary</h6>
                                                        <p><strong>Category:</strong> <span id="modal-category"></span></p>
                                                        <p><strong>Date Submitted:</strong> <span id="modal-date"></span></p>
                                                        <p><strong>Status:</strong> <span id="modal-status"></span></p>
                                                        <p><strong>Urgency Level:</strong> <span id="modal-urgency"></span></p>
                                                    </div>
                                                </div>

                                                <!-- Left Column -->
                                                <div class="col-md-8">
                                                    <!-- Complaint Content -->
                                                    <div class="border rounded p-3 mb-3">
                                                        <h6>Complaint Content</h6>
                                                        <p id="modal-description"></p>
                                                        <h6>Attachments</h6>
                                                        <div class="d-flex gap-2">
                                                            <div class="border p-4 bg-light">File 1</div>
                                                            <div class="border p-4 bg-light">File 2</div>
                                                        </div>
                                                    </div>

                                                    <!-- Admin Responses -->
                                                    <div class="border rounded p-3">
                                                        <h6>Admin Responses</h6>
                                                        <div id="modal-responses"></div>
                                                    </div>
                                                </div>

                                                <!-- Right Column -->
                                                <div class="col-md-4">
                                                    <!-- Status Timeline -->
                                                    <div class="border rounded p-3 mb-3">
                                                        <h6>Status Timeline</h6>
                                                        <ul id="modal-timeline" class="list-unstyled"></ul>
                                                    </div>

                                                    <!-- Student Options -->
                                                    <div class="border rounded p-3">
                                                        <h6>Student Options</h6>
                                                        <button class="btn btn-outline-primary w-100 mb-2">Add follow-up comment</button>
                                                        <button class="btn btn-outline-success w-100 mb-2">Mark as Resolved</button>
                                                        <button class="btn btn-dark w-100">Download Report</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
    </div>
    </div>
    </div>

    </section>
    </div>
    </div>
    </section>

    <section>

    </section>
    </div>

    </section>
    </div>
    @endsection