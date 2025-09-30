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
            <h3>Submit a Complaint</h3>
            <h6>Your voice matters. Choose a category and provide details</h6>
        </div>
    </div>
    <div class="page-content">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div style="display: grid;  display:grid; grid-template-columns: 50% auto; gap: 100px; padding: 50px 0px 50px 0px;">
                                    <div>
                                        <div class="card-form" style="background-image: url('{{ asset('images/4061125.jpg') }}'); width: 100%; height: 100%; background-size: cover; background-position: start; border-radius:50px;"> </div>
                                    </div>
                                    <div>
                                        <div class="card-form">

                                            <form class="form">
                                                <div class="ro">

                                                    <div class="col-md-6 col-12" style="width: 100%;">

                                                        <div class="form-group">
                                                            <label for="first-name-column">Category</label>
                                                            <select class="form-select" id="basicSelect">
                                                                <option>Academic</option>
                                                                <option>Facility</option>
                                                                <option>Bullying</option>
                                                                <option>Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-check">
                                                            <div class="checkbox">
                                                                <label for="Anonymous-Option">Anonymous Option</label>
                                                                <input type="checkbox" id="checkbox1" class="form-check-input" checked="" title="This is a simple tooltip for the input field."><br>
                                                                <label for="Anonymous-Option" style="font-size: 12px;">Your name and student ID will not be visible to staff</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12" style="width: 100%;">
                                                            <div class="form-group">
                                                                <label for="Complaint-Title">Complaint Title</label>
                                                                <input type="text" id="Complaint-Title" class="form-control" placeholder="Briefly summarize your issue" name="Complaint-Title">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12" style="width: 100%;">
                                                            <div class="form-group">
                                                                <label for="last-name-column">Detailed Description</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Describe your complaint in detail, including date, time, location, and people involved if necessary"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12" style="width: 100%;">
                                                            <div class="form-group">
                                                                <label for="DateTime">Date and Time</label>
                                                                <div style="display: grid; grid-template-columns: 80% 20%; gap: 5px;">
                                                                    <div style="width: 80%;">
                                                                        <input type="date" class="form-control mb-3 flatpickr-no-confi flatpickr-input" placeholder="Select date..">
                                                                    </div>
                                                                    <div style="">
                                                                        <input type="time" class="form-control mb-3 flatpickr-no-config flatpickr-input active" placeholder="Select time" style="margin-left: -50px">
                                                                    </div>

                                                                </div>




                                                            </div>
                                                        </div>


                                                        <div class="col-12 col-md-6" style="width: 100%;">
                                                            <label for="last-name-column">Attachments</label>
                                                            <div class="card" style="border: 1px solid #35354f; border-radius: .25rem;">

                                                                <div class="card-header">
                                                                    <h5 class="card-title">Upload field for: images, screenshots, or supporting documents</h5>
                                                                </div>

                                                                <div class="card-content">
                                                                    <div class="card-body">

                                                                        <!-- Basic file uploader -->
                                                                        <div class="filepond--root basic-filepond filepond--hopper" data-style-button-remove-item-position="left" data-style-button-process-item-position="right" data-style-load-indicator-position="right" data-style-progress-indicator-position="right" data-style-button-remove-item-align="false" style="height: 76px;"><input class="filepond--browser" type="file" id="filepond--browser-6tf0qbip0" name="filepond" aria-controls="filepond--assistant-6tf0qbip0" aria-labelledby="filepond--drop-label-6tf0qbip0" accept="">
                                                                            <div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label for="filepond--browser-6tf0qbip0" id="filepond--drop-label-6tf0qbip0" aria-hidden="true">Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span></label></div>
                                                                            <div class="filepond--list-scroller" style="transform: translate3d(0px, 0px, 0px);">
                                                                                <ul class="filepond--list" role="list"></ul>
                                                                            </div>
                                                                            <div class="filepond--panel filepond--panel-root" data-scalable="true">
                                                                                <div class="filepond--panel-top filepond--panel-root"></div>
                                                                                <div class="filepond--panel-center filepond--panel-root" style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);"></div>
                                                                                <div class="filepond--panel-bottom filepond--panel-root" style="transform: translate3d(0px, 68px, 0px);"></div>
                                                                            </div><span class="filepond--assistant" id="filepond--assistant-6tf0qbip0" role="status" aria-live="polite" aria-relevant="additions"></span>
                                                                            <fieldset class="filepond--data"></fieldset>
                                                                            <div class="filepond--drip"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-chec">

                                                            <div class="checkbox">
                                                                <label for="Urgency">Urgency</label><br>


                                                                <input type="checkbox" id="checkbox2" class="form-check-input">
                                                                <label for="Low"> Low </label>

                                                                <input type="checkbox" id="Medium" class="form-check-input">
                                                                <label for="Medium"> Medium </label>

                                                                <input type="checkbox" id="High" class="form-check-input">
                                                                <label for="High"> High </label>


                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        </div>
                                                    </div>
                                            </form>

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

<section>

</section>
</div>

</section>
</div>
@endsection