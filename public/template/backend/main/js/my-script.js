$(document).ready(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        },
    });
    $('#btn-search').on('click', function (e) {
        e.preventDefault();
        let searchValue = $('#search-form input[name="search_value"]').val().trim();
        if (searchValue == '') {
            Toast.fire(createToastObj('warning', 'Vui lòng nhập nội dung cần tìm!'));
        } else {
            $('#search-form input[name="search_value"]').val(searchValue);
            $('#search-form').submit();
        }
    });

    $('#btn-clear-search').on('click', function () {
        let url = $(this).data('url');
        window.location.href = url;
    });

    $('#filter_groupacp').on('change', function () {
        $('#filter-form').submit();
    });

    $('#filter_special').on('change', function () {
        $('#filter-form').submit();
    });

    $('#filter_category').on('change', function () {
        $('#filter-categoryform').submit();
    });

    $('.btn-delete').on('click', function (e) {
        e.preventDefault();
        Swal.fire(createConfirmObj('Bạn chắc chắn xóa dòng dữ liệu này?', 'error', 'Xóa')).then(
            (result) => {
                if (result.isConfirmed) {
                    window.location.href = $(this).attr('href');
                }
            }
        );
    });

    $('#check-all').on('change', function () {
        $('[name="checkbox[]"]').attr('checked', $(this).is(':checked'));
    });

    $('#bulk-apply').on('click', function () {
        let action = $('#bulk-action').val();
        if (action) {
            if ($('input[name="checkbox[]"]:checked').length > 0) {
                Swal.fire(
                    createConfirmObj(
                        'Bạn chắc chắn muốn thực hiện hành động này?',
                        'info',
                        'Đồng ý'
                    )
                ).then((result) => {
                    if (result.isConfirmed) {
                        let link = $('#bulk-action').data('url');
                        link = link.replace('value_new', action);
                        $('#form-table').attr('action', link);
                        $('#form-table').submit();
                    }
                });
            } else {
                Toast.fire(createToastObj('warning', 'Vui lòng chọn ít nhất 1 dòng dữ liệu!'));
            }
        } else {
            Toast.fire(createToastObj('warning', 'Vui lòng chọn hành động cần thực hiện!'));
        }
    });

    $('#notify-message')
        .delay(3000)
        .fadeOut('slow', function () {
            $(this).remove();
        });

    $('.btn-test').on('click', function () {
        $(this).notify('Hello Box', { position: 'top center', className: 'success' });
    });
});

function changePage(page){
    $('input[name=filter_page]').val(page);
    $('#form-table').submit();
}

function createConfirmObj(title, icon, confirmText) {
    return {
        title: title,
        icon: icon,
        position: 'top',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: confirmText,
        cancelButtonText: 'Hủy',
    };
}

function submitForm(link) {
    $('#admin-form').attr('action', link);
    $('#admin-form').submit();
}

function createToastObj(icon, title) {
    return {
        icon: icon,
        title: title,
    };
}
