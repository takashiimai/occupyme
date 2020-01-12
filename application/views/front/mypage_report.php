<br>
<div class="pure-g">
    <div class="pure-u-1-12"></div>

    <div class="pure-u-1-6">
        <?php include("layout_mypage_menu.php"); ?>
    </div>

    <div class="pure-u-2-3" style="margin-left:50px; text-align:left">

        <div>
            <form  class="pure-form" method="post">

            <select name="year">
            <?php
                if ($this->input->post('year') > 0) {
                    $selected = $this->input->post('year');
                } else {
                    $selected = date("m");
                }
                for ($year = 2014; $year <= date("Y"); $year++) {
                    echo sprintf('<option value="%s" %s>%s年</option>', $year, $year == $selected ? 'selected' : '', $year);
                }
            ?>
            </select>

            <select name="month">
            <?php
                if ($this->input->post('month') > 0) {
                    $selected = $this->input->post('month');
                } else {
                    $selected = date("m");
                }
                for ($month = 1; $month <= 12; $month++) {
                    echo sprintf('<option value="%s" %s>%s月</option>', $month, $month == $selected ? 'selected' : '', $month);
                }
            ?>
            </select>

            <button type="submit" class="pure-button pure-button-primary">送信</button>

            </form>
        </div>

 <?php if ($this->input->post('month') > 0): ?>

        <div style="margin-top:20px">
            <div style="margin-bottom:10px">
                ■月次レポート
            </div>
            <table class="pure-table pure-table-bordered">
                <thead>
                    <tr>
                        <th>アフィリエイトページ<br>アクセス件数（当月）</th>
                        <th>成約件数（当月）</th>
                        <th>報酬（当月）</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:right;"><?= $access; ?>件</td>
                        <td style="text-align:right;"><?= $purchase_normal + $purchase_vip; ?>件</td>
                        <td style="text-align:right;"><?= $purchase_normal * 2000 + $purchase_vip * 10000; ?>円</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top:20px">
            <div style="margin-bottom:10px">
                ■総合レポート
            </div>
            <table class="pure-table pure-table-bordered">
                <thead>
                    <tr>
                        <th>アフィリエイトページ<br>アクセス件数（累計）</th>
                        <th>成約件数（累計）</th>
                        <th>報酬（累計）</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:right;"><?= $total_access; ?>件</td>
                        <td style="text-align:right;"><?= $purchase_total_normal + $purchase_total_vip; ?>件</td>
                        <td style="text-align:right;"><?= $purchase_total_normal * 2000 + $purchase_total_vip * 10000; ?>円</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top:20px">
            <div style="margin-bottom:10px">
                ■出金可能額
            </div>
            <form action="/mypage/request" method="post">
            <table class="pure-table pure-table-bordered">
                <tbody>
                    <tr>
                        <td style="text-align:right;"><?= $payable_normal * 2000 + $payable_vip * 10000; ?>円</td>
                        <td style="text-align:right;"><button type="submit" class="pure-button pure-button-primary" <?= ($request == TRUE || $payable_normal * 2000 + $payable_vip * 10000 < 30000) ? 'disabled' : '' ?>>出金依頼</button></td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>

        <div style="margin-top:20px">
            <div style="margin-bottom:10px">
                ■出金依頼中額
            </div>
            <table class="pure-table pure-table-bordered">
                <tbody>
                    <tr>
                        <td style="text-align:right;"><?= $requestpay_normal * 2000 + $requestpay_vip * 10000; ?>円</td>
                    </tr>
                </tbody>
            </table>
        </div>
 <?php endif; ?>

    </div>
    <div class="pure-u-1-12"></div>
</div>

