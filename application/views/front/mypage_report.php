<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-lg-3">
            <?php include("layout_mypage_menu.php"); ?>
        </div>
        <div class="col-12 col-lg-9">
            <form class="form-inline" method="post">
                <select class="custom-select col-3" name="year">
<?php
                if ($this->input->post('year') > 0) {
                    $selected = $this->input->post('year');
                } else {
                    $selected = date("m");
                }
                for ($year = 2020; $year <= date("Y"); $year++) {
                    echo sprintf('<option value="%s" %s>%s年</option>', $year, $year == $selected ? 'selected' : '', $year);
                }
?>
                </select>

                <select class="custom-select col-3" name="month">
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

                <button type="submit" class="btn btn-primary">送信</button>

            </form>

            <div class="row">
                <h4 class="col-12 mt-3">月次レポート</h4>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>アフィリエイトページ<br>アクセス件数（当月）</th>
                            <th>成約件数（当月）</th>
                            <th>報酬（当月）</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $access; ?>件</td>
                            <td><?= $purchase_normal + $purchase_vip; ?>件</td>
                            <td><?= $purchase_normal * 10000 + $purchase_vip * 50000; ?>円</td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="col-12 mt-3">総合レポート</h4>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>アフィリエイトページ<br>アクセス件数（累計）</th>
                            <th>成約件数（累計）</th>
                            <th>報酬（累計）</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $total_access; ?>件</td>
                            <td><?= $purchase_total_normal + $purchase_total_vip; ?>件</td>
                            <td><?= $purchase_total_normal * 10000 + $purchase_total_vip * 50000; ?>円</td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="col-12 mt-3">出金可能額</h4>
                <table class="table table-sm">
                    <tbody>
                        <form action="/mypage/request" method="post">
                            <tr>
                                <td class="text-right">
                                    <?= $payable_normal * 10000 + $payable_vip * 50000; ?>円
                                    <input type="submit" class="btn btn-primary" <?= ($request || $payable_normal * 10000 + $payable_vip * 50000 < 50000) ? 'disabled' : '' ?> value="出金依頼">
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
<?php if ($request || $payable_normal * 10000 + $payable_vip * 50000 < 50000) : ?>
                <div class="col-12 text-right">
                    <small class="text-danger">※出金依頼中もしくは出金可能額に満たないため、出金依頼することができません</small>
                </div>
<?php endif; ?>

                <h4 class="col-12 mt-3">出金依頼中金額</h4>
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td class="text-right">
                                <?= $request['request_money']; ?>円（出金依頼日：<?= date('Y/m/d', strtotime($request['request_date'])); ?>）
                            </td>
                        </tr>
                    </tbody>
                </table>
<?php if ($request) : ?>
                <div class="col-12 text-right">
                    <small class="text-danger">※翌月末までのお支払となります</small>
                </div>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>

