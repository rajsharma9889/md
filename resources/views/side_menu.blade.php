<ul class="metismenu" id="menu">

    <li id="permission_admin_dashboard">
        <a href="{{ route('admin.login') }}">
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
                    <i class='bx bxs-parking'></i>
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
                    <i class='bx bxs-home-circle'></i>
                    Privacy Policy
                </a>
            </li>
        </ul>
    </li>



</ul>
