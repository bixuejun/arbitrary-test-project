<?php

include 'functions.php';

$sphinx = new SphinxClient();
$sphinx->setServer("localhost", 9312);
$sphinx->setMatchMode(SPH_MATCH_ANY); // 匹配模式 ANY为关键词自动拆词，ALL为不拆词匹配（完全匹配）
$sphinx->SetArrayResult(true); // 返回的结果集为数组
$result = $sphinx->query("test", "*"); // 星号为所有索引源
$count = $result['total']; // 查到的结果条数
$time = $result['time']; // 耗时
$arr = $result['matches']; // 结果集
$id = '';
for ($i = 0; $i < $count; $i ++) {
    $id .= $arr[$i]['id'] . ',';
}
$id = substr($id, 0, - 1);			//结果集的id字符串

dump($result);
var_dump($id);