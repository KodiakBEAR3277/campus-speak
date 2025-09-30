@extends('layouts.app')

@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('mycomplaints') }}" class="btn btn-light d-inline-flex align-items-center">
                <i class="bi bi-arrow-left"></i>
                <span class="ms-2">Back to My Complaints</span>
            </a>
            <div>
                <h3 class="mb-0">Complaint Details</h3>
                <small class="text-muted">Complaint #{{ $complaint['id'] }}</small>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row g-3">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <div class="border rounded p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                                        <div>
                                            <h5 id="complaint-title" class="mb-1">{{ $complaint['title'] }}</h5>
                                            <div class="text-muted small">Submitted {{ $complaint['submitted_at'] }}</div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span id="complaint-category" class="badge bg-secondary">{{ $complaint['category'] }}</span>
                                            <span id="complaint-urgency" class="badge {{ strtolower($complaint['urgency']) === 'high' ? 'bg-danger' : (strtolower($complaint['urgency']) === 'medium' ? 'bg-warning' : 'bg-success') }}">Urgency: {{ $complaint['urgency'] }}</span>
                                            @php
                                                $status = strtolower($complaint['status']);
                                                $statusClass = $status === 'resolved' ? 'bg-success' : ($status === 'in review' ? 'bg-warning' : 'bg-danger');
                                            @endphp
                                            <span id="complaint-status" class="badge {{ $statusClass }}">{{ $complaint['status'] }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="border rounded p-3 mb-3">
                                    <h6>Complaint Description</h6>
                                    <p id="complaint-description" class="mb-0">{{ $complaint['description'] }}</p>
                                </div>

                                <div class="border rounded p-3 mb-3">
                                    <h6 class="mb-3">Attachments</h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        @forelse ($complaint['attachments'] as $file)
                                            <a class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center" href="{{ $file['url'] }}" target="_blank">
                                                <i class="bi bi-paperclip"></i>
                                                <span class="ms-2">{{ $file['name'] }}</span>
                                            </a>
                                        @empty
                                            <span class="text-muted">No attachments</span>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="border rounded p-3">
                                    <h6 class="mb-3">Admin Responses</h6>
                                    <div class="vstack gap-3">
                                        @forelse ($complaint['responses'] as $response)
                                            <div class="border rounded p-3">
                                                <div class="d-flex justify-content-between">
                                                    <strong>{{ $response['from'] }}</strong>
                                                    <small class="text-muted">{{ $response['time'] }}</small>
                                                </div>
                                                <div class="mt-2">{{ $response['message'] }}</div>
                                            </div>
                                        @empty
                                            <span class="text-muted">No responses yet.</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="border rounded p-3 mb-3">
                                    <h6 class="mb-3">Status Timeline</h6>
                                    <ul class="list-unstyled m-0">
                                        @foreach ($complaint['timeline'] as $index => $step)
                                            @php
                                                $isDone = !empty($step['date']);
                                            @endphp
                                            <li class="d-flex align-items-start gap-2 mb-2">
                                                <span class="badge {{ $isDone ? 'bg-success' : 'bg-light text-muted' }}">{{ $index + 1 }}</span>
                                                <div>
                                                    <div><strong>{{ $step['label'] }}</strong></div>
                                                    <small class="text-muted">{{ $step['date'] ?: '—' }}</small>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="border rounded p-3">
                                    <h6 class="mb-3">Actions</h6>
                                    <div class="vstack gap-2">
                                        @if ($complaint['is_editable'])
                                            <button id="btnEditComplaint" type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#editComplaintModal">Edit Complaint</button>
                                        @endif
                                        <button class="btn btn-outline-danger w-100">Withdraw Complaint</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Edit Complaint Modal -->
    <div class="modal fade" id="editComplaintModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Complaint</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editComplaintForm">
                        <div class="mb-3">
                            <label for="editTitle" class="form-label">Title</label>
                            <input type="text" id="editTitle" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Category</label>
                            <select id="editCategory" class="form-select">
                                <option value="Academic">Academic</option>
                                <option value="Facility">Facility</option>
                                <option value="Bullying">Bullying</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editUrgency" class="form-label">Urgency</label>
                            <select id="editUrgency" class="form-select">
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea id="editDescription" class="form-control" rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button id="btnSaveComplaint" type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.COMPLAINT = @json($complaint);
    </script>
    <script src="{{ asset('assets/static/js/pages/complaint-details.js') }}"></script>
</div>
@endsection


