<div class="modal fade" id="modalCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                @include('phont::frontend.page.checkout.table_short', ['data' => $data])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="/checkout"  class="btn btn-primary">Tiến hành thanh toán @include('svg.arrow3') </a>
            </div>
        </div>
    </div>
</div>
