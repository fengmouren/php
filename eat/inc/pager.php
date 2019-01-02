<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php' ;
function pager_query($sql,&$nav_html,$page_current=1, $page_size=7){
	//全局变量与局部变量的区别
	global $db;
	$sql_amount = 'select count(*) as amount  ' . substr($sql, strpos($sql,'from' ) ) ;
	//计算总记录数
	$row_amount = $db->query($sql_amount)->fetchObject()->amount;
	//计算总页数	
	$page_amount = ceil($row_amount / $page_size);
	//当未指定页号，或者页号错误时	
	if (empty($page_current) || $page_current < 1) $page_current = 1;
	if ($page_current > $page_amount && $page_amount > 0 ) $page_current = $page_amount;
	//生成上一页、下一页
	if($page_current <= 1 )
	  $page_previous = 1 ;
	else
	  $page_previous = $page_current - 1;
	if($page_current >= $page_amount )
	  $page_next = $page_amount ;
	else
	  $page_next = $page_current + 1 ;
	//计算返回纪录的起点与记录数
	$row_base= ($page_current-1) * $page_size;
	$page_sql = " LIMIT {$page_size} OFFSET {$row_base}";
	$sql = $sql .  $page_sql;
	//echo $sql;
	$query_str = "{$_SERVER['SCRIPT_NAME']}?" ;
	//as $_GET or $_POST
	$params = $_REQUEST;
	if ($page_amount==0) {
		$page_amount=1;
		$page_first=1;
		$page_previous=1;
		$page_next=1;
		$page_last=1;
	}
	$params['page'] = 1;
	$page_first_q =  $query_str . http_build_query($params);
	$params['page'] = $page_previous;
	$page_previous_q = $query_str . http_build_query($params);
	$params['page'] = $page_next;
	$page_next_q =  $query_str . http_build_query($params);
	$params['page'] = $page_amount;
	$page_last_q =  $query_str . http_build_query($params);
	$nav_html = <<<EOT
  <div id="pager">
    <span>当前 第 $page_current 页 </span>
    <span>总共 $page_amount 页</span> 
    <br>
    <a href="$page_first_q" style="text-decoration:none;">首页</a>
    <a href="$page_previous_q" style="text-decoration:none;">上一页</a>
    <a href="$page_next_q" style="text-decoration:none;">下一页</a>    
    <a href="$page_last_q" style="text-decoration:none;">末页</a>
  </div>
EOT;
	return array("nav_html"=>$nav_html,"sql"=>$sql, "page_current"=>$page_current);
}
?>