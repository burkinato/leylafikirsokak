<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>

            
            <a href="{{ route('admin.dashboard') }}">
                @if(isset($settings) && $settings->site_logo)
                    <img src="{{ asset('storage/' . $settings->site_logo) }}" 
                         class="logo-icon" 
                         alt="Logo Icon">
                @else
                    <span class="logo-text">Logo Here</span>
                @endif
            </a>
            
            
        </div>
        {{-- <div>
            <h4 class="logo-text">Admin Panel</h4>
        </div> --}}
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Ana Sayfa</div>
            </a>
        </li>
     
        <li class="menu-label">Design</li>
        <li>
            <a href="{{route('admin.site_settings.index')}}">
                <div class="parent-icon"><i class='bx bx-cog'></i>
                </div>
                <div class="menu-title">Genel Site Ayarları</div>
            </a>
            <a href="{{route('admin.contact_info.index')}}">
                <div class="parent-icon"><i class='bx bx-phone'></i>
                </div>
                <div class="menu-title">İletişim Bilgileri</div>
            </a>
        </li>
       
      
       
      
        <li class="menu-label">Ürünler & Menü</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Forms</div>
            </a>
            <ul>
                <li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>Form Elements</a>
                </li>
                <li> <a href="form-input-group.html"><i class='bx bx-radio-circle'></i>Input Groups</a>
                </li>
                
                <li> <a href="form-layouts.html"><i class='bx bx-radio-circle'></i>Forms Layouts</a>
                </li>
                <li> <a href="form-validations.html"><i class='bx bx-radio-circle'></i>Form Validation</a>
                </li>
                <li> <a href="form-wizard.html"><i class='bx bx-radio-circle'></i>Form Wizard</a>
                </li>
                <li> <a href="form-text-editor.html"><i class='bx bx-radio-circle'></i>Text Editor</a>
                </li>
                <li> <a href="form-file-upload.html"><i class='bx bx-radio-circle'></i>File Upload</a>
                </li>
                <li> <a href="form-date-time-pickes.html"><i class='bx bx-radio-circle'></i>Date Pickers</a>
                </li>
                <li> <a href="form-select2.html"><i class='bx bx-radio-circle'></i>Select2</a>
                </li>
                <li> <a href="form-repeater.html"><i class='bx bx-radio-circle'></i>Form Repeater</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Tables</div>
            </a>
            <ul>
                <li> <a href="table-basic-table.html"><i class='bx bx-radio-circle'></i>Basic Table</a>
                </li>
                <li> <a href="table-datatable.html"><i class='bx bx-radio-circle'></i>Data Table</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Pages</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul>
                <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Basic</a>
                    <ul>
                        <li><a href="auth-basic-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign In</a></li>
                        <li><a href="auth-basic-signup.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign Up</a></li>
                        <li><a href="auth-basic-forgot-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                        <li><a href="auth-basic-reset-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Cover</a>
                    <ul>
                        <li><a href="auth-cover-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign In</a></li>
                        <li><a href="auth-cover-signup.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign Up</a></li>
                        <li><a href="auth-cover-forgot-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                        <li><a href="auth-cover-reset-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>With Header Footer</a>
                    <ul>
                        <li><a href="auth-header-footer-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign In</a></li>
                        <li><a href="auth-header-footer-signup.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign Up</a></li>
                        <li><a href="auth-header-footer-forgot-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                        <li><a href="auth-header-footer-reset-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="user-profile.html">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
        <li>
            <a href="timeline.html">
                <div class="parent-icon"> <i class="bx bx-video-recording"></i>
                </div>
                <div class="menu-title">Timeline</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-error"></i>
                </div>
                <div class="menu-title">Errors</div>
            </a>
            <ul>
                <li> <a href="errors-404-error.html" target="_blank"><i class='bx bx-radio-circle'></i>404 Error</a>
                </li>
                <li> <a href="errors-500-error.html" target="_blank"><i class='bx bx-radio-circle'></i>500 Error</a>
                </li>
                <li> <a href="errors-coming-soon.html" target="_blank"><i class='bx bx-radio-circle'></i>Coming Soon</a>
                </li>
                <li> <a href="error-blank-page.html" target="_blank"><i class='bx bx-radio-circle'></i>Blank Page</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="faq.html">
                <div class="parent-icon"><i class="bx bx-help-circle"></i>
                </div>
                <div class="menu-title">FAQ</div>
            </a>
        </li>
        <li>
            <a href="pricing-table.html">
                <div class="parent-icon"><i class="bx bx-diamond"></i>
                </div>
                <div class="menu-title">Pricing</div>
            </a>
        </li>
        <li class="menu-label">Charts & Maps</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li> <a href="charts-apex-chart.html"><i class='bx bx-radio-circle'></i>Apex</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class='bx bx-radio-circle'></i>Chartjs</a>
                </li>
                <li> <a href="charts-highcharts.html"><i class='bx bx-radio-circle'></i>Highcharts</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-map-alt"></i>
                </div>
                <div class="menu-title">Maps</div>
            </a>
            <ul>
                <li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
                </li>
                <li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Others</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">Menu Levels</div>
            </a>
            <ul>
                <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level One</a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level Two</a>
                            <ul>
                                <li> <a href="javascript:;"><i class='bx bx-radio-circle'></i>Level Three</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>