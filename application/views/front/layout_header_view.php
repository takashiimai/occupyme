<div class="container-fluid">
    <div class="row" style="max-height: 150px !important;">
        <div class="col-1 text-left px-0"><a href="/top"><img class="img-fluid" src="/images/occuptme.png"></a></div>
        <div class="offset-2"></div>
        <div class="col-6 text-center" style="max-height: 150px !important;">
<?php include "ad/adsense_1616161740.php"; ?>
        </div>
        <div class="offset-2"></div>
        <div class="col-1 text-right px-0"><a class="btn btn-primary rounded-0" href="/member/login"><?= isset($login) && $login ? 'マイページ' :  'ログイン'?></a></div>
    </div>
</div>

<script type="text/javascript">

function login() {
    $.Zebra_Dialog('', {
        'message':
' <form class="pure-form pure-form-aligned" action="/affiliate/post" method="POST">' +
'    <fieldset>' +
'        <div class="pure-control-group">' +
'            <label class="pure-input-1-3" for="email">メールアドレス</label>' +
'            <input class="pure-input-2-3" id="email" name="email" placeholder="Email Address" required>' +
'        </div>' +
'        <div class="pure-control-group">' +
'            <label class="pure-input-1-3" for="password">パスワード</label>' +
'            <input class="pure-input-2-3" id="password" name="password" placeholder="Password" required>' +
'        </div>' +
'        <div class="pure-controls">' +
'            <button type="submit" class="pure-button pure-button-primary">送信</button>' +
'        </div>' +
'    </fieldset>' +
'</form>',
        'type':                     false,
        'buttons':                     false,
        'animation_speed_hide':     0 ,
        'animation_speed_show':     0 ,
        'max_height':               200,
        'width':                    650,
        'title':                    'Login Dialog',
    });
}
</script>
