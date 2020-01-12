<div class="pure-g">

    <div class="pure-u-1-12"></div>

    <div class="pure-u-4-5">

<div class="pure-controls pure-u-3-5" style="background-color:#80dec0; padding:10px 10px 10px 10px; font-size:20px; margin-bottom:20px ">
    ログイン
</div>

<div>
<?php if (isset($success) && strlen($success)): ?>
<div class="pure-u-2-5 success"><?= $success; ?></div>
<?php elseif (isset($error) && strlen($error)): ?>
<div class="pure-u-2-5 error"><?= $error; ?></div>
<?php endif; ?>
</div>

<form class="pure-form pure-form-aligned" action="/member/login" method="POST">
    <fieldset>
        <div class="pure-control-group">
            <input class="pure-input-1-3" id="email" name="email" value="<?= $post['email']; ?>" placeholder="メールアドレス" required>
        </div>
        <div class="pure-control-group">
            <input class="pure-input-1-3" id="password" name="password" placeholder="パスワード" required>
        </div>
    </fieldset>
    <button type="submit" class="pure-button pure-button-primary pure-u-1-4">送信</button>
</form>

    </div>
    <div class="pure-u-1-12"></div>

</div>
