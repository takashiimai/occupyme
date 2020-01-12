<div class="container-fluid">
    <div class="row">
        <div class="col-12" style="background-color:#80dec0; padding:10px 10px 10px 10px; font-size:20px; margin-bottom:20px ">
            <span class="ml-5">ログイン</span>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="offset-lg-2 col-12 col-lg-8">
<?php if (isset($success) && strlen($success)): ?>
            <div class="alert alert-success"><?= $success; ?></div>
<?php elseif (isset($error) && strlen($error)): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
<?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="offset-lg-2 col-12 col-lg-6">
            <form class="" action="/member/login" method="POST">
                <div class="form-group row">
                    <label class="col-12 col-lg-3 col-form-label text-right">メールアドレス</label>
                    <div class="col-12 col-lg-9">
                        <input class="form-control" type="text" id="email" name="email" value="<?= $post['email']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-3 col-form-label text-right">パスワード</label>
                    <div class="col-12 col-lg-9">
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                </div>
                <button type="submit" class="col-12 offset-lg-3 col-lg-6 btn btn-primary">送信</button>
            </form>
        </div>
    </div>
</div>
