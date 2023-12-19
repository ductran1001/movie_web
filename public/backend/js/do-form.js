$(function () {
    let doForm = $("#do-form");
    doForm.submit(function (e) {
        e.preventDefault();
        let url = doForm.attr('action');
        let type = doForm.attr('method');
        let actionNext = doForm.find("button:focus").val();
        let elements = $(".text-danger, .is-invalid");

        let selectedStatus = $('input[name="status"]:checked').val();

        $(".error-message").remove();
        elements.removeClass("text-danger").removeClass("is-invalid");

        let formData = doForm.serialize();
        formData += `&status=${selectedStatus}`;

        $.ajax({
            url: url,
            type: type,
            data: formData,
            success: function (response) {
                if (actionNext.includes('create')) {
                    doForm.trigger("reset");
                    $("#holder_photo").remove();
                    $("#holder_photos").remove();
                } else {
                    window.location.href = actionNext;
                }
                toastr.success(response.msg);
            },
            error: function (response) {
                handleFormErrors(response);
            }
        });
    });
});

const handleFormErrors = (response) => {
    if (response.responseJSON?.errors) {
        const errors = response.responseJSON.errors;
        for (const error in errors) {
            const inputId = `#${error}`;
            const errorMessage = errors[error];
            const labelId = `label[for="${error}"]`;
            const html = `<i class="text-danger error-message">${errorMessage}</i>`;

            $(inputId).parent().append(html);
            $(labelId).addClass('text-danger');
            $(inputId).addClass('is-invalid');
        }
    } else {
        toastr.error(response.responseJSON?.msg || 'Có lỗi xảy ra thử lại sau!');
    }
};

$(document).ready(function () {
    $('body').on('click', '#delete-action', function () {
        Swal.fire({
            title: "Bạn chắc chứ?",
            text: "Hành động này sẽ không thể hoàn tác!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Vâng, xóa nó đi!",
            cancelButtonText: "Hủy bỏ"
        }).then((result) => {
            if (result.isConfirmed) {
                let url = $(this).data('url');
                let tr = $(this).closest('tr');
                let table = $('#zero_config').DataTable();
                $.ajax({
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    dataType: 'json',
                    caches: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        Swal.fire({
                            title: "Đã xóa!",
                            text: "Tập tin của bạn đã bị xóa.",
                            icon: "success"
                        });
                        table.row(tr).remove().draw(false);
                    },
                    error: function (response) {
                        Swal.fire({
                            title: "Lỗi!",
                            text: response.responseJSON.msg,
                            icon: "error"
                        });
                    }
                });
            }
        });

    });
});