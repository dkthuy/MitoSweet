// Giới hạn chuỗi nội dung hiện ra màn hình
$('.compact').each(function (f) {
    var newstr = $(this).text();
    if (newstr.length >= 25) {
        newstr = newstr.substring(0,25);
        $(this).text(newstr + '...');
    }else{
        $(this).text(newstr);
    }
});

//popup
function openModal(){
    $('#addModal').modal('show');
}

// load page
$('.reload').click(function() {
    location.reload();
})

// search
$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search-body tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

// thêm video
/* <input class="form-control" name="name-video" placeholder="Tên video..."></input>
<a class="deletevideo" type="button" style="color:2e1503; cursor: pointer;">Xóa</a>*/
$('.add-video').click(function(){
    let a ='';
    a += `  <div class="video">
                <textarea class="form-control" name="video[]" placeholder="Đường link video..."></textarea>
                <hr>
            </div>`;
    $('.form-add-video').append(a);
    // $('.deletevideo').click(function(){
    //     $('.video').remove();
    // })
})

// show xóa nhiều trường
$('.btn-del-show').click(function(){
    if ($('.btn-gr').hasClass('d-none')){
        $('.btn-gr').removeClass('d-none');
    }else{
        $('.btn-gr').addClass('d-none');
    }
})

// chọn nhiều trg để xóa
$("#checkAll").click(function () {
    $(".check").not(this).prop('checked', this.checked);
});

// truyền id để xóa nhiều (Tin tức)
$('.btn-del').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những tin tức này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/news/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có tin tức được chọn!');
        }
    }
})

// truyền id để xóa nhiều (hướng dẫn)
$('.btn-free').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những hướng dẫn này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/freetutorials/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có video được chọn!');
        }
    }
})

// truyền id để xóa nhiều (cấp độ)
$('.btn-level').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những cấp độ này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/levels/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có cấp độ được chọn!');
        }
    }
})

// truyền id để xóa nhiều (lớp thực hành)
$('.btn-off').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những khóa học này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/offline/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có khóa học được chọn!');
        }
    }
})

// truyền id để xóa nhiều (khuyến mãi)
$('.btn-dis').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những phiếu giảm giá này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/coupons/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có phiếu giảm giá được chọn!');
        }
    }
})

// truyền id để xóa nhiều (loại bánh)
$('.btn-type').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những loại bánh này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/cake-types/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có loại bánh nào được chọn!');
        }
    }
})

// truyền id để xóa nhiều (hình dạng bánh)
$('.btn-shape').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những hình dạng bánh này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/cake-shapes/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có hình dạng bánh được chọn!');
        }
    }
})

// truyền id để xóa nhiều (kích thước bánh)
$('.btn-size').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những kích thước này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/cake-sizes/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có kích thước được chọn!');
        }
    }
})

// truyền id để xóa nhiều (bánh)
$('.btn-cake').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những kích thước này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/cakes/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có kích thước được chọn!');
        }
    }
})
