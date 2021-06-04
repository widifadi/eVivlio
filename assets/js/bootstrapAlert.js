<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js" integrity="sha512-pBoUgBw+mK85IYWlMTSeBQ0Djx3u23anXFNQfBiIm2D8MbVT9lr+IxUccP8AMMQ6LCvgnlhUCK3ZCThaBCr8Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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