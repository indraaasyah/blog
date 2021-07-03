/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// $(".delete").on("click", function (event) {
//     event.preventDefault();
//     const url = $(this).attr("href");
//     swal({
//         title: "Are you sure?",
//         text: "This record and it`s details will be permanantly deleted!",
//         icon: "warning",
//         buttons: ["Cancel", "Yes!"],
//     }).then(function (value) {
//         if (value) {
//             window.location.href = url;
//         }
//     });
// });

$(document).on("click", ".delete", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    swal(
        {
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function () {
            $.ajax({
                type: "POST",
                url: "{{url('/destroy')}}",
                data: { id: id },
                success: function (data) {
                    //
                },
            });
        }
    );
});

// document.querySelector(".first").addEventListener("click", function () {
//     swal("Our First Alert");
// });
// swal("Hello");

// $(".delete").click(function () {
//     var id = $(this).attr("posts-id");
//     // alert(posts_title);
//     swal({
//         title: "Are you sure?",
//         text: "This post will removed to trash! You can restored later.",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//     }).then((willDelete) => {
//         // if (willDelete) {
//         //     swal("Poof! Your file hass been deleted");
//         //     icon: "success";
//         // } else {
//         //     swal("Your file is safe");
//         // }

//         if (willDelete) {
//             console.log(willDelete);
//             window.location = "/posts/" + id + "/delete";
//             swal("Poof! Your file hass been deleted");
//             icon: "success";
//         } else {
//             swal("Your file is safe");
//         }
//     });
// });
