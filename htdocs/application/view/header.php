<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>게시판</title>
</head>
<body>
	<a href="/">홈</a>
	<?php if(isset($_SESSION['member'])): ?>
		<a href="/member/logout">로그아웃</a>
		<a href="/member/mypage">마이페이지</a>
		<p><?php echo $_SESSION['member']->name ?></p>
		<a href="/board/write">글쓰기</a>
	<?php else: ?>
		<a href="/member/login">로그인</a>
		<a href="/member/join">회원가입</a>
	<?php endif ?>