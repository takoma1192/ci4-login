<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3　mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3><?php echo $user['firstname']. ' ' . $user['lastname']; ?></h3>
                <hr>

                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo session()->get('success'); ?>
                    </div>
                <?php endif; ?>

                <form action="./profile" method="post" class="">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo set_value('firstname', $user['firstname']); ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo set_value('lastname', $user['lastname']); ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" name="email" id="email" readonly class="form-control" value="<?php echo $user['email']; ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password_confirm">Confirm Password</label>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <?php if(isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $validation->listerrors(); ?>
                            </div>        
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>