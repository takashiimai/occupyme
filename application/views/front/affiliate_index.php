<div class="container">
    <div class="row">

        <div class="col-12 col-lg-2">
<?php include "ad/adsense_no1.php" ?>
        </div>

        <div class="col-12 col-lg-8">
            <p class="menuTabLight title mt-5">リンク会員登録</p>
            <div class="text-center my-3">
                メールアドレスとパスワードを入力してください。<br>
                なお当システムからメールをお送りしますため<br>「occupy.maitakajp.com ドメイン」<br>からのメールを受信できるようご設定ください。
            </div>

            <form class="" action="/affiliate/post" method="POST">
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
                <div class="form-group row">
                    <div class="col-12 text-center">
                        <input type="submit" class="btn btn-primary col-12 col-lg-3" onClick="disp()" value="送信">
                    </div>
                </div>
            </form>

            <p class="menuTabLight title mt-5">アフィリエイト参加方法</p>
            <div class="card p-3">
                <div class="my-1">
                    1. 上記のフォームより会員登録が完了しますと、あなた専用のアフィリエイト用リンクタグが生成されます。
                </div>
                <div class="my-1">
                    2. アフィリエイト用リンクタグをTwitterやFacebook、ブログや掲示板に投稿してください。
                </div>
                <div class="my-1">
                    3. アフィリエイト用リンクタグ経由でオリジナルグッズが販売されますと成果報酬となります。なお、リンク会員の場合、成果報酬は10,000円となります。
                </div>
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

