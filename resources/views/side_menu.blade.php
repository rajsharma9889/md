<ul class="metismenu" id="menu">

    <li id="permission_admin_dashboard">
        <a href="{{ route('admin.dashboard') }}">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.category') }}">
            <div class="parent-icon"><i class='bx bxs-category'></i>
            </div>
            <div class="menu-title">Category</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.karigar') }}">
            <div class="parent-icon"><i class='bx bxs-user-plus'></i>
            </div>
            <div class="menu-title">Karigar</div>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.user') }}">
            <div class="parent-icon"><i class='bx bxs-user'></i>
            </div>
            <div class="menu-title">User</div>
        </a>
    </li>







    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"> <i class='bx bxs-user-voice'></i>
            </div>


            <div class="menu-title">User Requests</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('admin.user_new_requests') }}">
                    <i class='bx bx-stats'></i>
                    New
                </a>
            </li>
            <li>
                <a href="{{ route('admin.assigned_karigar') }}">
                    <i class='bx bx-stats'></i>
                    Assigned karigar
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reject_by_karigar') }}">
                    <i class='bx bx-stats'></i>
                    Reject By Karigar
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user_new_requests') }}/rejected">
                    <i class='bx bx-stats'></i>
                    Reject
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user_new_requests') }}/working">
                    <i class='bx bx-stats'></i>
                    Working
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user_new_requests') }}/ready">
                    <i class='bx bx-stats'></i>
                    Ready to pick
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user_new_requests') }}/completedlist">
                    <i class='bx bx-stats'></i>
                    Complete
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"> <i class='bx bxs-customize'></i>
            </div>


            <div class="menu-title">Form Fields</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('admin.gender') }}">
                    <i class='bx bx-stats'></i>
                    Gender
                </a>
            </li>
            <li>
                <a href="{{ route('admin.purity') }}">
                    <i class='bx bx-stats'></i>
                    Purity
                </a>
            </li>
            <li>
                <a href="{{ route('admin.color') }}">
                    <i class='bx bx-stats'></i>
                    Color
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dandi') }}">
                    <i class='bx bx-stats'></i>
                    Dandi
                </a>
            </li>
            <li>
                <a href="{{ route('admin.gaze_size') }}">
                    <i class='bx bx-stats'></i>
                    Gaze Size
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kunda') }}">
                    <i class='bx bx-stats'></i>
                    Kunda
                </a>
            </li>
            <li>
                <a href="{{ route('admin.latkan') }}">
                    <i class='bx bx-stats'></i>
                    Latkan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.size') }}">
                    <i class='bx bx-stats'></i>
                    Size
                </a>
            </li>
            <li>
                <a href="{{ route('admin.weight') }}">
                    <i class='bx bx-stats'></i>
                    Weight
                </a>
            </li>

        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"> <i class='bx bx-cookie'></i>
            </div>


            <div class="menu-title">Other Details</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('admin.banner') }}">
                    <i class='bx bx-home-alt'></i>
                    Home Banner
                </a>
            </li>
            <li>
                <a href="{{ route('admin.aboutus') }}">
                    <i class='bx bxs-home-circle'></i>
                    About US
                </a>
            </li>
            <li>
                <a href="{{ route('admin.terms') }}">
                    <i class='bx bx-transfer-alt'></i>
                    Term and Condition
                </a>
            </li>
            <li>
                <a href="{{ route('admin.privacy') }}">
                    <i class='bx bxs-parking'></i>

                    Privacy Policy
                </a>
            </li>
        </ul>
    </li>



</ul>