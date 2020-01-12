<p class="menuTabLight" style="font-size:26px; text-align:left;">会員登録</p>

メールアドレスとパスワードを入力してください。<br>
<br>

<form class="pure-form pure-form-aligned" action="/affiliate/post" method="POST">
    <fieldset>
        <div class="pure-control-group">
            <label class="pure-input-1-3" for="email">メールアドレス</label>
            <input class="pure-input-1-3" id="email" name="email" value="<?= set_value('email'); ?>" required>
            <span style="color:#ff0000"><?= form_error('email'); ?></span>
        </div>

        <div class="pure-control-group">
            <label for="password">パスワード</label>
            <input class="pure-input-1-3" id="passwd" name="passwd" value="<?= set_value('passwd'); ?>" required>
            <span style="color:#ff0000"><?= form_error('passwd'); ?></span>
        </div>

        <div class="pure-control-group">
            <label for="option-one" class="pure-radio">
                <input  id="option-one" type="radio" name="dummy" value="VIP" <?= strlen($this->session->userdata('buy_auth')) ? 'checked' : 'disabled'; ?>> VIP会員（報酬1件につき10,000円）
            </label>
            <label for="option-two" class="pure-radio">
                <input id="option-two" type="radio" name="dummy" value="一般" <?= strlen($this->session->userdata('buy_auth')) ? 'disabled' : 'checked'; ?>> 一般会員（報酬1件につき2,000円）
            </label>
        </div>

<div style="font-size:10px; color:#ff0000; margin:30px 0 30px 0">
※VIP会員での登録にはOccupyMeグッズの購入が必要です。<br>
※ブラウザおよびブラウザ設定によっては、商品を購入いただいてもVIP会員が選択できない場合がございます。<br>
　その場合は、下記に購入時のお名前を入力してください。<br>
</div>

        <div class="pure-control-group">
            <label class="pure-input-1-3" for="email">購入時のお名前</label>
            <input class="pure-input-1-3" id="email" name="name"  value="">
            <span style="color:#ff0000"><?= form_error('name'); ?></span>
        </div>

        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary" onClick="disp()">送信</button>
        </div>
    </fieldset>
</form>

<br><br>

<p class="menuTabLight" style="font-size:26px; text-align:left;">ご注意</p>

<ul style="text-align:left; margin:0 0 0 50px;">
  <li>会員タイプには「一般会員」と「VIP会員」の2種類がございます。</li>
  <li>会員タイプ「一般会員」は、成果報酬は1件あたり2,000円となります。</li>
  <li>会員タイプ「VIP会員」は、Occupy Me グッズを購入いただいた方が対象となり、成果報酬は1件あたり10,000円となります。</li>
</ul>

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

