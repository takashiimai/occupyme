<?php
    $disp_bank_flg = FALSE;
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-lg-3">
            <?php include("layout_mypage_menu.php"); ?>
        </div>
        <div class="col-12 col-lg-9">
            <div class="row">
                <h4 class="col-12 mt-3">購入履歴</h4>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>購入日時</th>
                            <th>商品名</th>
                            <th>金額</th>
                            <th>代金支払い状況</th>
                            <th>代金支払日</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($items as $item) : ?>
                        <tr>
<?php
    $json = json_decode($item['userinfo'], TRUE);
    $name = '';
    if (isset($json['item_image'])) {
        if (strpos($json['item_image'], 'keyholder') !== FALSE) {
            $name = 'キーホルダー';
        } else if (strpos($json['item_image'], 'badge') !== FALSE) {
            $name = 'カンバッヂ';
        }
    }
    if ($item['pay_flg'] == 0) {
        $disp_bank_flg = TRUE;
    }
?>
                            <td><?= date("Y/m/d H:i", strtotime($item['create_date'])) ?></td>
                            <td><?= $name; ?></td>
                            <td>100,000円</td>
                            <td><?= $item['pay_flg'] == 1 ? '済' : '未'; ?></td>
                            <td><?= $item['pay_flg'] == 1 ? date("Y/m/d", strtotime($item['pay_date'])) : ''; ?></td>
                        </tr>
                    </tbody>
<?php endforeach; ?>
                </table>
<?php if ($disp_bank_flg == TRUE) : ?>
                <h4 class="col-12 mt-3">お振込先銀行</h4>
                <div class="col-12">
                    未払いの購入があります。下記の銀行口座にお支払をお願いいたします。<br>
                    <div class="card fit">
                        <div class="card-body">
                            【振込先】楽天銀行　リズム支店　普通 1600857 イマイタカシ
                        </div>
                    </div>
                </div>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>

