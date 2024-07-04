<ul class="metismenu" id="menu">

    <li id="permission_admin_dashboard">
        <a href="{{ route('admin.login') }}">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li id="">
        {{-- <a href="{{ route('category') }}"> --}}
        <div class="parent-icon"><i class='bx bxs-category'></i>
        </div>
        <div class="menu-title">Category</div>
        </a>
    </li>
    <li id="">
        {{-- <a href="{{ route('subcategory') }}"> --}}
        <div class="parent-icon"><i class='bx bx-category-alt'></i>
        </div>
        <div class="menu-title">Sub Category</div>
        </a>
    </li>
    <li id="">
        {{-- <a href="{{ route('subject') }}"> --}}
        <div class="parent-icon"><i class='bx bxs-book-add'></i>
        </div>
        <div class="menu-title">Subject</div>
        </a>
    </li>
    {{-- 
    @foreach ($sub_cat as $item)

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-book-reader'></i>
            </div>
            <div class="menu-title">{{$item->sub_category_name}}</div>
        </a>
        <ul>
            @foreach ($item->subject as $subject)
            <li> <a href="{{route('test',$subject->id)}}"><i class='bx bx-radio-circle'></i>{{$subject->subject_name}}</a>
            </li>
            @endforeach

        </ul>
    </li>
    @endforeach --}}




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
