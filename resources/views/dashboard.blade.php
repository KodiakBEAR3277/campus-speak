@extends('layouts.app')

@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Hi User, welcome back 👋</h3>
        <button class="btn btn-danger">Submit New Complaint</button>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9" style="display: grid; width: 100%;">
                <div class="row" style="justify-content: center;">
                    <div class="col-6 col-lg-3 col-md-6" style="width: 320px;">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="bi bi-exclamation-octagon-fill"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Open Complaints</h6>
                                        <h6 class="font-extrabold mb-0">3</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="bi bi-eye-fill"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">In Review</h6>
                                        <h6 class="font-extrabold mb-0">1</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="bi bi-check2-circle"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Resolved</h6>
                                        <h6 class="font-extrabold mb-0">5</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
                <div class="row">

                </div>
                <div class="col-12 col-xl-8" style="width: 100%;  display: flex; flex-direction: row; justify-content: space-between; gap: 20px;">
                    <div class="card" style="width: 73%;">
                        <div class="card-header">
                            <h4>Recent Complaints</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-left" style="font-weight: bold;">
                                                    <p class="font-bold ms-1 mb-0">Bullying</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">August 09, 2025</p>
                                            </td>
                                            <td class="col-auto">
                                                <span class="badge bg-warning">Pending</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-left" style="font-weight: bold;">
                                                    <p class="font-bold ms-1 mb-0">Bullying</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">August 09, 2025</p>
                                            </td>
                                            <td class="col-auto">
                                                <span class="badge bg-primary">In Review</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-left" style="font-weight: bold;">
                                                    <p class="font-bold ms-1 mb-0">Bullying</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">August 09, 2025</p>
                                            </td>
                                            <td class="col-auto">
                                                <span class="badge bg-success">Resolved</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Notifications</h4>
                        </div>
                        <div class="card-content pb-4" style="padding: 10px;">
                            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="margin-bottom: 10px;">
                                <div class="toast-header">
                                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#007aff"></rect>
                                    </svg>
                                    <strong class="me-auto">Admin</strong>
                                    <small>11 mins ago</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Your bullying complaint has been marked In Review
                                </div>
                            </div>
                            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="margin-bottom: 10px;">
                                <div class="toast-header">
                                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#007aff"></rect>
                                    </svg>
                                    <strong class="me-auto">Admin</strong>
                                    <small>11 mins ago</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Your bullying complaint has been marked In Review
                                </div>
                            </div>
                            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="margin-bottom: 10px;">
                                <div class="toast-header">
                                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#007aff"></rect>
                                    </svg>
                                    <strong class="me-auto">Admin</strong>
                                    <small>11 mins ago</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Your bullying complaint has been marked In Review
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6" style="width: 100%;">
                    <div class="card">
                        <div class="card-header">
                            <h4>Help / FAQ Page</h4>
                        </div>
                        <div class="card-body">
                            <p>Click the accordions below to expand/collapse the accordion content.</p>
                            <div class="accordion" id="accordionExample">

                                <!-- Item 1 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            1. How the System Works
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>
                                                Step 1: Log in with your student account (or choose Anonymous).<br>
                                                Step 2: Click Submit Complaint and fill out the form (choose category: Academic, Facility, Bullying, Other).<br>
                                                Step 3: Track your complaint under My Complaints to see the status.<br>
                                                Step 4: School staff will review your complaint, respond, and mark it as In Review or Resolved.<br>
                                                Step 5: You’ll receive updates via the dashboard (and optionally email/SMS if enabled).
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 2 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            2. Frequently Asked Questions (FAQ)
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>Q1: Can I submit a complaint without revealing my name?</strong><br>
                                            Yes, select the Anonymous option when submitting. Your identity will not be shared.<br><br>

                                            <strong>Q2: What types of issues can I report?</strong>
                                            <p>
                                                • Academic concerns (grading, teaching methods, unfair treatment) <br>
                                                • Facility issues (classrooms, equipment, internet, library, dorms) <br>
                                                • Bullying, harassment, or discrimination <br>
                                                • Other student concerns <br>
                                            </p>

                                            <strong>Q3: How long does it take for my complaint to be addressed?</strong>
                                            <p>
                                                This depends on the issue. Minor facility issues may be resolved within a few days, while academic or bullying reports may take longer for proper review.
                                            </p>

                                            <strong>Q4: Who can see my complaint?</strong>
                                            <p>
                                                Only authorized school staff (e.g., guidance counselors, administrators). If you report anonymously, they won’t see your identity.
                                            </p>

                                            <strong>Q5: What if I need urgent help?</strong>
                                            <p>
                                                If your situation is an emergency, don’t wait for a complaint review. Contact the emergency hotlines listed below.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 3 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            3. Student Rights
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                • You have the right to be heard without fear of retaliation. <br>
                                                • You have the right to confidentiality—your identity will be protected when anonymity is chosen.<br>
                                                • You have the right to a fair response from the administration. <br>
                                                • You have the right to appeal or submit follow-up concerns if you feel an issue was not resolved properly. <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 4 -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            4. Emergency Contacts
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                • 📞 Campus Security: 0912-345-6789<br>
                                                • 📞 Guidance Office Hotline: 0917-555-4321<br>
                                                • 📞 National Emergency Hotline: 911 <br>
                                                • 📧 Student Support Email: support@campusspeak.edu <br>
                                            </p>
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
    @endsection