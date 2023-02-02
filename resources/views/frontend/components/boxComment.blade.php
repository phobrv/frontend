<div class="box-comment">
	<div style="font-size: 25px; font-weight: bold;">Bình luận</div>
	<input type="hidden" id="post_id" name="post_id" value="{{ $data['post']->id }}">
	<div id="commentList">
	
	</div>
	<div id="commentBody">
		<div class="row">
			<input type="hidden" name="url" id="url" value="{{$fullUrlNoQuery}}">
			<input type="hidden" name="parent" id="parent" value="0">
			<div class="col-12">
				<div class="form-group mb-3">
					<textarea name="content" id="content" class="content form-control" placeholder="Nội dung bình luận" rows="5"></textarea>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group mb-3">
					<input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group mb-3">
					<input type="number" class="form-control" name="phone" id="phone" placeholder="Số điện thoại">
				</div>
			</div>
			<div class="col-6">
				<button id="btn_cmnt">Gửi bình luận</button>
			</div>
			<div class="col-6">
				<button id="close_cmt" style="float: right;display: none;">Hủy bình luận</button>
			</div>
		</div>
	
	</div>
</div>

