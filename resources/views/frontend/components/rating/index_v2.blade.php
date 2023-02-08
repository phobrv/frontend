<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@if($data['contents'])
<div id="comment_area" class="mt-4">
    <ul>
        @foreach ($data['contents'] as $comment)
            <li>
                <div class="left">
                    <div class="avatar">
                        @include('svg.person_svg')
                    </div>
                    <div class="name">{{ $comment->name ?? '' }}</div>
                </div>
                <div class="right">
                    <div class="comment">
                        {{ $comment->content ?? '' }}
                    </div>
                    @include('phobrv::frontend.components.rating.ratingShow', ['rating' => $content->rating ?? 5])
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endif
<div id="report_area" class="row mt-5">
    <div class="col-md-5">
        <form id="formRating" action="{{ route('api.ratingv2') }}">
            <input type="hidden" name="post_id" value="{{ $data['post_id'] }}">
            <div class="rtitle mb-3">Để lại đánh giá của bạn</div>
            <ul class="star-rating mb-3">
                <li class="me-3">Đánh giá:</li>
                <li>
                    @include('phobrv::frontend.components.rating.starInput')
                </li>
            </ul>
            <div class="form-group mb-2">
                <input type="text" class="input-group" name="name" required placeholder="Tên của bạn">
            </div>
            <div class="form-group mb-2">
                <textarea class="input-group" rows="3" name="content" required placeholder="Đánh giá của bạn"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" id="ratingSubmit">Gửi đánh giá</button>
                <p id="confirm" style="color: green; display:none;"> Cảm ơn bạn đã đánh giá </p>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <div class="row report-area">
            <div class="col-md-4 report-medium">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <div class="title mb-4">
                        Đánh giá trung bình
                    </div>
                    <div class="number mb-4">
                        {{ $data['medium'] ?? 5 }}
                    </div>
                    @include('phobrv::frontend.components.rating.ratingShow', ['rating' => 5, 'disabled' => 'disabled'])
                    <div class="total">({{ $data['number'] ?? 1 }} đánh giá)</div>
                </div>
            </div>
            <div class="col-md-8 ">
                @include('phobrv::frontend.components.rating.reportDetail', ['data' => $data])
            </div>
        </div>
    </div>
</div>
