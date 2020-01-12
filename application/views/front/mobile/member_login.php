<div>
<?php if (isset($success) && strlen($success)): ?>
<div class="success"><?= $success; ?></div>
<?php elseif (isset($error) && strlen($error)): ?>
<div class="error"><?= $error; ?></div>
<?php endif; ?>
</div>

<div>
<form class="pure-form pure-form-aligned " action="/member/login" method="POST">
    <fieldset>
    <legend>ログインフォーム</legend>
        <div class="pure-control-group">
            <label for="email">メールアドレス</label>
            <input class="pure-input-1-2" id="email" name="email" value="<?= $post['email']; ?>" placeholder="" required>
        </div>

        <div class="pure-control-group">
            <label for="password">パスワード</label>
            <input class="pure-input-1-2" id="password" name="password" placeholder="" required>
        </div>

        <div class="pure-control-group">
            <button type="submit" class="pure-button pure-button-primary pure-input-1-2">送信</button>
        </div>
    </fieldset>
</form>
</div>


