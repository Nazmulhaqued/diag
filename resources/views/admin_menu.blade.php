
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Navigation</li>

            <li class="nav-item">
                <a href="{{url('/dashboard')}}" class="nav-link active">
                    <i class="icon icon-speedometer"></i> Dashboard
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="{{url('/manage-test')}}" class="nav-link nav-dropdown-toggle">
                    <i class="icon icon-target"></i> Test <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{url('/add-test')}}" class="nav-link">
                            <i class="icon icon-target"></i> Add Test
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/manage-test')}}" class="nav-link">
                            <i class="icon icon-target"></i> Manage Test
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="{{url('/manage-doctor')}}" class="nav-link nav-dropdown-toggle">
                    <i class="icon icon-target"></i> Doctors/Ref <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{url('/add-doctor')}}" class="nav-link">
                            <i class="icon icon-target"></i> Add Doctor
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/manage-doctor')}}" class="nav-link">
                            <i class="icon icon-target"></i> Manage Doctor
                        </a>
                    </li>
                </ul>
            </li>

             <li class="nav-item nav-dropdown">
                <a href="{{url('/manage-patient')}}" class="nav-link nav-dropdown-toggle">
                    <i class="icon icon-target"></i> Patient <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{url('/add-patient')}}" class="nav-link">
                            <i class="icon icon-target"></i> Add Patient
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/manage-patient')}}" class="nav-link">
                            <i class="icon icon-target"></i> Manage Patient
                        </a>
                    </li>
                </ul>
            </li>


            </li>



        </ul>
    </nav>
</div>