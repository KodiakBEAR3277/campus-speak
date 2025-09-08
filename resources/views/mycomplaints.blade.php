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
    <div class="page-content">
      <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Minimal jQuery Datatable
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <div id="table2_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row"><div class="col-3"><div class="dataTables_length" id="table2_length"><label><select name="table2_length" aria-controls="table2" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> </label></div></div><div class="col-9"><div id="table2_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search.." aria-controls="table2"></label></div></div></div><div class="row dt-row"><div class="col-sm-12"><table class="table dataTable no-footer" id="table2" aria-describedby="table2_info">
                        <thead>
                            <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="table2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 107.656px;">Name</th><th class="sorting" tabindex="0" aria-controls="table2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 497.984px;">Email</th><th class="sorting" tabindex="0" aria-controls="table2" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 180.359px;">Phone</th><th class="sorting" tabindex="0" aria-controls="table2" rowspan="1" colspan="1" aria-label="City: activate to sort column ascending" style="width: 193.469px;">City</th><th class="sorting" tabindex="0" aria-controls="table2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 92.5312px;">Status</th></tr>
                        </thead>
                        <tbody>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        <tr class="odd">
                                <td class="sorting_1">Aladdin</td>
                                <td>sem.ut@pellentesqueafacilisis.ca</td>
                                <td>0800 1111</td>
                                <td>Bothey</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr><tr class="even">
                                <td class="sorting_1">Berk</td>
                                <td>fringilla.porttitor.vulputate@taciti.edu</td>
                                <td>(0101) 043 2822</td>
                                <td>Sanquhar</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr><tr class="odd">
                                <td class="sorting_1">Bruno</td>
                                <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
                                <td>07624 869434</td>
                                <td>Rocca d"Arce</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr><tr class="even">
                                <td class="sorting_1">Carter</td>
                                <td>urna.justo.faucibus@orci.com</td>
                                <td>07079 826350</td>
                                <td>Biez</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr><tr class="odd">
                                <td class="sorting_1">Channing</td>
                                <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
                                <td>0845 46 49</td>
                                <td>Warrnambool</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr><tr class="even">
                                <td class="sorting_1">Cruz</td>
                                <td>non@quisturpisvitae.ca</td>
                                <td>07624 944915</td>
                                <td>Shikarpur</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr><tr class="odd">
                                <td class="sorting_1">Dale</td>
                                <td>fringilla.euismod.enim@quam.ca</td>
                                <td>0500 527693</td>
                                <td>New Quay</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr><tr class="even">
                                <td class="sorting_1">Darius</td>
                                <td>velit@nec.com</td>
                                <td>0309 690 7871</td>
                                <td>Ways</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr><tr class="odd">
                                <td class="sorting_1">Deacon</td>
                                <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                                <td>07740 599321</td>
                                <td>Karapınar</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr><tr class="even">
                                <td class="sorting_1">Emmanuel</td>
                                <td>eget.lacus.Mauris@feugiatSednec.org</td>
                                <td>(016977) 8208</td>
                                <td>Saint-Remy-Geest</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr></tbody>
                    </table></div></div><div class="row"><div class="col-4"><div class="dataTables_info" id="table2_info" role="status" aria-live="polite">Page 1 of 3</div></div><div class="col-8"><div class="dataTables_paginate paging_simple" id="table2_paginate"><ul class="pagination pagination-primary"><li class="paginate_button page-item previous disabled" id="table2_previous"><a aria-controls="table2" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item next" id="table2_next"><a href="#" aria-controls="table2" role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
            </div>
        </div>

    </section>
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