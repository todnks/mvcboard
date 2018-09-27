<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>게시판</title>
</head>
<body>
	<header>
		<nav>
			<ul class="item_list">
				<a href="/">홈</a>
				<?php if(!isset($_SESSION['member'])): ?>
				<li class="list"><a href="/member/login">로그인</a></li>
				<li class="list"><a href="/member/join">회원가입</a></li>
				<?php else: ?>
				<li class="list"><a href="/member/logout">로그아웃</a></li>
				<li class="list"><a href="">마이페이지</a></li>
			<?php endif ?>
			</ul>
		</nav>
	</header>