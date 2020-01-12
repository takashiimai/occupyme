<div class="sp-title">
会員登録
</div>

<div pure-u-1-1" style="text-align:left">

メールアドレスとパスワードを入力してください。<br>
<br>

<form class="pure-form pure-form-stacked" action="/affiliate/post" method="POST">
    <fieldset>
        <div class="pure-control-group">
            <label for="email">メールアドレス</label>
            <input class="pure-input-1" id="email" name="email"  value="<?= set_value('email'); ?>" required>
            <span style="color:#ff0000"><?= form_error('email'); ?></span>
        </div>

        <div class="pure-control-group">
            <label for="password">パスワード</label>
            <input class="pure-input-1" id="passwd" name="passwd" value="<?= set_value('passwd'); ?>" required>
            <span style="color:#ff0000"><?= form_error('passwd'); ?></span>
        </div>

        <div class="pure-control-group" style="margin-top:30px">
            <label for="option-one" class="pure-radio">
                <input  id="option-one" type="radio" name="dummy" value="VIP" <?= strlen($this->session->userdata('buy_auth')) ? 'checked' : 'disabled'; ?>> VIP会員（報酬1件につき10,000円）
            </label>
            <label for="option-two" class="pure-radio">
                <input id="option-two" type="radio" name="dummy" value="一般" <?= strlen($this->session->userdata('buy_auth')) ? 'disabled' : 'checked'; ?>> 一般会員（報酬1件につき2,0000円）
            </label>
        </div>


<div style="font-size:14px; color:#ff0000; margin:30px 0 15px 0">
※VIP会員での登録にはOccupyMeグッズの購入が必要です。<br>
※ブラウザおよびブラウザ設定によっては、商品を購入いただいてもVIP会員が選択できない場合がございます。<br>
　その場合は、下記に購入時のお名前を入力してください。<br>
</div>

        <div class="pure-control-group">
            <label for="email">購入時のお名前</label>
            <input class="pure-input-1" id="email" name="name"  value="">
            <span style="color:#ff0000"><?= form_error('name'); ?></span>
        </div>

        <div class="pure-control-group">
            <button type="submit" class="pure-button pure-button-primary pure-input-1-2" onClick="disp()">送信</button>
        </div>
    </fieldset>
</form>
</div>

<br><br>

<div class="sp-title">
ご注意
</div>

<ul style="text-align:left">
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

