<form action="" method="post">
	<input type="hidden" name="action" value="write">
	<input type="text" name="writer" value="<?php echo $_SESSION['member']->name ?>" readonly>
	<input type="text" name="subject" placeholder="제목">
	<input type="text" name="content" placeholder="글내용">
	<button type="submit">글쓰기</button>
</form>