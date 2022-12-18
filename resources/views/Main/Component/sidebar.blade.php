@if(env('VERSION_LEVEL')==1)
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Alvian</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('home')}}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{route('merge-data')}}">
                <div class="parent-icon"><i class='bx bx-data'></i>
                </div>
                <div class="menu-title">Data</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-scan'></i>
                </div>
                <div class="menu-title">Sensor</div>
            </a>
            <ul>
                <li> <a href="{{route('temperature-index')}}"><i class="bx bx-right-arrow-alt"></i>Suhu</a>
                </li>
                <li> <a href="{{route('humidity-index')}}"><i class="bx bx-right-arrow-alt"></i>Kelembapan</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cog' ></i>
                </div>
                <div class="menu-title">Output</div>
            </a>
            <ul>
                <li> <a href="{{route('lamp-a-index')}}"><i class="bx bx-right-arrow-alt"></i>Lampu A</a>
                </li>
                <li> <a href="{{route('lamp-b-index')}}"><i class="bx bx-right-arrow-alt"></i>Lampu B</a>
                </li>
                <li> <a href="{{route('pump-a-index')}}"><i class="bx bx-right-arrow-alt"></i>Pompa A</a>
                </li>
                <li> <a href="{{route('pump-b-index')}}"><i class="bx bx-right-arrow-alt"></i>Pompa B</a>
                </li>
            </ul>
        </li>
    </ul>
@else
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Alvian</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('home')}}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="{{route('merge-data')}}">
                <div class="parent-icon"><i class='bx bx-data'></i>
                </div>
                <div class="menu-title">Data</div>
            </a>
        </li>

    </ul>

@endif
