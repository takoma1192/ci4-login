<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3　mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3>Login</h3>
                <hr>
                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo session()->get('success'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>" method="post" class="">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="">
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">ログイン</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="<?php echo base_url('/users/register'); ?>">アカウントを持っていない場合</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>