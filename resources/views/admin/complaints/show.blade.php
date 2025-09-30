@extends('layouts.admin')

@section('content')
<div id="main">
    <div class="page-heading d-flex justify-content-between align-items-center">
        <div>
            <h3>Complaint Details (Admin)</h3>
            <small class="text-muted">Complaint #{{ $complaint['id'] }}</small>
        </div>
        <a href="{{ route('admin.complaints.index') }}" class="btn btn-light">Back to Complaints</a>
    </div>

    <section class="section">
        <div class="row g-3">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div>
                                <h5 class="mb-1">{{ $complaint['title'] }}</h5>
                                <div class="text-muted small">Submitted {{ $complaint['submitted_at'] }}</div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-secondary">{{ $complaint['category'] }}</span>
                                @php
                                $u = strtolower($complaint['urgency']);
                                $uC = $u === 'high' ? 'bg-danger' : ($u === 'medium' ? 'bg-warning' : 'bg-success');
                                $s = strtolower($complaint['status']);
                                $sC = $s === 'resolved' ? 'bg-success' : ($s === 'in review' ? 'bg-warning' : 'bg-danger');
                                @endphp
                                <span class="badge {{ $uC }}">Urgency: {{ $complaint['urgency'] }}</span>
                                <span class="badge {{ $sC }}">{{ $complaint['status'] }}</span>
                            </div>
                        </div>
                        <div class="mt-2 text-muted small">Student: {{ $complaint['student'] }}</div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Complaint Description</h6>
                        <p class="mb-0">{{ $complaint['description'] }}</p>
                        <h6 class="mt-3">Attachments</h6>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($complaint['attachments'] as $file)
                                <a class="btn btn-outline-secondary btn-sm" target="_blank" href="{{ $file['url'] }}">{{ $file['name'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h6>Admin Responses</h6>
                        <div class="vstack gap-3">
                            @foreach ($complaint['responses'] as $r)
                                <div class="border rounded p-3">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $r['from'] }}</strong>
                                        <small class="text-muted">{{ $r['time'] }}</small>
                                    </div>
                                    <div class="mt-2">{{ $r['message'] }}</div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="mt-2">
                            <h6 class="mb-2">Respond to student</h6>
                            <div class="mb-2">
                                <textarea id="adminReply" class="form-control" rows="3" placeholder="Write a reply to the student..."></textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button id="btnSendReply" class="btn btn-primary">Send Reply</button>
                                <select id="statusSelect" class="form-select" style="max-width:200px;">
                                    @php $opts = ['Pending', 'In Review', 'Resolved']; @endphp
                                    @foreach($opts as $o)
                                        <option value="{{ $o }}" {{ strtolower($o)===strtolower($complaint['status']) ? 'selected' : '' }}>{{ $o }}</option>
                                    @endforeach
                                </select>
                                <button id="btnUpdateStatus" class="btn btn-outline-secondary">Update Status</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Status Timeline</h6>
                        <ul class="list-unstyled m-0">
                            @foreach ($complaint['timeline'] as $i => $t)
                                @php $done = !empty($t['date']); @endphp
                                <li class="d-flex align-items-start gap-2 mb-2">
                                    <span class="badge {{ $done ? 'bg-success' : 'bg-light text-muted' }}">{{ $i+1 }}</span>
                                    <div>
                                        <div><strong>{{ $t['label'] }}</strong></div>
                                        <small class="text-muted">{{ $t['date'] ?: '—' }}</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body vstack gap-2">
                        <h6>Admin Actions</h6>
                        <button class="btn btn-outline-secondary">Assign to Staff</button>
                        <button id="btnMarkInProgress" class="btn btn-outline-primary">Mark as In-Progress</button>
                        <button id="btnMarkResolved" class="btn btn-outline-success">Mark as Resolved</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="adminComplaintData" data-complaint='@json($complaint)'></div>
    <script src="{{ asset('assets/static/js/pages/admin-complaint-show.js') }}'></script>
</div>
@endsection


