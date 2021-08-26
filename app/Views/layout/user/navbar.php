<div class="app-header header-shadow">
     <div class="app-header__logo">
         <H6 id="logo_text">
          <!-- <img id="imglogo" style="width: 40px;height: 40px;" src="<?php echo base_url() . '/public/assets/images/logos/ropali.png' ?>"> -->
        ARKILA
       </H6>
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
     <div class="app-header__content">
         <div class="app-header-left">
              <div class="search-wrapper">
                 <!-- <input type="text" class="form-control" autocomplete="off" id="SearchMenu" placeholder="Search Menus"> -->
                      <!--   <div class="input-holder">
                            <input type="text" class="search-input" autocomplete="off" id="SearchMenu" placeholder="Search Menus">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button> -->
                    </div>
                    <!-- <ul class="header-menu nav">
                      
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0);" class="nav-link" id="UserSetting">
                                <i class="nav-link-icon fa fa-cog"></i>
                                 Settings
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0);" onclick="ShowGuide()" class="nav-link" id="UserGuid">
                                <i class="nav-link-icon fas fa-info"></i>
                                User Guide
                            </a>
                        </li>
                    </ul>         -->
         </div>
         <div class="app-header-right">
             <div class="header-btn-lg pr-0">
                 <div class="widget-content p-0">
                     <div class="widget-content-wrapper">
                         <div class="widget-content-left">
                           
                             <div class="btn-group">
                                 <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                       <!-- <button class="btn btn-primary" style="border-radius: 40px;height: 45px;width: 45px;font-size: 15px;"><b><?= session('initial');?></b></button> -->

                                   <!--   <i class="fa fa-angle-down ml-2 opacity-8"></i> -->
                                 </a>
                                 <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="dropdown-menu dropdown-menu-right">
                                     <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                     <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                     <button type="button" tabindex="0" class="dropdown-item">Logout</button>
                                 </div>
                             </div>
                         </div>
                         <div class="widget-content-left  ml-3 header-user-info">
                             <div class="widget-heading">
                               WELCOME <span><?= session('fname'); ?></span>
                             </div>

                            <!--  <div class="widget-subheading">
                                 VP People Manager
                             </div> -->
                         </div>
                           <a href="<?= base_url('Home/Logout') ?>" class="btn btn-danger" style="margin-left: 10px;"><i class="fas fa-sign-out-alt"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>