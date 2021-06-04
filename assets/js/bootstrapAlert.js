src = "https://cdnjs.cloudflare.com/ajax/libs/bootsrap-growl/1.0.0/jquery.bootsrap-growl.min.js"
function bootstrapAlert() {
    $.bootstrapGrowl("This is success message!",{
        type: "success",
        offset: {from:"top",amount:250},
        align: "center",
        delay: 2000,
        allow_dismiss: true,
        stackup_spacing: 10,
    });
}