<!--Newsletter-->
<section class="newsletter">
    <div class="container">
        <div class="row py-3">
            <h4 class="col-md-6 text-center font-weight-normal">Đăng ký để nhận tin</h4>
            <form action="{{ route('newsletter') }}" method="get" class="col-md-6 form-inline">
                <input id="form-control" name="email" class="form-control col-md-7 col-7" type="text" placeholder="Email của bạn..." aria-label="Đăng ký">
                <button id="btnsub" class="btn btn-outline-success text-uppercase px-3" type="submit">Đăng ký</button>
            </form>
        </div>
    </div>
</section>
<!--Newletter-->
