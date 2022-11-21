@include('AdminPanel.layouts.header')

<div class="login-page">
    <div class="login-box">
        <div class="login-logo" style="margin-bottom: 50px">
            <br>
            <span><b>Welcome</b></span>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <form action="{{route('handleLogin')}}" method="POST">
                    @include('AdminPanel.layouts.messages')
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email"  class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-center">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
@include('AdminPanel.layouts.footer')
