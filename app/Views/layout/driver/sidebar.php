<div class="app-main">
     <div class="app-sidebar sidebar-shadow">
         <div class="app-header__logo">
             <div class="logo-src"></div>
             <div class="header__pane ml-auto">
                 <div>
                     <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                         data-class="closed-sidebar">
                         <span class="hamburger-box">
                             <span class="hamburger-inner"></span>
                         </span>
                     </button>
                 </div>
             </div>
         </div>
         <div class="app-header__mobile-menu">
             <div>
                 <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                     <span class="hamburger-box">
                         <span class="hamburger-inner"></span>
                     </span>
                 </button>
             </div>
         </div>
         <div class="app-header__menu">
             <span>
                 <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                     <span class="btn-icon-wrapper">
                         <i class="fas fa-ellipsis-v fa-w-6"></i>
                     </span>
                 </button>
             </span>
         </div>
         <div class="scrollbar-sidebar">
             <div class="app-sidebar__inner">
                 <ul class="vertical-nav-menu" id="Menus">
                     <li class="app-sidebar__heading">MENU</li>
                     <li class=""><a href="<?= base_url('Home/Homepage') ?>" class="btnmenu">
                             <i class="fas fa-chart-area me-1"></i>
                            Dashboard
                         </a></li>
                         <li class=""><a href="<?= base_url('Home/Setting') ?>" class="btnmenu">
                             <i class="fas fa-cog"></i>
                            Settings
                         </a></li>
                 </ul>
             </div>
         </div>
     </div>

     <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
  
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Dashboard</h5>
                                    <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">PENDING</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="medium text-white stretched-link" href="#" id="arkila_count"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">APPROVED</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="medium text-white stretched-link" href="#" id="approved_arkila"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">DONE </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="medium text-white stretched-link" href="#" id="done_arkila"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">CANCELED </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="medium text-white stretched-link" href="#" id="canceled_arkila"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        PENDING/CANCELED ARKILA
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="pending_requested_arkila">
                                                <thead>
                                                   <tr>
                                                        <th>Transaction Number</th>
                                                        <th>Pasahero</th>
                                                        <th>Driver</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                         </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        APPROVED ARKILA
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="approved_requested_arkila">
                                                <thead>
                                                   <tr>
                                                        <th>Transaction Number</th>
                                                        <th>Pasahero</th>
                                                        <th>Driver</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                         </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        DONE ARKILA
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="done_requested_arkila">
                                                <thead>
                                                   <tr>
                                                        <th>Transaction Number</th>
                                                        <th>Pasahero</th>
                                                        <th>Driver</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                         </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>