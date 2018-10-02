<div class="content">
	<p class="title">게시글 리스트</p>
	<table class="list-table">
		<colgroup>
			<col>
			<col>
			<col>
		</colgroup>
		<thead>
			<tr>
				<th>글번호</th>
				<th>작성자</th>
				<th>글제목</th>
				<th>작성일</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($this->list as $data): ?>
				<tr>
					<td><?php echo $data->idx ?></td>
					<td><?php echo $data->writer ?></td>
					<td><a href="/board/view/<?php echo $data->idx ?>"><?php echo $data->subject ?></a></td>
					<td><?php echo $data->date ?></td>
				</tr>
			<?php endforeach ?>	
		</tbody>
	</table>
	<div class="btn_group">
		<?php if(isset($_SESSION['member'])): ?>
			<a href="/board/writer" class="btn">글작성</a>
		<?php endif ?>
	</div>

</div>