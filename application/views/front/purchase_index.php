<div class="container">
    <div class="row">
        <div class="col-12 col-lg-2">
<?php include "ad/adsense_no1.php" ?>
        </div>

        <div class="col-12 col-lg-8">
            <p class="menuTabLight title mt-5">購入画面</p>
            <div class="text-center">
                <p>
                    下記のフォームを入力し、送信ボタンをクリックしてください。確認画面は表示されません。
                </p>
                <img class="purchase img-responsive img-thumbnail" src="/images/item_<?= $image; ?>">
<?php if (!isset($login) || !$login) : ?>
                <p>
                    なお当システムからメールをお送りしますため<br>「occupy.maitakajp.com ドメイン」<br>からのメールを受信できるようご設定ください。<br>
                <p>
                </p>
                    ※アカウントをお持ちの方は、<a href="/member/login">ログイン</a>してから購入手続きをおこなってください。
                </p>
<?php endif; ?>
            </div>
            <form class="" action="/purchase/post" method="POST">
                <input type="hidden" name="image" value="<?= $image; ?>">
<?php if (!isset($login) || !$login) : ?>
                <div class="form-group row">
                    <label class="col-12 col-lg-4 text-lg-right" for="email">メールアドレス</label>
                    <input class="form-control col-12 col-lg-6" id="email" name="email" value="<?= set_value('email'); ?>" required>
                    <small class="offset-lg-4 form-text text-danger"><?= form_error('email'); ?></small>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-lg-4 text-lg-right" for="password">パスワード</label>
                    <input class="form-control col-12 col-lg-6" id="passwd" name="passwd" value="<?= set_value('passwd'); ?>" required>
                    <small class="offset-lg-4 form-text">※4〜32文字で入力してください</small>
                    <small class="offset-lg-4 form-text text-danger"><?= form_error('passwd'); ?></small>
                </div>
<?php endif; ?>
                <div class="col-12 alert alert-success">
                    送付先情報
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-4 text-lg-right" for="name">名前</label>
                    <input class="form-control col-12 col-lg-6" id="name" name="name" value="<?= set_value('name'); ?>" required>
                    <small class="offset-lg-4 form-text text-danger"><?= form_error('name'); ?></small>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-lg-4 text-lg-right" for="address">住所</label>
                    <input class="form-control col-12 col-lg-6" id="address" name="address" value="<?= set_value('address'); ?>" required>
                    <small class="offset-lg-4 form-text text-danger"><?= form_error('address'); ?></small>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-lg-4 text-lg-right" for="phone">電話番号</label>
                    <input class="form-control col-12 col-lg-6" id="phone" name="phone" value="<?= set_value('phone'); ?>" required>
                    <small class="offset-lg-4 form-text text-danger"><?= form_error('phone'); ?></small>
                </div>

                <div class="form-group row">
                    <div class="col-12 text-center">
                        <input type="submit" class="btn btn-primary col-12 col-lg-3" onClick="disp()" value="送信">
                    </div>
                </div>
            </form>

            <p class="menuTabLight title mt-5">アフィリエイト参加方法</p>
            <div class="card p-3 mb-5">
                <div class="my-1">
                    1. 上記のフォームを送信しますと、購入手続きが完了します。マイページにてあなた専用のアフィリエイト用リンクタグが生成されます。<br>
                    ※ご入金が完了するまではリンク会員としてアフィリエイトにご参加いただけます。
                </div>
                <div class="my-1">
                    2. アフィリエイト用リンクタグをTwitterやFacebook、ブログや掲示板に投稿してください。
                </div>
                <div class="my-1">
                    3. アフィリエイト用リンクタグ経由でオリジナルグッズが販売されますと成果報酬となります。なお、リンク会員の場合、成果報酬は10,000円となります。
                </div>
            </div>

            <div class="text-center mb-5">
<?php include "ad/adsense_no1.php" ?>
            </div>
        </div>
        <div class="col-12 col-lg-2">
<?php include "ad/adsense_no1.php" ?>
        </div>
    </div>
</div>

<script type="text/javascript">
<!--

function disp(){

	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if (window.confirm('入力した内容で送信します')) {
	    return true;
	} else {
		window.alert('キャンセルしました');
        return false;
	}
}

// -->
</script>

