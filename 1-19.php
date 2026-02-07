<?php
/**
 * セクション1 テスト 1-19：価格配列に税をかけて合計（filter→map→sum）
 *
 * やること
 *  - 関数 sumWithTax(array $prices, float $tax): int を作る
 *  - 数値変換できるものだけ対象
 *  - 各要素に (1+$tax) を掛けて 四捨五入 → 合計 を int で返す
 *  - 丸めは 各要素ごと に行う
 *
 * テスト例
 *  echo sumWithTax([100, "200", "x", 50], 0.1);
 *  期待: 385 （110 + 220 + 55）
 *
 * 実行方法
 *  - php 1-19.php
 */
// ここから実装してください

//わからなくて調べたら便利関数みたいなのがあったので使いました
function sumWithTax(array $prices, float $tax): int {
    // 数値だけ抽出
    $nums = array_filter($prices, 'is_numeric');

    // 税込みにして四捨五入（配列の中身すべてに対して行う！！forいらず！）
    $numsWithTax = array_map(function($x) use ($tax) {
        return round($x * (1 + $tax));
    }, $nums);

    // キャスト
    return (int) array_sum($numsWithTax);
}

echo sumWithTax([100, "200", "x", 50], 0.1);