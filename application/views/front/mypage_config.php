<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-lg-3">
            <?php include("layout_mypage_menu.php"); ?>
        </div>
        <div class="col-12 col-lg-9">
<?php if (isset($success) && strlen($success)): ?>
            <div class="col-12">
                <div class="alert alert-success"><?= $success; ?></div>
            </div>
<?php elseif (isset($error) && strlen($error)): ?>
            <div class="col-12">
                <div class="alert alert-danger"><?= $error; ?></div>
            </div>
<?php endif; ?>

<form class="" action="/mypage/config" method="POST">
    <input type="hidden" name="mode" value="regist">
    <input type="hidden" name="id" value="<?= $post['id']; ?>">
        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="email">メールアドレス<span class="badge badge-danger">必須</span></label>
            <input class="form-control col-12 col-lg-6" id="email" name="email" placeholder="例）example@maitaka.com"  value="<?= $post['email']; ?>" required>
            <small class="offset-lg-3 form-text text-danger"><?= form_error('email'); ?></small>
        </div>

        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="password">パスワード<span class="badge badge-danger">必須</span></label>
            <input class="form-control col-12 col-lg-4" type="password" id="passwd" name="passwd"  value="<?= $post['passwd']; ?>" required>
            <small class="offset-lg-3 form-text text-danger"><?= form_error('passwd'); ?></small>
        </div>

        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="type">会員タイプ</label>
            <input class="form-control col-12 col-lg-4" id="type" name="dummy" value="<?= 1 == $post['member_type'] ? 'VIP会員' : 'リンク会員'; ?>" readonly>
        </div>

        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="bank">銀行名</label>
            <input class="form-control col-12 col-lg-6" id="bank" name="bank" placeholder="例）三菱東京UFJ銀行"  value="<?= $post['bank']; ?>">
            <small class="offset-lg-3 form-text text-danger"><?= form_error('bank'); ?></small>
        </div>

<?php /* ?>
        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="bank_kana">銀行名（ひらがな）</label>
            <input class="form-control col-12 col-lg-6" id="bank_kana" name="bank_kana" placeholder="例）みつびしとうきょうゆーえふじぇいぎんこう"  value="<?= $post['bank_kana']; ?>">
            <small class="offset-lg-3 form-text text-danger"><?= form_error('bank_kana'); ?></small>
        </div>
<?php */ ?>

        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="branch">支店名</label>
            <input class="form-control col-12 col-lg-6" id="branch" name="branch" placeholder="例）青山支店"  value="<?= $post['branch']; ?>">
            <small class="offset-lg-3 form-text text-danger"><?= form_error('branch'); ?></small>
        </div>

<?php /* ?>
        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="branch_kana">支店名（ひらがな）</label>
            <input class="form-control col-12 col-lg-6" id="branch_kana" name="branch_kana" placeholder="例）あおやましてん"  value="<?= $post['branch_kana']; ?>">
            <small class="offset-lg-3 form-text text-danger"><?= form_error('branch_kana'); ?></small>
        </div>
<?php */ ?>

        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="account_type">預金種別</label>
            <input class="form-control col-12 col-lg-4" id="account_type" name="account_type" placeholder="例）普通預金"  value="<?= $post['account_type']; ?>">
            <small class="offset-lg-3 form-text text-danger"><?= form_error('account_type'); ?></small>
        </div>

        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="account">口座番号</label>
            <input class="form-control col-12 col-lg-4" id="account" name="account" placeholder="例）1234567"  value="<?= $post['account']; ?>">
            <small class="offset-lg-3 form-text text-danger"><?= form_error('account'); ?></small>
        </div>

        <div class="form-group row">
            <label class="col-12 col-lg-3 text-lg-right" for="name">名義(カタカナ)</label>
            <input class="form-control col-12 col-lg-4" id="name" name="name" placeholder="例）山田太郎"  value="<?= $post['name']; ?>">
            <small class="offset-lg-3 form-text text-danger"><?= form_error('name'); ?></small>
        </div>

        <div class="pure-controls">
            <button type="submit" class="btn btn-primary" onClick="disp()">変更する</button>
        </div>
    </fieldset>
</form>


    </div>
    <div class="pure-u-1-12"></div>
</div>
