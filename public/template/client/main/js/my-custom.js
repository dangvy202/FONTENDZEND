$(document).ready(function () {
    $('.ps-form--quick-search').submit(function (e) {
        e.preventDefault();
        console.log(123);
    })
    // $("#comment_frm_abc").on('submit',function(event){
    //     event.preventDefault();
    //     console.log(123);
    //     let url     = $(this).attr('action');
    //     $.ajax({
    //         url: url, // Link mà nó sẽ gọi đến,
    //         method: 'POST',
    //         data: $(this).serialize(),
    //         success: function (data) {
    //             console.log(data);
    //         },
    //     });
        
    // })
});