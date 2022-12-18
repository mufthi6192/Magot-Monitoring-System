<div class="card">
    <div class="card-body">
        <div class="p-4 rounded">
            <div class="text-center">
                <h3 class="">Halaman Masuk</h3>
                <p>Silahkan masuk menggunakan akun anda</a>
                </p>
            </div>

            <div class="login-separater text-center mb-4"> <span>Gunakan Email atau Username</span>
                <hr/>
            </div>
            <div class="form-body">
                <form class="row g-3" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="col-12">
                        <label for="email" class="form-label">Email or Username</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Gunakan Email atau Username" required>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control border-end-0" name="password" id="password" placeholder="Gunakan Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Masuk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
