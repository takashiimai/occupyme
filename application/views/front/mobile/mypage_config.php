<br>

<?php include("layout_mypage_menu.php"); ?>

<div pure-u-1-1" style="text-align:left">

<?php if (isset($success) && strlen($success)): ?>
<div class="success" style="max-width:90%"><?= $success; ?></div>
<?php elseif (isset($error) && strlen($error)): ?>
<div class="error" style="width:80% !important"><?= $error; ?></div>
<?php endif; ?>

<form class="pure-form pure-form-stacked" action="/mypage/config" method="POST">
    <input type="hidden" name="mode" value="regist">
    <input type="hidden" name="id" value="<?= $post['id']; ?>">
    <fieldset>
        <div class="pure-control-group">
            <label for="email">メールアドレス<span style="color:#ff0000">(*)</span></label>
            <input class="pure-input-1" id="email" name="email" placeholder="例）foo@example.co.jp"  value="<?= $post['email']; ?>" required>
            <div style="color:#ff0000; width:80% !important"><?= form_error('email'); ?></div>
        </div>

        <div class="pure-control-group">
            <label for="password">パスワード<span style="color:#ff0000">(*)</span></label>
            <input class="pure-input-1" type="password" id="passwd" name="passwd"  value="<?= $post['passwd']; ?>" required>
            <span style="color:#ff0000; width:80% !important"><?= form_error('passwd'); ?></span>
        </div>

        <div class="pure-control-group">
            <label for="type">アフィリエイトタイプ</label>
            <input id="type" name="dummy" value="<?= 1 == $post['vip_flg'] ? 'VIP' : '一般'; ?>" readonly>
        </div>

        <div class="pure-control-group">
            <label for="bank">銀行名</label>
            <input class="pure-input-1" id="bank" name="bank" placeholder="例）三菱東京UFJ銀行"  value="<?= $post['bank']; ?>">
            <span style="color:#ff0000"><?= form_error('bank'); ?></span>
        </div>

        <div class="pure-control-group">
            <label for="bank_kana">銀行名（ひらがな）</label>
            <input class="pure-input-1" id="bank_kana" name="bank_kana" placeholder="例）みつびしとうきょうゆーえふじぇいぎんこう"  value="<?= $post['bank_kana']; ?>">
            <span style="color:#ff0000"><?= form_error('bank_kana'); ?></span>
        </div>

        <div class="pure-control-group">
            <label for="branch">支店名</label>
            <input class="pure-input-1" id="branch" name="branch" placeholder="例）青山支店"  value="<?= $post['branch']; ?>">
            <span style="color:#ff0000"><?= form_error('branch'); ?></span>
        </div>

        <div class="pure-control-group">
            <label for="branch_kana">支店名（ひらがな）</label>
            <input class="pure-input-1" id="branch_kana" name="branch_kana" placeholder="例）あおやましてん"  value="<?= $post['branch_kana']; ?>">
            <span style="color:#ff0000"><?= form_error('branch_kana'); ?></span>
        </div>

        <div class="pure-control-group">
            <label for="account_type">預金種別</label>
            <input class="pure-input-1" id="account_type" name="account_type" placeholder="例）普通預金"  value="<?= $post['account_type']; ?>">
            <span style="color:#ff0000"><?= form_error('account_type'); ?></span>
        </div>

        <div class="pure-control-group">
            <label for="account">口座番号</label>
            <input class="pure-input-1" id="account" name="account" placeholder="例）1234567"  value="<?= $post['account']; ?>">
            <span style="color:#ff0000"><?= form_error('account'); ?></span>
        </div>

        <div class="pure-control-group">
            <button type="submit" class="pure-button pure-button-primary pure-input-1-2" onClick="disp()">情報変更</button>
        </div>
    </fieldset>
</form>



</div>

