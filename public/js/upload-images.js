var c = 1;

$("#add-image").click(function(e)
{
    addUploadImage();
    e.preventDefault();
});

$("#find-image").click(function(e) {
    findImage();
    e.preventDefault();
});

$('#images-to-upload').on('click', 'a', function (e) {
    removeImage($(this).attr('key'));
    e.preventDefault();
});

$('#images-to-link').on('click', 'a', function (e) {
    removeImage($(this).attr('key'));
    e.preventDefault();
});

$(".input-find").keyup(function(e) {
    findImageByName();
    e.preventDefault();
});

$('.modal-body .images').on('click', 'img', function (e) {
    addImage($(this).attr('key'), $(this).attr('src'));
});

function addUploadImage()
{
    var div = "<div class='col-xs-6 col-sm-3 col-md-3 col-lg-3' id='image"+c+"'>";
    div += "<div class='form-group'>";
    div += "<input id='image-input"+c+"' type='file' name='images-to-upload[]' title='Add Image' />";
    div += "</div>";
    div += "<div class='form-group'>";
    div += "<a class='btn btn-warning' key="+c+" >Quitar</a>";
    div += "</div>";
    div += "</div>";
    $("#images-to-upload").append(div);
    c++;
}

function removeImage(c)
{
    $("#image"+c+"").remove();
}

function findImage(url)
{
    url = typeof url !== 'undefined' ? url : "/images/search/";
    $.post(url)
        .done(function( data ) {
            $(".modal-body .images").html(data);
        });
}

function findImageByName()
{
    var text = $(".input-find").val();
    $.post("/images/search/"+text)
        .done(function( data ) {
            $(".modal-body .images").html(data);
        });
}

function addImage(id, url)
{
    var div = "<div class='col-xs-6 col-sm-3 col-md-3 col-lg-3' id='image"+c+"'>";
    div += "<div class='form-group'>";
    div += "<img src='"+url+"' class='img-responsive' />";
    div += "<input type='hidden' name='images-to-link[]' value="+id+" />";
    div += "</div>";
    div += "<div class='form-group'>";
    div += "<a class='btn btn-warning' key="+c+" >Quitar</a>";
    div += "</div>";
    div += "</div>";
    $("#images-to-link").append(div);
    c++;
}