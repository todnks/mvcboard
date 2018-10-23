<div class="mypage">
	<p>회원아이디: <?php echo $_SESSION['member']->id ?></p>
	<p>가입날짜 <?php echo $_SESSION['member']->date ?></p>
	<a href="/member/memberdelete">회원탈퇴</a>
</div>