<br>
<div class="pure-g">
    <div class="pure-u-1-12"></div>

    <div class="pure-u-1-6">
        <?php include("layout_mypage_menu.php"); ?>
    </div>

    <div class="pure-u-2-3" style="margin-left:50px; text-align:left">

<?php if (isset($success) && strlen($success)): ?>
<div class="success"><?= $success; ?></div>
<?php elseif (isset($error) && strlen($error)): ?>
<div class="error"><?= $error; ?></div>
<?php endif; ?>

<br><br><br>

<p class="menuTabLight" style="font-size:26px; text-align:left;">ご注意</p>

<ul style="text-align:left; margin:0 0 0 20px;">
  <li>出金処理は翌月の15日前後となる予定です。</li>
  <li>出金の際、振込手数料その他事務手数料(合計1000円)を控除させていただきます。</li>
  <li>登録いただいた銀行口座に誤りがあった場合、上記手数料は返還できません。</li>
</ul>

    </div>
    <div class="pure-u-1-12"></div>
</div>
